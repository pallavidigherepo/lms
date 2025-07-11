<script lang="ts" setup>
import { ref, watch, computed } from 'vue'
import axiosClient from '@/axios'
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import Pagination from "@/components/Base/Pagination";
import { FormCheck, FormInput, FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import Button from "@/components/Base/Button";
import Table from "@/components/Base/Table";
import _ from "lodash";

import { utils, writeFile } from 'xlsx'
import jsPDF from 'jspdf'
import autoTable from 'jspdf-autotable'

interface Column {
  key: string
  label: string
  show?: boolean // Optional property to control visibility
}

interface FilterOption {
  key: string
  label: string
  options: string[]
}

interface Props {
  apiUrl: string
  columns: Column[]
  filters?: FilterOption[]
}

const props = defineProps<Props>()
const emit = defineEmits(['view', 'edit', 'delete'])

const data = ref<any[]>([])
const search = ref('')
const sort = ref({ key: '', order: 'asc' })
const pagination = ref({ page: 1, perPage: 10, total: 0 })
const activeFilters = ref<Record<string, string>>({})
const selectedRows = ref<number[]>([])
const checkAll = ref(false)

const totalPages = computed(() => Math.ceil(pagination.value.total / pagination.value.perPage))

const fetchData = async () => {
  const params: Record<string, any> = {
    page: pagination.value.page,
    per_page: pagination.value.perPage,
    search: search.value,
    sort_by: sort.value.key,
    sort_order: sort.value.order,
    ...activeFilters.value,
  }

  const response = await axiosClient.get(props.apiUrl, { params })
  data.value = response.data.data
  pagination.value.total = response.data.total
  syncCheckState()
}

/**
 * Sorts the data based on the specified key. If the current sort key is the same 
 * as the specified key, the sort order is toggled between ascending and descending. 
 * Otherwise, the sort key is updated to the specified key and the order is set to ascending.
 * After updating the sort criteria, it fetches the data accordingly.
 *
 * @param {string} key - The key to sort the data by.
 */

const sortBy = (key: string) => {
  if (sort.value.key === key) {
    sort.value.order = sort.value.order === 'asc' ? 'desc' : 'asc'
  } else {
    sort.value.key = key
    sort.value.order = 'asc'
  }
  fetchData()
}

const onSearch = () => {
  pagination.value.page = 1
  fetchData()
}

const onFilterChange = () => {
  pagination.value.page = 1
  fetchData()
}

const prevPage = () => {
  if (pagination.value.page > 1) {
    pagination.value.page--
    fetchData()
  }
}

const nextPage = () => {
  if (pagination.value.page < totalPages.value) {
    pagination.value.page++
    fetchData()
  }
}

const toggleStatus = async (row: any) => {
  const newStatus = row.status === 'verified' ? 'unverified' : 'verified'
  try {
    await axiosClient.patch(`${props.apiUrl}/${row.id}/status`, { status: newStatus })
    fetchData()
  } catch (err) {
    console.error('Failed to toggle status:', err)
  }
}

const calculateProfileCompletion = (row: any): number => {
  const fields = ['name', 'email', 'role', 'status']
  const filled = fields.filter(field => row[field] && row[field].toString().trim() !== '').length
  return Math.round((filled / fields.length) * 100)
}

const toggleCheckAll = () => {
  if (checkAll.value) {
    selectedRows.value = data.value.map(row => row.id)
  } else {
    selectedRows.value = []
  }
}

const syncCheckState = () => {
  checkAll.value = data.value.length > 0 && data.value.every(row => selectedRows.value.includes(row.id))
}

const deleteSelected = async () => {
  if (confirm('Are you sure you want to delete the selected items?')) {
    try {
      await axiosClient.post(`${props.apiUrl}/bulk-delete`, { ids: selectedRows.value })
      selectedRows.value = []
      fetchData()
    } catch (err) {
      console.error('Bulk delete failed:', err)
    }
  }
}

const exportData = (format: 'csv' | 'xls' | 'pdf') => {
  const headers = props.columns.map(col => col.label)
  const rows = data.value.map(row => props.columns.map(col => row[col.key]))

  if (format === 'csv' || format === 'xls') {
    const worksheet = utils.aoa_to_sheet([headers, ...rows])
    const workbook = utils.book_new()
    utils.book_append_sheet(workbook, worksheet, 'Data')
    writeFile(workbook, `table_export.${format === 'csv' ? 'csv' : 'xlsx'}`)
  } else if (format === 'pdf') {
    const doc = new jsPDF()
    autoTable(doc, { head: [headers], body: rows })
    doc.save('table_export.pdf')
  }
}

const onPerPageChange = () => {
  pagination.value.page = 1
  fetchData()
}

watch(
  () => props.filters,
  (newFilters) => {
    if (newFilters) {
      for (const filter of newFilters) {
        activeFilters.value[filter.key] = ''
      }
    }
  },
  { immediate: true }
)

watch(() => [props.apiUrl], fetchData, { immediate: true })
</script>

<template>
    <div class="flex flex-col gap-8 mt-3.5">
        <slot name="TableListHeader"></slot>
        
        <div class="flex flex-col box box--stacked">
            <div class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2">
                <div>
                    <div class="relative">
                        <Lucide icon="Search"
                            class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500" />
                            
                        <FormInput type="text" 
                                    placeholder="Search..." 
                                    v-model="search"
                                    @input="onSearch"
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
                                    <div class="text-left text-slate-500">Position</div>
                                    <FormSelect class="flex-1 mt-2">
                                        <template v-for="(faker, fakerKey) in _.take(
                                            users.fakeUsers(),
                                            5
                                        )" :key="fakerKey">
                                            <option :value="faker.position">
                                                {{ faker.position }}
                                            </option>
                                        </template>
                                    </FormSelect>
                                </div>
                                <div class="mt-3">
                                    <div class="text-left text-slate-500">Department</div>
                                    <FormSelect class="flex-1 mt-2">
                                        <template v-for="(faker, fakerKey) in _.take(
                                            users.fakeUsers(),
                                            5
                                        )" :key="fakerKey">
                                            <option :value="faker.department">
                                                {{ faker.department }}
                                            </option>
                                        </template>
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
                            <Table.Td class="w-5 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400">
                                <FormCheck.Input type="checkbox" v-model="checkAll" @change="toggleCheckAll" />
                            </Table.Td>
                            <Table.Td
                                v-for="column in columns"
                                :key="column.key"
                                @click="() => sortBy(column.key)"
                                class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400 cursor-pointer"
                            >
                                {{ column.label }}
                                <span v-if="sort.key === column.key">
                                {{ sort.order === 'asc' ? '↑' : '↓' }}
                                </span>
                            </Table.Td>
                            <Table.Td 
                                class="py-4 font-medium border-t w-52 bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400">
                                Profile Completeness
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
                                <FormCheck.Input 
                                    type="checkbox" 
                                    :value="row.id"
                                    v-model="selectedRows" />
                            </Table.Td>
                            <Table.Td v-for="column in columns" :key="column.key" class="py-4 border-dashed w-80 dark:bg-darkmode-600">
                              <template v-if="column.key === 'name'">
                                <div class="flex items-center">
                                    <div class="w-9 h-9 image-fit zoom-in">
                                        <Tippy as="img" :alt="row.name"
                                            class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                            :src="row.avatar" :content="row.name" />
                                    </div>
                                    <div class="ml-3.5">
                                        <a href="" class="font-medium whitespace-nowrap">
                                            {{ row.name }}
                                        </a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                            {{ row.email }}
                                        </div>
                                    </div>
                                </div>
                              </template>  
                              
                              <template v-else-if="(column.key === 'role' || column.key === 'qualification' || column.show === false)">
                                  <div class="font-medium whitespace-nowrap">
                                      {{ row.designation }} 
                                  </div>
                                  <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                      {{ row.qualification }}
                                  </div>
                              </template>
                              <template v-else-if="column.key === 'status'">
                                <div :class="[
                                        'flex items-center',
                                        ['text-success', 'text-danger'][row[column.key] === 'is_verified' ? 0 : 1],
                                    ]">
                                    <Lucide icon="Database" class="w-3.5 h-3.5 stroke-[1.7]" />
                                    <div class="ml-1.5 whitespace-nowrap">
                                        {{ row[column.key] === 'is_verified' ? 'Verified' : 'Unverified' }}
                                    </div>
                                </div>
                              </template>
                              <template v-else>
                                {{ row[column.key] }}
                              </template>
                            </Table.Td>
                            <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                                <div class="w-40">
                                    <div class="text-xs text-slate-500">
                                        {{ calculateProfileCompletion(row) }}%
                                    </div>
                                    <div class="flex h-1 border rounded-sm bg-slate-50 mt-1.5">
                                        <div :class="[
                                            'first:rounded-l-sm last:rounded-r-sm border border-primary/20 -m-px bg-primary/40',
                                            [
                                                'w-[35%]',
                                                'w-[45%]',
                                                'w-[55%]',
                                                'w-[65%]',
                                                'w-[75%]',
                                            ][calculateProfileCompletion(row)],
                                        ]"></div>
                                    </div>
                                </div>
                            </Table.Td>
                            <Table.Td class="relative py-4 border-dashed dark:bg-darkmode-600">
                                <div class="flex items-center justify-center">
                                    <Menu class="h-5">
                                        <Menu.Button class="w-5 h-5 text-slate-500">
                                            <Lucide icon="MoreVertical"
                                                class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70" />
                                        </Menu.Button>
                                        <Menu.Items class="w-40">
                                            <Menu.Item @click="() => emit('view', row)">
                                                <Lucide icon="CheckSquare" class="w-4 h-4 mr-2" />
                                                View
                                            </Menu.Item>
                                            <Menu.Item @click="() => emit('edit', row)">
                                                <Lucide icon="CheckSquare" class="w-4 h-4 mr-2" />
                                                Edit
                                            </Menu.Item>
                                            <Menu.Item class="text-danger" @click="() => emit('delete', row)">
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
                    <Pagination.Link @click="nextPage"
                    :disabled="pagination.page === totalPages">
                        <Lucide icon="ChevronLeft" class="w-4 h-4" />
                    </Pagination.Link>
                    <Pagination.Link>Page {{ pagination.page }} of {{ totalPages }}</Pagination.Link>
                    
                    <Pagination.Link>
                        <Lucide icon="ChevronRight" class="w-4 h-4" />
                    </Pagination.Link>
                    <Pagination.Link>
                        <Lucide icon="ChevronsRight" class="w-4 h-4" />
                    </Pagination.Link>
                </Pagination>
                <FormSelect 
                  class="sm:w-20 rounded-[0.5rem]" 
                  id="perPage"
                  v-model="pagination.perPage"
                  @change="onPerPageChange">
                  
                  <option v-for="option in [5, 10, 25, 50, 100]" :key="option" :value="option">
                      {{ option }}
                  </option>
                </FormSelect>
            </div>
        </div>
    </div>
</template>


<style scoped>

</style>