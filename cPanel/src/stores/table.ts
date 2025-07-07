// stores/useTableStore.ts
import { defineStore } from 'pinia'
import { ref, computed, watch } from 'vue'
import axiosClient from '@/axios' // adjust path as needed
import { useRoute } from 'vue-router'
import { utils, writeFile } from 'xlsx'
import jsPDF from 'jspdf'
import autoTable from 'jspdf-autotable'

interface Column {
  key: string
  label: string
}

interface FilterOption {
  key: string
  label: string
  options: string[]
}

interface SortOption {
  key: string
  order: 'asc' | 'desc'
}

interface Pagination {
  page: number
  perPage: number
  total: number
}

export const useTableStore = defineStore('table', () => {
  // --- State ---
  const route = useRoute()
  const subPages = ref<string[]>([])

  const data = ref<any[]>([])
  const search = ref('')
  const sort = ref<SortOption>({ key: '', order: 'asc' })
  const pagination = ref<Pagination>({ page: 1, perPage: 10, total: 0 })
  const activeFilters = ref<Record<string, string>>({})
  const selectedRows = ref<number[]>([])
  const checkAll = ref(false)
  const apiUrl = ref('')
  const listing = ref(true)

  const columns = ref<Column[]>([])
  const filters = ref<FilterOption[]>([])

  const totalPages = computed(() =>
    Math.ceil(pagination.value.total / pagination.value.perPage)
  )

  // --- Setup ---
  const setupTable = ({
    url,
    tableColumns,
    tableFilters = [],
  }: {
    url: string
    tableColumns: Column[]
    tableFilters?: FilterOption[]
  }) => {
    apiUrl.value = url
    columns.value = tableColumns
    filters.value = tableFilters
    activeFilters.value = {}

    for (const filter of tableFilters) {
      activeFilters.value[filter.key] = ''
    }

    //fetchData()
  }

  const setSubPages = (pages: string[]) => {
    subPages.value = pages
  }
  
  // --- Actions ---
  const fetchData = async () => {
    const params: Record<string, any> = {
      page: pagination.value.page,
      per_page: pagination.value.perPage,
      search: search.value,
      sort_by: sort.value.key,
      sort_order: sort.value.order,
      ...activeFilters.value,
    }
    if (apiUrl.value) {
      const response = await axiosClient.get(apiUrl.value, { params })
      data.value = response.data.data
      pagination.value.total = response.data.total
      syncCheckState()
      listing.value = !subPages.value.includes(String(route.name))
    }
  }

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

  const onPerPageChange = () => {
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
    await axiosClient.patch(`${apiUrl.value}/${row.id}/status`, {
      status: newStatus,
    })
    fetchData()
  }

  const calculateProfileCompletion = (row: any): number => {
    const fields = ['name', 'email', 'role', 'status']
    const filled = fields.filter(
      field => row[field] && row[field].toString().trim() !== ''
    ).length
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
    checkAll.value =
      data.value.length > 0 &&
      data.value.every(row => selectedRows.value.includes(row.id))
  }

  const deleteSelected = async () => {
    if (confirm('Are you sure you want to delete the selected items?')) {
      await axiosClient.post(`${apiUrl.value}/bulk-delete`, {
        ids: selectedRows.value,
      })
      selectedRows.value = []
      fetchData()
    }
  }

  const exportData = (format: 'csv' | 'xls' | 'pdf') => {
    const headers = columns.value.map(col => col.label)
    const rows = data.value.map(row => columns.value.map(col => row[col.key]))

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

  const view = (row: any) => alert(`Viewing: ${JSON.stringify(row)}`)
  const edit = (row: any) => alert(`Editing: ${JSON.stringify(row)}`)
  const handleDelete = (row: any) => {
    if (confirm(`Are you sure you want to delete user ${row.name}?`)) {
      alert(`Deleted user: ${row.id}`)
    }
  }

  // --- Watchers ---
  watch(
    () => filters.value,
    newFilters => {
      for (const filter of newFilters) {
        activeFilters.value[filter.key] = ''
      }
    },
    { immediate: true }
  )

  watch(() => route.name, newVal => {
    if (newVal === 'Users') {
      listing.value = true
    }
  })

  watch(() => apiUrl.value, fetchData, { immediate: true })

  return {
    // State
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
    apiUrl,
    listing,

    // Setup
    setupTable,
    setSubPages,

    // Actions
    fetchData,
    sortBy,
    onSearch,
    onFilterChange,
    prevPage,
    nextPage,
    onPerPageChange,
    toggleStatus,
    calculateProfileCompletion,
    toggleCheckAll,
    syncCheckState,
    deleteSelected,
    exportData,
    view,
    edit,
    handleDelete,
  }
})
