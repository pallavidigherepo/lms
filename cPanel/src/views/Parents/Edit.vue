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
import { required, email, helpers, minLength, numeric} from "@vuelidate/validators";
import store from "@/stores/index.js";
import { useRouter, useRoute } from "vue-router";
import { ref, reactive, computed, onMounted } from "vue";
import _ from "lodash";
// import {useI18n} from "vue-i18n";
import axiosClient from "@/axios";

const submitted = ref(false);

const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);

const route = useRoute();
const router = useRouter();
// Now we must get editing details for the selected item
// const {t} = useI18n();
const user = ref({
    id: route.params.id,
    name: "",
    email: "",
    mobile: "",
    designation: "",
});

const fetch = async () => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        //const result = await store.dispatch('roles/edit', id);

        const result = await axiosClient.get(`/users/${id}/edit`);
        if (result.status != 200) {
            const error = new Error('Failed to fetch roles')
            throw error;
        }
        user.value = JSON.parse(JSON.stringify(result.data));
    } catch (e) {
        isErrored.value = true;
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};


const rules = computed(() => {
    return {
        name: {
            required: helpers.withMessage("Please enter name of user.", required),
        },
        email: {
            required: helpers.withMessage("Please enter email address.", required),
            email: helpers.withMessage("Please enter valid email address", email),
        },
        mobile: {
            required: helpers.withMessage("Please enter mobile number.", required),
            minLength: helpers.withMessage("Please enter valid mobile number", minLength(10)),
            numeric: helpers.withMessage("Please enter valid mobile number", numeric),
        },
        designation: {
            required: helpers.withMessage("Please select role of user.", required),
        }
    };
});

const v$ = useVuelidate(rules, user);

async function submitForm() {
    submitted.value = true;
    v$.value.$validate(); // checks all inputs

    if (!v$.value.$error) {
        isLoading.value = true;
        await store
            .dispatch("users/save", user.value)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                isErrored.value = false;
                router.push({name: "Users"});
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
        return;
    }
}

onMounted(() => {
    fetch();
    store.dispatch("users/role_list");
});

const roles = computed(() => store.getters["users/roleList"]);
</script>

<template>
    <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Create Parents
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
                        <h2 class="text-lg font-medium mr-auto">Edit User</h2>
                        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                            <Button
                                variant="primary"
                                class="
                                        box
                                        mr-2
                                        flex
                                        items-center
                                        ml-auto
                                        sm:ml-0
                                    "
                                @click="router.push('/users')"
                            ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
                            </Button>
                        </div>
                    </div>
                    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="intro-y box col-span-12 lg:col-span-12">
                            <div class="p-5">
                                <div
                                    class="alert alert-danger show flex items-center mb-2"
                                    role="alert"
                                    v-if="isErrored"
                                >
                                    <AlertOctagonIcon class="w-6 h-6 mr-2"/>
                                    {{ message }}
                                </div>
                                <form @submit.prevent="submitForm" class="validate-form">
                                    <div>
                                        <FormLabel for="form-name" class="form-label">Name"</FormLabel>
                                        <FormInput
                                            id="form-name"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter name of user."
                                            v-model.trim="user.name"
                                            :class="{
                            'border-danger': submitted && v$.name.$errors.length,
                            }"
                                        />
                                        <div
                                            class="text-danger mt-2"
                                            v-for="(error, index) of v$.name.$errors"
                                            :key="index"
                                        >
                                            <div class="error-msg">{{ error.$message }}</div>
                                        </div>
                                        <!--<span v-if="submitted && v$.name.$error" class="text-theme-21 mt-2">
                                                        {{ v$.name.$errors[0].$message }}
                                                    </span>-->
                                    </div>
                                    <div class="mt-3">
                                        <FormLabel for="form-email" class="form-label">Email</FormLabel>

                                        <FormInput
                                            id="form-email"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter email."
                                            v-model.trim="user.email"
                                            :class="{
                            'border-danger': submitted && v$.email.$errors.length,
                            }"
                                        />
                                        <div
                                            class="text-danger mt-2"
                                            v-for="(error, index) of v$.email.$errors"
                                            :key="index"
                                        >
                                            <div class="error-msg">{{ error.$message }}</div>
                                        </div>
                                        <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                                        {{ v$.users.$errors[0].$message }}
                                                    </span>-->
                                    </div>
                                    <div class="mt-3">
                                        <FormLabel for="form-mobile-number" class="form-label">Mobile Number</FormLabel>

                                        <FormInput
                                            id="form-mobile-number"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter mobile number."
                                            v-model.trim="user.mobile"
                                            :class="{
                            'border-danger': submitted && v$.mobile.$errors.length,
                            }"
                                        />
                                        <div
                                            class="text-danger mt-2"
                                            v-for="(error, index) of v$.mobile.$errors"
                                            :key="index"
                                        >
                                            <div class="error-msg">{{ error.$message }}</div>
                                        </div>
                                        <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                                        {{ v$.users.$errors[0].$message }}
                                                    </span>-->
                                    </div>
                                    <div class="mt-3">
                                        <FormLabel for="form-role" class="form-label"
                                        >Role
                                        </FormLabel>
                                        <div class="mt-2">
                                            <TomSelect
                                                v-model="user.designation"
                                                :options="{
                                                            placeholder: 'Select role',
                                                            allowEmptyOption: true
                                                            }"
                                                class="w-full"
                                                :class="{
                                                            'border-danger': submitted && v$.designation.$errors.length,
                                                        }"
                                            >
                                                <option value="">Select Role</option>
                                                <option
                                                    :value="role.id"
                                                    v-for="(role, index) in roles"
                                                    :key="index"
                                                >
                                                    {{ role }}
                                                </option>
                                            </TomSelect>
                                        </div>
                                        <div
                                            class="text-danger mt-2"
                                            v-for="(error, index) of v$.designation.$errors"
                                            :key="index"
                                        >
                                            <div class="error-msg">{{ error.$message }}</div>
                                        </div>
                                        <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                                        {{ v$.users.$errors[0].$message }}
                                                    </span>-->
                                    </div>
                                    <!-- BEGIN: Slide Over Footer -->

                                    <div class="text-right w-full bottom-0 mt-5">
                                        <Button
                                                variant="secondary"
                                                    class="btn btn-outline-secondary w-20 mr-1"
                                                    @click="router.push('/users')"
                                                    
                                                >
                                                Cancel
                                        </Button>
                                        <Button variant="primary" class="btn btn-primary w-20" type="submit">
                                            Save
                                        </Button>
                                    </div>
                                    <!-- END: Slide Over Footer -->
                                </form>
                            </div>
                            <!-- BEGIN: Post Content -->
                        </div>
                        <!-- END: Post Content -->
                    </div>
                    <Loading v-if="isLoading" fixed></Loading>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</template>

<style scoped>
</style>
