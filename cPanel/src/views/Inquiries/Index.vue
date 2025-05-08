<script setup lang="ts">
import {ref, onMounted, computed, watch, reactive} from "vue";
// import {useI18n} from "vue-i18n";
import {useRoute, useRouter} from "vue-router";
import store from "@/stores";
import { Dialog, Menu } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import TomSelect from "@/components/Base/TomSelect";
import { FormInput, FormSelect, FormCheck, FormTextarea } from "@/components/Base/Form";
// import Pagination from "@/components/DataTable/Pagination.vue";
import Table from "@/components/Base/Table";
// import InquiryFollowups from "@/components/Inquiries/Followups.vue";
import _ from "lodash";

const route = useRoute();
const router = useRouter();

const headerFooterModalPreview = ref(false);
// const {t} = useI18n();
const listing = ref(true);
const search = ref("");
const loading = ref(false);
const isFollowupCalled = ref(false);
onMounted(() => {
    if (
        route.name === "CreateInquiry" ||
        route.name === "EditInquiry" ||
        route.name === "ShowInquiry"
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
        .dispatch("inquiries/list", {url: url.value})
        .then(() => {
            loading.value = false;
        })
        .catch();
}

const noRecords = ref(false);
const datatableoptions = computed(
    () => store.getters["inquiries/datatable"]
);
const items = computed(() => {
    let records = store.getters["inquiries/inquiries"];

    if (records.data && parseInt(records.data.length) < 1) {
        noRecords.value = true;
    }
    return records;
});

const links = computed(() => store.getters["inquiries/meta"]);
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

watch(
    () => route.name,
    (to, from) => {
        if (to === "Inquiries") {
            listing.value = true;
            fetchList();
        } else {
            listing.value = false;
        }
    }
);

function add() {
    listing.value = false;
    router.push({ name: "CreateInquiry" });
}

function deleteI(item) {
    store.dispatch("inquiries/delete", item.id);
}

function searchMe()
{

}
function openModal() {
    //import_file.value = '';
    headerFooterModalPreview.value = true;
    responseMessage.value = "";
    responseStatus.value = false;
}
const showFollowupValue = ref(false);
const inquiryId = ref("");
const inquiryStatusId = ref("");

function showFollowups(item)
{
    isFollowupCalled.value = true;
    showFollowupValue.value = true;
    inquiryId.value = item.id;
    inquiryStatusId.value = item.inquiry_status_id;
}
const modelName = "Inquiry";
const downloadFileName = ref('');
const responseStatus = ref(false);
const responseMessage = ref('');
const responseErrors = ref("");
const options = {
    modelName: "Question",
};;

const form = {
    export_as: ""
}
async function exportMe(export_as, isDemo) {
    const demo = ref(false);

    let todayDate = new Date();

    let name = modelName + "-" + todayDate.getDate() + "-"
        + (todayDate.getMonth() + 1) + "-"
        + todayDate.getFullYear() + "-"
        + todayDate.getHours() + "-"
        + todayDate.getMinutes() + "-"
        + todayDate.getSeconds();
    if (!isDemo) {
        downloadFileName.value = name + "." + export_as;
    } else {
        downloadFileName.value = "Template for " + name + "." + export_as;
        demo.value = true;
    }
    const req = {
        fileName: downloadFileName.value,
        modelName: modelName,
        selectedItem: "",
        demo: demo.value
    };

    await store.dispatch('exportMe', req)
        .then((response) => {
            if (response.status === 200) {
                form.export_as = "";
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement("a");
                fileLink.href = fileURL;
                fileLink.setAttribute("download", downloadFileName.value);
                //fileLink.setAttribute('target', '_blank');
                document.body.appendChild(fileLink);
                fileLink.click();
            }
        })
        .catch();
}
const import_file = ref({});

function importMe(e) {
    responseStatus.value = false;
    responseMessage.value = '';

    import_file.value = e.target.files[0];

    var allowedExtensions =
        import.meta.env.VITE_IMPORTS_ALLOWED.split(",");

    if (allowedExtensions.includes(e.target.files[0]["type"])) {
        proceedAction();
    } else {
        responseStatus.value = false;
        responseMessage.value = "Wrong file type.";
    }
    //console.log(import_file.value.size);
}

function proceedAction() {
    let formData = new FormData();
    formData.append("modelName", modelName);
    formData.append("import_file", import_file.value);


    store
        .dispatch("importMe", formData)
        .then((res) => {
            responseStatus.value = res.data.success;
            responseMessage.value = res.data.message;
            responseErrors.value = res.data.failures ?? null;

            import_file.value = {};
            if (res.data.success == true) {
                setTimeout(() => {
                    headerFooterModalPreview.value = false;
                    responseStatus.value = false;
                    responseMessage.value = "";
                    fetchList();
                }, 1000);
            }
        })
        .catch((error) => {
            //error.response.data;
        });
}

function closeMe()
{
    showFollowupValue.value = false;
}
</script>

<!--suppress ALL -->
<template>
    <div>
        <template v-if="listing">
            <h2 class="intro-y text-lg font-medium mt-10">Inquiries</h2>
            <div class="box overflow-x-auto intro-y grid grid-cols-12 gap-6 mt-5 p-5" >
                <div
                    class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2"
                >
                    <Button  variant="primary" class="btn btn-primary shadow-md mr-2"
                                 @click.prevent="add"
                                 @click="router.push('/inquiries/create')">
                                 Add New
                    </Button>
                    <Menu>
                    <div v-if="datatableoptions.export" class="dropdown">
                        <Menu.Button aria-expanded="false" :as="Button" variant="primary" class="dropdown-toggle btn btn-primary ml-2"
                                data-tw-toggle="dropdown">
                              <span class="flex items-center justify-center">
                                Export/Print&nbsp;
                                <Lucide icon="DownloadIcon" class="w-4 h-4"/>
                              </span>
                        </Menu.Button>
                        <Menu.Items class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <!-- <li>
                                    <a href="javascript:;" class="dropdown-item">
                                        <PrinterIcon class="w-4 h-4 mr-2" />
                                        {{ t("permissions.Print") }}
                                    </a>
                                    </li> -->
                                <li>
                                    <a class="dropdown-item" href="javascript:;"
                                       @click.prevent="exportMe('xlsx')">
                                       <Lucide icon="FileTextIcon" class="w-4 h-4"/>
                                       Export to Excel
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;"
                                       @click.prevent="exportMe('csv')">
                                       <Lucide icon="FileTextIcon" class="w-4 h-4"/>
                                       Export to CSV
                                    </a>
                                </li>
                                <!-- <li>
                                    <a
                                        href="javascript:;"
                                        class="dropdown-item"
                                        @click.prevent="exportMe('pdf')"
                                    >
                                        <Lucide icon="FileTextIcon" class="w-4 h-4"/>
                                        {{ t("permissions.Export to PDF") }}
                                    </a>
                                    </li> -->
                            </ul>
                        </Menu.Items>
                    </div>
                </Menu>
                <Menu>
                    <div v-if="datatableoptions.import" class="dropdown">
                        <Menu.Button aria-expanded="false" :as="Button" variant="primary" class="dropdown-toggle btn btn-primary ml-2"
                                data-tw-toggle="dropdown">
                                      <span class="flex items-center justify-center">
                                        Import&nbsp;
                                        <Lucide icon="UploadIcon" class="w-4 h-4"/>
                                      </span>
                        </Menu.Button>
                        <Menu.Items class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a class="dropdown-item" href="#" @click.prevent="openModal">
                                        <Lucide icon="FileTextIcon" class="w-4 h-4 mr-2"/>
                                        CSV/Excel
                                    </a>
                                </li>
                            </ul>
                        </Menu.Items>
                    </div>
                </Menu>
                    <div class="hidden md:block mx-auto text-slate-500">
                        <!-- {{ t(module+".Showing") }} {{ permissions.from }}
                            {{ t(module+".to") }} {{ permissions.to }}
                            {{ t(module+".of") }} {{ permissions.total }}
                            {{ t(module+".entries") }} -->
                    </div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <FormInput v-model="search" placeholder="Search..."
                                   class="form-control w-56 pr-10 w-full"
                                   type="text" @keyup="searchMe($event)"/>
                            <Lucide icon="SearchIcon" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"/>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <Table class="table table-report -mt-2">
                        <Table.Thead>
                        <Table.Tr>
                            <Table.Th class="whitespace-nowrap">#</Table.Th>
                            <Table.Th class="whitespace-nowrap">DATE AND CODE</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">BATCH AND STANDARD</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">MOBILE</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">STATUS</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">ASSIGNED TO</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">FOLLOW UPS</Table.Th>
                            <Table.Th class="text-center whitespace-nowrap">ACTIONS</Table.Th>
                        </Table.Tr>
                        </Table.Thead>

                        <template v-if="items">
                            <Table.Tbody>
                                <Table.Tr
                                v-for="(item, index) in items.data"
                                :key="index"
                                class="intro-x"
                            >
                                <Table.Td>
                                    <div class="flex">
                                        {{ index + 1}}
                                    </div>
                                </Table.Td>
                                <Table.Td>
                                    <span class="font-medium whitespace-nowrap">{{ item.inquiry_date }}</span>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        {{ item.unique_code }}
                                    </div>
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                    <span class="font-medium whitespace-nowrap">{{ item.batch }}</span>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        {{ item.standard }}
                                    </div>
                                </Table.Td>
                                <Table.Td class="text-center">
                                    <a :href="'tel:'+item.contact_mobile">
                                        <div
                                            class="flex items-center justify-center"
                                        >
                                            <Lucide icon="PhoneIcon" class="w-4 h-4 mr-2" />{{ item.contact_mobile }}
                                        </div>
                                    </a>
                                </Table.Td>
                                <Table.Td class="w-40">
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <Button v-if="item.status == 'Open'" class="btn btn-danger-soft w-32 mr-2 mb-2">
                                            {{ item.status }}
                                        </Button>

                                        <Button v-if="item.status == 'Close'" class="btn btn-success w-32 mr-2 mb-2">
                                            {{ item.status }}
                                        </Button>
                                        <Button v-if="item.status == 'Waiting for Response'" class="btn btn-pending-soft w-32 mr-2 mb-2">
                                            {{ item.status }}
                                        </Button>
                                        <Button v-if="item.status == 'Accepted'" class="btn btn-primary w-32 mr-2 mb-2">
                                            {{ item.status }}
                                        </Button>
                                        <Button v-if="item.status == 'Rejected'" href="" class="btn btn-dark w-32 mr-2 mb-2">
                                            {{ item.status }}
                                        </Button>
                                    </div>
                                </Table.Td>
                                <Table.Td class="text-center">
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <Lucide icon="UserIcon" class="w-4 h-4 mr-1" />{{ item.assigned }}
                                    </div>
                                </Table.Td>
                                <Table.Td class="text-center">
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <a href="javascript:;"
                                           class="flex items-center text-warning mr-2"
                                           @click.prevent="showFollowups(item)"
                                        >
                                            <Lucide icon="MessageCircleIcon"  class="w-4 h-4 mr-1" />Follow Ups
                                        </a>
                                    </div>
                                </Table.Td>
                                <Table.Td class="table-report__action w-85">
                                    <div class="flex justify-center items-center">
                                        <router-link :to="{ name: 'ShowInquiry', params: { id: item.id } }"
                                                     class="flex items-center text-primary mr-2">
                                            <Lucide icon="EyeIcon" class="w-4 h-4 mr-1"/>Show
                                        </router-link>
                                        <router-link :to="{ name: 'EditInquiry', params: { id: item.id } }"
                                                     class="flex items-center text-success mr-2">
                                            <Lucide icon="Edit3Icon"  class="w-4 h-4 mr-1" />
                                            Edit
                                        </router-link>
                                        <a class="flex items-center text-danger"
                                           href="javascript:;"
                                           @click.prevent="deleteI(item)">
                                            <Lucide icon="Trash2Icon" Trash2Icon class="w-4 h-4 mr-1"/>
                                            Delete
                                        </a>
                                        <!--                                    <Dropdown>-->
                                        <!--                                        <DropdownToggle tag="a" class="w-5 h-5 block" href="javascript:;">-->
                                        <!--                                            <MoreHorizontalIcon class="w-5 h-5 text-slate-500" />-->
                                        <!--                                        </DropdownToggle>-->
                                        <!--                                        <DropdownMenu class="w-40">-->
                                        <!--                                            <DropdownContent>-->
                                        <!--                                                <DropdownItem>-->
                                        <!--                                                    <MessageCircleIcon class="w-4 h-4 mr-2" />{{ t("inquiries.Add Comment") }}-->
                                        <!--                                                </DropdownItem>-->
                                        <!--                                                <DropdownItem>-->
                                        <!--                                                    <router-link :to="{ name: ShowInquiry, params: { id: item.id } }" class="flex">-->
                                        <!--                                                        <EyeIcon class="w-4 h-4 mr-2"/>{{ t("inquiries.View Details") }}-->
                                        <!--                                                    </router-link>-->
                                        <!--                                                </DropdownItem>-->
                                        <!--                                                <DropdownItem>-->
                                        <!--                                                    <router-link :to="{ name: EditInquiry, params: { id: item.id } }" class="flex">-->
                                        <!--                                                        <Edit2Icon class="w-4 h-4 mr-2" />-->
                                        <!--                                                    {{ t("common.Edit") }}-->
                                        <!--                                                    </router-link>-->
                                        <!--                                                </DropdownItem>-->
                                        <!--                                                <DropdownItem>-->
                                        <!--                                                    <TrashIcon class="w-4 h-4 mr-2" /> {{ t("common.Delete") }}-->
                                        <!--                                                </DropdownItem>-->
                                        <!--                                            </DropdownContent>-->
                                        <!--                                        </DropdownMenu>-->
                                        <!--                                    </Dropdown>-->
                                    </div>
                                </Table.Td>
                            </Table.Tr>
                            </Table.Tbody>
                        </template>
                        <template v-if="items">
                            <Table.Tbody v-if="noRecords && !items.data.length">
                                <Table.Tr class="intro-x bg-secondary">
                                    <Table.Td colspan="8" class="text-center">
                                        Sorry, no records found
                                    </Table.Td>
                                </Table.Tr>
                            </Table.Tbody>
                        </template>


                    </Table>
                </div>
                <!-- END: Data List -->

                <!-- BEGIN: Pagination -->

                <Pagination
                    :currentPage="currentPage"
                    :links="links"
                    @paginate="getForPage"
                    @perpage="perPageValue"/>
                <!-- END: Pagination -->
            </div>

            <!-- BEGIN: Modal Content -->
            <Dialog :open="headerFooterModalPreview"
             size="lg"
             @hidden="headerFooterModalPreview = false">
          
          <CustomeAlert v-if="responseMessage"
                        :errors="responseErrors"
                        :message="responseMessage"
                        :status="responseStatus"
                        class="col-span-12 sm:col-span-6 flex"/>
          <Dialog.Panel class="grid grid-cols-12 gap-4 gap-y-3">
            <Dialog.Title>
              <h2 class="font-medium text-base mr-auto">
                  {{ t("common.Import as CSV/Excel") }}
              </h2>
            </Dialog.Title>
              <div class="col-span-12 sm:col-span-14 text-center">
                  <slot name="info"></slot>
                  <div class="upload-btn-wrapper">
                      <Button class="upload-btn">{{
                              t("common.Upload file")
                          }}
                      </Button>
                      <FormInput id="modal-form-1" name="myfile" type="file" @change="importMe($event)"/>
                  </div>
                  <div class="col-span-12">
                      <div
                          class="alert alert-outline-warning alert-dismissible bg-warning/20 dark:bg-darkmode-400 dark:border-darkmode-400 mt-5 mr-5 show"
                          role="alert" style="display: block;">

                          <div class="flex items-center"><span><svg class="lucide w-6 h-6 mr-3" fill="none"
                                                                    height="24"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    viewBox="0 0 24 24"
                                                                    width="24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z">
                  </path>
                  <line x1="12" x2="12" y1="9" y2="13"></line>
                  <line x1="12" x2="12.01" y1="17" y2="17"></line>
                </svg></span><span class="text-slate-800 dark:text-slate-500">Supports CSV and Excel files.</span>

                          </div>
                      </div>

                      <div class="grid grid-cols-6 gap-6 mt-5">
                          <div class="col-span-6 sm:col-span-6 xl:col-span-3 intro-y">
                              <div class="report-box zoom-in">
                                  <div class="box p-4">
                                      <div class="flex text-center justify-center">

                                          <div class="">
                                            <Lucide icon="DownloadCloudIcon" class="w-4 h-4"/>
                                          </div>
                                      </div>
                                      <div class="text-base text-slate-500 mt-1">
                                          <Button variant="primary" class="btn btn-primary h-20"
                                                  @click.prevent="exportMe('xlsx', true)">
                                              {{ t('common.Download Template for EXCEL') }}
                                          </Button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-span-6 sm:col-span-6 xl:col-span-3 intro-y">
                              <div class="report-box zoom-in">
                                  <div class="box p-4">
                                      <div class="flex text-center justify-center">

                                          <div class="">
                                            <Lucide icon="DownloadCloudIcon" class="w-4 h-4"/>
                                          </div>
                                      </div>
                                      <div class="text-base text-slate-500 mt-1">
                                          <Button variant="primary" class="btn btn-primary h-20"
                                                  @click.prevent="exportMe('csv', true)">
                                              {{ t('common.Download Template for CSV') }}
                                          </Button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            
       
          <Dialog.Footer class="flex justify-start space-x-2">
              <Button id="import-export-cancel-Button"
                        variant="outline-secondary"
                      class="w-20 mr-1"
                      type="button"
                      @click="headerFooterModalPreview = false">
                  {{ t("common.Cancel") }}
              </Button>
              <!-- <Button type="button" variant="primary" class="w-20">
                  {{ t("permissions.Import") }}
             </Button> -->
          </Dialog.Footer>
        </Dialog.Panel>
      </Dialog>
            <!-- END: Modal Content -->
            <Loading v-if="loading" fixed></Loading>
            <inquiry-followups v-if="isFollowupCalled"
                               v-model="showFollowupValue"
                               @close = "closeMe(false)"
                               :inquiryId="inquiryId"
                               :inquiryStatusId="inquiryStatusId" />
        </template>
        <template v-else>
            <router-view></router-view>
        </template>

    </div>

</template>
<style scoped>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
} 

.upload-btn {
  border: 2px solid rgb(51, 11, 228);
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

 .upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
