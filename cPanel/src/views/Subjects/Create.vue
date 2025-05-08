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

const subcategory = ref(["0"]);
const editorData = ref("<p>Content of the editor.</p>");

const submitted = ref(false);

const isErrored = ref(false);
const message = ref("");
const isLoading = ref(false);

const route = useRoute();
const router = useRouter();

// const { t } = useI18n();
const model = reactive({
  id: "",
  board_id: "",
  standard_id: "",
  label: "",
  description: null,
  icon: "",
  tags_list: [],
  language_id: 1,
});

const rules = computed(() => {
  return {
    board_id: {
      required: helpers.withMessage("Please select board.", required),
    },
    standard_id: {
      required: helpers.withMessage("Please select standard.", required),
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
      .dispatch("subjects/create", model)
      .then(() => {
        isLoading.value = false;
        submitted.value = false;
        router.push({ name: "Subjects" });
      })
      .catch((err: any) => {
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
  store.dispatch("listBoard").then().catch();
  store.dispatch("listStandard").then().catch();
  store.dispatch("listLanguages").then().catch();
});
const languages = computed(() => store.getters.languages);
const boards = computed(() => store.getters.listBoards);
const standards = computed(() => store.getters.listStandards);
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Create Subjects
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
                    Add Subject
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
                                @click="router.push('/subjects')"
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
                          <FormLabel for="form-label" class="form-label">Board</FormLabel>
                          <TomSelect id="form-board"
                            v-model="model.board_id"
                            :placeholder="'Select Board'"
                            :options="{
                              allowEmptyOption: false,
                              create: false,
                              placeholder: 'Select Board',
                              autocomplete: 'off',
                            }"
                            class="w-full"
                            :class="{ 'border-danger': submitted && v$.board_id.$errors.length,}">
                            <option>Select Board</option>
                            <option v-for="(board, index) in boards" :key="index" :value="index">
                              {{ board }}
                            </option>
                          </TomSelect>

                          <div class="text-danger mt-2" v-for="(error, index) of v$.board_id.$errors" :key="index">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-label" class="form-label">Standard</FormLabel>
                          <TomSelect id="form-standard" v-model="model.standard_id" placeholder="Select Standard" :options="{
                            allowEmptyOption: false,
                            create: false,
                            placeholder: 'Select Standard',
                            autocomplete: 'off',
                          }" class="w-full" :class="{
            'border-danger': submitted && v$.standard_id.$errors.length,
            }">
                            <option>Select Standard</option>
                            <option v-for="(standard, indexs) in standards" :key="indexs" :value="indexs">
                              {{ standard }}
                            </option>
                          </TomSelect>
                          <div class="text-danger mt-2" v-for="(error, index) of v$.standard_id.$errors" :key="index">
                            <div class="error-msg">{{ error.$message }}</div>
                          </div>
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-label" class="form-label">Label</FormLabel>
                          <FormInput
                            id="form-label"
                            type="text"
                            class="form-control"
                            placeholder="Enter label of subject."
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
                          <FormLabel for="form-description" class="form-label">Description</FormLabel>

                          <div class="mt-3 py-2">
                           <!--<ClassicEditor v-model="editorData" />-->    
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
                          <!-- <div
                            class="text-danger mt-2"
                            v-for="(error, index) of v$.description.$errors"
                            :key="index"
                          >
                            <div class="error-msg">{{ error.$message }}</div>
                          </div> -->
                        </div>
                        <div class="mt-3">
                          <FormLabel for="form-language" class="form-label">Choose Language</FormLabel>
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
                          <FormLabel for="subject-icon" class="form-label">Icon</FormLabel>
                          <FormInput
                            type="text"
                            id="subject-icon"
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
                          <FormLabel for="subject-tags" class="form-label">Tags</FormLabel>
                          <TomSelect
                            id="subject-tags"
                            v-model="model.tags_list"
                            placeholder="Tags"
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
                                    @click="router.push('/subjects')"
                                    
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
