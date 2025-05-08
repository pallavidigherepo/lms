<script setup lang="ts">
import "@/assets/css/vendors/tabulator.css";
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import products from "@/fakers/products";
import {
  FormInline,
  FormInput,
  FormLabel,
  FormSelect,
} from "@/components/Base/Form";
import * as xlsx from "xlsx";
import { onMounted, ref, reactive } from "vue";
import { createIcons, icons } from "lucide";
import { TabulatorFull as Tabulator } from "tabulator-tables";
import { stringToHTML } from "@/utils/helper";

interface Response {
  name?: string;
  category?: string;
  images?: string[];
  status?: string;
}

const tableRef = ref<HTMLDivElement>();
const tabulator = ref<Tabulator>();
const filter = reactive({
  field: "name",
  type: "like",
  value: "",
});
const setFilter = (value: typeof filter) => {
  Object.assign(filter, value);
};

const imageAssets = import.meta.glob<{
  default: string;
}>("/src/assets/images/fakers/*.{jpg,jpeg,png,svg}", { eager: true });

const initTabulator = () => {
  if (tableRef.value) {
    tabulator.value = new Tabulator(tableRef.value, {
      ajaxURL: "https://midone-api.vercel.app/",
      paginationMode: "remote",
      filterMode: "remote",
      sortMode: "remote",
      printAsHtml: true,
      printStyled: true,
      pagination: true,
      paginationSize: 10,
      paginationSizeSelector: [10, 20, 30, 40],
      layout: "fitColumns",
      responsiveLayout: "collapse",
      placeholder: "No matching records found",
      columns: [
        {
          title: "",
          formatter: "responsiveCollapse",
          width: 40,
          minWidth: 30,
          hozAlign: "center",
          resizable: false,
          headerSort: false,
        },

        // For HTML table
        {
          title: "PRODUCT NAME",
          minWidth: 200,
          responsive: 0,
          field: "name",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell) {
            const response: Response = cell.getData();
            return `<div>
                <div class="font-medium whitespace-nowrap">${response.name}</div>
                <div class="text-xs text-slate-500 whitespace-nowrap">${response.category}</div>
              </div>`;
          },
        },
        {
          title: "IMAGES",
          minWidth: 200,
          field: "images",
          hozAlign: "center",
          headerHozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell) {
            const response: Response = cell.getData();
            return response.images
              ? `<div class="flex lg:justify-center">
                    <div class="w-10 h-10 intro-x image-fit">
                      <img alt="Midone Tailwind HTML Admin Template" class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" src="${
                        products.fakeProducts()[0].images[0].path
                      }">
                    </div>
                    <div class="w-10 h-10 -ml-5 intro-x image-fit">
                      <img alt="Midone Tailwind HTML Admin Template" class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" src="${
                        products.fakeProducts()[0].images[0].path
                      }">
                    </div>
                    <div class="w-10 h-10 -ml-5 intro-x image-fit">
                      <img alt="Midone Tailwind HTML Admin Template" class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" src="${
                        products.fakeProducts()[0].images[0].path
                      }">
                    </div>
                </div>`
              : "";
          },
        },
        {
          title: "REMAINING STOCK",
          minWidth: 200,
          field: "remaining_stock",
          hozAlign: "center",
          headerHozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
        },
        {
          title: "STATUS",
          minWidth: 200,
          field: "status",
          hozAlign: "center",
          headerHozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell) {
            const response: Response = cell.getData();
            return `<div class="flex items-center lg:justify-center ${
              response.status ? "text-success" : "text-danger"
            }">
                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> ${
                  response.status ? "Active" : "Inactive"
                }
              </div>`;
          },
        },
        {
          title: "ACTIONS",
          minWidth: 200,
          field: "actions",
          responsive: 1,
          hozAlign: "center",
          headerHozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter() {
            const a =
              stringToHTML(`<div class="flex items-center lg:justify-center">
                  <a class="flex items-center mr-3" href="javascript:;">
                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                  </a>
                  <a class="flex items-center text-danger" href="javascript:;">
                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                  </a>
                </div>`);
            a.addEventListener("click", function () {
              // On click actions
            });
            return a;
          },
        },

        // For print format
        {
          title: "PRODUCT NAME",
          field: "name",
          visible: false,
          print: true,
          download: true,
        },
        {
          title: "CATEGORY",
          field: "category",
          visible: false,
          print: true,
          download: true,
        },
        {
          title: "REMAINING STOCK",
          field: "remaining_stock",
          visible: false,
          print: true,
          download: true,
        },
        {
          title: "STATUS",
          field: "status",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue() ? "Active" : "Inactive";
          },
        },
        {
          title: "IMAGE 1",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[0];
          },
        },
        {
          title: "IMAGE 2",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[1];
          },
        },
        {
          title: "IMAGE 3",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[2];
          },
        },
      ],
    });
  }

  tabulator.value?.on("renderComplete", () => {
    createIcons({
      icons,
      attrs: {
        "stroke-width": 1.5,
      },
      nameAttr: "data-lucide",
    });
  });
};

// Redraw table onresize
const reInitOnResizeWindow = () => {
  window.addEventListener("resize", () => {
    if (tabulator.value) {
      tabulator.value.redraw();
      createIcons({
        icons,
        attrs: {
          "stroke-width": 1.5,
        },
        nameAttr: "data-lucide",
      });
    }
  });
};

// Filter function
const onFilter = () => {
  if (tabulator.value) {
    tabulator.value.setFilter(filter.field, filter.type, filter.value);
  }
};

// On reset filter
const onResetFilter = () => {
  setFilter({
    ...filter,
    field: "name",
    type: "like",
    value: "",
  });
  onFilter();
};

// Export
const onExportCsv = () => {
  if (tabulator.value) {
    tabulator.value.download("csv", "data.csv");
  }
};

const onExportJson = () => {
  if (tabulator.value) {
    tabulator.value.download("json", "data.json");
  }
};

const onExportXlsx = () => {
  if (tabulator.value) {
    (window as any).XLSX = xlsx;
    tabulator.value.download("xlsx", "data.xlsx", {
      sheetName: "Products",
    });
  }
};

const onExportHtml = () => {
  if (tabulator.value) {
    tabulator.value.download("html", "data.html", {
      style: true,
    });
  }
};

// Print
const onPrint = () => {
  if (tabulator.value) {
    tabulator.value.print();
  }
};

onMounted(() => {
  initTabulator();
  reInitOnResizeWindow();
});
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Tabulator
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
            Add New User
          </Button>
        </div>
      </div>
      <div class="flex flex-col gap-8 mt-3.5">
        <div class="flex flex-col box box--stacked">
          <div class="flex flex-col p-5 xl:items-center xl:flex-row gap-y-2">
            <form
              id="tabulator-html-filter-form"
              class="flex xl:flex-row flex-col border-dashed gap-x-5 gap-y-2 border border-slate-300/80 xl:border-0 rounded-[0.6rem] p-4 sm:p-5 xl:p-0"
              @submit.prevent="
                (e) => {
                  e.preventDefault();
                  onFilter();
                }
              "
            >
              <FormInline
                class="flex-col items-start xl:flex-row xl:items-center gap-y-2"
              >
                <FormLabel class="mr-3 whitespace-nowrap">
                  Search by
                </FormLabel>
                <FormSelect
                  id="tabulator-html-filter-field"
                  v-model="filter.field"
                  class=""
                >
                  <option value="name">Name</option>
                  <option value="category">Category</option>
                  <option value="remaining_stock">Remaining Stock</option>
                </FormSelect>
              </FormInline>
              <FormInline
                class="flex-col items-start xl:flex-row xl:items-center gap-y-2"
              >
                <FormLabel class="mr-3 whitespace-nowrap">Type</FormLabel>
                <FormSelect
                  id="tabulator-html-filter-type"
                  v-model="filter.type"
                  class=""
                >
                  <option value="like">like</option>
                  <option value="=">=</option>
                  <option value="<">&lt;</option>
                  <option value="<=">&lt;=</option>
                  <option value=">">&gt;</option>
                  <option value=">=">&gt;=</option>
                  <option value="!=">!=</option>
                </FormSelect>
              </FormInline>
              <FormInline
                class="flex-col items-start xl:flex-row xl:items-center gap-y-2"
              >
                <FormLabel class="mr-3 whitespace-nowrap"> Keywords </FormLabel>
                <FormInput
                  id="tabulator-html-filter-value"
                  v-model="filter.value"
                  type="text"
                  class=""
                  placeholder="Search..."
                />
              </FormInline>
              <div class="flex flex-col gap-2 mt-2 sm:flex-row xl:mt-0">
                <Button
                  id="tabulator-html-filter-go"
                  variant="outline-primary"
                  type="button"
                  class="w-full sm:w-auto bg-primary/5 border-primary/20"
                  @click="onFilter"
                >
                  Search
                </Button>
                <Button
                  id="tabulator-html-filter-reset"
                  variant="outline-secondary"
                  type="button"
                  class="w-full sm:w-auto bg-slate-50/50 dark:bg-darkmode-400"
                  @click="onResetFilter"
                >
                  Reset
                </Button>
              </div>
            </form>
            <div
              class="flex flex-col mt-3 sm:flex-row gap-x-3 gap-y-2 xl:ml-auto xl:mt-0"
            >
              <Button variant="outline-secondary" @click="onPrint">
                <Lucide icon="Printer" class="stroke-[1.3] w-4 h-4 mr-2" />
                Print
              </Button>
              <Menu class="sm:ml-auto xl:ml-0">
                <Menu.Button
                  :as="Button"
                  variant="outline-secondary"
                  class="w-full sm:w-auto"
                >
                  <Lucide icon="FileCheck2" class="stroke-[1.3] w-4 h-4 mr-2" />
                  Export
                  <Lucide
                    icon="ChevronDown"
                    class="stroke-[1.3] w-4 h-4 ml-2"
                  />
                </Menu.Button>
                <Menu.Items class="w-40">
                  <Menu.Item @click="onExportCsv">
                    <Lucide icon="FileCheck2" class="w-4 h-4 mr-2" />
                    Export CSV
                  </Menu.Item>
                  <Menu.Item @click="onExportJson">
                    <Lucide icon="FileCheck2" class="w-4 h-4 mr-2" />
                    Export JSON
                  </Menu.Item>
                  <Menu.Item @click="onExportXlsx">
                    <Lucide icon="FileCheck2" class="w-4 h-4 mr-2" />
                    Export XLSX
                  </Menu.Item>
                  <Menu.Item @click="onExportHtml">
                    <Lucide icon="FileCheck2" class="w-4 h-4 mr-2" />
                    Export HTML
                  </Menu.Item>
                </Menu.Items>
              </Menu>
            </div>
          </div>
          <div class="pb-5">
            <div class="overflow-x-auto scrollbar-hidden">
              <div id="tabulator" ref="tableRef"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
