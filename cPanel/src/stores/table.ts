import { defineStore } from 'pinia'
import { ref, computed, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axiosClient from '@/axios'
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

interface SubPagesOptions {
  view: { name: string; path: string }
  edit: { name: string; path: string }
  create: { name: string; path: string }
}

export const useTableStore = defineStore('table', () => {
  const route = useRoute()
  const router = useRouter();

  // --- Reactive State ---
  const data = ref<any[]>([])
  const search = ref('')
  const sort = ref<SortOption>({ key: '', order: 'desc' })
  const pagination = ref<Pagination>({ page: 1, perPage: 10, total: 0 })
  const selectedRows = ref<number[]>([])
  const checkAll = ref(false)
  const activeFilters = ref<Record<string, string>>({})
  const columns = ref<Column[]>([])
  const filters = ref<FilterOption[]>([])
  const apiUrl = ref('')
  const listing = ref(true)
  const listingView = ref<string[]>([])

  const subPages = ref<SubPagesOptions>({
    view: { name: '', path: '' },
    edit: { name: '', path: '' },
    create: { name: '', path: '' },
  })

  const totalPages = computed(() => pagination.value.total)

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

    activeFilters.value = Object.fromEntries(
      tableFilters.map(filter => [filter.key, ''])
    )
  }

  const setSubPages = (pages: SubPagesOptions) => {
    subPages.value = pages
  }

  const setListingView = (pages: string[]) => {
    listingView.value = pages
  }

  // --- Data Fetching ---
  const fetchData = async () => {
    if (!apiUrl.value) return

    const params = {
      page: pagination.value.page,
      per_page: pagination.value.perPage,
      search: search.value,
      sort_by: sort.value.key,
      sort_order: sort.value.order,
      ...activeFilters.value,
    }

    const { data: res } = await axiosClient.get(apiUrl.value, { params })
    data.value = res.data
    pagination.value.total = res.meta.last_page
    syncCheckState()
    listing.value = !subPages.value || !Object.values(subPages.value).some(p => p.name === route.name)
  }

  // --- Table Actions ---
  const sortBy = (key: string) => {
    sort.value.order = sort.value.key === key && sort.value.order === 'asc' ? 'desc' : 'asc'
    sort.value.key = key
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

  const nextPage = () => {
    if (pagination.value.page < pagination.value.total) {
      pagination.value.page++
      fetchData()
    }
  }

  const prevPage = () => {
    if (pagination.value.page > 1) {
      pagination.value.page--
      fetchData()
    }
  }

  // --- Row Operations ---
  const toggleStatus = async (row: any) => {
    const newStatus = row.status === 'verified' ? 'unverified' : 'verified'
    await axiosClient.patch(`${apiUrl.value}/${row.id}/status`, { status: newStatus })
    fetchData()
  }

  const calculateProfileCompletion = (row: any): number => {
    const fields = ['name', 'email', 'role', 'status']
    const filled = fields.filter(field => !!row[field]?.toString().trim()).length
    return Math.round((filled / fields.length) * 100)
  }

  const toggleCheckAll = () => {
    selectedRows.value = checkAll.value ? data.value.map(row => row.id) : []
  }

  const syncCheckState = () => {
    checkAll.value = data.value.length > 0 && data.value.every(row => selectedRows.value.includes(row.id))
  }

  const deleteSelected = async () => {
    if (!confirm('Are you sure you want to delete selected items?')) return
    await axiosClient.post(`${apiUrl.value}/bulk-delete`, { ids: selectedRows.value })
    selectedRows.value = []
    fetchData()
  }

  // --- Export ---
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

  // --- Navigation (customize later) ---
  const view = (row: any) => {
    router.push({
      name: subPages.value.view.name,
      params: { id: row.id },
    })
  }
  const edit = (row: any) => {
    router.push({
      name: subPages.value.edit.name,
      params: { id: row.id },
    })
  }
  const handleDelete = (row: any) => {
    if (confirm(`Delete user ${row.name}?`)) {
      alert(`Deleted user ID: ${row.id}`)
    }
  }

  // --- Watchers ---
  watch(() => filters.value, newFilters => {
    activeFilters.value = Object.fromEntries(
      newFilters.map(filter => [filter.key, ''])
    )
  }, { immediate: true })

  watch(() => route.name, name => {
    listing.value = listingView.value.includes(String(name))
  })

  watch(apiUrl, fetchData, { immediate: true })
  watch(selectedRows, syncCheckState, { immediate: true })

  return {
    // state
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

    // setup
    setupTable,
    setSubPages,
    setListingView,

    // actions
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
// This store manages the table state, including data fetching, sorting, filtering, pagination, and row operations.
// It provides methods to set up the table, handle actions like sorting and searching, and manage row selections.
// The store can be used in any Vue component to easily manage table data and interactions.