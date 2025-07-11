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
import ThemeSwitcher from "@/components/ThemeSwitcher";
import { useVuelidate } from "@vuelidate/core";
import { useUserStore } from "@/stores/modules/user";
import { useRouter, useRoute } from "vue-router";
import { ref, reactive, computed, onMounted, provide } from "vue";
import Loading from "@/custom_components/Loading.vue";
import { storeToRefs } from "pinia";
//import FormTextarea from "@/components/Base/Form/FormTextarea.vue";

const submitted = ref(false);

const isErrored = ref(false);
const message = ref("");
const loading = ref(false);

const route = useRoute();
const router = useRouter();
const userStore = useUserStore();
//const { role_list } = useUserStore();
const { roles } = storeToRefs(useUserStore());

onMounted(() => {
  userStore.role_list();
})

// Now we must get editing details for the selected item
// const { t } = useI18n();
const user = userStore.user;

const rules = userStore.rules;

const v$ = useVuelidate(rules, user);

function setFormData() {
  let formData = new FormData();

  formData.append("name", user.name ?? "");
  formData.append("email", user.email ?? "");
  formData.append("alt_email", user.alt_email ?? "");
  formData.append("mobile", user.mobile ?? "");
  formData.append("alt_mobile", user.alt_mobile ?? "");
  formData.append("address", user.address ?? "");
  formData.append("alt_address", user.alt_address ?? "");
  formData.append("gender", user.gender ?? "");
  formData.append("qualification", user.qualification ?? "");
  formData.append("avatar", user.avatar ?? "");
  formData.append("role", user.role ?? "");
  formData.append("designation", user.designation ?? "");
  formData.append("dob", user.dob ?? "");
  formData.append("date_of_joining", user.date_of_joining ?? "");

  return formData;
}

async function submitForm() {
  submitted.value = true;
  v$.value.$validate(); // checks all inputs

  if (!v$.value.$error) {
    loading.value = true;

    await userStore
      .store(setFormData())
      .then(() => {
        isErrored.value = false;
        message.value = "User created successfully.";
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

const previewUrl = ref<string | null>(null);
/**
 * Handles a file input event.
 *
 * If the argument is a File object, it directly assigns to the user's avatar.
 * If the argument is an Event object, it assigns the first file in the input
 * element's files list to the user's avatar.
 *
 * If the file is assigned, it creates a data URL for the file and assigns it
 * to the previewUrl ref.
 * @param {Event | File} e - The file input event or File object
 */
function handleFile(e: Event | File) {
  const file = e instanceof File ? e : (e.target as HTMLInputElement)?.files?.[0];
  
  if (file) {
    //user.avatar = file;

    // Create a preview URL
    const reader = new FileReader();
    reader.onload = (e) => {
      previewUrl.value = e.target?.result as string;
    };
    reader.readAsDataURL(file);
  }
}
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
      <div class="mt-3.5 grid grid-cols-12 xl:grid-cols-10 gap-y-7 lg:gap-y-10 gap-x-6" v-if="!loading">
        <div class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7">
          <form @submit.prevent="submitForm" class="validate-form" enctype="multipart/form-data">
            <div class="flex flex-col p-5 box box--stacked" id="basic-information">
              <div
                class="flex items-center pb-5 text-[0.94rem] font-medium border-b border-slate-200/60 dark:border-darkmode-400">
                <div class="text-[0.94rem] font-medium">Basic Information</div>
              </div>
              <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                <div class="intro-y box col-span-12 lg:col-span-12">
                  <div class="p-5">
                    <div class="alert alert-danger show flex items-center mb-2" role="alert" v-if="isErrored">
                      <!-- <AlertOctagonIcon class="w-6 h-6 mr-2" /> -->
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
                        <TomSelect id="form-type" 
                                  v-model="user.role" 
                                  placeholder="Select Type"
                                  :class="{
                                    'border-danger': submitted && v$.role.$errors.length,
                                  }" 
                                  :options="{
                                    allowEmptyOption: false,
                                    create: false,
                                    placeholder: 'Select Role',
                                    autocomplete: 'off',
                                  }">
                          <option>Select Role</option>
                          <option :value="role" v-for="(role, index) in roles" :key="index">
                            {{ role }}
                          </option>
                        </TomSelect>
                      </div>
                      <div class="text-danger mt-2" v-for="(error, index) of v$.role.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
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
                        v-model.trim="user.alt_email" :class="{
                          'border-danger': submitted && v$.alt_email.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.alt_email.$errors" :key="index">
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
                        placeholder="Enter mobile number" v-model.trim="user.alt_mobile" :class="{
                          'border-danger': submitted && v$.alt_mobile.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.alt_mobile.$errors" :key="index">
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
                      <FormLabel for="form-doj" class="form-label">Date of Joining</FormLabel>

                      <FormInput id="form-doj" type="date" class="form-control"
                        placeholder="Enter Date of Joining" v-model.trim="user.date_of_joining" :class="{
                          'border-danger': submitted && v$.date_of_joining.$errors.length,
                        }" />
                      <div class="text-danger mt-2" v-for="(error, index) of v$.date_of_joining.$errors" :key="index">
                        <div class="error-msg">{{ error.$message }}</div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-mobile-number" class="form-label">Avatar Upload Image</FormLabel>
                      <FormInput id="form-avatar" 
                                type="file" 
                                class="form-control"
                                placeholder="Enter avatar image URL" 
                                name="avatar" 
                                @change="($event: any) => {
                                    user.avatar = $event.target.files[0];
                                    handleFile
                                }"
                                accept="image/*"
                                :class="{
                                  'border-danger': submitted && v$.avatar.$errors.length,
                                }" />
                        <div class="text-danger mt-2" v-for="(error, index) of v$.avatar.$errors" :key="index">
                          <div class="error-msg">{{ error.$message }}</div>
                        </div>
                        <img v-if="previewUrl" :src="previewUrl" alt="Preview" style="max-width: 100px; margin-top: 10px;" />
                    </div>
                    <div class="mt-3">
                      <FormLabel for="form-role" class="form-label">Gender
                      </FormLabel>
                      <div class="mt-2">
                        <TomSelect id="form-type" 
                                  v-model="user.gender" 
                                  placeholder="Select Gender" 
                                  :options="{
                                    allowEmptyOption: false,
                                    create: false,
                                    placeholder: 'Select Gender',
                                    autocomplete: 'off',
                                    
                                  }"
                                  :class="{
                                    'border-danger': submitted && v$.gender.$errors.length,
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
              <Button variant="primary" class="w-full md:w-56 py-2.5 rounded-[0.5rem]" type="submit">
                <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
                Save
              </Button>
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
  <Loading v-if="loading" fixed />
</template>

<style scoped></style>
