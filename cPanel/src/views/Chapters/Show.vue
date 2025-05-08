<script setup lang="ts">
import { computed, onMounted, ref, shallowRef } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "@/axios";
import store from "@/stores";
import Lucide from "@/components/Base/Lucide";
import Button from "@/components/Base/Button";
import ListTopics from "@/views/Topics/Index.vue";

const route = useRoute();
const router = useRouter();

// const { t } = useI18n();
const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const model = ref("");
const options = {
  modelName: "Topic",
};
const listing = ref(true);

const subjectId = computed(() => { return model.value.parent_id})
const fetch = async () => {
  isLoading.value = true;
  try {
    let id = route.params.id;

    const result = await axiosClient.get(`/chapters/${id}`);

    if (result.status != 200) {
      const error = new Error("Failed to fetch chapter");
      throw error;
    }
    model.value = JSON.parse(JSON.stringify(result.data.data));
    
  } catch (e) {
    isErrored.value = true;
    message.value = e;
  } finally {
    isLoading.value = false;
  }
};
onMounted(() => {
  fetch();
});
//const chaptersCount = computed(() => { return count(model.value.chapters)});


function deleteI(item) {
  store.dispatch("topics/delete", item.id);
}
</script>

<template> 
  <div>
    <div class="intro-y flex items-center mt-8">
      <h2 class="text-lg font-medium mr-auto">
        Chapter details
      </h2>
      <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <Button
          @click="router.push('/subjects/'+subjectId)"
          variant="primary"
          class="
                    box
                    mr-2
                    flex
                    items-center
                    ml-auto
                    sm:ml-0
          "
          ><Lucide icon="ArrowLeftCircle" class="w-4 h-4 mr-2" />Back
        </Button>
      </div>
    </div>
    <div class="intro-y box px-5 pt-5 mt-5">
        <div
          class="
            flex flex-col
            lg:flex-row
            border-b border-slate-200/60
            dark:border-darkmode-400
            pb-5
            -mx-5
          "
        >
          <div
            class="
              flex flex-1
              px-5
              items-center
              justify-center
              lg:justify-start
            "
          >
            <div class="ml-5">
              <div
                class="
                  w-24
                  sm:w-40
                  truncate
                  sm:whitespace-normal
                  font-medium
                  text-lg
                "
              >
                {{ model.label }}
              </div>
              <div class="text-slate-500">{{ model.tags }}</div>
            </div>
          </div>
          <div
            class="
              mt-6
              lg:mt-0
              flex-1
              px-5
              border-l border-r border-slate-200/60
              dark:border-darkmode-400
              border-t
              lg:border-t-0
              pt-5
              lg:pt-0
            "
          >
            <div class="font-medium text-center lg:text-left lg:mt-3">
              Description
            </div>
            <div
              class="
                flex flex-col
                justify-center
                items-center
                lg:items-start
                mt-4
              "
              v-html="model.description"
            ></div>
          </div>

          <div
            class="
              mt-6
              lg:mt-0
              flex-1 flex
              items-center
              justify-center
              px-5
              border-t
              lg:border-0
              border-slate-200/60
              dark:border-darkmode-400
              pt-5
              lg:pt-0
            "
          >
            <div class="text-center rounded-md w-20 py-3">
              <div class="font-medium text-primary text-xl">1k</div>
              <div class="text-slate-500">Topics</div>
            </div>
          </div>
        </div>
    </div>
      <ListTopics :chapterName="model.label"></ListTopics>
  </div>
</template>
<style>
</style>