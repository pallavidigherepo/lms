<script setup lang="ts">
import store from "@/stores";
import {ref, computed, onMounted} from "vue";
import {useRoute, useRouter} from "vue-router";
import Preview from "@/components/GeneratedQuestionPaper/Preview.vue";

// import {useI18n} from "vue-i18n";

const route = useRoute();
const router = useRouter();
// const {t} = useI18n();

const message = ref("");
const isLoading = ref(false);
const isOnline = ref(false);

const fetch = async () => {
    isLoading.value = true;
    try {
        let id = route.params.id;
        await store
            .dispatch("generated_questions/show", id)
            .then(() => {
                isLoading.value = false;
            })
            .catch((err) => {
                isLoading.value = false;
            });
    } catch (e) {
        message.value = e;
    } finally {
        isLoading.value = false;
    }
};

onMounted(() => {
    fetch();
});

const generatedQuestion = computed(() => store.getters['generated_questions/generated_question']);
const userInfo = computed(() => JSON.parse(sessionStorage.getItem("USER")));

function back() {
    router.push({name: "GeneratedQuestionPapers"});
}
</script>

<template>
    <div>
        <Preview v-if="generatedQuestion"
                 :data="generatedQuestion"
                 :userInfo="userInfo"
                 :template="generatedQuestion.template_info"
                 :isOnline="isOnline"
                 :preview="false"
                 @back="back" />
        <Loading v-if="isLoading" fixed></Loading>
    </div>
</template>
<style scoped>

</style>
