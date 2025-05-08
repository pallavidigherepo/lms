<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import {useRoute, useRouter} from "vue-router";
// import {useI18n} from "vue-i18n";
import { helpers, required} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import store from "@/stores";
import axiosClient from "@/axios";
import { Dialog, Menu, Slideover } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Pagination from "@/components/DataTable/Pagination.vue";
import Table from "@/components/Base/Table";

const props = defineProps({
    modelValue: {
        required: false,
        default: false,
    },
    inquiryId: {
      type: [String, Number],
      required: false,
    },
    inquiryStatusId: {
        type: [String, Number],
        required: false,
    },
    inquiryValue: {
        type: Object,
        required: false
    }
});

const emits = defineEmits(["modelValue"]);
const showFollowsUpModel = ref(false);
// const { t } = useI18n();
const route = useRoute();
const router = useRouter();

const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const followUpSubmitted = ref(false);
const followupModel = ref({
    inquiry_id: "",
    inquiry_status_id: "",
    inquiry_followup_type_id: '',
    followup_date: '',
    followup_time: '',
    comment: '',
});
const followupRules = computed(() => {
    return{
        inquiry_followup_type_id: {
            required: helpers.withMessage("Please select follow up type.", required),
        },
        followup_date: {
            required: helpers.withMessage("Please enter follow up date.", required),
        },
        followup_time: {
            required: helpers.withMessage("Please enter follow up time.", required),
        },
        comment: {
            required: helpers.withMessage("Please enter comment.", required),
        }
    }

});
const f$ = useVuelidate(followupRules, followupModel);

async function submitFollowupForm()
{
    followUpSubmitted.value = true;
    f$.value.$validate(); // checks all inputs
    if (!f$.value.$error) {
        isLoading.value = true;
        followUpSubmitted.value = false;
        followupModel.value.inquiry_id = props.inquiryId;
        followupModel.value.inquiry_status_id = props.inquiryStatusId;
        await store
            .dispatch("inquiry_followups/save", followupModel.value)
            .then(() => {
                isLoading.value = false;
                isErrored.value = false;
                followupModel.value = JSON.parse(JSON.stringify(followupModel));
                fetch();
                //emits('update:modelValue', false);
                router.push({name: "Inquiries"});
            })
            .catch((err) => {
                isLoading.value = false;
                followUpSubmitted.value = false;
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
    store.dispatch("listInquiryFollowupTypes").then().catch();
    store.dispatch("listInquiryAssignees").then().catch();
    fetch();
});
const followupTypes = computed(() => store.getters.listInquiryFollowupTypes);
const assignees = computed(() => store.getters.listInquiryAssignees);

const url = ref(
    "?inquiry_id=" +
    props.inquiryId
);
function fetch() {
    //loading.value = true;
    store
        .dispatch("inquiry_followups/list",  {url: url.value})
        .then(() => {
            //loading.value = false;
        })
        .catch();
}
const noRecords = ref(false);
const items = computed(() => {
    let records = store.getters["inquiry_followups/inquiry_followups"];

    if (records.data && parseInt(records.data.length) < 1) {
        noRecords.value = true;
    }
    return records;
});
// Begin: Cancel editing
function cancel() {
    followupModel.value = JSON.parse(JSON.stringify(followupModel));
}
// End: Cancel editing

</script>

<template>
    <div>
        <!-- BEGIN: Super Large Slide Over Content -->
        <Slideover
            size="xl"
            backdrop="static"
            :slideOver="true"
            :open="modelValue"
            @hidden="modelValue = false"
        >
            
            
            <Slideover.Panel>
                <a
                @click.prevent="emits('update:modelValue', false)"
                class="absolute top-0 left-0 right-auto mt-4 -ml-12"
                href="javascript:;"
                >
                
                    <Lucide icon="XIcon" class="w-8 h-8 text-slate-400" />
                </a>
                <Slideover.Title class="p-5">
                    <h2 class="font-medium text-base mr-auto">
                        Follow ups
                    </h2>
                </Slideover.Title>
                    <div class="
                        intro-y
                        col-span-12
                        flex flex-wrap
                        sm:flex-nowrap
                        items-center
                        mt-2
                      ">
                        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                            <!-- BEGIN: Follow-ups and comments Info -->
                            <div class="pos intro-y grid grid-cols-12 gap-5 flex">
                                <!-- BEGIN: Followup List Content -->
                                <div class="intro-y col-span-8 box p-5">
                                    <div class="overflow-x-auto scrollbar-hidden">
                                        <Table class="table table-report -mt-2">
                                            <Table.Thead>
                                                <Table.Tr>
                                                    <Table.Th class="whitespace-nowrap">#</Table.Th>
                                                    <Table.Th class="whitespace-nowrap">DATE</Table.Th>
                                                    <Table.Th class="text-center whitespace-nowrap">FOLLOWUP TYPE</Table.Th>
                                                    <Table.Th class="text-center whitespace-nowrap">STATUS</Table.Th>
                                                    <Table.Th class="text-center whitespace-nowrap">COMMENTS</Table.Th>
                                                </Table.Tr>
                                            </Table.Thead>
                                            <Table.Tbody>
                                                <Table.Tr v-for="(item,index) in items.data" :key="index">
                                                    <Table.Td class="whitespace-nowrap">{{ item.id }}</Table.Td>
                                                    <Table.Td class="whitespace-nowrap">
                                                        <span class="font-medium whitespace-nowrap">{{ item.followup_date }}</span>
                                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                                            @ {{ item.followup_time }}
                                                        </div>
                                                    </Table.Td>
                                                    <Table.Td class="whitespace-nowrap">{{ item.followup_type }}</Table.Td>
                                                    <Table.Td class="whitespace-nowrap">{{ item.status }}</Table.Td>
                                                    <Table.Td class="whitespace-nowrap">{{ item.followup_comments[0].comment ?? 'NA' }}</Table.Td>
                                                </Table.Tr>
                                            </Table.Tbody>
                                        </Table>
                                    </div>
                                </div>
                                <!-- END: Followup List Content -->
                                <!-- BEGIN: Add/Edit permission -->
                        
                                <div class="lg:col-span-4 flex">
                                    <div class="intro-y box p-5">
                                        <h2 class="text-lg font-medium mr-auto pt-5 pb-5">
                                            Add Follow Up
                                        </h2>

                                        <div
                                            class="alert alert-danger show flex items-center mb-2"
                                            role="alert"
                                            v-if="isErrored"
                                        >
                                            <AlertOctagonIcon class="w-6 h-6 mr-2" />
                                            {{ message }}
                                        </div>
                                        <form @submit.prevent="submitFollowupForm" class="validate-form">
                                            <div>
                                                <div>
                                                    <label for="form-followup-type" class="form-label">
                                                        Followup Type
                                                    </label>
                                                    <TomSelect id="form-followup-type"
                                                               v-model="followupModel.inquiry_followup_type_id"
                                                               :class="{ 'border-danger': followUpSubmitted && f$.inquiry_followup_type_id.$errors.length, }"
                                                               :options="{
                                                                    allowEmptyOption: false,
                                                                    create: false,
                                                                    placeholder: 'Select Follow up Type',
                                                                    autocomplete: 'off',

                                                                  }"
                                                               :placeholder="'Select Assignee'"
                                                               class="w-full">
                                                        <option>Select Follow up Type</option>
                                                        <option v-for="(type, index) in followupTypes" :key="index" :value="index">
                                                            {{ type }}
                                                        </option>
                                                    </TomSelect>

                                                    <div v-for="(error, index) of f$.inquiry_followup_type_id.$errors" :key="index"
                                                         class="text-danger mt-2">
                                                        <div class="error-msg">{{ error.$message }}</div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <label for="form-followup-date" class="form-label">
                                                        Date of Next Follow Up
                                                    </label>
                                                    <div class="relative w-56">
                                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                            <Lucide icon="CalendarIcon" class="w-4 h-4" />
                                                        </div>
                                                        <FormInput v-model="followupModel.followup_date"
                                                               for="form-followup-date"
                                                               :class="{ 'border-danger': followUpSubmitted && f$.followup_date.$errors.length, }"
                                                               type="date"
                                                               class="form-control pl-12" />
                                                    </div>
                                                    <div v-for="(error, index) of f$.followup_date.$errors" :key="index"
                                                         class="text-danger mt-2">
                                                        <div class="error-msg">{{ error.$message }}</div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="form-followup-time" class="form-label">
                                                        Time of Next Follow Up
                                                    </label>
                                                    <div class="relative w-56">
                                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                            <Lucide icon="ClockIcon" class="w-4 h-4" />
                                                        </div>
                                                        <FormInput for="form-followup-time"
                                                               v-model="followupModel.followup_time"
                                                               :class="{ 'border-danger': followUpSubmitted && f$.followup_time.$errors.length, }"
                                                               type="time"
                                                               class="form-control pl-12" />
                                                    </div>
                                                    <div v-for="(error, index) of f$.followup_time.$errors" :key="index"
                                                         class="text-danger mt-2">
                                                        <div class="error-msg">{{ error.$message }}</div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="form-followup-time" class="form-label">
                                                        Comment
                                                    </label>
                                                    <FormTextarea
                                                        id="form-comment"
                                                        class="form-control"
                                                        placeholder="Enter comment/note of followup"
                                                        v-model.trim="followupModel.comment"
                                                        :class="{ 'border-danger': followUpSubmitted && f$.comment.$errors.length, }"
                                                    ></FormTextarea>
                                                    <div v-for="(error, index) of f$.comment.$errors" :key="index"
                                                         class="text-danger mt-2">
                                                        <div class="error-msg">{{ error.$message }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-5">
                                                <Button
                                                    variant="secondary"
                                                    type="button"
                                                    class="btn btn-outline-secondary w-24 mr-1"
                                                    @click.prevent="cancel"
                                                >
                                                Cancel
                                                </Button>
                                                <Button variant="primary" type="submit" class="btn btn-primary w-24">
                                                    Save
                                                </Button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- END: Add Followup -->
                            </div>
                            <!-- END: Follow-ups and comments Info -->
                        </div>
                    </div>
            </Slideover.Panel>
        </Slideover>
        <!-- END: Super Large Slide Over Content -->
    </div>
</template>
<style scoped>

</style>
