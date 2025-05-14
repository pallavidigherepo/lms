<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { ClassicEditor } from "@/components/Base/Ckeditor";

import Dropzone, { type DropzoneElement } from "@/components/Base/Dropzone";
import {
  FormLabel,
  FormCheck,
  FormInput,
  FormInline,
  FormSelect,
  FormSwitch,
  InputGroup,
  FormTextarea,
  FormHelp,
} from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import Alert from "@/components/Base/Alert";
import LoadingIcon from "@/components/Base/LoadingIcon";
import ThemeSwitcher from "@/components/ThemeSwitcher";
import { useVuelidate } from "@vuelidate/core";
import { required, email, helpers, minLength, numeric } from "@vuelidate/validators";
import store from "@/stores/index.js";
import { useUserStore } from "@/stores/user";
import { useRouter, useRoute } from "vue-router";
import { ref, reactive, computed, onMounted, provide } from "vue";
//import FormTextarea from "@/components/Base/Form/FormTextarea.vue";

const submitted = ref(false);

const isErrored = ref(false);
const message = ref("");
const loading = ref(false);

const route = useRoute();
const router = useRouter();

const userStore = useUserStore();
//const roles = userStore.role_list();
//console.log(roles);
// Now we must get editing details for the selected item
// const { t } = useI18n();
const user = reactive({
  id: null,
  name: "",
  email: "",
  alt_email: "",
  mobile: "",
  alt_mobile: "",
  address: "",
  alt_address: "",
  gender: "",
  qualification: "",
  avatar: null,
  role: "",
  designation: "",
  dob: "",
});

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
    },
    address: {
      required: helpers.withMessage("Please enter address.", required),
    },
    dob: {
      required: helpers.withMessage("Please enter date of birth.", required),
    },
    gender: {
      required: helpers.withMessage("Please select gender.", required),
    },    
    qualification: {
      required: helpers.withMessage("Please enter qualification.", required),
    },
  };
});

const v$ = useVuelidate(rules, user);

async function submitForm() {
  submitted.value = true;
  v$.value.$validate(); // checks all inputs

  if (!v$.value.$error) {
    loading.value = true;
    await store
      .dispatch("users/save", user)
      .then(() => {
        loading.value = false;
        submitted.value = false;
        router.push({ name: "Users" });
      })
      .catch((err: { response: { data: { message: string; }; }; }) => {
        loading.value = false;
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

// onMounted(() => {
//   store.dispatch("users/role_list");
// });

// const roles = computed(() => store.getters["users/roleList"]);


const dropzoneSingleRef = ref<DropzoneElement>();
const dropzoneMultipleRef = ref<DropzoneElement>();
const dropzoneValidationRef = ref<DropzoneElement>();

provide("bind[dropzoneSingleRef]", (el: DropzoneElement) => {
    dropzoneSingleRef.value = el;
});

provide("bind[dropzoneMultipleRef]", (el: DropzoneElement) => {
    dropzoneMultipleRef.value = el;
});

provide("bind[dropzoneValidationRef]", (el: DropzoneElement) => {
    dropzoneValidationRef.value = el;
});

onMounted(() => {
  const elDropzoneSingleRef = dropzoneSingleRef.value;
  if (elDropzoneSingleRef) {
    elDropzoneSingleRef.dropzone.on("success", () => {
      alert("Added file.");
    });
    elDropzoneSingleRef.dropzone.on("error", () => {
      alert("No more files please!");
    });
  }

  const elDropzoneMultipleRef = dropzoneMultipleRef.value;
  if (elDropzoneMultipleRef) {
    elDropzoneMultipleRef.dropzone.on("success", () => {
      alert("Added file.");
    });
    elDropzoneMultipleRef.dropzone.on("error", () => {
      alert("No more files please!");
    });
  }

  const elDropzoneValidationRef = dropzoneValidationRef.value;
  if (elDropzoneValidationRef) {
    elDropzoneValidationRef.dropzone.on("success", () => {
      alert("Added file.");
    });
    elDropzoneValidationRef.dropzone.on("error", () => {
      alert("No more files please!");
    });
  }
});
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Create User
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block">
          Empowering Every Role for a Seamless Educational Experience.
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
            @click="router.push('/users')">
            <Lucide icon="ArrowLeftCircle" class="stroke-[1.3] w-4 h-4 mr-2" />Back
          </Button>
        </div>
      </div>
      <div class="mt-3.5 grid grid-cols-12 xl:grid-cols-10 gap-y-7 lg:gap-y-10 gap-x-6">
        <div class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7">
          <form @submit.prevent="submitForm" class="validate-form">
            <div class="flex flex-col p-5 box box--stacked" id="basic-information">
              <div
                class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                <div class="text-[0.94rem] font-medium">Basic Information</div>
              </div>
              <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                <div class="intro-y box col-span-12 lg:col-span-12">
                  <div class="p-5">
                    <div class="alert alert-danger show flex items-center mb-2" role="alert" v-if="isErrored">
                      <AlertOctagonIcon class="w-6 h-6 mr-2" />
                      {{ message }}
                    </div>
                    <div>
                      <FormLabel for="form-name" class="form-label">Name</FormLabel>
                      <FormInput id="form-name" type="text" class="form-control" placeholder="Enter name of user"
                        v-model.trim="user.name" :class="{
                          'border-danger': submitted && v$.name.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.name.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                      <!--<span v-if="submitted && v$.name.$error" class="text-theme-21 mt-2">
                                        {{ v$.name.$errors[0].$message }}
                                    </span>-->
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-email" class="form-label">Email</FormLabel>

                      <FormInput id="form-email" type="text" class="form-control" placeholder="Enter email"
                        v-model.trim="user.email" :class="{
                          'border-danger': submitted && v$.email.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.email.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                      <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                        {{ v$.users.$errors[0].$message }}
                                    </span>-->
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-role" class="form-label">Role
                      </FormLabel>
                      <div class="mt-2">
                        <TomSelect id="form-type" v-model="user.designation" placeholder="Select Type" :options="{
                          allowEmptyOption: false,
                          create: false,
                          placeholder: 'Select Role',
                          autocomplete: 'off',
                        }">
                          <option>Select Role</option>
                          <option :value="index" v-for="(role, index) in userStore.roles_list" :key="index">
                            {{ role }}
                          </option>
                        </TomSelect>
                      </div>
                      <div class="text-danger mt-2" v-for="(error, index) of v$.designation.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
                    {{ userStore.roles_list }}
                  </div>
                  <!-- BEGIN: Post Content -->
                </div>
                <!-- END: Post Content -->
              </div>
            </div>
            <div class="flex flex-col p-5 box box--stacked mt-5" id="profile-information">
              <div
                class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                <div class="text-[0.94rem] font-medium">Profile Information</div>
              </div>
              <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                <div class="intro-y box col-span-12 lg:col-span-12">
                  <div class="p-5">
                    
                    <div>
                      <FormLabel for="form-email" class="form-label">Alternate Email</FormLabel>

                      <FormInput id="form-email" type="text" class="form-control" placeholder="Enter email"
                        v-model.trim="user.email" :class="{
                          'border-danger': submitted && v$.email.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.email.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                      <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                        {{ v$.users.$errors[0].$message }}
                                    </span>-->
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-mobile-number" class="form-label">Mobile Number</FormLabel>

                      <FormInput id="form-mobile-number" type="text" class="form-control"
                        placeholder="Enter mobile number" v-model.trim="user.mobile" :class="{
                          'border-danger': submitted && v$.mobile.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.mobile.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                      <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                        {{ v$.users.$errors[0].$message }}
                                    </span>-->
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-mobile-number" class="form-label">Alternate Mobile Number</FormLabel>

                      <FormInput id="form-mobile-number" type="text" class="form-control"
                        placeholder="Enter mobile number" v-model.trim="user.mobile" :class="{
                          'border-danger': submitted && v$.mobile.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.mobile.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                      <!--<span v-if="submitted && v$.users.$error" class="text-theme-24 mt-2">
                                        {{ v$.users.$errors[0].$message }}
                                    </span>-->
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-address" class="form-label">Address</FormLabel>

                      <FormTextarea id="form-address" type="textarea" class="form-control"
                        placeholder="Enter Address" v-model.trim="user.address" :class="{
                          'border-danger': submitted && v$.address.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.address.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
                    
                    <div class="mt-3">
                      <FormLabel for="form-dob" class="form-label">Date of Birth</FormLabel>

                      <FormInput id="form-dob" type="date" class="form-control"
                        placeholder="Enter Date of Birth" v-model.trim="user.dob" :class="{
                          'border-danger': submitted && v$.dob.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.dob.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-mobile-number" class="form-label">Upload Image</FormLabel>

                      <Dropzone refKey="dropzoneSingleRef" :options="{
                                    url: 'https://httpbin.org/post',
                                    thumbnailWidth: 150,
                                    maxFilesize: 0.5,
                                    maxFiles: 1,
                                    headers: { 'My-Awesome-Header': 'header value' },
                                  }" class="dropzone">
                        <div class="text-lg font-medium">
                            Drop files here to upload.
                        </div>
                        <div class="text-gray-600">
                            Selected file must be an image. Allowed file types are: 
                            <span class="font-medium">jpeg, png, jpg</span>.
                        </div>
                    </Dropzone>
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-role" class="form-label">Gender
                      </FormLabel>
                      <div class="mt-2">
                        <TomSelect id="form-type" v-model="user.gender" placeholder="Select Gender" :options="{
                          allowEmptyOption: false,
                          create: false,
                          placeholder: 'Select Gender',
                          autocomplete: 'off',
                        }">
                          <option>Select Gender</option>
                          <option value="male" :key="'male'">Male</option>
                          <option value="female" :key="'female'">Female</option>
                        </TomSelect>
                      </div>
                      <div class="text-danger mt-2" v-for="(error, index) of v$.gender.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-role" class="form-label">Qualification
                      </FormLabel>
                      
                      <div class="mt-2">
                        <FormInput id="form-qualification" type="text" class="form-control"
                        placeholder="Enter qualification" v-model.trim="user.qualification" :class="{
                          'border-danger': submitted && v$.qualification.$errors.length,
                        }" />
                      </div>
                      <div class="text-danger mt-2" v-for="(error, index) of v$.qualification.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>

                  </div>
                  <!-- BEGIN: Post Content -->
                </div>
                <!-- END: Post Content -->
              </div>
              
            </div>
            <div class="flex flex-col justify-end gap-3 mt-5 md:flex-row">
              <Button variant="outline-secondary"
                class="w-full border-slate-300/80 bg-white/80 md:w-56 py-2.5 rounded-[0.5rem] dark:bg-darkmode-400"
                @click="router.push('/users')">
                <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
                Cancel
              </Button>
              <!-- <Button
              variant="outline-secondary"
              class="w-full border-slate-300/80 bg-white/80 md:w-56 py-2.5 rounded-[0.5rem] dark:bg-darkmode-400"
            >
              <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
              Save & Add New
            </Button> -->
              <Button variant="primary" class="w-full md:w-56 py-2.5 rounded-[0.5rem]" type="submit">
                <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
                Save
              </Button>
            </div>
          </form>

        </div>
        <div
          class="relative order-first col-span-12 lg:order-last lg:col-span-3 xl:col-span-2"
        >
          <div class="sticky top-[104px]">
            
            <div
              class="relative p-5 border rounded-[0.6rem] bg-warning/[0.07] dark:bg-darkmode-600 border-warning/[0.15] dark:border-0"
            >
              <Lucide
                icon="Lightbulb"
                class="absolute top-0 right-0 w-12 h-12 mt-5 mr-3 text-warning/80"
              />
              <h2 class="text-lg font-medium">Tips</h2>
              <div class="mt-4 font-medium">Avatar</div>
              <div
                class="mt-2 text-xs leading-relaxed text-slate-600/90 dark:text-slate-400"
              >
                <div>
                  The image format is .jpg .jpeg .png and a minimum size of 300
                  x 300 pixels (For optimal images use a minimum size of 700 x
                  700 pixels).
                </div>
                <!-- <div class="mt-2">
                  Select product photos or drag and drop up to 5 photos at once
                  here. Include min. 3 attractive photos to make the product
                  more attractive to buyers.
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <Loading v-if="loading" fixed></Loading>
</template>

<style scoped></style>
