<script setup lang="ts">
import store from "@/stores";
import {ref, computed, onMounted} from "vue";
import {useRoute, useRouter} from "vue-router";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import Table from "@/components/Base/Table";

// import {useI18n} from "vue-i18n";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();

const message = ref("");
const isLoading = ref(false);

const fetch = async () => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        await store
            .dispatch("templates/show", id)
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

const template = computed(() => store.getters['templates/template']);
</script>
<template>
    <div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Question Paper Format Details
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
<!--                <router-link v-if="template"
                             :to="{name: 'PaperGenerator', params: {id: template.id}}"
                             class="
                                btn
                                btn-warning-soft
                                mr-2
                                flex
                                items-center
                                ml-auto
                                sm:ml-0
                                ">
                    <ServerIcon class="w-4 h-4 mr-2"/>
                    {{ t("templates.List Generated Question Papers") }}
                </router-link>-->
                <router-link v-if="template"
                             :to="{name: 'PaperGenerator', params: {id: template.id}}"
                             class="text-white
                                box
                                btn
                                bg-primary
                                mr-2
                                flex
                                items-center
                                ml-auto
                                sm:ml-0
                                ">
                    <Lucide icon="ServerIcon" class="w-4 h-4 mr-2"/>
                    Generate Question Paper
                </router-link>
                <router-link v-if="template"
                             :to="{name: 'EditTemplate', params:{id:template.id}}"
                             class="text-white
                                    box
                                    btn
                                    bg-success
                                    mr-2
                                    flex
                                    items-center
                                    ml-auto
                                    sm:ml-0
                                  ">
                    <Lucide icon="EditIcon" class="w-4 h-4 mr-2"/>
                    Edit Template
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
                    @click="router.push('/templates')"
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
                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                        Selected Board & Standard/Class
                    </div>
                    <div class="mt-5">

                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Board
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.board : null }}
                            </div>
                        </div>
                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Standard
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.standard : null }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Board and Standard selection -->
            <!-- BEGIN: Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div
                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                        Information
                    </div>
                    <div class="mt-5">

                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Name
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.name : null }}
                            </div>
                        </div>
                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Total Marks
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.total_marks : null }}
                            </div>
                        </div>
                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Duration
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.duration : null }} minutes
                            </div>
                        </div>
                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Is Active</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.is_active : null }}
                            </div>
                        </div>
                        <div class="form-inline flex items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label flex xl:w-64 xl:mr-10 flex items-center">
                                <div class="text-left flex-grow">
                                    <div class="flex items-center">
                                        <div class="font-medium">Has Section</div>
                                    </div>

                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                {{ template ? template.has_section : null }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Information -->
            <div class="intro-y box p-5 mt-5" v-if="template && template.has_section">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div
                        class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <Lucide icon="ChevronDownIcon" class="w-4 h-4 mr-2"/>
                        Sections
                    </div>
                    <div class="mt-5 overflow-x-auto">
                        <Table class="table table-striped">
                            <Table.Thead>
                                <Table.Tr>
                                    <Table.Th class="whitespace-nowrap">#</Table.Th>
                                    <Table.Th class="whitespace-nowrap">Name</Table.Th>
                                    <Table.Th class="whitespace-nowrap">Total Questions</Table.Th>
                                    <Table.Th class="whitespace-nowrap">Compulsory Questions</Table.Th>
                                    <Table.Th class="whitespace-nowrap">Total Marks</Table.Th>
                                    <Table.Th class="whitespace-nowrap">Marks per Question</Table.Th>
                                </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                                <Table.Tr v-for="(section, index) in template.sections" :key="index">
                                    <Table.Td>{{ index + 1 }}</Table.Td>
                                    <Table.Td>{{ section.name }}</Table.Td>
                                    <Table.Td>{{ section.total_questions }}</Table.Td>
                                    <Table.Td>{{ section.compulsory_questions }}</Table.Td>
                                    <Table.Td>{{ section.total_marks }}</Table.Td>
                                    <Table.Td>{{ section.marks_per_question }}</Table.Td>
                                </Table.Tr>
                            </Table.Tbody>
                        </Table>
                    </div>
                </div>
            </div>


        </div>
        <Loading v-if="isLoading" fixed></Loading>
    </div>
</template>



<style scoped>

</style>
