<script setup lang="ts">
// import {useI18n} from "vue-i18n";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import { Dialog, Menu } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";

// const {t} = useI18n();
const props = defineProps({
    questions: Object,
    isOnline: Boolean,
    showPreviewForTeacher: Boolean,
})
</script>

<template>
    <Table class="border-none w-full ">
        <Table.Tr v-for="(question, qidx) in questions" :key="qidx">
            <Table.Td class="border-none whitespace-nowrap">
                {{ qidx + 1 }}&nbsp;{{ question.question }}
                <Table class="w-full border-none">
                    <Table.Tr v-for="(answer, aidx) in question.answers" :key="aidx">
                        <Table.Td class="border-none whitespace-nowrap">
                            {{ aidx + 1 }}&nbsp;
                            <template v-if="isOnline">
                                <FormCheck.Input
                                    v-if="question.type_id == 1 || question.type_id == 3"
                                    :id="`is_correct-`+qidx"
                                    type="radio"
                                    class="form-check-input"
                                    name="is_correct"
                                />
                                <FormCheck.Input
                                    v-if="question.type_id == 2"
                                    :id="`is_correct-`+qidx"
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_correct"
                                />
                                {{ answer.answer }}
                            </template>
                            <template v-else>{{ answer.answer }}</template>
                            <template v-if="answer.is_correct && showPreviewForTeacher">
                                <div variant="success" class="ml-5 btn btn-success">Correct Answer</div>
                            </template>
                        </Table.Td>
                    </Table.Tr>
                    <Table.Tr v-if="showPreviewForTeacher">
                        <Table.Td class="w-full border-none whitespace-nowrap bg-primary/80 box text-white flex items-center mb-2 mt-2">
                            {{ question.note }}
                        </Table.Td>
                    </Table.Tr>
                </Table>
            </Table.Td>

        </Table.Tr>
    </Table>
</template>

<style scoped>

</style>
