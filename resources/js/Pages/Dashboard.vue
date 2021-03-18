<template>
    <app-layout>
        <template #header>
            <breadcrumb :items="breadcrumbs"/>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Breadcrumb from '@/Components/Breadcrumb'

    export default {
        components: {
            AppLayout,
            Welcome,
            Breadcrumb,
        },

        computed: {
            breadcrumbs()
            {
                return [                    
                    {
                        label: "Dashboard",
                    }
                ];
            }
        },
    }
</script>
