<script setup lang="ts">
// import {useI18n} from "vue-i18n";
import {onMounted, computed, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { Dialog, Menu } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";
import Litepicker from "@/components/Base/Litepicker";
import store from '@/stores';
import axiosClient from "@/axios";
import {useVuelidate} from "@vuelidate/core";
import {helpers, minLength, minValue, numeric, required, requiredIf} from "@vuelidate/validators";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();
const submitted = ref(false);
const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const errors = ref("");

const isOnline = ref(false);

const paperInfo = ref();

const model = ref({
    id: "",
    batch_id: "",
    course_id: "",
    subject_id: "",
    generated_question_paper_id: route.params.id,
    solved_questions: "",
    start_end_date: "",
    can_retest: false,
    show_result_on: "",
    students: {},
});
onMounted(() => {
    store.dispatch("listCourses").then().catch();
    store.dispatch("listBatch").then().catch();
    fetch();
});

const batches = computed(() => store.getters.listBatches);
const courses = computed(() => store.getters.courseList);

const fetch = async () => {
    isLoading.value = true;
    try {
        let id = route.params.id;

        const result = await axiosClient.get(`/generated_questions/${id}`);
        if (result.status !== 200) {
            throw new Error('Failed to fetch template');
        }
        paperInfo.value = JSON.parse(JSON.stringify(result.data.data));
        model.value.solved_questions = paperInfo.value;
        model.value.subject_id = paperInfo.value.subject_id;
        isLoading.value = false;
    } catch (e) {
        message.value = e;
    } finally {
        isLoading.value = false;
    }
}
const selectedBatchId = ref();
const selectedCourseId = ref();

function selectedBatch(batchId) {
    selectedBatchId.value = batchId;
    dataChange();
}
function selectedCourse(courseId) {
    selectedCourseId.value = courseId;
    dataChange();
}
function dataChange()
{
    if (!selectedBatchId.value || !selectedCourseId.value) {
        return;
    }
    fetchStudents();
}

async function fetchStudents() {
    let url = "page=" + true
        + "&sort_field=name"
        + "&sort_order=asc"
        + "&per_page=10"
        + "&course_id="+selectedBatchId.value
        + "&batch_id="+selectedCourseId.value;

    const result = await axiosClient.get("/students?" + url);

    if (result.status !== 200) {
        throw new Error("Failed to fetch questions");
    } else {
        model.value.students = result.data.data;
    }
}

const rules = computed(() => {
    return {
        batch_id: {
            required: helpers.withMessage("Please select batch of students.", required),
        },
        course_id: {
            required: helpers.withMessage("Please select course of students.", required),
        },
        students: {
            required: helpers.withMessage("At-least one student must be assigned to question paper", required),
        }
    };
});
const v$ = useVuelidate(rules, model);
const warningMessage = ref();

async function submitForm() {

    submitted.value = true;
    v$.value.$validate(); // checks all inputs
    if (!v$.value.$error) {
        isLoading.value = true;
        warningMessage.value = "";
        await store
            .dispatch("student_papers/save", model.value)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = false;
                router.push({name: "GeneratedQuestionPapers"});
            })
            .catch((err) => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = true;
                if (err.response && err.response.data) {
                    message.value = err.response.data.message;
                    errors.value = err.response.data;
                }
            });
    } else {
        // if ANY fail validation
        return;
    }
}

function removeStudent(student) {
    model.value.students = model.value.students.filter((q) => q !== student);
}

function setRestest() {
    model.value.can_retest = !model.value.can_retest;
}
</script>

<template>
    <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Create Inquiry
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
                            Assign to Students
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
                                    @click="router.push('/generated_question_papers')"
                                ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" /> Back
                            </Button>
                        </div>
                    </div>
                    <div
                        class="alert alert-danger show flex items-center mb-2"
                        role="alert"
                        v-if="isErrored"
                    >
                        <AlertOctagonIcon class="w-6 h-6 mr-2" />
                        <template v-if="errors && errors.length > 0">
                            <span v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </span>
                        </template>
                        {{ message }}
                    </div>
                    <form class="form-validation" @submit.prevent="submitForm()">
                        <div class="intro-y grid grid-cols-11 gap-5 mt-5">

                            <!-- BEGIN: Selected template, board and standard -->
                            <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
                                <div class="box p-5 rounded-md">
                                    <div
                                        class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5"
                                    >
                                        <div class="font-medium text-base truncate">
                                            Question Paper Details
                                        </div>

                                    </div>
                                    <div class="flex items-center">
                                        <ClipboardIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Name: <span
                                        class="underline decoration-dotted ml-1">{{ paperInfo ? paperInfo.name : null }}</span>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <CalendarIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Board: <span class="ml-2">{{
                                            paperInfo ? paperInfo.board : null
                                        }}</span>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <BookOpenIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Standard: <span class="ml-2">{{
                                            paperInfo ? paperInfo.standard : null
                                        }}</span>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <ColumnsIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Total Marks: <span
                                        class="ml-2">{{ paperInfo ? paperInfo.template_info.total_marks : null }}</span>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <ClockIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Duration: <span class="ml-2">{{
                                            paperInfo ? paperInfo.template_info.duration : null
                                        }}</span>
                                    </div>

                                    <div class="flex items-center mt-3">
                                        <PlayIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Active: <span class="ml-2">
                                            {{ paperInfo ? (paperInfo.template_info.is_active === 1 ? "Yes" : "No") : null }}
                                        </span>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <ServerIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Has Section: <span
                                        class="ml-2">{{ paperInfo ? (paperInfo.template_info.has_section === 1 ? "Yes" : "No") : null }}</span>
                                    </div>
                                    <div v-if="!(paperInfo && paperInfo.template_info.has_section)" class="flex items-center mt-3">
                                        <SidebarIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Total Questions:<span
                                        class="ml-2">{{ paperInfo ? paperInfo.template_info.total_questions : null }}</span>
                                    </div>
                                    <div v-if="!(paperInfo && paperInfo.template_info.has_section)" class="flex items-center mt-3">
                                        <SidebarIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Compulsory Questions: <span
                                        class="ml-2">{{ paperInfo ? paperInfo.template_info.compulsory_questions : null }}</span>
                                    </div>
                                    <div v-if="!(paperInfo && paperInfo.template_info.has_section)" class="flex items-center mt-3">
                                        <SidebarIcon class="w-4 h-4 text-slate-500 mr-2"/>
                                        Question type:<span
                                        class="ml-2">{{ paperInfo ? paperInfo.template_info.type_name : null }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
                                <div class="box p-5 rounded-md">
                                    <div
                                        class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5"
                                    >
                                        <div class="font-medium text-base truncate">Assign to Students</div>
                                    </div>
                                    <div class="overflow-auto lg:overflow-visible mt-3">
                                        <!-- BEGIN: Subject, Chapter and Topic selection -->
                                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div
                                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                <ChevronDownIcon class="w-4 h-4 mr-2"/>
                                                Select Batch and Course of Students
                                            </div>
                                            <div class="mt-5">
                                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                        <div class="text-left flex-grow">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Choose Batch
                                                                </div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <TomSelect id="form-level"
                                                                v-model="model.batch_id"
                                                                class="w-full"
                                                                placeholder="Select Batch"
                                                                :class="{ 'border-danger': submitted && v$.batch_id.$errors.length,}"
                                                                :options="{
                                                                    allowEmptyOption: false,
                                                                    create: false,
                                                                    placeholder: 'Select Batch',
                                                                    autocomplete: 'off',
                                                                    onChange: selectedBatch
                                                                    }">
                                                            <option>Select Batch</option>
                                                            <option v-for="(batch, indexb) in batches" :key="indexb"
                                                                    :value="indexb">
                                                                {{ batch }}
                                                            </option>
                                                        </TomSelect>
                                                        <div v-for="(error, index) of v$.batch_id.$errors"
                                                            :key="index" class="text-danger mt-2">
                                                            <div class="error-msg">{{ error.$message }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                        <div class="text-left flex-grow">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Choose Course
                                                                </div>
                                                                <div
                                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                    Required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <TomSelect id="form-level"
                                                                v-model="model.course_id"
                                                                class="w-full"
                                                                placeholder="Select Course"
                                                                :class="{ 'border-danger': submitted && v$.course_id.$errors.length,}"
                                                                :options="{
                                                                    allowEmptyOption: false,
                                                                    create: false,
                                                                    placeholder: 'Select Course',
                                                                    autocomplete: 'off',
                                                                    onChange: selectedCourse,
                                                                    }">
                                                            <option>Select Course</option>
                                                            <option v-for="(course, indexc) in courses"
                                                                    :key="indexc"
                                                                    :value="indexc">
                                                                {{ course }}
                                                            </option>
                                                        </TomSelect>
                                                        <div v-for="(error, index) of v$.course_id.$errors"
                                                            :key="index" class="text-danger mt-2">
                                                            <div class="error-msg">{{ error.$message }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                        <div class="text-left flex-grow">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Starts On
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <Litepicker v-model="model.start_end_date"
                                                                    :options="{
                                                                        autoApply: false,
                                                                        singleMode: false,
                                                                        numberOfColumns: 2,
                                                                        numberOfMonths: 2,
                                                                        showWeekNumbers: true,
                                                                        format: 'YYYY-MM-DD',
                                                                        dropdowns: {
                                                                            minYear: 1990,
                                                                            maxYear: null,
                                                                            months: true,
                                                                            years: true,
                                                                        },
                                                                    }"
                                                                    class="form-control block mx-auto" />

                                                    </div>
                                                </div>
                                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                        <div class="text-left flex-grow">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Can Retest
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <div class="form-check form-switch">
                                                            <FormCheck.Input id="form-has-section"
                                                                v-model.trim="model.can_retest"
                                                                class="form-check-input"
                                                                type="checkbox"
                                                            />

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                        <div class="text-left flex-grow">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Show result on
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                                        <Litepicker v-model="model.show_result_on"
                                                                    :options="{
                                                                        autoApply: false,
                                                                        singleMode: true,
                                                                        showWeekNumbers: true,
                                                                        format: 'YYYY-MM-DD',
                                                                        dropdowns: {
                                                                            minYear: 1990,
                                                                            maxYear: null,
                                                                            months: true,
                                                                            years: true,
                                                                        },
                                                                    }"
                                                                    class="form-control block mx-auto" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Subject, Chapter and Topic selection -->
                                        <div class="intro-y box overflow-hidden mt-5">
                                            <div class="border-b border-slate-200/60 dark:border-darkmode-400 sm:text-left">
                                                <div class="px-1 py-2 sm:px-1 sm:py-2">
                                                    <div class="font-bold text-xl">Students</div>
                                                </div>
                                                <div v-for="(error, index) of v$.students.$errors"
                                                    :key="index" class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                    <Button variant="primary" class="btn btn-primary-soft" @click.prevent="fetchStudents">
                                                        Fetch Students
                                                    </Button>
                                                </div>

                                                <div class="py-2">
                                                    <div class="overflow-x-auto">
                                                        <Table class="table">
                                                            <Table.Thead>
                                                            <Table.Tr>
                                                                <Table.Th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                                                                    #
                                                                </Table.Th>
                                                                <Table.Th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                                                                    Name
                                                                </Table.Th>
                                                                <Table.Th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">
                                                                    ACTION
                                                                </Table.Th>
                                                            </Table.Tr>
                                                            </Table.Thead>
                                                            <Table.Tbody>
                                                            <template
                                                                v-if="model.students.length > 0">
                                                                <Table.Tr v-for="(student, sidx) in model.students"
                                                                    :key="sidx">
                                                                    <Table.Td class="border-b dark:border-darkmode-400">
                                                                        {{ student.id }}
                                                                    </Table.Td>
                                                                    <Table.Td class="border-b dark:border-darkmode-400">
                                                                        {{ student.name }}
                                                                    </Table.Td>
                                                                    <Table.Td class="text-center border-b dark:border-darkmode-400 w-32">
                                                                        <div
                                                                            class="text-center items-center justify-center">

                                                                            <a class="text-danger items-center"
                                                                            href="javascript:;"
                                                                            @click.prevent="removeStudent(student)">
                                                                                <Trash2Icon class="w-4 h-4 mr-1"/>
                                                                            </a>
                                                                        </div>
                                                                    </Table.Td>
                                                                </Table.Tr>
                                                            </template>
                                                            <template v-else>
                                                                <Table.Tr>
                                                                    <Table.Td colspan="3"
                                                                        class="border-b dark:border-darkmode-400 text-center">
                                                                        No Students.
                                                                    </Table.Td>
                                                                </Table.Tr>
                                                            </template>
                                                            </Table.Tbody>
                                                        </Table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Selected template, board and standard -->

                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <Button
                                variant="secondary"
                                class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52"
                                @click="router.push('/generated_question_papers')">
                                Cancel
                            </Button>

                            <Button variant="primary" class="btn py-3 btn-primary w-full md:w-52" type="submit" @click="isOnline = true">
                                Assign
                            </Button>
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
