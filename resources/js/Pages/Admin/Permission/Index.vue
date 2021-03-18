<template>
    <app-layout>
        <template #header>
            <breadcrumb :items="breadcrumbs"/>            
        </template>

        <container>
            <card>
                <button-with-href class="mt-4" :href="route('admin.permissions.create')">Create Permission</button-with-href>
                <responsive-table :headers = "headers">
                    <tr v-for="permission in permissions.data" :key="permission.id">
                        <td class="p-4">{{permission.name}}</td>
                        <td class="p-4">{{permission.guard_name}}</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2 justify-end">
                                <edit-btn :url="route('admin.permissions.edit', {permission: permission.id})"/>
                                <delete-btn :url="route('admin.permissions.destroy', {permission: permission.id})" 
                                module-name="Permission"/>
                            </div>
                        </td>
                    </tr>
                </responsive-table>
                
                <div class="p-4">
                    <simple-pagination :prev-url="permissions.links.prev" :next-url="permissions.links.next" />
                </div>
            </card>
        </container>
    </app-layout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout'
    import EditBtn from '@/Components/EditBtn'
    import DeleteBtn from '@/Components/DeleteBtn'
    import SimplePagination from '@/Components/SimplePagination'
    import ResponsiveTable from '@/Components/ResponsiveTable'
    import ButtonWithHref from '@/Components/ButtonWithHref'
    import Container from '@/Components/Container'
    import Card from '@/Components/Card'
    import Breadcrumb from '@/Components/Breadcrumb'
    
    export default {
        components: {
            AppLayout,
            EditBtn,
            DeleteBtn,
            SimplePagination,
            ResponsiveTable,
            ButtonWithHref,
            Container,
            Card,
            Breadcrumb,
        },

        computed: {
            headers() {
                return [
                    {
                        name: "Name",
                    },
                    {
                        name: "Guard Name",
                    },
                    {
                        name: "Action",
                        class: "text-right",
                    }
                ];
            },
            
            breadcrumbs()
            {
                return [
                    {
                        label: "Permissions",
                    }
                ];
            }
        },
       
        props: {
            permissions: Object
        }
    }
</script>