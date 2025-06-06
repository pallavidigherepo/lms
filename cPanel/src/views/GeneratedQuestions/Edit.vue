<script setup lang="ts">
import store from "@/stores";
import {computed, onMounted, ref, watch} from "vue";
import {useRoute, useRouter} from "vue-router";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { Dialog, Menu } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";

import {useVuelidate} from "@vuelidate/core";
import {helpers, minLength, minValue, numeric, required, requiredIf} from "@vuelidate/validators";
// import {useI18n} from "vue-i18n";
import axiosClient from "@/axios";
import Editor from "@tinymce/tinymce-vue";
import SectionEditor from "@/components/Editor/Section.vue";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();

const submitted = ref(false);
const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);
const validationErrors = ref();
const showSection = ref(false);
// Now we must get editing details for the selected item
const model = ref({
    id: route.params.id,
    board_id: "",
    standard_id: "",
    name: "",
    total_marks: 0,
    duration: 0,
    has_section: false,
    is_active: true,
    sections: [],
    total_questions: '',
    type_id: '',
});
// Watch to current survey data change and when this happens we update local model

onMounted(() => {
    fetch();
    store.dispatch("listBoard").then().catch();
    store.dispatch("listStandard").then().catch();
    store.dispatch("listType").then().catch();
});

const fetch = async() => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        const result = await axiosClient.get(`/templates/${id}`);
        if (result.status != 200) {
            const error = new Error('Failed to fetch template')
            throw error;
        }
        model.value = JSON.parse(JSON.stringify(result.data.data));
    } catch (e) {
        isErrored.value = true;
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};

const boards = computed(() => store.getters.listBoards);
const standards = computed(() => store.getters.listStandards);
const typeList = computed(() => store.getters.listType);

const rules = computed(() => {
    return {
        board_id: {
            required: helpers.withMessage("Please select board.", required),
        },
        standard_id: {
            required: helpers.withMessage("Please select standard.", required),
        },
        name: {
            required: helpers.withMessage("Please enter name of template.", required),
        },
        total_marks: {
            required: helpers.withMessage("Please enter total marks of template.", required),
            minValue: helpers.withMessage("Total marks should be greater than 0", minValue(1)),
        },
        duration: {
            required: helpers.withMessage("Please enter duration of template.", required),
            minValue: helpers.withMessage("Duration should be greater than 0", minValue(1)),
        },
        sections:{
            minLength: helpers.withMessage("Please create at-least one section.", requiredIf(function () {
                return model.value.has_section;
            })),
            $each: helpers.forEach({
                name: {
                    required: helpers.withMessage("Please enter the name of section.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                description: {
                    required: helpers.withMessage("Please enter description of section.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                type_id: {
                    required: helpers.withMessage("Please select type id of section.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                total_questions: {
                    required: helpers.withMessage("Please enter total number of questions.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                compulsory_questions: {
                    required: helpers.withMessage("Please enter number of compulsory questions.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                total_marks: {
                    required: helpers.withMessage("Please enter total marks of section.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                },
                marks_per_question: {
                    required: helpers.withMessage("Please enter marks per question of section.", requiredIf(function (){
                        return model.value.has_section;
                    })),
                }
            })
        },
        total_questions: {
            required: helpers.withMessage("Please enter total marks of template.", requiredIf(function () {
                return !model.value.has_section;
            })),
            minValue: helpers.withMessage("Total marks should be greater than 0", minValue(1)),
        },
        compulsory_questions: {
            required: helpers.withMessage("Please enter total marks of template.", requiredIf(function () {
                return !model.value.has_section;
            })),
            minValue: helpers.withMessage("Total marks should be greater than 0", minValue(1)),
        },
        type_id: {
            required: helpers.withMessage("Please select the type of questions for this template.", requiredIf(function () {
                return !model.value.has_section;
            })),
        },
    };
});

const v$ = useVuelidate(rules, model);

async function submitForm() {

    submitted.value = true;
    v$.value.$validate(); // checks all inputs

    if (!v$.value.$error ) {
        isLoading.value = true;

        await store
            .dispatch("templates/save", model.value)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = false;
                router.push({name: "Templates"});
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

function addSection(index) {

    let newSection = {
        id: makeid(3),
        name: '',
        description: '',
        total_questions: '',
        compulsory_questions: '',
        total_marks: '',
        marks_per_question: '',
        type_id: '',
    };
    model.value.sections.splice(index, 0, newSection);
}

function deleteSection(section) {
    model.value.sections = model.value.sections.filter((q) => q !== section);
}

function sectionChange(section) {
    model.value.sections = model.value.sections.map((q) => {
        if (q.id === section.id) {
            return JSON.parse(JSON.stringify(section));
        }
        return q;
    });
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
                            Edit Question Paper Format
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
                                @click="router.push('/templates')"
                            ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
                            </Button>
                            <!-- <router-link class="btn box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0" to="/templates">
                                <ArrowLeftCircleIcon class="w-4 h-4 mr-2"/>
                                {{ t("common.Back") }}
                            </router-link> -->
                        </div>
                    </div>
                    <!-- BEGIN: Notification -->
                    <!-- <Alert
                        class="intro-y col-span-11 alert-warning alert-dismissible mb-6 mt-5"
                        v-slot="{ dismiss }"
                        role="alert"
                    >
                        <div class="flex items-center">
                            <span><Lucide icon="InfoIcon" class="w-4 h-4 mr-2" /></span>
                            <span>{{ t("templates.Template created here will be used for any subject") }}</span>
                        </div>
                    </Alert> -->
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
                                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                        Select Board & Standard/Class
                                    </div>
                                    <div class="mt-5">

                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Choose Board
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
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
                                items: model.board_id
                            }" :placeholder="'Select Board'" class="w-full">
                                                    <option>questions.Select Board</option>
                                                    <option v-for="(board, index) in boards" :key="index" :value="index">
                                                        {{ board }}
                                                    </option>
                                                </TomSelect>

                                                <div v-for="(error, index) of v$.board_id.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
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
                                                <TomSelect id="form-standard" v-model="model.standard_id"
                                                        :class="{
            'border-danger': submitted && v$.standard_id.$errors.length,
            }" :options="{
                                allowEmptyOption: false,
                                create: false,
                                placeholder: 'Select Standard',
                                autocomplete: 'off',
                                items: model.standard_id
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
                            <!-- BEGIN: Necessary information about template -->
                            <div class="intro-y box p-5 mt-5">

                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"
                                    >
                                    <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                        Detail information of template"
                                    </div>

                                    <div class="mt-5">

                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Name
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-name" v-model.trim="model.name" :class="{
                                'border-danger': submitted && v$.name.$errors.length,
                                }"
                                                    class="form-control"
                                                    placeholder="Template Name." type="text"/>
                                                <div class="form-help text-right">Maximum character 0/70</div>
                                                <div v-for="(error, index) of v$.name.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Duration
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-duration" v-model.trim="model.duration" :class="{
                                'border-danger': submitted && v$.duration.$errors.length,
                                }"
                                                    class="form-control"
                                                    placeholder="Duration." type="text"/>
                                                <div class="form-help text-right">Please enter duration in Minutes Eg 2 Hrs is 120 Minutes</div>
                                                <div v-for="(error, index) of v$.duration.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Total Marks
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <FormInput id="form-duration" v-model.trim="model.total_marks" :class="{
                                'border-danger': submitted && v$.total_marks.$errors.length,
                                }"
                                                    class="form-control"
                                                    placeholder="Duration." type="text"/>
                                                <div class="form-help text-right">Total marks for this templates</div>
                                                <div v-for="(error, index) of v$.total_marks.$errors" :key="index"
                                                    class="text-danger mt-2">
                                                    <div class="error-msg">{{ error.$message }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Is Active
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <div class="form-check form-switch">
                                                    <FormCheck.Input id="form-is-active"
                                                        v-model.trim="model.is_active"
                                                        class="form-check-input"
                                                        type="checkbox"
                                                    />
                                                </div>
                                                <div class="form-help text-right">
                                                    You can activate or de active any time
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Has Section
                                                        </div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <div class="form-check form-switch">
                                                    <FormCheck.Input id="form-has-section"
                                                        v-model.trim="model.has_section"
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        @change="showSection=!showSection"
                                                    />

                                                </div>
                                                <div class="form-help text-right">
                                                    You need to add sections if switched on
                                                </div>

                                                <div v-if="model.has_section" class="w-full mt-3 xl:mt-0 flex-1">
                                                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                        <div
                                                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                                            <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2" />
                                                            Sections
                                                            <div class="xl:ml-20 xl:pl-5 xl:pr-20 first:mt-0 mt-5">
                                                                <Button class="btn btn-outline-primary border-dashed w-full" type="button"
                                                                        @click="addSection()">
                                                                        <Lucide icon="PlusIcon" class="w-4 h-4 mr-2" />
                                                                        Add Section
                                                                </Button>
                                                            </div>
                                                        </div>
                                                        <div v-for="(error, index) of v$.sections.$errors" :key="index"
                                                            class="text-danger mt-2">
                                                            <div class="error-msg">{{ error.$message }}</div>
                                                        </div>
                                                        <div v-if="!model.sections.length" class="text-center text-gray-600">
                                                            You do not have any section added yet
                                                        </div>

                                                        <div v-for="(section, index) in model.sections"
                                                            :key="index"
                                                            class="form-inline items-start flex-col xl:flex-row mt-2 pt-2 first:mt-0 first:pt-0"
                                                        >
                                                            <div class="form-label xl:w-20 xl:!mr-10">
                                                                <div class="text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="font-medium">Section
                                                                            {{ index + 1 }}.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <SectionEditor :section="section"
                                                                        :index="index"
                                                                        :questionTypes="typeList"
                                                                        :total_marks="model.total_marks"
                                                                        @addSection="addSection"
                                                                        @change="sectionChange"
                                                                        @deleteSection="deleteSection"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Necessary information about template -->

                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                <router-link
                                    class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52"
                                    to="/templates">
                                    Cancel
                                </router-link>

                                <Button variant="primary" class="btn py-3 btn-primary w-full md:w-52" type="submit">
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

</style>
