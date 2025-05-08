<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { ClassicEditor } from "@/components/Base/Ckeditor";
import {
  FormLabel,
  FormCheck,
  FormInput,
  FormInline,
  FormSelect,
  FormSwitch,
  InputGroup,
  FormHelp,
  FormTextarea
} from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import Button from "@/components/Base/Button";
import Alert from "@/components/Base/Alert";
import LoadingIcon from "@/components/Base/LoadingIcon";
import ThemeSwitcher from "@/components/ThemeSwitcher";
import { useVuelidate } from "@vuelidate/core";
import store from "@/stores/index.js";
import { useRouter, useRoute } from "vue-router";
import { ref, reactive, computed, onMounted } from "vue";
import _ from "lodash";
import Editor from "@tinymce/tinymce-vue";
// import {useI18n} from "vue-i18n";
import {email, helpers, minLength, maxLength, numeric, required} from "@vuelidate/validators";
import CreateStudent from "@/views/Students/Create.vue"

const route = useRoute();
const router = useRouter();
// const { t } = useI18n();

const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const submitted = ref(false);

const model = ref({
    student_name: "",
    contact_name: "",
    contact_email: "",
    contact_mobile: "",
    board_id: 1,
    standard_id: "",
    batch_id: "",
    alt_mobile: "",
    student_gender: "",
    student_dob: "",
    address: "",
    inquiry_source_id: "",
    inquiry_followup_type_id: "",
    assigned_to: "",
    inquiry_status_id: "",
});

const rules = computed(() => {
    return {
        student_name: {
            required: helpers.withMessage("Please enter name of user.", required),
        },
        contact_name: {
            required: helpers.withMessage("Please enter name of user.", required),
        },
        contact_email: {
            required: helpers.withMessage("Please enter email address.", required),
            email: helpers.withMessage("Please enter valid email address", email),
        },
        contact_mobile: {
            required: helpers.withMessage("Please enter mobile number.", required),
            minLength: helpers.withMessage("Please enter valid mobile number", minLength(10)),
            numeric: helpers.withMessage("Please enter valid mobile number", numeric),
        },
        board_id: {
            required: helpers.withMessage("Please select board of student.", required),
        },
        standard_id: {
            required: helpers.withMessage("Please select standard or class of student.", required),
        },
        batch_id: {
            required: helpers.withMessage("Please select batch of student.", required),
        },
        student_gender: {
            required: helpers.withMessage("Please select gender of student.", required),
        },
        student_dob: {
            required: helpers.withMessage("Please date of birth of student.", required),
        },
        address: {
            required: helpers.withMessage("Please enter permanent address of student.", required),
        },
        inquiry_source_id: {
            required: helpers.withMessage("Please select source of inquiry.", required),
        },
        inquiry_followup_type_id: {
            required: helpers.withMessage("Please select follow up type.", required),
        },
        assigned_to: {
            required: helpers.withMessage("Please select executive to assign this inquiry.", required),
        },
        inquiry_status_id: {
            required: helpers.withMessage("Please select status of inquiry.", required),
        }
    };
});

const v$ = useVuelidate(rules, model.value);

async function submitForm()
{
    submitted.value = true;
    v$.value.$validate(); // checks all inputs
    if (!v$.value.$error) {
        isLoading.value = true;

        await store
            .dispatch("inquiries/save", model.value)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = false;
                router.push({name: "Inquiries"});
            })
            .catch((err) => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = true;
                if (err.response && err.response.data) {
                    message.value = err.response.data.message;
                }

            });
    } else {
        // if ANY fail validation
        return;
    }
}

onMounted(() => {
    store.dispatch("listCourses").then().catch();
    store.dispatch("listBoard").then().catch();
    store.dispatch("listStandard").then().catch();
    store.dispatch("listLanguages").then().catch();
    store.dispatch("listBatch").then().catch();
    store.dispatch("listInquirySources").then().catch();
    store.dispatch("listInquiryFollowupTypes").then().catch();
    store.dispatch("listInquiryAssignees").then().catch();
    store.dispatch("listInquiryStatus").then().catch();
});
const languages = computed(() => store.getters.languages);
const boards = computed(() => store.getters.listBoards);
const standards = computed(() => store.getters.listStandards);
const batches = computed(() => store.getters.listBatches);
const sources = computed(() => store.getters.listInquirySources);
const followupTypes = computed(() => store.getters.listInquiryFollowupTypes);
const assignees = computed(() => store.getters.listInquiryAssignees);
const statuses = computed(() => store.getters.listInquiryStatus);

const genders = {
    male: 'Male',
    female: "Female",
    other: "Better Not Say"
};


function onImageChoose(ev) {
    const file = ev.target.files[0];
    const reader = new FileReader();
    reader.onload = () => {
        // The field to send on backend and apply validations
        model.value.avatar = reader.result;
        ev.target.value = "";
    };
    reader.readAsDataURL(file);
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
                        <h2 class="text-lg font-medium mr-auto">Add Inquiry</h2>
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
                                @click="router.push('/inquiries')"
                            ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
                    </Button>
                        </div>
                    </div>

                    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div class="p-5">
                                <div
                                    class="alert alert-danger show flex items-center mb-2"
                                    role="alert"
                                    v-if="isErrored"
                                >
                                    <AlertOctagonIcon class="w-6 h-6 mr-2" />
                                    {{ message }}
                                </div>
                                <form @submit.prevent="submitForm" class="validate-form" enctype="multipart/form-data">
                                    <div class="intro-y col-span-11 2xl:col-span-9">
                                        <!-- BEGIN: Board and Standard selection -->
                                        <div class="intro-y box p-5 mt-1">
                                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div
                                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2 " />
                                                    Select Standard Class, Batch Source and etc
                                                </div>
                                                <div class="mt-5">

            <!--                                        <div class="form-inline items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
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
                                                            <TomSelect id="form-board"
                                                                    v-model="model.board_id"
                                                                    :class="{ 'border-danger': submitted && v$.board_id.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Board',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Board'"
                                                                    class="w-full">
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
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Status
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-status"
                                                                    v-model="model.inquiry_status_id"
                                                                    :class="{ 'border-danger': submitted && v$.inquiry_status_id.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Status',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Status'"
                                                                    class="w-full">
                                                                <option>Select Status</option>
                                                                <option v-for="(status, index) in statuses" :key="index" :value="index">
                                                                    {{ status }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.inquiry_status_id.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-if="model.inquiry_status_id !== '4'" class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Choose Standard
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-standard"
                                                                    v-model="model.standard_id"
                                                                    :class="{
                                                                        'border-danger': submitted && v$.standard_id.$errors.length,
                                                                        }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Standard',
                                                                            autocomplete: 'off',
                                                                    }"
                                                                    class="w-full"
                                                                    placeholder="Select Standard">
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
                                                    <div v-if="model.inquiry_status_id !== '4'" class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
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
                                                            <TomSelect id="form-board"
                                                                    v-model="model.batch_id"
                                                                    :class="{ 'border-danger': submitted && v$.batch_id.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Batch',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Batch'"
                                                                    class="w-full">
                                                                <option>Select Batch</option>
                                                                <option v-for="(batch, index) in batches" :key="index" :value="index">
                                                                    {{ batch }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.batch_id.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div v-if="model.inquiry_status_id !== '4'" class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Inquiry Source
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-inquiry_source"
                                                                    v-model="model.inquiry_source_id"
                                                                    :class="{ 'border-danger': submitted && v$.inquiry_source_id.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Inquiry Source',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Inquiry Source'"
                                                                    class="w-full">
                                                                <option>Select Inquiry Source</option>
                                                                <option v-for="(source, index) in sources" :key="index" :value="index">
                                                                    {{ source }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.inquiry_source_id.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-if="model.inquiry_status_id !== '4'" class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Follow Up Type
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-followup_type"
                                                                    v-model="model.inquiry_followup_type_id"
                                                                    :class="{ 'border-danger': submitted && v$.inquiry_followup_type_id.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Follow Up Type',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Follow Up Type'"
                                                                    class="w-full">
                                                                <option>Select Follow Up Type</option>
                                                                <option v-for="(followupType, index) in followupTypes" :key="index" :value="index">
                                                                    {{ followupType }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.inquiry_followup_type_id.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Board and Standard selection -->
                                        <!-- BEGIN: Assigned to Information -->
                                        <div class="intro-y box p-5 mt-1" v-if="model.inquiry_status_id !== '4'">
                                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div
                                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2 " />
                                                    Assigned to
                                                </div>
                                                <div class="mt-5">
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Assigned to</div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-assigned-to"
                                                                    v-model="model.assigned_to"
                                                                    :class="{ 'border-danger': submitted && v$.assigned_to.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Assignee',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Assignee'"
                                                                    class="w-full">
                                                                <option>Select Assignee</option>
                                                                <option v-for="(assignee, index) in assignees" :key="index" :value="index">
                                                                    {{ assignee }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.assigned_to.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Assigned to Information -->
                                        <!-- BEGIN: Basic Information -->
                                        <div class="intro-y box p-5 mt-1" v-if="model.inquiry_status_id !== '4'">
                                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div
                                                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2 " />
                                                    Basic Information Of Student
                                                </div>
                                                <div class="mt-5">
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Student Name</div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <FormInput
                                                                id="form-name"
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter name of student"
                                                                v-model.trim="model.student_name"
                                                                :class="{ 'border-danger': submitted && v$.student_name.$errors.length, }"
                                                            />
                                                            <div v-for="(error, index) of v$.student_name.$errors"
                                                                :key="index" class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Contact Name</div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <FormInput
                                                                id="form-name"
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter name of person to contact"
                                                                v-model.trim="model.contact_name"
                                                                :class="{ 'border-danger': submitted && v$.contact_name.$errors.length, }"
                                                            />
                                                            <div v-for="(error, index) of v$.contact_name.$errors"
                                                                :key="index" class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Contact Email
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <FormInput
                                                                id="form-contact_email"
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter email address of contact person"
                                                                v-model.trim="model.contact_email"
                                                                :class="{ 'border-danger': submitted && v$.contact_email.$errors.length, }"
                                                            />
                                                            <div v-for="(error, index) of v$.contact_email.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Contact Mobile
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <FormInput
                                                                id="form-contact_mobile"
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="Enter mobile number of contact person."
                                                                v-model.trim="model.contact_mobile"
                                                                :class="{ 'border-danger': submitted && v$.contact_mobile.$errors.length, }"
                                                            />
                                                            <div v-for="(error, index) of v$.contact_mobile.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Gender</div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <TomSelect id="form-gender"
                                                                    v-model="model.student_gender"
                                                                    :class="{ 'border-danger': submitted && v$.student_gender.$errors.length, }"
                                                                    :options="{
                                                                            allowEmptyOption: false,
                                                                            create: false,
                                                                            placeholder: 'Select Gender',
                                                                            autocomplete: 'off',
                                                                        }"
                                                                    :placeholder="'Select Gender'"
                                                                    class="w-full">
                                                                <option>Select Gender</option>
                                                                <option v-for="(gender, index) in genders" :key="index" :value="index">
                                                                    {{ gender }}
                                                                </option>
                                                            </TomSelect>

                                                            <div v-for="(error, index) of v$.student_gender.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Date Of Birth
                                                                    </div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <div class="relative w-56">
                                                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                                    <CalendarIcon class="w-4 h-4" />
                                                                </div>
                                                                <FormInput v-model="model.student_dob"
                                                                    type="date"
                                                                    class="form-control pl-12" />
                                                            </div>
                                                            <div v-for="(error, index) of v$.student_dob.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                                        <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                            <div class="text-left flex-grow">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Address</div>
                                                                    <div
                                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                                        Required
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                                            <FormTextarea
                                                                id="form-address"
                                                                class="form-control"
                                                                placeholder="Enter address of student"
                                                                v-model.trim="model.address"
                                                                :class="{ 'border-danger': submitted && v$.address.$errors.length, }"
                                                            >
                                                            </FormTextarea>
                                                            <div v-for="(error, index) of v$.address.$errors" :key="index"
                                                                class="text-danger mt-2">
                                                                <div class="error-msg">{{ error.$message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Basic Information -->
                                    </div>
                                    <div class="text-right w-full bottom-0 mt-5" v-if="model.inquiry_status_id !== '4'">
                                        <Button
                                                variant="secondary"
                                                    class="btn btn-outline-secondary w-20 mr-1"
                                                    @click="router.push('/inquiries')"
                                                    
                                                >
                                                Cancel
                                        </Button>
                                        <Button variant="primary" class="btn btn-primary w-20" type="submit">
                                            Save
                                        </Button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <Loading v-if="isLoading" fixed></Loading>
                </div>
                <template v-if="model.inquiry_status_id === '4'">
                    <CreateStudent :standard_id="model.standard_id"
                                :batch_id="model.batch_id"
                                :new_admission_from="'Inquiry'"/>
                </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</template>



<style scoped>

</style>
