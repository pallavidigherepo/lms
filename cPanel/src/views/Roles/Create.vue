<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { ClassicEditor } from "@/components/Base/Ckeditor";
import {
  FormLabel,
  FormCheck,
  FormInput,
  FormInline,
  FormSelect,
  FormSwitch,
  InputGroup,
  FormHelp,
} from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import Button from "@/components/Base/Button";
import Alert from "@/components/Base/Alert";
import LoadingIcon from "@/components/Base/LoadingIcon";
import ThemeSwitcher from "@/components/ThemeSwitcher";
import { useVuelidate } from "@vuelidate/core";
import { required, email, helpers } from "@vuelidate/validators";
import store from "@/stores/index.js";
import { useRouter, useRoute } from "vue-router";
import { ref, reactive, computed, onMounted } from "vue";
import _ from "lodash";
import Editor from "@tinymce/tinymce-vue";

// const { t } = useI18n();
const submitted = ref(false);

const isErrored = ref(false);
const message = ref('');
const isLoading = ref(false);

const route = useRoute();
const router = useRouter();
// Now we must get editing details for the selected item

const role = reactive({
    id: '',
    name: '',
    permissions: [],
});

onMounted(() => {
    store.dispatch('permissions/modules');
});

const listPermissions = computed(() => {
    return store.state.permissions.module_wise_permissions;
});

const rules = computed(() => {
    return {
        name: {
            required: helpers.withMessage('Please enter name of role.', required),
        },
        permissions: {
            required: helpers.withMessage('Please select atleast one perimission.', required)
        }
    }
});

const v$ = useVuelidate (rules, role);

async function submitForm() {
    submitted.value = true;
    v$.value.$validate(); // checks all inputs

    if (!v$.value.$error) {
        isLoading.value = true;
        await store
            .dispatch("roles/save", role)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                router.push({ name: "Roles" });
            })
            .catch((err) => {
                isLoading.value = false;
                isErrored.value = true;
                if (err.response) {
                    message.value = err.response.data.message;
                }

            });
    } else {
        // if ANY fail validation
        return ;
    }
}
</script>
<template>
      <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Create Roles
        </div>
      </div>
      <div class="flex flex-col mt-2">
        <div
          class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7"
        >
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="p-5 border rounded-[0.6rem] border-slate-200/60 dark:border-darkmode-400"
            >
              <!-- <div
                class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400"
              >
                <Lucide icon="ChevronDown" class="w-5 h-5 stroke-[1.3] mr-2" />
                Subject
              </div> -->
              <div>
                    <div class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                        <Lucide icon="ChevronDown" class="w-5 h-5 stroke-[1.3] mr-2" />
                        <h2 class="text-lg font-medium mr-auto">Add Role</h2>
                        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                            <Button  variant="primary"
                                        class="box mr-2 flex items-center ml-auto sm:ml-0"
                                        @click="router.push('/roles')"
                                        ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />
                                        Back
                            </Button>
                        </div>
                    </div>
                    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                    <div class="intro-y box col-span-12 lg:col-span-12">
                        <div class="p-5">
                            <div class="alert alert-danger show flex items-center mb-2" role="alert" v-if="isErrored">
                                <AlertOctagonIcon class="w-6 h-6 mr-2" />
                                {{ message }}
                            </div>
                            <form @submit.prevent = "submitForm" class="validate-form">
                                <div>
                                    <FormLabel for="form-name" class="form-label">Name</FormLabel>
                                    <FormInput id="form-name"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter name of role."
                                            v-model.trim="role.name"
                                            :class="{ 'border-danger': submitted && v$.name.$errors.length }"
                                            />
                                    <div class="text-danger mt-2" v-for="(error, index) of v$.name.$errors" :key="index">
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">

                                    <FormLabel for="form-permission" class="form-label">Permission</FormLabel>
                                        <div
                                        class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200 dark:border-dark-1"
                                        >
                                        <div
                                            class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0"
                                        >
                                            <h2>Select permissions by toggling individual permissions per category</h2>
                                        </div>

                                    </div>
                                    <div class="mt-3 py-2"
                                        v-for="(permission, index) in listPermissions"
                                        :key="index">
                                        <div class="roles">
                                            <FormLabel>{{ index }}</FormLabel>
                                        </div>
                                        <div class="flex flex-col sm:flex-row mt-2">

                                            <div class="form-check mr-2"
                                                v-for="(individualPerms, perIdx) in permission"
                                                :key="perIdx">
                                                <FormCheck.Input :id="individualPerms"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    v-model="role.permissions"
                                                    :value="perIdx"
                                                    :class="{ 'border-danger': submitted && v$.permissions.$errors.length }" />
                                                <FormLabel class="form-check-label" :for="individualPerms">{{ individualPerms }}</FormLabel>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-danger mt-2" v-for="(error, index) of v$.permissions.$errors" :key="index">
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>

                                <div class="text-right w-full bottom-0">
                                    <Button
                                            variant="secondary"
                                            class="btn btn-outline-secondary w-20 mr-1"
                                            @click="router.push('/roles')"
                                                
                                    >
                                    Cancel
                                    </Button>
                                    <Button variant="primary" class="btn btn-primary w-20" type="submit">
                                        Save
                                    </Button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</template>



<style scoped>
.roles {
    float: left;
    width: 18rem;
}

.form-check-FormLabel {
    width: 5rem;
}
</style>
