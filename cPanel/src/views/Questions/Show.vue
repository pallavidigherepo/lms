<script setup lang="ts">
import store from "@/stores";
import { ref, computed, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import Table from "@/components/Base/Table";

// import { useI18n } from "vue-i18n";
// import {Tab} from "../../global-components/tab";

const route = useRoute();
const router = useRouter();
// const { t } = useI18n();

const message = ref("");
const isLoading = ref(false);

const fetch = async() => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        await store
                .dispatch("questions/show", id)
                .then(() => {
                    isLoading.value = false;
                })
                .catch((err) => {
                    isLoading.value = false;
                });
    } catch (e) {
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};

onMounted(() => {
  fetch();
});

const question = computed(() => store.getters['questions/question']);
</script>

<template>
  <div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
      <h2 class="text-lg font-medium mr-auto">
        Question Details
      </h2>
      <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
          <router-link v-if="question"
                       :to="{ name: 'EditQuestion', params: { id:question.id } }"
                       class="box
                            btn
                            bg-success
                            mr-2
                            flex
                            items-center
                            ml-auto
                            sm:ml-0
                          ">
              <Lucide icon="EditIcon" class="w-4 h-4 mr-2"/>
              Edit Question
          </router-link>
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

      <div class="intro-y col-span-11 2xl:col-span-9">

        <!-- BEGIN: Board and Standard selection -->
        <div class="intro-y box p-5 mt-5">
          <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
            <div
              class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
              <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Selected Board & Standard/Class
            </div>
            <div class="mt-5">

              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Board</div>
                    </div>

                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.board : null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Standard</div>
                    </div>

                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.standard : null }}
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
                      <div class="font-medium">Difficulty Level</div>

                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.difficulty_level_id: null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Language</div>

                    </div>

                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? (question.language_id==1 ? 'English': 'Other'): null }}
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

                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? (question.subject): null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Choose Chapter</div>

                    </div>

                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? (question.chapter): null }}
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
                  {{ question ? (question.topic): null }}
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

                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.question: null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Description</div>
                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.description: null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Note/Explaination</div>
                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.note: null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Marks</div>
                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.marks: null }}
                </div>
              </div>
              <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                    <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Negative Marks</div>
                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? question.negative_marks: null }}
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
                    </div>

                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  {{ question ? (question.type): null }}
                </div>
              </div>
              <div class="form-inline  flex items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0"
                v-if="question && (question.answers.length > 0)">
                <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                  <div class="text-left flex-grow">
                    <div class="flex items-center">
                      <div class="font-medium">Answers</div>

                    </div>
                  </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                  <div class="relative pl-5 pr-5 xl:pr-10 py-10 bg-slate-50 dark:bg-transparent dark:border rounded-md">
                    <template v-if="question.type_id == 4">
                      Answers List
                    </template>
                    <template v-else-if="question.type_id == 5">
                      <div v-if="!question.questions.length" class="text-center text-gray-600">
                        You do not have any questions added yet
                      </div>

                      <div v-for="(question, index) in question.questions" :key="index">
                        Question list wrwer rwewwr
                      </div>
                    </template>
                    <template v-else>
                      <div v-if="!question.answers.length" class="text-center text-gray-600">
                        You do not have any answers added yet
                      </div>

                      <div class="mt-5">
                        <Table class="table">
                            <Table.Tr v-for="answer in question.answers" :key="answer.id">
                                <Table.Td class="whitespace-nowrap">{{answer.answer}}<Button variant="success" class="ml-5 btn bg-success" v-if="answer.is_correct">Correct</Button></Table.Td>
                            </Table.Tr>
                        </Table>
                        <div v-for="answer in question.answers" :key="answer.id">
                          <div class="flex"></div>
                        </div>
                      </div>
                    </template>
                  </div>
                </div>
              </div>
              <div v-else-if="question && question.type_id == 5" class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                  <div
                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/> Questions of paragraph

                  </div>

                  <div class="mt-5">
                    <div v-if="!question.questions.length" class="text-center text-gray-600">
                      You do not have any questions added yet
                    </div>
                    <template v-else>
                      <div class="form-inline flex items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0"
                        v-for="(questionArr, index) in question.questions" :key="questionArr.id">
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

                        Question List ddg dfgd
                      </div>
                      <Table>
                        <Table.Thead>
                          <Table.Tr>
                            <Table.Th></Table.Th>
                            <Table.Th></Table.Th>
                            <Table.Th></Table.Th>
                          </Table.Tr>
                        </Table.Thead>
                        <Table.Tbody>
                          <Table.Tr>
                            <Table.Td>

                            </Table.Td>
                          </Table.Tr>
                        </Table.Tbody>
                      </Table>
                    </template>

                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
        <!-- END: Product Variant (Details) -->

      </div>
    <Loading v-if="isLoading" fixed></Loading>
  </div>
</template>
<style scoped>

</style>
