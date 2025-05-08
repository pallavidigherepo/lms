<script setup lang="ts">
import { ref, onMounted, computed, watch } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
// import DataTable from "@/components/DataTable/Index.vue";
import store from "@/stores";

const route = useRoute();
const router = useRouter();

const options = {
  modelName: "Parent",
};
// const { t } = useI18n();
const listing = ref(true);

onMounted(() => {
  if (route.name === "EditParent") {
    listing.value = false;
  }
});
watch(
  () => route.name,
  (to, from) => {
    if (to === "Parents") {
      listing.value = true;
    }
  }
);

function edit(item) {
  listing.value = false;
  router.push({
    name: "EditParent",
    params: { id: item.id },
  });
}

function deleteI(item) {
  store.dispatch("parents/delete", item.id);
}
</script>


<template>
  <div>
    <template v-if="listing">
      <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
          Parents
        </h2>
      </div>
      <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Datatable Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
          <!-- BEGIN: HTML Table Data -->

          <div class="intro-y">
            <div class="overflow-x-auto scrollbar-hidden">
              <DataTable
                module="parents"
                :importExportOptions="options"
                @editItem="edit"
                @deleteItem="deleteI"
                @addModel="add"
              />
            </div>
          </div>
          <!-- END: HTML Table Data -->
        </div>
        <!-- END: Datatable Content -->
      </div>
    </template>
    <template v-else>
      <router-view></router-view>
    </template>
  </div>
</template>

<style scoped>
</style>
