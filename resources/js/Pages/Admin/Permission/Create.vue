<template>
    <app-layout>
        <template #header>
            <breadcrumb :items="breadcrumbs"/>
        </template>

        <container>
            <card>
                <create-form @submitted="savePermission">
                        
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" autofocus />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                            <div class="text-sm inline-flex items-center text-gray-500 mt-2">
                                Please add permission in model-action format. 
                                <br />
                                Example: user-create
                            </div>
                        </div>
                        
                    </template>
                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>
                
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </jet-button>
                    </template>
                </create-form>
            </card>
        </container>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import CreateForm from '@/Components/CreateForm'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import Container from '@/Components/Container'
    import Card from '@/Components/Card'
    import Breadcrumb from '@/Components/Breadcrumb'

    export default {
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            CreateForm,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            Container,
            Card,
            Breadcrumb,
        },
       
        props: {
            edit: Boolean,
            permission: Object
            },

        data() {
            return {
                form: this.$inertia.form({
                    _method: this.edit ? 'PUT' : 'POST',
                    name: this.permission.name,
                }),
            }
        },

        computed: {
            breadcrumbs()
            {
                return [
                    {
                        label: "Permissions",
                        url: route('admin.permissions.index')
                    },
                    
                    {
                        label: `${this.edit ? "Edit" : "Create"}` + " Permission",
                    }
                ];
            }
        },


        methods: {
            savePermission() {
                this.edit ? this.form.put(route('admin.permissions.update', {id: this.permission.data.id})):
                this.form.post(route('admin.permissions.store'), {
                    errorBag: 'savePermission',
                    preserveScroll: true
                });
            },
        },

        mounted() {
            if (this.edit) {
                this.form.name = this.permission.data.name;
            }
        }
    }
</script>
