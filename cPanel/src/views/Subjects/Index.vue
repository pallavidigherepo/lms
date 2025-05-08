<script setup lang="ts">
import { ref, onMounted, computed, watch } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
// import DataTable from "@/components/DataTable/Index.vue";
// import Tabulator from "@/pages/Tabulator.vue";
import store from "@/stores";

const route = useRoute();
const router = useRouter();

const options = {
  modelName: "Subject",
};
// const { t } = useI18n();
const listing = ref(true);

onMounted(() => {
  if (
    route.name == "CreateSubject" ||
    route.name == "EditSubject" ||
    route.name == "ShowSubject"||
    route.name == "ShowChapter"
  ) {
    listing.value = false;
  }
});

watch(
  () => route.name,
  (to, from) => {
    if (to === "Subjects") {
      listing.value = true;
    }
  }
);

function add() {
  listing.value = false;
  router.push({ name: "CreateSubject" });
}

function edit(item) {
  listing.value = false;
  router.push({
    name: "EditSubject",
    params: { id: item.id },
  });
}

function show(item) {
  listing.value = false;
  router.push({
    name: "ShowSubject",
    params: { id: item.id },
  });
}

function deleteI(subject) {
  store.dispatch("subjects/delete", subject.id);
}
</script>

<style scoped>
</style>
<template>
  <div>
    <template v-if="listing">
      <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
          Subjects
        </h2>
      </div>
      <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: DataTable Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
          <!-- BEGIN: HTML Table Data -->

          <div class="intro-y">
            <div class="overflow-x-auto scrollbar-hidden">
              <DataTable
                module="subjects"
                :importExportOptions="options"
                @showItem="show"
                @editItem="edit"
                @deleteItem="deleteI"
                @addModel="add"
              />
            </div>
          </div>
          <!-- END: HTML Table Data -->
        </div>
        <!-- END: DataTable Content -->
      </div>
    
    </template>
    <template v-else>
      <router-view></router-view>
    </template>
  </div>
</template>

