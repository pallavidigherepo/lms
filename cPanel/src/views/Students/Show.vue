<script setup lang="ts">
import { ref, onMounted} from "vue";
// import { useI18n } from "vue-i18n";
import axiosClient from "@/axios";
import {useRoute, useRouter} from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import Table from "@/components/Base/Table";
// import { Tab } from "@/components/Base/Headless";
// import { Tab as HeadlessTab } from "@headlessui/vue";
import { Dialog, Menu, Tab } from "@/components/Base/Headless";

// const { t } = useI18n();

const route = useRoute();
const router = useRouter();
const isLoading = ref(false);

let takeTestConfirmationModal = ref(false);
const warningMessage = ref("");
const selectedPaper = ref();
const isErrored = ref();
const message = ref();

const student = ref({
    id: route.params.id,
    name: "",
    email: "",
    mobile: "",
    board: "",
    standard: "",
    batch: "",
    alt_mobile: "",
    gender: "",
    avatar: "",
    dob: "",
    permanent_address: "",
    address: "",
    aadhaar: "",
    mother_name: "",
    mother_email: "",
    mother_mobile: "",
    mother_qualification: "",
    mother_occupation: "",
    father_name: "",
    father_email: "",
    father_mobile: "",
    father_qualification: "",
    father_occupation: "",
});
const papers = ref();

onMounted(() => {
    fetch();
});

const fetch = async () => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        const result = await axiosClient.get(`/students/${id}`);
        if (result.status !== 200) {
            throw new Error('Failed to fetch student information.')
        }
        let response = JSON.parse(JSON.stringify(result.data.data));
        student.value = response;
        papers.value = response.manipulated;
    } catch (e) {
        isErrored.value = true;
        message.value = e;
    } finally {
        isLoading.value = false;
    }
}
function cancel()
{

}

function startTest() {
    takeTestConfirmationModal.value = true;
    selectedPaper.value;
}

function showResult() {

}
</script>

<template>
    <div>
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Student Details</h2>

            <router-link v-if="student"
                         :to="{ name: 'EditStudent', params: { id: student.id } }"
                         class="
                                btn
                                btn-success
                                mr-2
                                flex
                                items-center
                                ml-auto
                                sm:ml-0
                              ">
                              <Lucide icon="EditIcon" class="w-4 h-4 mr-2" />
                              Edit Student
            </router-link>
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
                     @click="router.push('/students')"
                ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
                </Button>
            </div>
        </div>
        <Tab.Group>
            <!-- BEGIN: Profile Info -->
            <div class="intro-y box px-5 pt-5 mt-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img
                                v-if="student && student.avatar"
                                :alt="student.name ?? student"
                                class="rounded-full"
                                :src="student.avatar" />
                            <img
                                v-else
                                :alt="student.name"
                                class="rounded-full"
                                :src="`https://eu.ui-avatars.com/api/?size=225&name=` + student.name"
                            />
                        </div>
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                                {{ student.name }}
                            </div>
                            <div class="text-slate-500">{{ student.board }} of Standard {{ student.standard }}</div>
                        </div>
                    </div>
                    <div
                        class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">
                            Contact Details
                        </div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center" v-if="student && student.student_parent">
                                <Lucide icon="MailIcon" class="w-4 h-4 mr-2" />
                                {{ (student.student_parent && student.student_parent.parent_email) ? (student.student_parent.parent_email): '-' }}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"
                                 v-if="student && student.student_parent">
                                 <Lucide icon="PhoneIcon" class="w-4 h-4 mr-2" />
                                Father: {{ student.student_parent.father_name + ' :- ' +student.student_parent.father_mobile ?? student.student_parent }}<br />
                                Mother: {{ student.student_parent.mother_name + ' :- ' +student.student_parent.mother_mobile ?? student.student_parent }}
                            </div>

                        </div>
                    </div>

                </div>
                <Tab.List class="nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center">
                    <Tab :fullWidth="false" class="py-4 flex items-center cursor-pointer">
                        <Lucide icon="UserIcon" class="w-4 h-4 mr-2" /> Information
                    </Tab>
                    <Tab :fullWidth="false" class="py-4 flex items-center cursor-pointer">
                        <Lucide icon="ServerIcon" class="w-4 h-4 mr-2" /> Documents
                    </Tab>
                    <Tab :fullWidth="false" class="py-4 flex items-center cursor-pointer">
                        <Lucide icon="ServerIcon" class="w-4 h-4 mr-2" /> Siblings
                    </Tab>
                    <Tab :fullWidth="false" class="py-4 flex items-center cursor-pointer">
                        <Lucide icon="ServerIcon" class="w-4 h-4 mr-2" /> Papers
                    </Tab>
                    <Tab :fullWidth="false" class="py-4 flex items-center cursor-pointer">
                        <Lucide icon="TrendingUpIcon" class="w-4 h-4 mr-2" /> Results
                    </Tab>
                </Tab.List>
            </div>
            <!-- END: Profile Info -->
            <Tab.Panels class="mt-5">
                <!-- BEGIN: Basic Information -->
                <Tab.Panel>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div
                                class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Basic Information</h2>
                            </div>
                            <div class="p-5">
                                <!-- BEGIN: Board and Standard selection -->
                                <div class="intro-y box p-5 mt-1">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div
                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                            Select Board & Standard/Class
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Standard
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.standard }}
                                                </div>
                                            </div>
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Batch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.batch }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Board and Standard selection -->
                                <!-- BEGIN: Basic Information -->
                                <div class="intro-y box p-5 mt-1">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div
                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                            Basic Information Of Student
                                        </div>
                                        <div class="mt-5">
                                            <!-- Begin: Name-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Name</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.name }}
                                                </div>
                                            </div>
                                            <!-- End: Name-->
                                            <!-- Begin: Gender-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Gender</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.gender }}
                                                </div>
                                            </div>
                                            <!-- End: Gender-->
                                            <!-- Begin: DOB-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Date Of Birth
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.dob }}
                                                </div>
                                            </div>
                                            <!-- End: DOB-->
                                            <!-- Begin: Permanent Address-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Permanent Address
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.permanent_address }}
                                                </div>
                                            </div>
                                            <!-- End: Permanent Address-->
                                            <!-- Begin: Address-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Address</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ '-' ?? student.address }}
                                                </div>
                                            </div>
                                            <!-- Begin: Address-->
                                            <!-- Begin: Aadhaar-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Aadhaar
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.aadhaar}}
                                                </div>
                                            </div>
                                            <!-- End: Aadhaar-->
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Basic Information -->
                                <!-- BEGIN: Mother Information -->
                                <div class="intro-y box p-5 mt-1" v-if="student && student.student_parent">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div
                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                            Mother Information Of Student
                                        </div>
                                        <div class="mt-5">
                                            <!-- Begin: Mother Name-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Mother Name</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.mother_name }}
                                                </div>
                                            </div>
                                            <!-- End: Mother Name-->
                                            <!-- Begin: Mother Email-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Mother Email</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ '-' ?? student.student_parent.mother_email}}
                                                </div>
                                            </div>
                                            <!-- End: Mother Email-->
                                            <!-- Begin: Mother Mobile-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Mother Mobile</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.mother_mobile}}
                                                </div>
                                            </div>
                                            <!-- End: Mother Mobile-->
                                            <!-- Begin: Mother Qualification-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Mother Qualification</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.mother_qualification }}
                                                </div>
                                            </div>
                                            <!-- End: Mother Qualification-->
                                            <!-- Begin: Mother Occupation-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Mother Occupation</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.mother_occupation }}
                                                </div>
                                            </div>
                                            <!-- End: Mother Occupation-->
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Mother Information -->
                                <!-- BEGIN: Father Information -->
                                <div class="intro-y box p-5 mt-1" v-if="student && student.student_parent">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div
                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                            Father Information Of Student
                                        </div>
                                        <div class="mt-5">
                                            <!-- Begin: Father Name-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Father Name</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.father_name }}
                                                </div>
                                            </div>
                                            <!-- End: Father Name-->
                                            <!-- Begin: Father Email-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Father Email</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ '-' ?? student.student_parent.father_email }}
                                                </div>
                                            </div>
                                            <!-- End: Father Email-->
                                            <!-- Begin: Father Mobile-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Father Mobile</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.father_mobile }}
                                                </div>
                                            </div>
                                            <!-- End: Father Mobile-->
                                            <!-- Begin: Father Qualification-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Father Qualification</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.father_qualification }}
                                                </div>
                                            </div>
                                            <!-- End: Father Qualification-->
                                            <!-- Begin: Father Occupation-->
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Father Occupation</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.student_parent.father_occupation }}
                                                </div>
                                            </div>
                                            <!-- End: Father Occupation-->
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Father Information -->

                            </div>
                        </div>
                    </div>
                </Tab.Panel>
                <!-- END: Basic Information -->
                <!-- BEGIN: Basic Information -->
                <Tab.Panel>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div
                                class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Documents Uploaded</h2>
                            </div>
                            <div class="p-5">
                                <!-- BEGIN: Board and Standard selection -->
                                <div class="intro-y box p-5 mt-1">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">

                                        <div class="mt-2">
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0" v-if="student && student.student_parent">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center" v-for="(document, index) in student.student_documents" :key="index">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">{{
                                                                    document.document_type.name
                                                                }}
                                                            </div>
                                                            <div class="font-medium">{{
                                                                    document.url
                                                                }}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.standard }}
                                                </div>
                                            </div>
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Batch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.batch }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Board and Standard selection -->
                            </div>
                        </div>
                    </div>
                </Tab.Panel>
                <!-- END: Basic Information -->
                <!-- BEGIN: Basic Information -->
                <Tab.Panel>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div
                                class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Basic Information</h2>
                            </div>
                            <div class="p-5">
                                <!-- BEGIN: Board and Standard selection -->
                                <div class="intro-y box p-5 mt-1">
                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                        <div
                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                            Select Board & Standard/Class
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Standard
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.standard }}
                                                </div>
                                            </div>
                                            <div class="form-inline flex items-start flex-col xl:flex-row mt-1 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                                <div class="text-left flex-grow">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Batch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                                    {{ student.batch }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Board and Standard selection -->
                            </div>
                        </div>
                    </div>
                </Tab.Panel>
                <!-- END: Basic Information -->
                <!-- BEGIN: Student Papers -->
                <Tab.Panel>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div
                                class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Papers</h2>
                            </div>
                            <div class="pos intro-y grid grid-cols-12 gap-5 mt-5" v-if="papers">
                                <template v-for="(paper, index) in papers.can_take_test"
                                          :key="index">

                                    <div class="intro-y box col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
                                        <Alert class="alert-primary mb-2 font-bold"> {{ index }} </Alert>

                                        <Table class="table">
                                            <Table.Thead>
                                                <Table.Tr>
                                                    <Table.Th class="whitespace-nowrap">#</Table.Th>
                                                    <Table.Th class="whitespace-nowrap">Paper Name</Table.Th>
                                                    <Table.Th class="whitespace-nowrap">Total Marks</Table.Th>
                                                    <Table.Th class="whitespace-nowrap">Total Duration</Table.Th>
                                                    <Table.Th class="whitespace-nowrap">Action</Table.Th>
                                                </Table.Tr>
                                            </Table.Thead>
                                            <Table.Tbody>
                                            <Table.Tr v-for="(paperInfos, pidx) in paper" :key="pidx">
                                                <Table.Td class="whitespace-nowrap">{{ pidx+1 }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.question_paper_name }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.total_marks }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.total_time }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">
                                                    <Button class="btn btn-success-soft" @click.prevent="startTest(paperInfos)">Take Test</Button>
                                                </Table.Td>
                                            </Table.Tr>
                                            </Table.Tbody>
                                        </Table>
                                    </div>
                                </template>

                            </div>
                        </div>

                    </div>
                </Tab.Panel>
                <!-- END: Student Papers -->
                <!-- BEGIN: Student Results -->
                <Tab.Panel>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div
                                class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">Results</h2>

                            </div>
                            <div class="pos intro-y grid grid-cols-12 gap-5 mt-5" v-if="papers">
                                <template v-for="(paper, index) in papers.test_taken"
                                          :key="index">

                                    <div class="intro-y box col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
                                        <Alert class="alert-primary mb-2 font-bold"> {{ index }} </Alert>

                                        <Table class="table">
                                            <Table.Thead>
                                            <Table.Tr>
                                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                                <Table.Th class="whitespace-nowrap">Paper Name</Table.Th>
                                                <Table.Th class="whitespace-nowrap">Total Marks</Table.Th>
                                                <Table.Th class="whitespace-nowrap">Total Duration</Table.Th>
                                                <Table.Th class="whitespace-nowrap">Action</Table.Th>
                                            </Table.Tr>
                                            </Table.Thead>
                                            <Table.Tbody>
                                            <Table.Tr v-for="(paperInfos, pidx) in paper" :key="pidx">
                                                <Table.Td class="whitespace-nowrap">{{ pidx+1 }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.question_paper_name }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.total_marks }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">{{ paperInfos.total_time }}</Table.Td>
                                                <Table.Td class="whitespace-nowrap">
                                                    <button class="btn btn-success-soft" @click.prevent="showResult(paperInfos)">Show Result</button>
                                                </Table.Td>
                                            </Table.Tr>
                                            </Table.Tbody>
                                        </Table>
                                    </div>
                                </template>

                            </div>

                        </div>
                    </div>
                </Tab.Panel>
                <!-- END: Student Results -->
            </Tab.Panels>
        </Tab.Group>
        <!-- BEGIN: Confirmation Modal -->
        <Dialog
            :show="takeTestConfirmationModal"
            @hidden="takeTestConfirmationModal = false"
        >
            <ModalBody class="p-0">
                <div class="p-5 text-center">

                    <AlertTriangleIcon class="w-16 h-16 text-warning mx-auto mt-3" />
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to take the test? <br />
                        This process cannot be undone
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <Button
                        type="button"
                        @click="takeTestConfirmationModal = false"
                        class="btn btn-outline-secondary w-24 mr-1"
                    >
                    Cancel
                    </Button>
                    <Button type="button" class="btn btn-danger w-24" @click.prevent="startTest">Yes</Button>
                </div>
            </ModalBody>
        </Dialog>
        <!-- END: Confirmation Modal -->
        <Loading v-if="isLoading" fixed></Loading>
    </div>

</template>


