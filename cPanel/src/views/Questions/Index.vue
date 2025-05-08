<script setup lang="ts">
import { ref, onMounted, computed, watch } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
// import DataTable from "@/components/DataTable/Index.vue";
import store from "@/stores";

const route = useRoute();
const router = useRouter();

const options = {
  modelName: "Question",
};
// const { t } = useI18n();
const listing = ref(true);

onMounted(() => {
  if (
    route.name === "CreateQuestion" ||
    route.name === "EditQuestion" ||
    route.name === "ShowQuestion"
  ) {
    listing.value = false;

  }
});

watch(
  () => route.name,
  (to, from) => {
    if (to === "Questions") {
      listing.value = true;
    }
  }
);

function add() {
  listing.value = false;
  router.push({ name: "CreateQuestion" });
}

function edit(item) {
  listing.value = false;
  router.push({
    name: "EditQuestion",
    params: { id: item.id },
  });
}

function show(item) {
  listing.value = false;
  router.push({
    name: "ShowQuestion",
    params: { id: item.id },
  });
}

function deleteI(item) {
  store.dispatch("questions/delete", item.id);
}
</script>

<template>
  <div>
    <template v-if="listing">
      <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
          Questions
        </h2>
      </div>
        <!-- BEGIN: Notification -->
        <info :typeClass="'alert-warning'"
              class="mb-6 mt-5"
              :message="'questions.Before ADDING questions please make sure that you have added subjects chapters and topics to selected standard'"
              :goto="'/subjects'"
              :gotoLabel="'Click here to add subjects, chapters and topics'"
        />
        <!-- BEGIN: Notification -->
      <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Datatable Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
          <!-- BEGIN: HTML Table Data -->

          <div class="intro-y">
            <div class="overflow-x-auto scrollbar-hidden">
              <DataTable
                module="questions"
                :importExportOptions="options"
                @showItem="show"
                @editItem="edit"
                @deleteItem="deleteI"
                @addModel="add"
              >
                  <template v-slot:info>

                  </template>

              </DataTable>
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
