<script setup lang="ts">
import { ref, onMounted, computed, watch } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
import store from "@/stores";
// import DataTable from "@/components/DataTable/Index.vue";

const route = useRoute();
const router = useRouter();

const options = {
  modelName: "Chapter",
  selectedItem: route.params.id
};
// const { t } = useI18n();
const listing = ref(true);

function add() {
  listing.value = false;
  router.push({ name: "CreateChapter" });
}
onMounted(() => {
  if (
    route.name == "CreateChapter" ||
    route.name == "EditChapter" ||
    route.name == "ShowChapter"
  ) {
    listing.value = false;
  }
});
watch(
  () => route.name,
  (to, from) => {
    if (to === "Chapters") {
      listing.value = true;
    }
  }
);

function edit(item) {
  listing.value = false;
  router.push({
    name: "EditChapter",
    params: { id: item.id },
  });
}

function show(item) {
  listing.value = false;
  router.push({
    name: "ShowChapter",
    params: { id: item.id },
  });
}
function deleteI(item) {
  store.dispatch("chapters/delete", item.id);
}
</script>

<template>
  <div>
    <template v-if="listing">
      <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
          Chapters
        </h2>
      </div>
      <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Dtatatable Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
          <!-- BEGIN: HTML Table Data -->

          <div class="intro-y box p-5">
            <div class="overflow-x-auto scrollbar-hidden">
              <DataTable
                module="chapters"
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
<style scoped>
</style>