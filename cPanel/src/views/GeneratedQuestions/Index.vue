<script setup>
import { ref, onMounted, computed, watch, reactive } from "vue";
// import { useI18n } from "vue-i18n";
import { useRoute, useRouter } from "vue-router";
import { Dialog, Menu } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
import store from "@/stores";
import _ from "lodash";

const route = useRoute();
const router = useRouter();

// const { t } = useI18n();
const listing = ref(true);
const loading = ref(false);

onMounted(() => {
    if (
        route.name === "EditGeneratedQuestionPaper" ||
        route.name === "ShowGeneratedQuestionPaper" ||
        route.name === "AssignToStudent"
    ) {
        listing.value = false;
    } else {
        listing.value = true;
        fetchList();
    }

});

function fetchList() {
    loading.value = true;
    store
        .dispatch("generated_questions/list", {url: url.value})
        .then(() => {
            loading.value = false;
        })
        .catch();
}

const noRecords = ref(false);
const datatableoptions = computed(
    () => store.getters["generated_questions/datatable"]
);
const items = computed(() => {
    let records = store.getters["generated_questions/generated_questions"];

    if (records.data && parseInt(records.data.length) < 1) {
        noRecords.value = true;
    }
    return records;
});

const links = computed(() => store.getters["generated_questions/meta"]);
const currentPage = ref(datatableoptions.value.defaultPage);

const perPageOptions = [10, 20, 30, 40, 50];
const urlParams = reactive({
    column: datatableoptions.value.defaultColumn,
    order: datatableoptions.value.defaultOrder,
    page: datatableoptions.value.defaultPage,
    search: datatableoptions.value.defaultSearch,
    perpage: datatableoptions.value.defaultPerPage,
});

const url = ref(
    "?page=" +
    urlParams.page +
    "&sort_field=" +
    urlParams.column +
    "&sort_order=" +
    urlParams.order +
    "&search=" +
    urlParams.search +
    "&per_page=" +
    urlParams.perpage
);

// Watch to current url parameters change and when this happens we update local url
watch(
    () => _.cloneDeep(urlParams),
    (newVal, oldVal) => {
        url.value =
            "?page=" +
            urlParams.page +
            "&sort_field=" +
            urlParams.column +
            "&sort_order=" +
            urlParams.order +
            "&search=" +
            urlParams.search +
            "&per_page=" +
            urlParams.perpage;
        fetchList();
    }
);


function getForPage(page) {
    if (page === "Next &raquo;") {
        urlParams.page = parseInt(urlParams.page) + 1;
    } else if (page === "&laquo; Previous" && parseInt(urlParams.page) > 1) {
        urlParams.page = parseInt(urlParams.page) - 1;
    } else {
        urlParams.page = page;
    }
}

function perPageValue(value) {
    urlParams.perpage = value;
}
// Begin: Searching
const search = ref("");

function searchMe(event) {
    urlParams.search = search.value;
    //console.log(event)
}

// End: Searching

const deleteConfirmationModal = ref(false);
const itemToDelete = ref(null);

function assign(item) {
    listing.value = false;
    router.push({
        name: "AssignToStudent",
        params: { id: item.id },
    });

}
function edit(item) {
    listing.value = false;
    router.push({
        name: "EditGeneratedQuestionPaper",
        params: { id: item.id },
    });
}

function show(item) {
    listing.value = false;
    router.push({
        name: "ShowGeneratedQuestionPaper",
        params: { id: item.id },
    });
}

function deleteI(item) {
    itemToDelete.value = item;
    deleteConfirmationModal.value = true
    // store.dispatch("generated_questions/delete", item.id);
}
function confirmDelete() {
    if (itemToDelete.value) {
        store.dispatch("generated_questions/delete", itemToDelete.value.id).then(() => {
            fetchList(); 
        });
        deleteConfirmationModal.value = false;
        itemToDelete.value = null;
    }
}
</script>


<template>
<div>
    <h2 class="intro-y text-lg font-medium mt-10">Generated Question Papers</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div
            class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2"
        >

            <div v-if="datatableoptions.export" class="dropdown">
                <Button aria-expanded="false" class="dropdown-toggle btn btn-primary ml-2" data-tw-toggle="dropdown">
                  <span class="flex items-center justify-center">
                    Export/Print&nbsp;
                    <Lucide icon="DownloadIcon" class="w-4 h-4" />
                  </span>
                </Button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <!-- <li>
                            <a href="javascript:;" class="dropdown-item">
                                <PrinterIcon class="w-4 h-4 mr-2" />
                                {{ t("permissions.Print") }}
                            </a>
                            </li> -->
                        <li>
                            <a class="dropdown-item" href="javascript:;" @click.prevent="exportMe('xlsx')">
                                <Lucide icon="FileTextIcon" class="w-4 h-4 mr-2" />
                                Export to Excel
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;" @click.prevent="exportMe('csv')">
                                <Lucide icon="FileTextIcon" class="w-4 h-4 mr-2" />
                                Export to CSV
                            </a>
                        </li>
                        <!-- <li>
                            <a
                                href="javascript:;"
                                class="dropdown-item"
                                @click.prevent="exportMe('pdf')"
                            >
                                <Lucide icon="FileTextIcon" class="w-4 h-4 mr-2" />
                                {{ t("permissions.Export to PDF") }}
                            </a>
                            </li> -->
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">
                &nbsp;
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <FormInput
                        type="text"
                        class="form-control w-56 box pr-10"
                        placeholder="Search..."
                        @keyup="searchMe($event)"
                        v-model="search"
                    />
                    <Lucide icon="SearchIcon" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" />
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <div
            v-for="(item, index) in items.data"
            :key="index"
            class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3"
        >
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-40 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10"
                    >
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                            <a href="" class="block font-medium text-base">
                                {{ item.name }}</a>
                            <span class="text-white/90 text-xs mt-3">{{ item.template }}</span>
                        </div>
                    </div>

                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center">
                            <Lucide icon="LinkIcon" class="w-4 h-4 mr-2" /> Board: {{ item.board }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="LayersIcon" class="w-4 h-4 mr-2" /> Standard: {{ item.standard }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="BookOpenIcon" class="w-4 h-4 mr-2" /> Subject: {{ item.subject }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="LayersIcon" class="w-4 h-4 mr-2" /> Total Marks: {{ item.template_info.total_marks }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="ClockIcon" class="w-4 h-4 mr-2" /> Duration: {{ item.template_info.duration }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="ArchiveIcon" class="w-4 h-4 mr-2" /> Has Section: {{ item.template_info.has_section ? "Yes": "No" }}
                        </div>
                        <div class="flex items-center mt-2">
                            <Lucide icon="CheckSquareIcon" class="w-4 h-4 mr-2" /> Status: {{ item.template_info.is_active ? "Active": "In-active" }}
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400"
                >
                    <router-link :to="{ name: 'ShowGeneratedQuestionPaper',  params: { id: item.id }}"
                                 class="flex items-center text-primary mr-auto mr-1">
                                 <Lucide icon="EyeIcon" class="w-4 h-4" />
                                 Preview
                    </router-link>

                    <a href="javascript:;"
                       @click="assign(item)"
                       class="flex items-center mr-1 text-warning">
                       <Lucide icon="UsersIcon" class="w-4 h-4 mr-1" />
                       Assign
                    </a>

                    <a href="javascript:;"
                       @click="edit(item)"
                       class="flex items-center mr-1">
                       <Lucide icon="CheckSquareIcon" class="w-4 h-4 mr-1" />
                       Edit
                    </a>
                    <a
                        class="flex items-center text-danger"
                        href="javascript:;"
                        @click="deleteI(item)"
                    >
                    <Lucide icon="Trash2Icon" class="w-4 h-4 mr-1" />
                    Delete
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <Pagination
            :currentPage="currentPage"
            :links="links"
            @paginate="getForPage"
            @perpage="perPageValue"/>
        <!-- END: Pagination -->

    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <Dialog
        :open="deleteConfirmationModal"
        @hidden="deleteConfirmationModal = false"
    >
        <Dialog.Panel class="p-0">
            <div class="p-5 text-center">
                <XCircleIcon class="w-16 h-16 text-danger mx-auto mt-3" />
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-slate-500 mt-2">
                    Do you really want to delete these records? <br />This process cannot
                    be undone.
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <Button
                    variant="outline-secondary"
                    type="button"
                    @click="deleteConfirmationModal = false"
                    class="btn btn-outline-secondary w-24 mr-1"
                >
                    Cancel
                </Button>
                <Button variant="danger" type="button" class="btn btn-danger w-24" @click="confirmDelete">Delete</Button>
            </div>
        </Dialog.Panel>
    </Dialog>
    <!-- END: Delete Confirmation Modal -->
</div>
</template>