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
const model = reactive({
    id: null,
    client_name: '',
    client_email: '',
    avatar: '',
    address: '',
    website_url: '',
    website_slogan: '',
    client_phone_number: '',
    client_alternate_phone_number: '',
    assigned_subdomain: '',
});

const rules = computed(() => {
    return {
        client_name: {
            required: helpers.withMessage("Please enter name of client.", required),
        },
        client_email: {
            required: helpers.withMessage("Please enter email address.", required),
            email: helpers.withMessage("Please enter valid email address", email),
        },
        client_phone_number: {
            required: helpers.withMessage("Please enter mobile number.", required),
            minLength: helpers.withMessage("Please enter valid mobile number", minLength(10)),
            numeric: helpers.withMessage("Please enter valid mobile number", numeric),
        },
        client_alternate_phone_number: {
            minLength: helpers.withMessage("Please enter valid mobile number", minLength(10)),
            numeric: helpers.withMessage("Please enter valid mobile number", numeric),
        },
        assigned_subdomain: {
            required: helpers.withMessage("Please enter sub-domain name.", required),
        },
        address: {
            required: helpers.withMessage("Please enter address.", required),
        },
    };
});

const v$ = useVuelidate(rules, model);

async function submitForm() {
    submitted.value = true;
    v$.value.$validate(); // checks all inputs
console.log(v$.value)
    if (!v$.value.$error) {
        isLoading.value = true;
        await store
            .dispatch("clients/save", model)
            .then(() => {
                isLoading.value = false;
                submitted.value = false;
                router.push({name: "Clients"});
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


function onImageChoose(ev) {
    const file = ev.target.files[0];
    const reader = new FileReader();
    reader.onload = () => {
        // The field to send on backend and apply validations
        model.avatar = reader.result;
        ev.target.value = "";
    };
    reader.readAsDataURL(file);
}
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
                    <h2 class="text-lg font-medium mr-auto">Add Client</h2>
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
                            @click="router.push('/clients')"
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
                                    <FormLabel for="form-name" class="form-label">Name</FormLabel>
                                    <FormInput
                                        id="form-name"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter name of client"
                                        v-model.trim="model.client_name"
                                        :class="{
                        'border-danger': submitted && v$.client_name.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.client_name.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-email" class="form-label">Email</FormLabel>

                                    <FormInput
                                        id="form-email"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter email"
                                        v-model.trim="model.client_email"
                                        :class="{
                        'border-danger': submitted && v$.client_email.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.client_email.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-mobile-number" class="form-label">Mobile Number</FormLabel>

                                    <FormInput
                                        id="form-mobile-number"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter mobile number"
                                        v-model.trim="model.client_phone_number"
                                        :class="{
                        'border-danger': submitted && v$.client_phone_number.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.client_phone_number.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-alt-mobile-number" class="form-label">Alternate Mobile Number</FormLabel>

                                    <FormInput
                                        id="form-alt-mobile-number"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter alternate mobile number"
                                        v-model.trim="model.client_alternate_phone_number"
                                        :class="{
                        'border-danger': submitted && v$.client_alternate_phone_number.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.client_alternate_phone_number.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-address" class="form-label">Address</FormLabel>

                                    <FormInput
                                        id="form-address"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter address"
                                        v-model.trim="model.address"
                                        :class="{
                        'border-danger': submitted && v$.address.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.address.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <FormLabel for="form-website_url" class="form-label">Website Url</FormLabel>

                                    <FormInput
                                        id="form-website_url"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter website url"
                                        v-model.trim="model.website_url"
                                    />
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-website_slogan" class="form-label">Website Slogan</FormLabel>

                                    <FormInput
                                        id="form-website_slogan"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter website slogan"
                                        v-model.trim="model.website_slogan"
                                    />
                                </div>
                                <div class="mt-3">
                                    <FormLabel for="form-sub-domain" class="form-label">Sub domain</FormLabel>

                                    <FormInput
                                        id="form-sub-domain"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter address"
                                        v-model.trim="model.assigned_subdomain"
                                        :class="{
                        'border-danger': submitted && v$.assigned_subdomain.$errors.length,
                        }"
                                    />
                                    <div
                                        class="text-danger mt-2"
                                        v-for="(error, index) of v$.assigned_subdomain.$errors"
                                        :key="index"
                                    >
                                        <div class="error-msg">{{ error.$message }}</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <FormLabel class="form-label"> Avatar </FormLabel>
                                    <div class="mt-1 flex items-center">
                                        <img
                                            v-if="model.avatar"
                                            :src="model.avatar"
                                            :alt="model.client_name"
                                            class="w-64 h-48 object-cover"
                                        />
                                        <img v-else :alt="model.client_name" class="rounded-full"
                                            :src="`https://eu.ui-avatars.com/api/?size=50&name=` + model.client_name"/>

                                        <Button
                                            type="button"
                                            class="relative overflow-hidden ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        >
                                            <FormInput
                                                type="file"
                                                @change="onImageChoose"
                                                accept="image/png, image/jpeg, image/jpg"
                                                class="absolute left-0 top-0 right-0 bottom-0 opacity-0 cursor-pointer rounded-full"
                                            />
                                            Upload Avatar
                                        </Button>

                                    </div>
                                </div>
                                <!-- BEGIN: Slide Over Footer -->

                                <div class="text-right w-full bottom-0 mt-5">
                                    <Button
                                            variant="secondary"
                                                class="btn btn-outline-secondary w-20 mr-1"
                                                @click="router.push('/clients')"
                                                
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
