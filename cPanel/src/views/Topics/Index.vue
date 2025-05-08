<script setup lang="ts">
import { onMounted, ref, toRefs } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "@/axios";
import store from "@/stores";
// import DataTable from "@/components/DataTable/Index.vue";

const route = useRoute();
const router = useRouter();

// const { t } = useI18n();
const isLoading = ref(false);
const isErrored = ref(false);
const message = ref("");
const model = ref("");
const chapterListing = ref(true);

const props = defineProps({
  chapterName: {
    type: String,
    required: false,
    default: "",
  }
});
const options = {
  modelName: "Topic",
  selectedItem: route.params.id
};

function add() {
  chapterListing.value = false;

  router.push({ name: "CreateChapter" });
}

function edit(item) {
  chapterListing.value = false;
  router.push({
    name: "EditChapter",
    params: { id: item.id },
  });
}

function show(item) {
  chapterListing.value = false;
  console.log(item);
  // router.push({
  //   name: "ShowChapter",
  //   params: { id: item.id },
  // });
  //parentId = 
  //console.log(item)
}

function deleteI(item) {
  store.dispatch("topics/delete", item.id);
}
</script>

<!-- <template>
  
    <div class="grid grid-cols-12 gap-12">
      <div class="intro-y box col-span-12 lg:col-span-12">
        <div
          class="
            flex
            items-center
            px-5
            py-5
            sm:py-3
            border-b border-slate-200/60
            dark:border-darkmode-400
          "
        >
          <h2 class="font-medium text-base mr-auto">
            {{ t("chapters.List of all the Topics of Chapter") }} {{ chapterName}}
          </h2>
        </div>
          <div class="p-5">
            <DataTable
              module="topics"
              :importExportOptions="options"
              @showItem="show"
              @editItem="edit"
              @deleteItem="deleteI"
              @addModel="add"
              :showData="route.params.id"
            />
          </div>
      </div>
    </div>
</template> -->
<template>
  <div>
    <template v-if="chapterListing">
      <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
          List of all the Topics of Chapter {{ chapterName }}
        </h2>
      </div>
      <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Dtatatable Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
          <!-- BEGIN: HTML Table Data -->

          <div class="intro-y box p-5">
            <div class="overflow-x-auto scrollbar-hidden">
              <DataTable
                module="topics"
                :importExportOptions="options"
                @showItem="show"
                @editItem="edit"
                @deleteItem="deleteI"
                @addModel="add"
                :showData="route.params.id"
              />
            </div>
          </div>
          <!-- END: HTML Table Data -->
        </div>
        <!-- END: Dtatatable Content -->
      </div>
    </template>
    <template v-else>
      <router-view></router-view>
    </template>
  </div>
</template>
<style>
</style>