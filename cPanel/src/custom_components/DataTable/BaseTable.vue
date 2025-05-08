<template>
    <div class="p-4">
      <div class="mb-4 flex justify-between items-center gap-4">
        <input
          v-model="search"
          @input="onSearch"
          type="text"
          placeholder="Search..."
          class="border p-2 rounded w-1/3"
        />
        <div class="flex gap-2" v-for="filter in filters" :key="filter.key">
          <label :for="filter.key" class="text-sm">{{ filter.label }}:</label>
          <select
            :id="filter.key"
            v-model="activeFilters[filter.key]"
            @change="onFilterChange"
            class="border p-1 rounded"
          >
            <option value="">All</option>
            <option v-for="option in filter.options" :key="option" :value="option">
              {{ option }}
            </option>
          </select>
        </div>
      </div>
      <table class="min-w-full bg-white border">
        <thead>
          <tr>
            <th
              v-for="column in columns"
              :key="column.key"
              @click="() => sortBy(column.key)"
              class="p-2 border cursor-pointer"
            >
              {{ column.label }}
              <span v-if="sort.key === column.key">
                {{ sort.order === 'asc' ? '↑' : '↓' }}
              </span>
            </th>
            <th class="p-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in data" :key="row.id">
            <td v-for="column in columns" :key="column.key" class="p-2 border">
              <span v-if="column.key === 'status'">
                <a
                  href="#"
                  @click.prevent="() => toggleStatus(row)"
                  class="text-blue-600 hover:underline"
                >
                  {{ row[column.key] === 'verified' ? 'Verified' : 'Unverified' }}
                </a>
              </span>
              <span v-else>
                {{ row[column.key] }}
              </span>
            </td>
            <td class="p-2 border text-center space-x-2">
              <button @click="() => emit('view', row)" class="text-blue-500 hover:underline">View</button>
              <button @click="() => emit('edit', row)" class="text-yellow-500 hover:underline">Edit</button>
              <button @click="() => emit('delete', row)" class="text-red-500 hover:underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="mt-4 flex justify-between items-center">
        <button @click="prevPage" :disabled="pagination.page === 1" class="p-2 border rounded">
          Previous
        </button>
        <span>Page {{ pagination.page }} of {{ totalPages }}</span>
        <button
          @click="nextPage"
          :disabled="pagination.page === totalPages"
          class="p-2 border rounded"
        >
          Next
        </button>
      </div>
    </div>
  </template>
  
  <script lang="ts" setup>
  import { ref, watch, computed } from 'vue'
  import axiosClient from '@/axios'
  
  interface Column {
    key: string
    label: string
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
      await axios.patch(`${props.apiUrl}/${row.id}/status`, { status: newStatus })
      fetchData()
    } catch (err) {
      console.error('Failed to toggle status:', err)
    }
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
  
  <style scoped>
  input:focus, select:focus {
    outline: none;
    border-color: #3b82f6;
  }
  </style>