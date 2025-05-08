<script setup lang="ts">

import store from "@/stores";
// import { useI18n } from "vue-i18n";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { ref, computed, watch } from "vue";

// const { t } = useI18n();

const props = defineProps({
    section: Object,
    index: Number,
    questionTypes: Object,
    total_marks: Number,
});
const emit = defineEmits(["change", "addSection", "deleteSection"]);

const model = ref(JSON.parse(JSON.stringify(props.section)));
//const model = props.section;
watch(model.value, async (oldVal, newVal) => {
    if (props.total_marks >= newVal.total_marks) {
        // TODO:
        /*console.log(model.value)
        console.log(props.total_marks);
        console.log(newVal.total_marks)*/
    }
})
// Emit the data change
function dataChange() {
    emit("change", model.value);
}
function addSection() {
    emit("addSection", props.index + 1);
}
function changeType(type) {
    let questTypeArray = JSON.parse(JSON.stringify(props.questionTypes));
    model.value.type_id = type;
    model.value.type_name = questTypeArray[type];
    dataChange();
}
function deleteSection() {
    emit("deleteSection", props.section);
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
</script>
<template>
    <div class="w-full mt-3 xl:mt-0 flex-1">
        <div
            class="relative pl-5 pr-5 xl:pr-10 py-10 bg-slate-50 dark:bg-transparent dark:border rounded-md"
        >
            <div class="w-20 flex text-slate-500 xl:mt-1 absolute top-0 right-0 mr-4">
                <a href="#"
                   class="xl:ml-5"
                   @click.prevent="addSection()">
                   <Lucide icon="PlusIcon" class="w-5 h-5" />
        
                </a>
                <a href="#" class="ml-3 xl:ml-5" @click.prevent="deleteSection()">
                    <Lucide icon="Trash2Icon" class="w-5 h-5" />
                    
                </a>
            </div>

            <div>
                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Name</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormInput type="text"
                                   class="form-control"
                                   placeholder="Name of Section"
                                   v-model="model.name"
                                   @change="dataChange"
                            />
<!--                            <div v-for="(error, index) of model.errors.name"
                                 :key="index"
                                 class="text-danger mt-2">
                                <div class="error-msg">{{ error.$message }}</div>
                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Description</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormTextarea class="form-control"
                                      placeholder="Description"
                                      v-model="model.description"
                                      @change="dataChange"
                                      >
                            </FormTextarea>
                        </div>
                    </div>
                </div>

                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Question Type</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <TomSelect id="form-type"
                                       v-model="model.type_id"
                                       placeholder="Select Type"
                                       :options="{
                                          allowEmptyOption: false,
                                          create: false,
                                          placeholder: 'Select Type',
                                          autocomplete: 'off',
                                          onChange: changeType,
                                          items:model.type_id,
                                        }"
                            >
                                <option>Select Question Type</option>
                                <option v-for="(type, id) in questionTypes" :key="id" :value="id">
                                    {{ JSON.parse(type) }}
                                </option>
                            </TomSelect>
                        </div>
                    </div>
                </div>
                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Total Questions</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormInput type="number"
                                   class="form-control"
                                   placeholder="Total Number of Questions"
                                   v-model="model.total_questions"
                                   @change="dataChange"
                            />
                        </div>
                    </div>
                </div>
                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Compulsory Questions</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormInput type="number"
                                   class="form-control"
                                   placeholder="Compulsory Questions"
                                   v-model="model.compulsory_questions"
                                   @change="dataChange"
                            />
                        </div>
                    </div>
                </div>
                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Marks per Question</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormInput type="number"
                                   class="form-control"
                                   placeholder="Marks per Question"
                                   v-model="model.marks_per_question"
                                   @change="dataChange"
                            />
                        </div>
                    </div>
                </div>
                <div class="form-inline mt-5 first:mt-0">
                    <label class="form-label sm:w-20">Total Marks</label>
                    <div class="flex items-center flex-1 xl:pr-10">
                        <div class="flex-1">
                            <FormInput type="text"
                                   class="form-control"
                                   placeholder="Total Marks"
                                   v-model="model.total_marks"
                                   @change="dataChange"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
