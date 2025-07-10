<script setup lang="ts">
//import { ref, watch, computed, onMounted } from 'vue'
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import Pagination from "@/components/Base/Pagination";
import { FormCheck, FormInput, FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import Table from "@/components/Base/Table";
import { useRoute, useRouter } from "vue-router";
import { useTableStore } from "@/stores/table";
import { storeToRefs } from 'pinia';

const route = useRoute();
const router = useRouter();

const tableStore = useTableStore()
tableStore.setupTable({
    url: 'students',
    tableColumns: [
        { key: 'name', label: 'Name' },
        { key: 'mobile', label: 'Contact' },
        { key: 'designation', label: 'Position' },
        { key: 'is_verified', label: 'Status' },
    ],
    tableFilters: [
        { key: 'role', label: 'Role', options: ['admin', 'user', 'guest'] },
        { key: 'status', label: 'Status', options: ['active', 'inactive'] },
    ],
})
tableStore.setSubPages(['CreateStudent', 'ViewStudent', 'EditStudent'])

const {
    data,
    search,
    sort,
    pagination,
    activeFilters,
    selectedRows,
    checkAll,
    columns,
    filters,
    totalPages,
    listing,
} = storeToRefs(tableStore);

const onSearch: any = () => tableStore.onSearch()
const sortBy: any = (row: any) => tableStore.sortBy(row)
const onPerPageChange: any = () => tableStore.onPerPageChange()
const exportData: any = (format: 'csv' | 'xls' | 'pdf') => tableStore.exportData(format)
const prevPage: any = () => tableStore.prevPage()
const onFilterChange: any = () => tableStore.onFilterChange()
const nextPage: any = () => tableStore.nextPage()
const toggleStatus: any = (row: any) => tableStore.toggleStatus(row)
const calculateProfileCompletion: any = () => tableStore.calculateProfileCompletion
const toggleCheckAll: any = () => tableStore.toggleCheckAll()
const syncCheckState: any = () => tableStore.syncCheckState()
const deleteSelected: any = () => tableStore.deleteSelected()
const view: any = (row: any) => tableStore.view(row)
const edit: any = (row: any) => tableStore.edit(row)
const handleDelete: any = (row: any) => tableStore.handleDelete(row)
import DataTable from "@/custom_components/DataTable/UserTable.vue";
</script>

<template>
    <template v-if="listing">

        <div class="grid grid-cols-12 gap-y-10 gap-x-6">
            <div class="col-span-12">
                <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        Students
                    </div>
                    <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
                        <Button variant="primary"
                            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
                            @click="() => { router.push({ name: 'CreateStudent' }); listing = false }">
                            <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
                            Add New Student
                        </Button>
                    </div>
                </div>
                <DataTable
                  apiUrl="students"
                  :columns="[
                    { key: 'id', label: 'ID' },
                    { key: 'name', label: 'Name' },
                    { key: 'email', label: 'Email' },
                    { key: 'role', label: 'Role' },
                    { key: 'status', label: 'Status' },
                  ]"
                  :filters="[
                    { key: 'role', label: 'Role', options: ['admin', 'user', 'guest'] },
                    { key: 'status', label: 'Status', options: ['active', 'inactive'] },
                  ]"
                  @view="view"
                  @edit="edit"
                  @delete="handleDelete"
                  @search="onSearch"
                  @sort="sortBy"
                >
                    <template  v-slot:TableListHeader>
                        <div class="flex flex-col p-5 box box--stacked">
                            <div class="grid grid-cols-4 gap-5">
                                <div
                                    class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                    <div class="text-base text-slate-500">Total Students</div>
                                    <div class="mt-1.5 text-2xl font-medium">457,204</div>
                                    <div class="absolute inset-y-0 right-0 flex flex-col justify-center mr-5">
                                        <div
                                            class="flex items-center border border-danger/10 bg-danger/10 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-danger">
                                            3%
                                            <Lucide icon="ChevronDown" class="w-4 h-4 ml-px stroke-[1.5]" />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                    <div class="text-base text-slate-500">Present Students</div>
                                    <div class="mt-1.5 text-2xl font-medium">122,721</div>
                                    <div class="absolute inset-y-0 right-0 flex flex-col justify-center mr-5">
                                        <div
                                            class="flex items-center border border-success/10 bg-success/10 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-success">
                                            2%
                                            <Lucide icon="ChevronUp" class="w-4 h-4 ml-px stroke-[1.5]" />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                    <div class="text-base text-slate-500">Absent Students</div>
                                    <div class="mt-1.5 text-2xl font-mediumm">489,223</div>
                                    <div class="absolute inset-y-0 right-0 flex flex-col justify-center mr-5">
                                        <div
                                            class="flex items-center border border-danger/10 bg-danger/10 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-danger">
                                            3%
                                            <Lucide icon="ChevronDown" class="w-4 h-4 ml-px stroke-[1.5]" />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                    <div class="text-base text-slate-500">Login Activity</div>
                                    <div class="mt-1.5 text-2xl font-mediumm">411,259</div>
                                    <div class="absolute inset-y-0 right-0 flex flex-col justify-center mr-5">
                                        <div
                                            class="flex items-center border border-success/10 bg-success/10 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-success">
                                            8%
                                            <Lucide icon="ChevronUp" class="w-4 h-4 ml-px stroke-[1.5]" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </DataTable>
            </div>
        </div>
    </template>
    <template v-else>
        <router-view></router-view>
    </template>
</template>
