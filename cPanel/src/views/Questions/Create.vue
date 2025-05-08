<script setup lang="ts">
import store from "@/stores";
import {computed, onMounted, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormLabel, FormInput, FormSelect, FormCheck, FormSwitch } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { ClassicEditor } from "@/components/Base/Ckeditor";
import Alert from "@/components/Base/Alert";

import {useVuelidate} from "@vuelidate/core";
import {helpers, minLength, minValue, numeric, required, requiredIf} from "@vuelidate/validators";
// import {useI18n} from "vue-i18n";
import axiosClient from "@/axios";
import Editor from "@tinymce/tinymce-vue";
import AnswerEditor from "@/components/Editor/Answer.vue";
import QuestionEditor from "@/components/Editor/Question.vue";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();

const submitted = ref(false);
const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);
const validationErrors = ref();
const addQuestionManually = ref(false);

// Now we must get editing details for the selected item
const model = ref({
    id: "",
    board_id: 1,
    standard_id: "",
    difficulty_level_id: "",
    subject_id: "",
    chapter_id: "",
    topic_id: "",
    language_id: 1,
    add_question_manually: false,
    question: "",
    description: null,
    note: null,
    marks: "",
    negative_marks: "",
    expected_time: "",
    type_id: "",
    import: "",
    import_file_name: "",
    answers: [
        {
            answer: '',
            is_correct: null,
            errors: [],
        },
    ],
    questions: [
        {
            question: '',
            description: '',
            note: '',
            marks: '',
            negative_marks: '',
            type_id: '',
            answers: [
                {
                    answer: '',
                    is_correct: null,
                    errors: [],
                }
            ],
            errors: [],
        }
    ]
});

const selectedBoardtId = ref("");
const selectedStandardtId = ref("");
const selectedSubjectId = ref("");
const selectedChapterId = ref("");
const selectedTopicId = ref("");
const selectedType = ref("");
const subjects = ref([]);
const chapters = ref([]);
const topics = ref([]);
const showAnswerButton = ref(true);

onMounted(() => {
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
    selectedBoardtId.value = "1";
    if (!selectedBoardtId.value || !standardId) {
        return;
    }
    selectedStandardtId.value = standardId;
    subjects.value = [];
    chapters.value = [];
    topics.value = [];
    const result = await axiosClient.get(`/subject_list/${selectedBoardtId.value}/${standardId}`);
    if (result.status !== 200) {
        throw new Error("Failed to fetch subjects");
    } else {

        subjects.value = result.data;
        if (subjects.value.length <= 0) {alert('Please add subjects for this standard first.');}
    }
}

async function selectedSubject(subjectId) {
    selectedSubjectId.value = subjectId;
    chapters.value = [];
    topics.value = [];
    const result = await axiosClient.get(`/chapter_list/${subjectId}`);
    if (result.status !== 200) {
        throw new Error("Failed to fetch chapter");
    } else {
        chapters.value = result.data;
    }
}

async function selectedChapter(chapterId) {
    selectedChapterId.value = chapterId;
    const result = await axiosClient.get(`/topic_list/${chapterId}`);
    if (result.status !== 200) {
        throw new Error("Failed to fetch topic");
    } else {
        topics.value = result.data;
    }
}


const rules = computed(() => {
    return {
        /*board_id: {
            required: helpers.withMessage("Please select board.", required),
        },*/
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
        /*topic_id: {
            required: helpers.withMessage("Please select topic.", required),
        },*/
        language_id: {
            required: helpers.withMessage("Please select language.", required),
        },
        import: {
            /*required: helpers.withMessage("Please select file to upload.", requiredIf(function () {
                return !model.value.add_question_manually
            }))*/
        },
        question: {
            required: helpers.withMessage("Please enter question.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
        },
        description: {
            required: helpers.withMessage("Please enter description.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
        },
        note: {
            required: helpers.withMessage("Please enter note or explaination.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
        },
        marks: {
            required: helpers.withMessage("Please enter marks for this questions.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
            numeric: helpers.withMessage("Please enter numeric value", numeric),
            minValue: helpers.withMessage("Please enter minimum one mark.", minValue(1)),
        },
        negative_marks: {
            required: helpers.withMessage("Please enter negative marks for this questions.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
            numeric: helpers.withMessage("Please enter numeric value", numeric),
            //minValue: helpers.withMessage("Please enter minimum one mark.", minValue(0.0)),
        },
        expected_time: {
            required: helpers.withMessage("Please enter expected time to answer this questions.", requiredIf(function () {
                return model.value.add_question_manually;
            })),
            numeric: helpers.withMessage("Please enter numeric value", numeric),
        }
    };
});

const rulesForQuestion = computed(() => {
    return {
        question: {
            required: requiredIf(function () {
                return !model.value.import;
            })
        },
        description: {
            required: helpers.withMessage('Please enter description.', required),
        },
        note: {
            required: helpers.withMessage('Please enter note.', required),
        },
        type_id: {
            required: helpers.withMessage('Please select type.', required),
        },
        marks: {
            required: helpers.withMessage("Please enter marks for this questions.", required),
            numeric: helpers.withMessage("Please enter numeric value", numeric),
            minValue: helpers.withMessage("Please enter minimum one mark.", minValue(1)),
        },
        negative_marks: {
            required: helpers.withMessage("Please enter negative marks for this questions.", required),
            numeric: helpers.withMessage("Please enter numeric value", numeric),
            minValue: helpers.withMessage("Please enter minimum one mark.", minValue(0.1)),
        },
        answers: minLength(1),
    }
});

const rulesForAnswer = computed(() => {
    return {
        answer: {
            required: helpers.withMessage('Please enter answer.', required),
        },
    }
});

const v$ = useVuelidate(rules, model);
const vQ$ = ref();
const vA$ = ref();

async function submitForm() {

    submitted.value = true;
    v$.value.$validate(); // checks all inputs
    validateQuestionAnswers(); // Checks all question and answer inputs

    if (!v$.value.$error) {
        isLoading.value = true;
        if (model.value.type_id != 5) {
            delete model.value.questions;
        }
        let dataToPost = model.value;
        if (!model.value.add_question_manually) {
            dataToPost = setFormData();
        }
        await store
            .dispatch("questions/save", dataToPost)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = false;
                router.push({name: "Questions"});
            })
            .catch((err) => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = true;
                if (err.response.data) {
                    message.value = err.response.data.message;
                }

            });
    } else {
        // if ANY fail validation
        return;
    }
}

function setFormData() {
    let formData = new FormData();
    formData.append("board_id", model.value.board_id);
    formData.append("standard_id", model.value.standard_id);
    formData.append("difficulty_level_id", model.value.difficulty_level_id);
    formData.append("subject_id", model.value.subject_id);
    formData.append("chapter_id", model.value.chapter_id);
    formData.append('topic_id', model.value.topic_id);
    formData.append('type_id', model.value.type_id);
    formData.append('language_id', model.value.language_id);
    formData.append("import", model.value.import);

    return formData;
}

function validateQuestionAnswers() {

    // First of all check if type id not null
    if (model.value.type_id != null) {
        // Then we should check of type id not of type paragraph
        if (model.value.type_id !== 5) {
            // Check if answers array is set.
            // IF answers array's length is 0 then we need to throw error.
            if (model.value.answers.length === 0) {
                validationErrors.value = {
                    message: "Please answer at-latest one answers added.",
                }
                isErrored.value = true;
                //model.value.answers.errors
            } else {
                for (let index = 0; index < model.value.answers.length; index++) {
                    const valA$ = useVuelidate(rulesForAnswer, model.value.answers[index]);
                    valA$.value.$validate();

                    if (valA$.value.$error) {
                        if (!model.value.answers[index].errors[index]) {
                            isErrored.value = true;
                            model.value.answers[index].errors.splice(0, 0, valA$.value);
                        }
                    }
                }
            }
        } else if (model.value.type_id == 5) {

            for (let index = 0; index < model.value.questions.length; index++) {
                const valQ$ = useVuelidate(rulesForQuestion, model.value.questions[index]);
                valQ$.value.$validate();

                if (valQ$.value.$error) {
                    if (!model.value.questions[index].errors[index]) {
                        model.value.questions[index].errors.splice(0, 0, valQ$.value);
                    }
                }

                for (let ans = 0; ans < model.value.questions[index].answers.length; ans++) {
                    const valA$ = useVuelidate(rulesForAnswer, model.value.questions[index].answers[ans]);
                    valA$.value.$validate();

                    if (valA$.value.$error) {
                        if (!model.value.questions[index].answers[ans].errors[ans]) {
                            model.value.questions[index].answers[ans].errors.splice(0, 0, valA$.value);
                        }
                    }
                }
            }
        }
    }
}

function addQuestion(index) {
    const newQuestion = {
        id: makeid(3),
        question: '',
        description: '',
        note: '',
        marks: '',
        negative_marks: '',
        type_id: '',
        answers: [
            {
                answer: '',
                is_correct: null,
                errors: []
            }
        ],
        errors: [],
    };
    model.value.questions.splice(index, 0, newQuestion);
}

function deleteQuestion(question) {
    model.value.questions = model.value.questions.filter((q) => q !== question);
}

function questionChange(question) {
    model.value.questions = model.value.questions.map((q) => {
        if (q.id === question.id) {
            return JSON.parse(JSON.stringify(question));
        }
        return q;
    });
}

function addAnswer(index) {
    if (selectedType.value !== 5) {
        let newAnswer = {
            id: makeid(3),
            answer: '',
            is_correct: false,
            errors: [],
        };
        model.value.answers.splice(index, 0, newAnswer);
    }
}

function deleteAnswer(answer) {
    model.value.answers = model.value.answers.filter((q) => q !== answer);
}

function changeType(type) {
    selectedType.value = type;
    if (type == 5) {
        //  showAnswerButton.value = false;
    } else {
        showAnswerButton.value = true;
    }
}

function answerChange(answer) {
    model.value.answers = model.value.answers.map((q) => {
        if (q.id === answer.id) {
            return JSON.parse(JSON.stringify(answer));
        }
        return q;
    });
}

function importMe(ev) {
    model.value.import = ev.target.files[0];
    model.value.import_file_name = ev.target.files[0].name;
}

const downloadFileName = ref('');
const form = {
    export_as: ""
}

async function exportMe(export_as, isDemo) {
    const demo = ref(false);

    let todayDate = new Date();

    let name = "Question" + "-" + todayDate.getDate() + "-"
        + (todayDate.getMonth() + 1) + "-"
        + todayDate.getFullYear() + "-"
        + todayDate.getHours() + "-"
        + todayDate.getMinutes() + "-"
        + todayDate.getSeconds();
    if (!isDemo) {
        downloadFileName.value = name + "." + export_as;
    } else {
        downloadFileName.value = "Template for " + name + "." + export_as;
        demo.value = true;
    }
    const req = {
        fileName: downloadFileName.value,
        modelName: "Question",
        //selectedItem: options.selectedItem ? options.selectedItem : "",
        demo: demo.value
    };

    await store.dispatch('exportMe', req)
        .then((response) => {
            if (response.status === 200) {
                form.export_as = "";
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement("a");
                fileLink.href = fileURL;
                fileLink.setAttribute("download", downloadFileName.value);
                //fileLink.setAttribute('target', '_blank');
                document.body.appendChild(fileLink);
                fileLink.click();
            }
        })
        .catch();
}

function makeid(length) {
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
          Create Question
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
                            Add Question
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
                    <Alert variant="warning" class="flex items-center mb-6 mt-5">
                        <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                        <span>You can add question manually OR import it in bulk</span>
                    </Alert>
                    <info :typeClass="'alert-warning'"
                        class="mb-6 mt-5"
                        :message="'questions.Before ADDING questions please make sure that you have added subjects chapters and topics to selected standard'"/>
                    <!-- BEGIN: Notification -->
                    <!-- BEGIN: Notification -->
                    <info :typeClass="'alert-warning'"
                        class="mb-6 mt-5"
                        :message="'questions.You can add question manually or import it in bulk'"/>
                    <!-- BEGIN: Notification -->
                    <div v-if="isErrored" class="alert alert-danger show flex items-center mb-2" role="alert">
                        <AlertOctagonIcon class="w-6 h-6 mr-2"/>
                        {{ message }}
                    </div>
                    <form class="validate-form" @submit.prevent="submitForm" enctype="multipart/form-data">
                        <div class="intro-y col-span-11 2xl:col-span-9">

                            <!-- BEGIN: Board and Standard selection -->
                            <div class="intro-y box p-5 mt-5">
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                        Select Board & Standard/Class
                                    </div>
                                    <div class="mt-5">

            <!--                            <div class="form-inline items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">{{
                                                                t("questions.Choose Board")
                                                            }}
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            {{ t("common.Required") }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-board" v-model="model.board_id" :class="{
            'border-danger': submitted && v$.board_id.$errors.length,
            }"
                                                        :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Board',
                                autocomplete: 'off',
                                onChange: selectedBoard,
                            }" :placeholder="'Select Board'" class="w-full">
                                                    <option>{{ t('questions.Select Board') }}</option>
                                                    <option v-for="(board, index) in boards" :key="index" :value="index">
                                                        {{ board }}
                                                    </option>
                                                </TomSelect>

                                                <div v-for="(error, index) of v$.board_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Standard
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-standard" v-model="model.standard_id"
                                                        :class="{
            'border-danger': submitted && v$.standard_id.$errors.length,
            }" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Standard',
                                autocomplete: 'off',
                                onChange: selectedStandard,
                            }" class="w-full" placeholder="Select Standard">
                                                    <option>Select Standard</option>
                                                    <option v-for="(standard, indexs) in standards" :key="indexs" :value="indexs">
                                                        {{ standard }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.standard_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Board and Standard selection -->
                            <!-- BEGIN: Subject, Chapter and Topic selection -->
                            <div class="intro-y box p-5 mt-5">
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                        Select Subject, Chapter and Topic
                                    </div>
                                    <div class="mt-5">

                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Subject
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-subject" v-model="model.subject_id" :class="{
            'border-danger': submitted && v$.subject_id.$errors.length,
            }"
                                                        :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Subject',
                                autocomplete: 'off',
                                onChange: selectedSubject,
                            }" class="w-full" placeholder="Select Subject">
                                                    <option>Select Subject</option>
                                                    <option v-for="(subject, indexsub) in subjects" :key="indexsub"
                                                            :value="indexsub">
                                                        {{ JSON.parse(subject) }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.subject_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Chapter
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-chapter" v-model="model.chapter_id" :class="{
            'border-danger': submitted && v$.chapter_id.$errors.length,
            }"
                                                        :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Chapter',
                                autocomplete: 'off',
                                onChange: selectedChapter,
                            }" class="w-full" placeholder="Select Chapter">
                                                    <option>Select Chapter</option>
                                                    <option v-for="(chapter, indexchap) in chapters" :key="indexchap"
                                                            :value="indexchap">
                                                        {{ JSON.parse(chapter) }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.chapter_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Topic
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-subject"
                                                        v-model="model.topic_id"
                                                        :options="{
                                                                allowEmptyOption: false,
                                                                create: false,
                                                                placeholder: 'Select Topic',
                                                                autocomplete: 'off',
                                                        }"
                                                        class="w-full"
                                                        placeholder="Select Topic">
                                                    <option>Select Topic</option>
                                                    <option v-for="(topic, indextop) in topics" :key="indextop" :value="indextop">
                                                        {{ JSON.parse(topic) }}
                                                    </option>
                                                </TomSelect>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Subject, Chapter and Topic selection -->
                            <!-- BEGIN: Language and Difficulty level selection -->
                            <div class="intro-y box p-5 mt-5">
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                        Select Difficulty level & Language
                                    </div>
                                    <div class="mt-5">

                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Difficulty Level
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-level"
                                                        v-model="model.difficulty_level_id"
                                                        class="w-full" placeholder="Select Difficulty Level"
                                                        :class="{ 'border-danger': submitted && v$.difficulty_level_id.$errors.length,}"
                                                        :options="{
                                                            allowEmptyOption: false,
                                                            create: false,
                                                            placeholder: 'Select Difficulty Level',
                                                            autocomplete: 'off',
                                                            }">
                                                    <option>Select Difficulty Level</option>
                                                    <option v-for="(level, indexd) in difficultyList" :key="indexd" :value="indexd">
                                                        {{ JSON.parse(level) }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.difficulty_level_id.$errors"
                                                    :key="index" class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Language
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-language" v-model="model.language_id"
                                                        :class="{
            'border-danger': submitted && v$.language_id.$errors.length,
            }" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Language',
                                autocomplete: 'off',
                            }" class="w-full" placeholder="Select Language">
                                                    <option v-for="(language, indexl) in languages" :key="indexl" :value="indexl">
                                                        {{ language }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.language_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Language and Difficulty level selection -->

                            <div class="mt-5 mb-5 text-center justify-center">
                                <div class="mt-1 text-center w-full">
                                    <div class="form-check form-switch text-center justify-center">
                                        <FormSwitch.Input id="checkbox-switch-7"
                                            class="form-check-input"
                                            type="checkbox"
                                            @change="addQuestionManually = !addQuestionManually"
                                            v-model="model.add_question_manually"/>
                                        <FormLabel class="form-check-label font-medium"
                                            for="checkbox-switch-7">Add Question & Answers Manually</FormLabel>
                                    </div>

                                </div>
                            </div>
                            <div v-if="!addQuestionManually" class="intro-y box p-5 mt-3">

                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"
                                    >
                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                    Import questions in bulk

                                    </div>
                                    <div class="mt-5 col-span-12">
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Question Type
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-type" v-model="model.type_id" :class="{
            'border-danger': submitted && v$.type_id.$errors.length,
            }"
                                                        :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Type',
                                autocomplete: 'off',
                                onChange: changeType
                            }" class="w-full" placeholder="Select Type">
                                                    <option>Select Question Type</option>
                                                    <option v-for="(type, indext) in typeList" :key="indext" :value="indext">
                                                        {{ JSON.parse(type) }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.type_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline items-start flex-col xl:flex-row mt-2 pt-5 first:mt-0 first:pt-0 w-full">

                                            <div class="w-full">
                                                <div class="text-center">
                                                    <div class="upload-btn-wrapper">
                                                        <Button class="upload-btn">Upload file to import
                                                        </Button>
                                                        <FormInput id="modal-form-1"
                                                            accept=".xlsx, .xls, .csv, .ods"
                                                            name="myfile"
                                                            type="file"
                                                            @change="importMe"/>

                                                    </div>
                                                    <div>{{ model.import_file_name }}</div>
                                                    <div v-for="(error, index) of v$.import.$errors" :key="index"
                                                        class="text-danger mt-2">
                                                        <div class="error-msg">{{ error.$message }}</div>
                                                    </div>
                                                    <div
                                                        class="alert alert-outline-warning alert-dismissible bg-warning/20 dark:bg-darkmode-400 dark:border-darkmode-400 mt-5 show"
                                                        role="alert" style="display: block;">

                                                        <div class="flex items-center">
                                                            <span>
                                                                <svg class="lucide w-6 h-6 mr-3" fill="none"
                                                                    height="24"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    viewBox="0 0 24 24"
                                                                    width="24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z">
                                                                    </path>
                                                                    <line x1="12" x2="12" y1="9" y2="13"></line>
                                                                    <line x1="12" x2="12.01" y1="17" y2="17"></line>
                                                                </svg>
                                                            </span>
                                                            <span class="text-slate-800 dark:text-slate-500">Supports CSV and Excel files</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-center">
                                                        <div class="box p-4 col-span-6">
                                                            <div class="flex text-center justify-center">

                                                                <div class="">
                                                                    <Lucide icon="DownloadCloudIcon" class="w-10 h-10 ml-0.5" />
                                                                </div>
                                                            </div>
                                                            <div class="text-base text-slate-500 mt-1">
                                                                <Button variant="primary" class="btn btn-primary h-20"
                                                                        @click.prevent="exportMe('xlsx', true)">
                                                                        Download Template for EXCEL
                                                                </Button>
                                                            </div>
                                                        </div>
                                                        <div class="box p-4 col-span-6">
                                                            <div class="flex text-center justify-center">

                                                                <div class="">
                                                                    <Lucide icon="DownloadCloudIcon" class="w-10 h-10 ml-0.5" />
                                                                </div>
                                                            </div>
                                                            <div class="text-base text-slate-500 mt-1">
                                                                <Button variant="primary" class="btn btn-primary h-20"
                                                                        @click.prevent="exportMe('csv', true)">
                                                                        Download Template for CSV
                                                                </Button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- BEGIN: Question and Solution -->
                            <div v-if="addQuestionManually" class="intro-y box p-5 mt-3">

                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"
                                    >
                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                    Add Question & Answers Manually

                                    </div>

                                    <div class="mt-2">
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Question
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-question" v-model.trim="model.question" :class="{
                                'border-danger': submitted && v$.question.$errors.length,
                                }"
                                                    class="form-control"
                                                    placeholder="Enter question." type="text"/>
                                                <div class="form-help text-right">Maximum character 0/70</div>
                                                <div v-for="(error, index) of v$.question.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Description
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <!-- <ClassicEditor v-model="editorData" /> -->
                                                <editor id="form-description" v-model="model.description" :class="{
                                                                'border-danger': submitted && v$.description.$errors.length,
                                                            }" :init="{
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
                                                                }"
                                                        apiKey="n10p1o42akootxkapivj4ecxefdo4zlaqd0ek0aa47ld9js7"
                                                        initialValue="<p>Initial editor content</p>">
                                                </editor>
                                                <div v-for="(error, index) of v$.description.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Note/Explanation
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <!-- <ClassicEditor v-model="editorData" /> -->
                                                <editor id="form-note" v-model="model.note" :class="{
                                                            'border-danger': submitted && v$.note.$errors.length,
                                                        }" :init="{
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
                                                            }"
                                                        apiKey="n10p1o42akootxkapivj4ecxefdo4zlaqd0ek0aa47ld9js7"
                                                        initialValue="<p>Initial editor content</p>">
                                                </editor>
                                                <div v-for="(error, index) of v$.note.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Marks
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-marks" v-model.trim="model.marks" :class="{
                                'border-danger': submitted && v$.marks.$errors.length,
                                }" class="form-control"
                                                    placeholder="Marks" type="text"/>
                                                <div class="form-help text-right">
                                                    These are the marks, if answered correctly
                                                </div>
                                                <div v-for="(error, index) of v$.marks.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Negative Marks
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-negative-marks" v-model.trim="model.negative_marks" :class="{
                                'border-danger': submitted && v$.negative_marks.$errors.length,
                                }"
                                                    class="form-control"
                                                    placeholder="Negative marks." type="text"/>
                                                <div class="form-help text-right">
                                                    These are negative marks if answered incorrect
                                                </div>
                                                <div v-for="(error, index) of v$.negative_marks.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Expected Time
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-expected-time" v-model.trim="model.expected_time" :class="{
                                'border-danger': submitted && v$.expected_time.$errors.length,
                                }" class="form-control"
                                                    placeholder="Expected time in minutes" type="text"/>
                                                <div class="form-help text-right">
                                                    Expected time to answer this question in minutes
                                                </div>
                                                <div v-for="(error, index) of v$.expected_time.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Subject, Chapter and Topic selection -->
                            <!-- BEGIN: Product Variant (Details) -->
                            <div v-if="addQuestionManually" class="intro-y box p-5 mt-3">
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                        Select Question Type & Add Answer
                                    </div>
                                    <div class="mt-1">

                                        <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Question Type
                                                        </div>
                                                        <div
                                                            class="text-danger ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required*
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <TomSelect id="form-type" v-model="model.type_id" :class="{
            'border-danger': submitted && v$.type_id.$errors.length,
            }"
                                                        :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Type',
                                autocomplete: 'off',
                                onChange: changeType
                            }" class="w-full" placeholder="Select Type">
                                                    <option>Select Question Type</option>
                                                    <option v-for="(type, indext) in typeList" :key="indext" :value="indext">
                                                        {{ JSON.parse(type) }}
                                                    </option>
                                                </TomSelect>
                                                <div v-for="(error, index) of v$.type_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="model.type_id !== '' && model.type_id !== 'Select Question Type' && model.type_id !== 5"
                                            class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-2 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                    <div class="flex items-center">
                                                        <div v-if="model.type_id !== 5" class="font-medium">Answers
                                                        </div>

                                                    </div>
                                                    <div v-if="model.type_id !== 5"
                                                        class="leading-relaxed text-slate-500 text-xs mt-3">
                                                        Add answers according to the type of question you have selected
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <div
                                                    class="relative pl-5 pr-5 xl:pr-10 py-10 bg-slate-50 dark:bg-transparent dark:border rounded-md">
                                                    <template v-if="model.type_id === 4">
                                                        <AnswerEditor :answer="{}" :index="1" :type="selectedType"
                                                                    @addAnswer="addAnswer"
                                                                    @change="answerChange" @deleteAnswer="deleteAnswer"/>
                                                    </template>
                                                    <template v-else-if="model.type_id == 5">
                                                        <div v-if="!model.questions.length" class="text-center text-gray-600">
                                                            You do not have any questions added yet
                                                        </div>
                                                        <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                                            <Button class="btn btn-outline-primary border-dashed w-full"
                                                                    type="button"
                                                                    @click="addQuestion()">
                                                                    <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" />
                                                                Add Question
                                                            </Button>
                                                        </div>
                                                        <div v-for="(question, index) in model.questions" :key="question.id">
                                                            <QuestionEditor
                                                                :errors="model.questions[index].errors ? model.questions[index].errors: null"
                                                                :question="question"
                                                                :questionIndex="index"
                                                                :type="selectedType"
                                                                :typeParagraph="typeListParagraph" @addQuestion="addQuestion"
                                                                @change="questionChange"
                                                                @deleteQuestion="deleteQuestion"/>

                                                        </div>

                                                    </template>
                                                    <template v-else>
                                                        <div v-if="!model.answers.length" class="text-center text-gray-600">
                                                            You do not have any answers added yet
                                                        </div>
                                                        <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                                            <Button v-if="showAnswerButton == true"
                                                                    class="btn btn-outline-primary border-dashed w-full"
                                                                    type="button" @click="addAnswer()">
                                                                    <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" />
                                                                Add Answer
                                                            </Button>
                                                        </div>

                                                        <div class="mt-5">

                                                            <div v-for="(answer, index) in model.answers" :key="answer.id">
                                                                <AnswerEditor :answer="answer" :index="index" :type="selectedType"
                                                                            :typeParagraph="typeListParagraph"
                                                                            @addAnswer="addAnswer" @change="answerChange"
                                                                            @deleteAnswer="deleteAnswer"/>

                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="model.type_id === 5" class="intro-y box p-5 mt-1">
                                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div
                                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                                                    Questions of paragraph
                                                    <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                                        <Button class="btn btn-outline-primary border-dashed w-full" type="button"
                                                                @click="addQuestion()">
                                                                <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" />
                                                            Add Question
                                                        </Button>
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <div v-if="!model.questions.length" class="text-center text-gray-600">
                                                        You do not have any questions added yet
                                                    </div>

                                                    <div
                                                        v-for="(question, index) in model.questions"
                                                        :key="question.id"
                                                        class="form-inline flex items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Question
                                                                        {{ index + 1 }}.
                                                                    </div>
                                                                </div>
                                                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                                Add questions and its answers accordingly
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <QuestionEditor
                                                            :errors="model.questions[index].errors ? model.questions[index].errors: null"
                                                            :index="index"
                                                            :question="question"
                                                            :type="selectedType"
                                                            :typeParagraph="typeListParagraph"
                                                            @addQuestion="addQuestion"
                                                            @change="questionChange"
                                                            @deleteQuestion="deleteQuestion"
                                                            
                                                        />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Product Variant (Details) -->
                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-1">
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

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</template>

<style scoped>
.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.upload-btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}
</style>
