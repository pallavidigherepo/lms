<script setup lang="ts">
import { ref } from "vue";
// import { useI18n } from "vue-i18n";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import AnswerEditor from "@/components/Editor/Answer.vue";

const props = defineProps({
    question: Object,
    index: Number,
    questionIndex: Number,
    type: [String, Number],
    typeParagraph: Object,
    answer: Object,
    errors: Object,
});
const emit = defineEmits(["change", "addQuestion", "deleteQuestion", "questionChange"]);
// const { t } = useI18n();
const model = ref(JSON.parse(JSON.stringify(props.question)));
const selectedType = ref("");
const showAnswerButton = ref(true);


function addAnswer(index) {
    const newAnswer = {
      id: makeid(2),
      answer: null,
      is_correct: 0,
    };

    model.value.answers.splice(index, 0, newAnswer);
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
  model.value.type_id = type;
  dataChange();
}

function answerChange(answer) {
  // Important to explicitelly assign question.data.options, because otherwise it is a Proxy object
  // and it is lost in JSON.stringify()
  if (props.question.answers) {
    props.question.answers = [...props.question.answers];
  }

  model.value.answers = model.value.answers.map((q) => {
    if (q.id === answer.id) {
      return JSON.parse(JSON.stringify(answer));
    }
    return q;
  });
  dataChange();
}
function dataChange(question) {
  const data = model.value;
  emit('change', data)
}
function addQuestion() {
  emit("addQuestion", props.questionIndex + 1);
}
function deleteQuestion() {
  emit("deleteQuestion", props.question);
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

</script>

<template>
  <div class="w-full mt-3 xl:mt-0 flex-1">
    <div>
        <div
          class="relative pl-5 pr-5 xl:pr-10 py-10 bg-slate-50 dark:bg-transparent dark:border rounded-md"
        >
          <div class="w-20 flex text-slate-500 xl:mt-1 absolute top-0 right-0 mr-4">
            <a href="#"
              class="xl:ml-5"
              @click.prevent="addQuestion()">
              <Lucide icon="PlusIcon" class="w-5 h-5" />
            </a>
            <a href="#" class="ml-3 xl:ml-5" @click.prevent="deleteQuestion()">
              <Lucide icon="Trash2Icon" class="w-5 h-5" />
            </a>
          </div>
          <div>
            <div class="form-inline mt-5 first:mt-0">
              <label class="form-label sm:w-20">Question</label>
              <div class="flex items-center flex-1 xl:pr-10">
                  <div class="flex-1">
                      <FormInput type="text"
                            class="form-control"
                            placeholder="Question"
                            v-model="model.question"
                            @change="dataChange"
                            :class="{
                              'border-danger': errors[index] && errors[index].question.$errors.length,
                            }"
                             />
                      <template v-if="errors[index]">
                        <div class="text-danger mt-2" v-for="(error, indexq) of errors[index].question.$errors" :key="indexq">
                          <div class="error-msg">{{ error.$message }}</div>
                        </div>
                      </template>
                  </div>
              </div>

            </div>

            <div class="form-inline mt-5 first:mt-0">
                <label class="form-label sm:w-20">Description</label>
                <div class="flex items-center flex-1 xl:pr-10">
                    <div class="flex-1">
                        <FormTextarea class="form-control"
                                  placeholder="Description"
                                  v-model="model.description"
                                  @change="dataChange"
                                  :class="{
                                    'border-danger': errors[index] && errors[index].description.$errors.length,
                                  }">
                        </FormTextarea>
                        <template v-if="errors[index]">
                          <div class="text-danger mt-2" v-for="(error, indexd) of errors[index].description.$errors" :key="indexd">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="form-inline mt-5 first:mt-0">
                <label class="form-label sm:w-20">Note/Explaination</label>
                <div class="flex items-center flex-1 xl:pr-10">
                    <div class="flex-1">
                        <FormTextarea class="form-control"
                                  placeholder="Note"
                                  v-model="model.note"
                                  @change="dataChange"
                                  :class="{
                                    'border-danger': errors[index] && errors[index].note.$errors.length,
                                  }"></FormTextarea>
                        <template v-if="errors[index]">
                          <div class="text-danger mt-2" v-for="(error, indexd) of errors[index].note.$errors" :key="indexd">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="form-inline mt-5 first:mt-0">
                <label class="form-label sm:w-20">Marks</label>

                <div class="flex items-center flex-1 xl:pr-10">
                    <div class="flex-1">
                        <FormInput id="form-marks"
                              type="text"
                              class="form-control"
                              placeholder="Marks"
                              v-model.trim="model.marks"
                              @change="dataChange"
                              :class="{
                                'border-danger': errors[index] && errors[index].marks.$errors.length,
                              }"
                              />
                        <template v-if="errors[index]">
                          <div class="text-danger mt-2" v-for="(error, indexd) of errors[index].marks.$errors" :key="indexd">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </template>
                    </div>
                </div>
                <!-- <div class="form-help text-right">
                  These are the marks, if answered correctly
                </div> -->
            </div>
            <div class="form-inline mt-5 first:mt-0">
                <label class="form-label sm:w-20">Negative Marks</label>
                <div class="flex items-center flex-1 xl:pr-10">
                    <div class="flex-1">
                        <FormInput id="form-negative-marks"
                              type="text"
                              class="form-control"
                              placeholder="Negative Marks"
                              v-model.trim="model.negative_marks"
                              @change="dataChange"
                              :class="{
                                  'border-danger': errors[index] && errors[index].negative_marks.$errors.length,
                                }"
                              />
                        <template v-if="errors[index]">
                          <div class="text-danger mt-2" v-for="(error, indexd) of errors[index].negative_marks.$errors" :key="indexd">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </template>
                    </div>
                </div>
                <!-- <div class="form-help text-right">
                  These are negative marks if answered incorrect
                </div> -->

            </div>
            <div class="form-inline mt-5 first:mt-0">
                <label class="form-label sm:w-20">Question type</label>
                <div class="flex items-center flex-1 xl:pr-10">
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <TomSelect id="form-type" v-model="model.type_id" placeholder="Select Type"
                            :options="{
                              allowEmptyOption: false,
                              create: false,
                              placeholder: 'Select Type',
                              autocomplete: 'off',
                              onChange: changeType,
                              items:model.type_id,
                            }" >
                            <option>Select Question Type</option>
                            <option v-for="(type, indext) in typeParagraph" :key="indext" :value="indext">
                              {{ JSON.parse(type) }}
                            </option>
                        </TomSelect>
                          <template v-if="errors[index]">
                            <div class="text-danger mt-2" v-for="(error, indexd) of errors[index].type_id.$errors" :key="indexd">
                              <div class="error-msg">{{ error.$message }}</div>
                            </div>
                          </template>
                    </div>
                </div>
            </div>

            <div class="xl:ml-20 xl:pl-5 xl:pr-10 mt-5 first:mt-0" v-if="model.type_id != ''">
                <div v-if="model.answers && !model.answers.length" class="text-center text-gray-600">
                  You do not have any answers added yet
                </div>
                <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                  <Button
                    class="btn btn-outline-primary border-dashed w-full"
                    type="button"
                    v-if="showAnswerButton == true" @click="addAnswer()"
                  >
                  <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" /> Add Answer
                  </Button>
                </div>

                <div v-for="(answer, indexanswer) in model.answers" :key="answer.id">
                  <AnswerEditor :answer="answer"
                                :index="indexanswer"
                                :type="model.type_id"
                                @change="answerChange"
                                @addAnswer="addAnswer"
                                @deleteAnswer="deleteAnswer" />
                </div>
            </div>
          </div>
        </div>
      </div>
      {{ model }}
  </div>
</template>
<style>
</style>
