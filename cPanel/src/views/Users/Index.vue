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
    url: 'users',
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
tableStore.setSubPages(['CreateUser', 'ViewUser', 'EditUser'])
tableStore.setListingView(['Users'])
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

</script>

<template>
    <template v-if="listing">

        <div class="grid grid-cols-12 gap-y-10 gap-x-6">
            <div class="col-span-12">
                <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        Users
                    </div>
                    <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
                        <Button variant="primary"
                            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
                            @click="() => { router.push({ name: 'CreateUser' }); listing = false }">
                            <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
                            Add New User
                        </Button>
                    </div>
                </div>
                <div class="flex flex-col gap-8 mt-3.5">
                    <div class="flex flex-col p-5 box box--stacked">
                        <div class="grid grid-cols-4 gap-5">
                            <div
                                class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                <div class="text-base text-slate-500">Total Staff</div>
                                <div class="mt-1.5 text-2xl font-medium">{{ data.length }}</div>
                            </div>
                            <div
                                class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                <div class="text-base text-slate-500">Teachers</div>
                                <div class="mt-1.5 text-2xl font-medium">{{ data.length }}</div>
                            </div>
                            <div
                                class="col-span-4 md:col-span-2 xl:col-span-1 p-5 border border-dashed rounded-[0.6rem] border-slate-300/80 box shadow-sm">
                                <div class="text-base text-slate-500">Absent Staff</div>
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
                    <div class="flex flex-col box box--stacked">
                        <div class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2">
                            <div>
                                <div class="relative">
                                    <Lucide icon="Search"
                                        class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500" />

                                    <FormInput type="text" placeholder="Search..." v-model="search" @input="onSearch"
                                        class="pl-9 sm:w-64 rounded-[0.5rem]" />
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 sm:ml-auto">
                                <Menu>
                                    <Menu.Button :as="Button" variant="outline-secondary" class="w-full sm:w-auto">
                                        <Lucide icon="Download" class="stroke-[1.3] w-4 h-4 mr-2" />
                                        Export
                                        <Lucide icon="ChevronDown" class="stroke-[1.3] w-4 h-4 ml-2" />
                                    </Menu.Button>
                                    <Menu.Items class="w-40">
                                        <Menu.Item @click="exportData('xls')">
                                            <Lucide icon="FileBarChart" class="w-4 h-4 mr-2" />
                                            XLS
                                        </Menu.Item>
                                        <Menu.Item @click="exportData('pdf')">
                                            <Lucide icon="FileBarChart" class="w-4 h-4 mr-2" />
                                            PDF
                                        </Menu.Item>
                                        <Menu.Item @click="exportData('csv')">
                                            <Lucide icon="FileBarChart" class="w-4 h-4 mr-2" />
                                            CSV
                                        </Menu.Item>
                                    </Menu.Items>
                                </Menu>
                                <Popover class="inline-block" v-slot="{ close }">
                                    <Popover.Button :as="Button" variant="outline-secondary" class="w-full sm:w-auto">
                                        <Lucide icon="ArrowDownWideNarrow" class="stroke-[1.3] w-4 h-4 mr-2" />
                                        Filter
                                        <div
                                            class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full bg-slate-100 dark:bg-darkmode-400">
                                            3
                                        </div>
                                    </Popover.Button>
                                    <Popover.Panel placement="bottom-end">
                                        <div class="p-2">
                                            <div>
                                                <div class="text-left text-slate-500">Role</div>
                                                <!-- <FormSelect class="flex-1 mt-2">
                                        <template v-for="(faker, fakerKey) in _.take(
                                            users.fakeUsers(),
                                            5
                                        )" :key="fakerKey">
                                            <option :value="faker.position">
                                                {{ faker.position }}
                                            </option>
                                        </template>
</FormSelect> -->
                                            </div>
                                            <div class="mt-3">
                                                <div class="text-left text-slate-500">Is Verified</div>
                                                <FormSelect class="flex-1 mt-2">
                                                    <option :value=1>
                                                        Verified
                                                    </option>
                                                    <option :value=0>
                                                        Un-verified
                                                    </option>
                                                </FormSelect>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <Button variant="secondary" @click="
                                                    () => {
                                                        close();
                                                    }
                                                " class="w-32 ml-auto">
                                                    Close
                                                </Button>
                                                <Button variant="primary" class="w-32 ml-2">
                                                    Apply
                                                </Button>
                                            </div>
                                        </div>
                                    </Popover.Panel>
                                </Popover>
                            </div>
                        </div>
                        <div class="overflow-auto xl:overflow-visible">
                            <Table class="border-b border-slate-200/60">
                                <Table.Thead>
                                    <Table.Tr>
                                        <Table.Td
                                            class="w-5 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400">
                                            <FormCheck.Input type="checkbox" v-model="checkAll"
                                                @change="toggleCheckAll" />
                                        </Table.Td>
                                        <Table.Td @click="() => sortBy('name')"
                                            class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Name
                                            <span v-if="sort.key === 'name'">
                                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                            </span>
                                        </Table.Td>
                                        <Table.Td
                                            class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Contact
                                        </Table.Td>
                                        <Table.Td @click="() => sortBy('designation')"
                                            class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Designation
                                            <span v-if="sort.key === 'designation'">
                                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                            </span>
                                        </Table.Td>
                                        <Table.Td @click="() => sortBy('gender')"
                                            class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Gender
                                            <span v-if="sort.key === 'gender'">
                                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                            </span>
                                        </Table.Td>
                                        <Table.Td @click="() => sortBy('is_verified')"
                                            class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Is Verified
                                            <span v-if="sort.key === 'is_verified'">
                                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                            </span>
                                        </Table.Td>
                                        <Table.Td @click="() => sortBy('date_of_joining')"
                                            class="py-4 font-medium border-t w-52 bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                            Joining Date
                                            <span v-if="sort.key === 'date_of_joining'">
                                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                            </span>
                                        </Table.Td>
                                        <Table.Td
                                            class="w-20 py-4 font-medium text-center border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400">
                                            Action
                                        </Table.Td>
                                    </Table.Tr>
                                </Table.Thead>
                                <Table.Tbody>
                                    <template v-for="row in data" :key="row.id">
                                        <Table.Tr class="[&_td]:last:border-b-0">

                                            <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                                                <FormCheck.Input type="checkbox" :value="row.id"
                                                    v-model="selectedRows" />
                                            </Table.Td>
                                            <Table.Td class="py-4 border-dashed w-80 dark:bg-darkmode-600">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 image-fit zoom-in">
                                                        <Tippy as="img" :alt="row.name"
                                                            class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                                            :src="row.avatar" :content="row.name" />
                                                    </div>
                                                    <div class="ml-3.5">
                                                        <a href="#" class="font-medium whitespace-nowrap"
                                                            @click="view(row)">
                                                            {{ row.name }}
                                                        </a>
                                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                                            <a :href="'mailto:' + row.email"
                                                                class="font-medium whitespace-nowrap">
                                                                {{ row.email }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </Table.Td>
                                            <Table.Td
                                                class="py-4 font-medium border-t  border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                                {{ row.mobile }}
                                            </Table.Td>
                                            <Table.Td
                                                class="py-4 font-medium border-t  border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                                <div class="font-medium whitespace-nowrap">
                                                    {{ row.designation }}
                                                </div>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                                    {{ row.qualification }}
                                                </div>

                                            </Table.Td>

                                            <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                                                {{ row['gender_name'] }}
                                            </Table.Td>
                                            <Table.Td
                                                class="py-4 font-medium border-t  border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer">
                                                <div :class="[
                                                    'flex items-center',
                                                    ['text-success', 'text-danger'][row['is_verified'] === true ? 0 : 1],
                                                ]">
                                                    <Lucide icon="Database" class="w-3.5 h-3.5 stroke-[1.7]" />
                                                    <div class="ml-1.5 whitespace-nowrap">
                                                        {{ row['is_verified'] === true ? 'Verified' : 'Not verified' }}
                                                    </div>
                                                </div>

                                            </Table.Td>
                                            <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                                                {{ row['date_of_joining'] }}
                                            </Table.Td>
                                            <Table.Td class="relative py-4 border-dashed dark:bg-darkmode-600">
                                                <div class="flex items-center justify-center">
                                                    <Menu class="h-5">
                                                        <Menu.Button class="w-5 h-5 text-slate-500">
                                                            <Lucide icon="MoreVertical"
                                                                class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70" />
                                                        </Menu.Button>
                                                        <Menu.Items class="w-40">
                                                            <Menu.Item @click="() => view(row)">
                                                                <Lucide icon="EyeIcon" class="w-4 h-4 mr-2" />
                                                                View
                                                            </Menu.Item>
                                                            <Menu.Item @click="() => edit(row)">
                                                                <Lucide icon="CheckSquare" class="w-4 h-4 mr-2" />
                                                                Edit
                                                            </Menu.Item>
                                                            <Menu.Item class="text-danger"
                                                                @click="() => handleDelete(row)">
                                                                <Lucide icon="Trash2" class="w-4 h-4 mr-2" />
                                                                Delete
                                                            </Menu.Item>
                                                        </Menu.Items>
                                                    </Menu>
                                                </div>
                                            </Table.Td>
                                        </Table.Tr>
                                    </template>
                                </Table.Tbody>
                            </Table>
                        </div>
                        <div class="flex flex-col-reverse flex-wrap items-center p-5 flex-reverse gap-y-2 sm:flex-row">
                            <Pagination class="flex-1 w-full mr-auto sm:w-auto">
                                <Pagination.Link @click="prevPage" :disabled="pagination.page === 1">
                                    <Lucide icon="ChevronsLeft" class="w-4 h-4" />
                                </Pagination.Link>
                                <Pagination.Link @click="prevPage" :disabled="pagination.page === 1">
                                    <Lucide icon="ChevronLeft" class="w-4 h-4" />
                                </Pagination.Link>
                                <Pagination.Link>Page {{ pagination.page }} of {{ pagination.total }}</Pagination.Link>
                                <Pagination.Link @click="nextPage" :disabled="pagination.page === pagination.total">
                                    <Lucide icon="ChevronRight" class="w-4 h-4" />
                                </Pagination.Link>
                                <Pagination.Link @click="nextPage" :disabled="pagination.page === pagination.total">
                                    <Lucide icon="ChevronsRight" class="w-4 h-4" />
                                </Pagination.Link>
                            </Pagination>
                            <FormSelect class="sm:w-20 rounded-[0.5rem]" id="perPage" v-model="pagination.perPage"
                                @change="onPerPageChange">

                                <option v-for="option in [5, 10, 25, 50, 100]" :key="option" :value="option">
                                    {{ option }}
                                </option>
                            </FormSelect>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </template>
    <template v-else>
        <router-view></router-view>
    </template>
</template>
