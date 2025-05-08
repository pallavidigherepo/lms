<script setup lang="ts">
import store from "@/stores";
import { ref, reactive, computed, onMounted, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormLabel, FormInput, FormSelect, FormCheck, FormSwitch } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
// import { ClassicEditor } from "@/components/Base/Ckeditor";

import { useVuelidate } from "@vuelidate/core";
import { required, helpers } from "@vuelidate/validators";
// import { useI18n } from "vue-i18n";
import axiosClient from "@/axios";
import Editor from "@tinymce/tinymce-vue";
import AnswerEditor from "@/components/Editor/Answer.vue";
import QuestionEditor from "@/components/Editor/Question.vue";

const route = useRoute();
const router = useRouter();
// const { t } = useI18n();

const submitted = ref(false);
const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);

// Now we must get editing details for the selected item
const model = ref({
  id: route.params.id,
  type_id: "",
  board_id: "",
  standard_id: "",
  difficulty_level_id: "",
  subject_id: "",
  chapter_id: "",
  topic_id: "",
  language_id: 1,
  question: "",
  description: null,
  note: null,
  marks: 0,
  negative_marks: 0,
  answers: [],
  questions: []
});
// Watch to current survey data change and when this happens we update local model

watch(
  () => store.state.questions.question,
  (newVal, oldVal) => {
    model.value = {
      ...JSON.parse(JSON.stringify(newVal)),
      status: !!newVal.status,
    };
  }
);

const fetch = async() => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        const result = await axiosClient.get(`/questions/${id}`);
        if (result.status != 200) {
            const error = new Error('Failed to fetch question')
            throw error;
        }
        model.value = JSON.parse(JSON.stringify(result.data.data));
        model.answers = result.data.answers;
        selectedType.value = result.data.type_id;
        selectedBoard(model.value.board_id);
        // Once all the data is populated, we have to get list of all the chapters of selected subject
        // selectedStandard(model.value.standard_id, model.value.board_id);
        // Once all the data is populated, we have to get list of all the chapters of selected subject
        selectedSubject(model.value.subject_id);
        // Now, get list of all the topics of selected chapter
        selectedChapter(model.value.chapter_id);
        //console.log(model.value);
    } catch (e) {
        isErrored.value = true;
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};

const selectedBoardtId = ref("");
const selectedStandardtId = ref("");
const selectedSubjectId = ref("");
const selectedChapterId = ref("");
const selectedTopicId = ref("");
const selectedType = ref("");
const subjects = ref("");
const chapters = ref([]);
const topics = ref([]);
const showAnswerButton = ref(true);

onMounted(() => {
  fetch();
  store.dispatch("listBoard").then().catch();
  store.dispatch("listStandard").then().catch();
  store.dispatch("listDifficultyLevel").then().catch();
  store.dispatch("listType").then().catch();
  store.dispatch("listLanguages").then().catch();
  store.dispatch("listTypeParagraph").then().catch();
});
const languages = computed(() => store.getters.languages);
const boards = computed(() => store.getters.listBoards);
const standards = computed(() => store.getters.listStandards);
const difficultyList = computed(() => store.getters.listDifficultyLevel);
const typeList = computed(() => store.getters.listType);
const typeListParagraph = computed(() => store.getters.listTypeParagraph);

function selectedBoard(boardId) {
    selectedBoardtId.value = boardId;

    selectedStandard(model.value.standard_id, boardId);
}

async function selectedStandard(standardId, boardId) {
    if (!selectedBoardtId.value || !standardId) {
        return;
    }
    selectedStandardtId.value = standardId;
    subjects.value = [];
    chapters.value = [];
    topics.value = [];
    const result = await axiosClient.get(`/subject_list/${selectedBoardtId.value}/${standardId}`);
    if (result.status !== 200) {
        throw new Error("Failed to fetch chapter");
    } else {
        subjects.value = result.data;
    }
}

async function selectedSubject(subjectId) {
  selectedSubjectId.value = subjectId;
  chapters.value = [];
  topics.value = [];
  const result = await axiosClient.get(`/chapter_list/${subjectId}`);
  if (result.status != 200) {
    const error = new Error("Failed to fetch chapter");
    throw error;
  } else {
    chapters.value = result.data;
  }
}

async function selectedChapter(chapterId) {
  selectedChapterId.value = chapterId;
  const result = await axiosClient.get(`/topic_list/${chapterId}`);
  if (result.status != 200) {
    const error = new Error("Failed to fetch topic");
    throw error;
  } else {
    topics.value = result.data;
  }
}

const rules = computed(() => {
  return {
    board_id: {
      required: helpers.withMessage("Please select board.", required),
    },
    standard_id: {
      required: helpers.withMessage("Please select standard.", required),
    },
    difficulty_level_id: {
      required: helpers.withMessage(
        "Please select difficulty level.",
        required
      ),
    },
    type_id: {
      required: helpers.withMessage("Please select question type.", required),
    },
    subject_id: {
      required: helpers.withMessage("Please select subject.", required),
    },
    chapter_id: {
      required: helpers.withMessage("Please select chapter.", required),
    },
    // topic_id: {
    //   required: helpers.withMessage("Please select topic.", required),
    // },
    language_id: {
      required: helpers.withMessage("Please select language.", required),
    },
    question: {
      required: helpers.withMessage("Please enter question.", required),
    },
    description: {
      required: helpers.withMessage("Please enter description.", required),
    },
    note: {
      required: helpers.withMessage("Please enter note or explaination.", required),
    },
    marks: {
      required: helpers.withMessage("Please enter note or explaination.", required),
    },
    negative_marks: {
      required: helpers.withMessage("Please enter note or explaination.", required),
    },
    /*questions: {
      $each: helpers.forEach({
        question: {
          required
        }
      })
    },
    */
    answers: {
      $each: helpers.forEach({
        answer: {
          required: helpers.withMessage('Please enter answer.', required),
        }
      })
    }
  };
});

const v$ = useVuelidate(rules, model);

async function submitForm() {
  //
  submitted.value = true;
  v$.value.$validate(); // checks all inputs
  if (!v$.value.$error) {
    isLoading.value = true;
    await store
      .dispatch("questions/save", model.value)
      .then(() => {
        isLoading.value = false;
        submitted.value = false;
        router.push({ name: "Questions" });
      })
      .catch((err) => {
        isLoading.value = false;
        isErrored.value = true;
        if (err.response) {
          message.value = err.response.data.message;
        }

      });
  } else {
    // if ANY fail validation
    return;
  }
}

function addQuestion(index: number) {
  const newQuestion = {
    id: makeid(3),
    type_id: "",
    question: "",
    description: "",
    note: "",
    marks: "",
    negative_marks: "",
    answers: [],
  };
  model.value.questions.splice(index, 0, newQuestion);
}
function deleteQuestion(question: any) {
  model.value.questions = model.value.questions.filter((q) => q !== question);
}
function questionChange(question: { id: any; }) {
  model.value.questions = model.value.questions.map((q) => {
    if (q.id === question.id) {
      return JSON.parse(JSON.stringify(question));
    }
    return q;
  });
}

function addAnswer(index: number) {
  if (selectedType.value == 5) {
    //return ;
  } else {
    const newAnswer = {
      id: makeid(3),
      answer: null,
      is_correct: false,
    };
    model.value.answers.splice(index, 0, newAnswer);
  }

}

function deleteAnswer(answer: any) {
  model.value.answers = model.value.answers.filter((q) => q !== answer);
}
function changeType(type: string|number) {
  selectedType.value = type;
  if (type == 5) {
    //  showAnswerButton.value = false;
  } else {
    showAnswerButton.value = true;
  }
}

function answerChange(answer: { id: any; }) {
  model.value.answers = model.value.answers.map((q) => {
    if (q.id === answer.id) {
      return JSON.parse(JSON.stringify(answer));
    }
    return q;
  });
}

function makeid(length: number) {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}
</script>

<template>
    <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Edit Question
        </div>
      </div>
      <div class="flex flex-col mt-2">
        <div
          class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7"
        >
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="p-5 border rounded-[0.6rem] border-slate-200/60 dark:border-darkmode-400"
            >
              <!-- <div
                class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400"
              >
                <Lucide icon="ChevronDown" class="w-5 h-5 stroke-[1.3] mr-2" />
                Subject
              </div> -->
              <div>
                <div class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                  <Lucide icon="ChevronDown" class="w-5 h-5 stroke-[1.3] mr-2" />
                  <h2 class="text-lg font-medium mr-auto">
                    Edit Question
                  </h2>
                  <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <Button
                        variant="primary"
                        class="
                                box
                                mr-2
                                flex
                                items-center
                                ml-auto
                                sm:ml-0
                            "
                          @click="router.push('/questions')"
                    ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
                    </Button>
                  </div>
                </div>
                <!-- BEGIN: Notification -->
                <info :typeClass="'alert-warning'"
                    class="mb-6 mt-5"
                    :message="'questions.You can add question manually or import it in bulk'"/>
                <!-- BEGIN: Notification -->
                <div class="alert alert-danger show flex items-center mb-2" role="alert" v-if="isErrored">
                  <AlertOctagonIcon class="w-6 h-6 mr-2" />
                  {{ message }}
                </div>

                <form @submit.prevent="submitForm" class="validate-form">
                  <div class="intro-y col-span-11 2xl:col-span-9">

                    <!-- BEGIN: Board and Standard selection -->
                    <div class="intro-y box p-5 mt-5">
                      <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                          class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                          <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Select Board & Standard/Class
                        </div>
                        <div class="mt-5">

                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Board</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-board"
                                        v-model="model.board_id"
                                        :placeholder="'Select Board'"
                                        :options="{
                                            allowEmptyOption: false,
                                            create: false,
                                            placeholder: 'Select Board',
                                            autocomplete: 'off',
                                            items:model.board_id,
                                            onChange: selectedBoard,
                                        }"
                                        class="w-full"
                                        :class="{ 'border-danger': submitted && v$.board_id.$errors.length,}"
                                >
                                <option v-for="(board, index) in boards" :key="index" :value="index">
                                  {{ board }}
                                </option>
                              </TomSelect>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.board_id.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Standard</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-standard" v-model="model.standard_id" placeholder="Select Standard" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Standard',
                                autocomplete: 'off',
                                items:model.standard_id,
                                onChange: selectedStandard,
                              }" class="w-full" :class="{
              'border-danger': submitted && v$.standard_id.$errors.length,
            }">
                                <option v-for="(standard, indexs) in standards" :key="indexs" :value="indexs">
                                  {{ standard }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END: Board and Standard selection -->
                    <!-- BEGIN: Language and Difficulty level selection -->
                    <div class="intro-y box p-5 mt-5">
                      <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                          class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                          <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Select Difficulty level & Language
                        </div>
                        <div class="mt-5">

                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Difficulty Level</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-level" v-model="model.difficulty_level_id" placeholder="Select Difficulty Level"
                                :options="{
                                  allowEmptyOption: false,
                                  create: false,
                                  placeholder: 'Select Difficulty Level',
                                  autocomplete: 'off',
                                  items:model.difficulty_level_id,
                                }" class="w-full" :class="{
              'border-danger':
                submitted && v$.difficulty_level_id.$errors.length,
            }">
                                <option v-for="(level, indexd) in difficultyList" :key="indexd" :value="indexd">
                                  {{ JSON.parse(level) }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Language</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-language" v-model="model.language_id" placeholder="Select Language" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Language',
                                autocomplete: 'off',
                                items:model.language_id,
                              }" class="w-full" :class="{
              'border-danger': submitted && v$.language_id.$errors.length,
            }">
                                <option v-for="(language, indexl) in languages" :key="indexl" :value="indexl">
                                  {{ language }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END: Language and Difficulty level selection -->
                    <!-- BEGIN: Subject, Chapter and Topic selection -->
                    <div class="intro-y box p-5 mt-5">
                      <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                          class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                          <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Select Subject, Chapter and Topic
                        </div>
                        <div class="mt-5">

                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Subject</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-subject" v-model="model.subject_id" placeholder="Select Subject" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Subject',
                                autocomplete: 'off',
                                onChange: selectedSubject,
                                items:model.subject_id,
                              }" class="w-full" :class="{
              'border-danger': submitted && v$.subject_id.$errors.length,
            }">
                                <option v-for="(subject, indexsub) in subjects" :key="indexsub" :value="indexsub">
                                  {{ JSON.parse(subject) }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Chapter</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-chapter"
                                      v-model="model.chapter_id"
                                      placeholder="Select Chapter"
                                      :options="{
                                        allowEmptyOption: false,
                                        create: false,
                                        placeholder: 'Select Chapter',
                                        autocomplete: 'off',
                                        onChange: selectedChapter,
                                        items:model.chapter_id,
                                      }"
                                      class="w-full" :class="{
                                        'border-danger': submitted && v$.chapter_id.$errors.length,
                                }">
                                <option v-for="(chapter, indexchap) in chapters"
                                      :key="indexchap"
                                      :value="indexchap">
                                  {{ JSON.parse(chapter) }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Topic</div>
                                </div>

                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-subject"
                                v-model="model.topic_id"
                                placeholder="Select Topic"
                                :options="{
                                    allowEmptyOption: false,
                                    create: false,
                                    placeholder: 'Select Topic',
                                    autocomplete: 'off',
                                    items:model.topic_id,
                                }"
                                class="w-full"
                                :class="{ 'border-danger': submitted && v$.topic_id.$errors.length,}">
                                <option v-for="(topic, indextop) in topics" :value="indextop" :key="indextop">
                                  {{ JSON.parse(topic) }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END: Subject, Chapter and Topic selection -->
                    <!-- BEGIN: Question and Solution -->
                    <div class="intro-y box p-5 mt-5">
                      <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                          class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                          <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Question & Solution
                        </div>
                        <div class="mt-5">

                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Question</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <FormInput id="form-question" type="text" class="form-control" placeholder="Enter question."
                                v-model.trim="model.question" :class="{
                                  'border-danger': submitted && v$.question.$errors.length,
                                }" />
                              <div class="form-help text-right">Maximum character 0/70</div>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.question.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Description</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <!-- <ClassicEditor v-model="editorData" /> -->
                              <editor id="form-description" v-model="model.description" :class="{
                                'border-danger': submitted && v$.description.$errors.length,
                              }" initialValue="<p>Initial editor content</p>"
                                apiKey="n10p1o42akootxkapivj4ecxefdo4zlaqd0ek0aa47ld9js7" :init="{
                                  height: 200,
                                  menubar: true,
                                  plugins: [
                                    'advlist autolink lists link image charmap',
                                    'searchreplace visualblocks code fullscreen',
                                    'print preview anchor insertdatetime media',
                                    'paste code help wordcount table',
                                  ],
                                  toolbar:
                                    'undo redo | formatselect | bold italic | \
                                                                                    alignleft aligncenter alignright | \
                                                                                    bullist numlist outdent indent | insert | help | \
                                                                                    tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry',
                                }">
                              </editor>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.description.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Note/Explaination</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <!-- <ClassicEditor v-model="editorData" /> -->
                              <editor id="form-note" v-model="model.note" :class="{
                                'border-danger': submitted && v$.note.$errors.length,
                              }" initialValue="<p>Initial editor content</p>"
                                apiKey="n10p1o42akootxkapivj4ecxefdo4zlaqd0ek0aa47ld9js7" :init="{
                                  height: 200,
                                  menubar: true,
                                  plugins: [
                                    'advlist autolink lists link image charmap',
                                    'searchreplace visualblocks code fullscreen',
                                    'print preview anchor insertdatetime media',
                                    'paste code help wordcount table',
                                  ],
                                  toolbar:
                                    'undo redo | formatselect | bold italic | \
                                                                                  alignleft aligncenter alignright | \
                                                                                  bullist numlist outdent indent | insert | help | \
                                                                                  tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry',
                                }">
                              </editor>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.note.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Marks</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <FormInput id="form-marks" type="text" class="form-control" placeholder="Marks"
                                v-model.trim="model.marks" :class="{
                                  'border-danger': submitted && v$.marks.$errors.length,
                                }" />
                              <div class="form-help text-right">{{ t("questions.These are the marks, if answered correctly")}}</div>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.marks.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Negative Marks</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <FormInput id="form-negative-marks" type="text" class="form-control" placeholder="Negative marks."
                                v-model.trim="model.negative_marks" :class="{
                                  'border-danger': submitted && v$.negative_marks.$errors.length,
                                }" />
                              <div class="form-help text-right">These are negative marks if answered incorrect</div>
                              <div class="text-danger mt-2" v-for="(error, index) of v$.negative_marks.$errors" :key="index">
                                <div class="error-msg">{{ error.$message }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END: Subject, Chapter and Topic selection -->
                    <!-- BEGIN: Product Variant (Details) -->
                    <div class="intro-y box p-5 mt-5">
                      <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                          class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                          <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>Select Question Type & Add Answer
                        </div>
                        <div class="mt-5">

                          <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium">Choose Question Type</div>
                                  <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <TomSelect id="form-question-type"
                                  v-model="model.type_id"
                                  placeholder="Select Type"
                                  :options="{
                                      allowEmptyOption: false,
                                      create: false,
                                      placeholder: 'Select Type',
                                      autocomplete: 'off',
                                      onChange: changeType,
                                      items:model.type_id,
                                  }"
                                  class="w-full"
                                  :class="{ 'border-danger': submitted && v$.type_id.$errors.length, }">

                                <option v-for="(type, index) in typeList" :key="index" :value="index">
                                  {{ JSON.parse(type) }}
                                </option>
                              </TomSelect>
                            </div>
                          </div>
                          <div class="form-inline flex items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0"
                            v-if="model.type_id != '' && model.type_id != 'Select Question Type' && model.type_id != 5">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex-items-center">
                              <div class="text-left flex-grow">
                                <div class="flex items-center">
                                  <div class="font-medium" v-if="model.type_id != 5">Answers</div>

                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3" v-if="model.type_id != 5">
                                  Add answers according to the type of question you have selected
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                              <div class="relative pl-5 pr-5 xl:pr-10 py-10 bg-slate-50 dark:bg-transparent dark:border rounded-md">
                                <template v-if="model.type_id == 4">
                                  <AnswerEditor :answer="{}" :index="1" :type="selectedType" @change="answerChange"
                                    @addAnswer="addAnswer" @deleteAnswer="deleteAnswer" />
                                </template>
                                <template v-else-if="model.type_id == 5">
                                  <div v-if="!model.questions.length" class="text-center text-gray-600">
                                    You do not have any questions added yet
                                  </div>
                                  <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                    <Button variant="outline-primary" class="btn btn-outline-primary border-dashed w-full" type="button"
                                      @click="addQuestion()">
                                      <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" /> Add Question
                                    </Button>
                                  </div>
                                  <div v-for="(question, index) in model.questions" :key="question.id">
                                    <QuestionEditor :question="question" :questionIndex="index" :type="selectedType"
                                      :typeParagraph="typeListParagraph" @change="questionChange" @addQuestion="addQuestion"
                                      @deleteQuestion="deleteQuestion" />
                                  </div>
                                </template>
                                <template v-else>
                                  <div v-if="!model.answers.length" class="text-center text-gray-600">
                                    You do not have any answers added yet
                                  </div>
                                  <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                    <Button variant="outline-primary" class="btn btn-outline-primary border-dashed w-full" type="button"
                                      v-if="showAnswerButton == true" @click="addAnswer()">
                                      <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" /> Add Answer
                                    </Button>
                                  </div>

                                  <div class="mt-5">

                                    <div v-for="(answer, index) in model.answers" :key="answer.id">
                                      <AnswerEditor :answer="answer" :index="index" :type="selectedType"
                                        :typeParagraph="typeListParagraph" @change="answerChange" @addAnswer="addAnswer"
                                        @deleteAnswer="deleteAnswer" />
                                    </div>
                                  </div>
                                </template>
                              </div>
                            </div>
                          </div>
                          <div v-else-if="model.type_id == 5" class="intro-y box p-5 mt-5">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                              <div
                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Questions of paragraph
                                <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                  <Button variant="outline-primary" class="btn btn-outline-primary border-dashed w-full" type="button" @click="addQuestion()">
                                    <Lucide icon="PlusIcon" class="w-4 h-4 mr-2"/>
                                    Add Question
                                  </Button>
                                </div>
                              </div>

                              <div class="mt-5">
                                <div v-if="!model.questions.length" class="text-center text-gray-600">
                                  You do not have any questions added yet
                                </div>

                                <div class="form-inline flex items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0"
                                  v-for="(question, index) in model.questions" :key="question.id">
                                  <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                    <div class="text-left flex-grow">
                                      <div class="flex items-center">
                                        <div class="font-medium">Question {{ index + 1 }}.</div>
                                      </div>
                                      <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        Add questions and its answers accordingly
                                      </div>
                                    </div>
                                  </div>

                                  <QuestionEditor :question="question" :index="index" :type="selectedType"
                                    :typeParagraph="typeListParagraph" @change="questionChange" @addQuestion="addQuestion"
                                    @deleteQuestion="deleteQuestion" />
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <!-- END: Product Variant (Details) -->
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                      <Button
                            variant="secondary"
                            class="btn btn-outline-secondary w-20 mr-1"
                            @click="router.push('/questions')"
                            
                        >
                        Cancel
                        </Button>
                        <Button variant="primary" class="btn btn-primary w-20" type="submit">
                          Save
                        </Button>
                    </div>
                  </div>
                </form>
                <Loading v-if="isLoading" fixed></Loading>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</template>
<style scoped>

</style>
