<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <DataTable
      apiUrl="http://127.0.0.1:8000/api/v1/users"
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
      @view="handleView"
      @edit="handleEdit"
      @delete="handleDelete"
    />
  </div>
</template>

<script setup lang="ts">
import DataTable from "@/custom_components/DataTable/UserTable.vue";

function handleView(row: any) {
  alert(`Viewing: ${JSON.stringify(row)}`)
}

function handleEdit(row: any) {
  alert(`Editing: ${JSON.stringify(row)}`)
}

function handleDelete(row: any) {
  if (confirm(`Are you sure you want to delete user ${row.name}?`)) {
    // call API to delete
    alert(`Deleted user: ${row.id}`)
  }
}
</script>
