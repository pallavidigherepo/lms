<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import {useRoute, useRouter} from "vue-router";
// import {useI18n} from "vue-i18n";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import store from "@/stores";
import axiosClient from "@/axios";
// import InquiryFollowups from "@/components/Inquiries/Followups.vue";

const route = useRoute();
const router = useRouter();
// const { t } = useI18n();

const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const submitted = ref(false);
const isFollowupCalled = ref(false);
const showFollowupValue = ref(false);

const model = ref({
    id: route.params.id,
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

onMounted(() => {
    fetch();
});

const fetch = async() => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        const result = await axiosClient.get(`/inquiries/${id}`);
        if (result.status !== 200) {
            throw new Error('Failed to fetch student information.');
        }
        model.value = JSON.parse(JSON.stringify(result.data.data));
    } catch (e) {
        isErrored.value = true;
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};

function followup(value) {
    isFollowupCalled.value = value;
    showFollowupValue.value = value;
}

</script>

<template>
    <div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Inquiry Details</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <Button href="javascript:;"
                variant="primary"
                class="
                        btn
                        btn-primary
                        mr-2
                        flex
                        items-center
                        ml-auto
                        sm:ml-0
                      "
               @click.prevent="followup(true)"
            >Follow Ups</Button>
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
        <!-- BEGIN: Inquiry basic information -->
        <div class="intro-y col-span-12 lg:col-span-12">

                <div class="intro-y col-span-11 2xl:col-span-9">
                    <!-- BEGIN: Board and Standard selection -->
                    <div class="intro-y box p-5 mt-1">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div
                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                Select Standard Class, Batch Source and etc
                            </div>
                            <div class="mt-5">
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Choose Standard
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        {{ model.standard}}
                                    </div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Choose Batch
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        {{ model.batch }}
                                    </div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Inquiry Source
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        {{ model.source }}
                                    </div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Status</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.status }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Board and Standard selection -->
                    <!-- BEGIN: Assigned to Information -->
                    <div class="intro-y box p-5 mt-1">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div
                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                Assigned to
                            </div>
                            <div class="mt-5">
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Assigned to</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        {{ model.assigned }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Assigned to Information -->
                    <!-- BEGIN: Basic Information -->
                    <div class="intro-y box p-5 mt-1">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div
                                class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                Basic Information Of Student
                            </div>
                            <div class="mt-5">
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Student Name</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.student_name }}</div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Contact Name</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.contact_name }}</div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Contact Email</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.contact_email }}</div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Contact Mobile</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.contact_mobile }}</div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Gender</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.student_gender }}</div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Date Of Birth</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        <div class="relative w-56">
                                            {{ model.student_dob }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                        <div class="text-left flex-grow">
                                            <div class="flex items-center">
                                                <div class="font-medium">Address</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">{{ model.address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Basic Information -->
                </div>
        </div>
        <!-- END: Inquiry basic form -->
        <Loading v-if="isLoading" fixed></Loading>
        <inquiry-followups v-if="isFollowupCalled"
                           v-model="showFollowupValue"
                           :inquiryId="model.id"
                           :inquiryStatusId="model.inquiry_status_id" />
    </div>
    </div>
</template>

