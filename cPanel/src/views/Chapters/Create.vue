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
import axiosClient from "@/axios";
import Editor from "@tinymce/tinymce-vue";

const submitted = ref(false);

const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);

const route = useRoute();
const router = useRouter();
// Now we must get editing details for the selected item
// const { t } = useI18n();
const model = reactive({
  id: "",
  subject_id: "",
  label: "",
  description: null,
  icon: "",
  tags_list: [],
  language_id: 1,
});

const rules = computed(() => {
  return {
    // parent_id: {
    //   required: helpers.withMessage("Please select at least one subject.", required),
    // },
    subject_id: {
            required: helpers.withMessage("Please select subject.", required),
    },
    label: {
      required: helpers.withMessage("Please enter label.", required),
    },
    description: {
      required: helpers.withMessage("Please enter description.", required),
    },
    icon: {
      required: helpers.withMessage("Please enter icon.", required),
    },
    language_id: {
      required: helpers.withMessage("Please select language.", required),
    },
  };
});

const v$ = useVuelidate(rules, model);

async function submitForm() {
  submitted.value = true;
  v$.value.$validate(); // checks all inputs
  
  if (!v$.value.$error) {
    isLoading.value = true;
    await store
      .dispatch("chapters/create", model)
      .then(() => {
        isLoading.value = false;
        submitted.value = false;
        router.push({ name: "Chapters" });
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
  store.dispatch("listLanguages").then().catch();
  store.dispatch("listSubjects").then().catch();
});
const languages = computed(() => store.getters.languages);
const subjects = computed(() => store.getters.listSubjects);

function random(string) {
    var s = '';
    var randomchar = function() {
        var n = Math.floor(Math.random() * 62);
        if (n < 10) return n; //1-10
        if (n < 36) return String.fromCharCode(n + 55); //A-Z
        return String.fromCharCode(n + 61); //a-z
    }
    while (s.length < string) s += randomchar();
    return s;
}
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Create Chapter
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
                  <h2 class="text-lg font-medium mr-auto">
                    Add Chapter
                  </h2>
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
                        @click="router.push('/chapters')"
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
                        <AlertOctagonIcon class="w-6 h-6 mr-2" />
                        {{ message }}
                      </div>
                      <form @submit.prevent="submitForm()" class="validate-form">
                        <div>
                          <FormLabel for="form-subject-id" class="form-label">
                            Choose Subject
                          </FormLabel>
                          
                          <TomSelect
                            id="form-subject-id"
                            v-model="model.subject_id"
                            placeholder="Select Subject"
                            :options="{
                              allowEmptyOption: false,
                              create: false,
                              placeholder: 'Select Subject',
                              autocomplete: 'off',
                            }"
                            class="w-full"
                            :class="{
                              'border-danger': submitted && v$.subject_id.$errors.length,
                            }"
                          >
                            <option value="">Select Subject</option>
                            <option
                              v-for="(subject, index) in subjects"
                              :key="random(index)"
                              :value="index"
                            >
                              {{ subject }}
                            </option>
                          </TomSelect>
                        </div>  
                        <div class="mt-3">
                          <FormLabel for="form-label" class="form-label">
                            Label</FormLabel>
                          <FormInput
                            id="form-label"
                            type="text"
                            class="form-control"
                            placeholder="Enter label of chapter."
                            v-model.trim="model.label"
                            :class="{
                              'border-danger': submitted && v$.label.$errors.length,
                            }"
                          />
                          <div
                            class="text-danger mt-2"
                            v-for="(error, index) of v$.label.$errors"
                            :key="index"
                          >
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-description" class="form-label">
                            Description</FormLabel>

                          <div class="mt-3 py-2">
                            <!-- <ClassicEditor v-model="editorData" /> -->
                            <editor
                              id="form-description"
                              v-model="model.description"
                              :class="{
                                'border-danger': submitted && v$.description.$errors.length,
                              }"
                              initialValue="<p>Initial editor content</p>"
                              apiKey="n10p1o42akootxkapivj4ecxefdo4zlaqd0ek0aa47ld9js7"
                              :init="{
                                height: 200,
                                menubar: true,
                                plugins: [
                                  'advlist autolink lists link image charmap',
                                  'searchreplace visualblocks code fullscreen',
                                  'print preview anchor insertdatetime media',
                                  'paste code help wordcount table',
                                ],
                                toolbar:
                                  'undo redo | formatselect | bold italic | \
                                            alignleft aligncenter alignright | \
                                            bullist numlist outdent indent | insert | help | \
                                            tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry',
                              }"
                            >
                            </editor>
                          </div>

                          <!-- END: Inbox Content -->
                          <div
                            class="text-danger mt-2"
                            v-for="(error, index) of v$.description.$errors"
                            :key="index"
                          >
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-language" class="form-label">
                            Choose Language</FormLabel>
                          <TomSelect
                            id="form-language"
                            v-model="model.language_id"
                            placeholder="Select Language"
                            :options="{
                              allowEmptyOption: false,
                              create: false,
                              placeholder: 'Select Language',
                              autocomplete: 'off',
                            }"
                            class="w-full"
                            :class="{
                              'border-danger': submitted && v$.language_id.$errors.length,
                            }"
                          >
                            <option
                              v-for="(language, index) in languages"
                              :key="index"
                              :value="index"
                            >
                              {{ language }}
                            </option>
                          </TomSelect>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-icon" class="form-label">
                            Icon</FormLabel>
                          <FormInput
                            type="text"
                            id="form-icon"
                            v-model="model.icon"
                            class="form-control"
                            placeholder="Icon"
                            :class="{ 'border-danger': submitted && v$.icon.$error }"
                          />
                          <span v-if="submitted && v$.icon.$error" class="text-danger mt-2">
                            {{ v$.icon.$errors[0].$message }}
                          </span>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="chapters-tags" class="form-label">
                            Tags</FormLabel>
                          <TomSelect
                            id="chapters-tags"
                            v-model="model.tags_list"
                            placeholder= Tags
                            :options="{
                              create: true,
                            }"
                            class="w-full"
                            multiple
                          >
                            <option
                              v-for="(tag, index) in model.tags_list"
                              :key="index"
                              :value="tag"
                            >
                              {{ tag }}
                            </option>
                          </TomSelect>
                        </div>
                        <!-- BEGIN: Slide Over Footer -->

                        <div class="text-right w-full bottom-0 mt-5">
                          <Button
                            variant="secondary"
                            class="btn btn-outline-secondary w-20 mr-1"
                            @click="router.push('/chapters')"
                            
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