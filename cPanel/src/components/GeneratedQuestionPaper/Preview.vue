<script setup lang="ts">
import { ref, defineProps, computed } from "vue";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { Dialog, Menu } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";
import ListQuestion from "@/components/GeneratedQuestionPaper/ListQuestion.vue";
import Alert from "@/components/Base/Alert";

// import {useI18n} from "vue-i18n";
import {useRoute, useRouter} from "vue-router";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();

const props = defineProps({
    data: Object,
    preview: Boolean,
    userInfo: Object,
    template: Object,
    isOnline: Boolean,
    isCreate: Boolean
});

const emits = defineEmits(['back']);

const showPreviewForTeacher = ref(true);

function printGeneratedQuestion(withSolutions = false){
    showPreviewForTeacher.value = withSolutions ? true: false;
    const myTimeout = setTimeout(printMe, 500);
}
function printMe() {
    window.print();
}

function assignToStudent(item: { id: any; }) {
    router.push({
        name: "AssignToStudent",
        params: { id: item.id },
    });
}
</script>

<template>
    <div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Preview Generated Question Paper
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <Button variant="soft-pending" class="btn mr-2 btn-warning-soft"
                        v-if="!isCreate"
                        @click.prevent="assignToStudent(data)"
                        >
                        <Lucide icon="UsersIcon" class="w-4 h-4 mr-2" />
                        Assign
                </Button>
                <Button variant="soft-primary" class="btn mr-2"
                        v-if="!isCreate"
                        @click.prevent="printGeneratedQuestion(false)"
                        :class="!showPreviewForTeacher ? 'btn-primary' : 'btn-primary-soft'">
                        <Lucide icon="PrinterIcon" class="w-4 h-4 mr-2" />
                        Preview and Print for Student
                </Button>
                <Button variant="primary" class="btn mr-2 btn-primary"
                        v-if="!isCreate"
                        @click.prevent="printGeneratedQuestion(true)"
                        :class="showPreviewForTeacher ? 'btn-primary' : 'btn-primary-soft'">
                        <Lucide icon="PrinterIcon" class="w-4 h-4 mr-2" />
                        Preview and Print for Teacher
                </Button>
                <Button 
                   @click.prevent="emits('back', preview)"
                   class="btn box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0">
                   <Lucide icon="ArrowLeftCircleIcon" class="w-4 h-4 mr-2" />
                   Back
                </Button>
            </div>
        </div>
        <Alert variant="primary" class="flex items-center mb-2 mt-2">
                <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                Text message which is highlighted in blue is Solution OR Explanation of question
        </Alert>
        <!-- <info :typeClass="'alert-primary'"
              :message="'templates.Text message which is highlighted in blue is Solution OR Explanation of question'"/> -->
        <div class="intro-y box overflow-hidden mt-5" id="section-to-print">
            <div
                class="border-b border-slate-200/60 dark:border-darkmode-400 text-center sm:text-left"
            >
                <div class="flex flex-col lg:flex-row sm:px-1 pt-1 pb-1 sm:pb-10 border-b">
                    <div class="h-full p-5 items-center ">
                        <div class="font-semibold text-2xl">{{ data.name }}</div>
                    </div>
                    <div class=" mt-10 lg:mt-0 lg:ml-auto text-center">
                        <div class="text-lg font-medium mt-2">{{ data.name }}</div>
                        <div class="text-lg font-medium mt-2">
                            Standard: {{ data.template.standard ? data.template.standard : template.standard.name}}
                        </div>
<!--                        <pre>{{data}}</pre>-->
                        <div class="text-lg font-medium mt-2">Subject: {{ data.subject }}</div>
                    </div>
                    <div class="lg:text-left mt-10 lg:mt-0 lg:ml-auto pr-2">
                        <div class="text-lg font-medium mt-2">Date:</div>
                        <div class="text-lg font-medium mt-2">
                            Total Marks: {{ template.total_marks }}
                        </div>
                        <div class="text-lg font-medium mt-2" v-if="!template.has_section">
                            Total Questions: {{ template.total_questions }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b border-slate-200/60 dark:border-darkmode-400 text-center sm:text-left">
                <div class="p-5" v-html="template.description"></div>
            </div>
            <div class="py-5 sm:py-10">
                <div class="overflow-x-auto">
                    <Table class="table">
                        <template v-if="template.has_section">
                            <Table.Tr v-for="(section, index) in data.generated_questions.sections" :key="index">
                                <template v-if="section.questions.length > 0">

                                    <Table.Td class="dark:border-darkmode-400 whitespace-nowrap">
                                        <div class="flex font-medium">Q&nbsp;{{
                                                parseInt(index) + 1
                                            }}.&nbsp;{{ section.name }}
                                        </div>
                                        <div class="text-right font-medium">({{ section.total_marks }})</div>
                                        <ListQuestion :questions="section.questions"
                                                      :isOnline="isOnline"
                                                      :showPreviewForTeacher="showPreviewForTeacher" />
                                    </Table.Td>
                                </template>
                            </Table.Tr>
                        </template>
                        <template v-else>
                            <ListQuestion :questions="data.generated_questions"
                                          :isOnline="isOnline"
                                          :showPreviewForTeacher="showPreviewForTeacher"
                            />

                        </template>
                    </Table>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
@media print {
    body * {
        visibility: hidden;
    }
    #section-to-print, #section-to-print * {
        visibility: visible;
    }
    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }
}
</style>
