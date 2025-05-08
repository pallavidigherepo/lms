<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import cafe from "@/fakers/cafe";
import ReportBarChart5 from "@/components/ReportBarChart5";
import ReportDonutChart5 from "@/components/ReportDonutChart5";
import Pagination from "@/components/Base/Pagination";
import { FormSelect } from "@/components/Base/Form";
import Button from "@/components/Base/Button";
import Litepicker from "@/components/Base/Litepicker";
import { Tab } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";
import { ref } from "vue";
import _ from "lodash";

const generalReportFilter = ref<string>("");
</script>

<template>
  <div class="grid grid-cols-10 gap-y-10 gap-x-6">
    <div class="col-span-12 2xl:col-span-3 gap-y-10">
      <div class="grid grid-cols-12 gap-y-10 gap-x-6">
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
          <div class="flex items-center h-10">
            <div class="text-base font-medium group-[.mode--light]:text-white">
              Current Balance
            </div>
          </div>
          <div class="mt-3.5 box box--stacked">
            <div class="p-5 border-b border-dashed">
              <div class="flex flex-col gap-3 sm:flex-row">
                <div>
                  <div class="text-base text-slate-500">Total Orders</div>
                  <div class="flex items-center mt-1">
                    <div class="text-xl font-medium">1,241,221</div>
                    <div class="flex items-center ml-2.5 -mr-1 text-success">
                      11%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
                <div class="sm:ml-auto">
                  <FormSelect class="px-4 sm:w-28">
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                    <option value="weekly">Weekly</option>
                    <option value="daily">Daily</option>
                  </FormSelect>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-6 px-5 py-6 border-b border-dashed">
              <div>
                <div class="flex items-center text-slate-500">
                  <div class="mr-auto">Order Goal</div>
                  <span class="ml-auto">201 / 410</span>
                </div>
                <div
                  class="flex h-2 mt-2.5 border rounded-full bg-slate-50 dark:bg-darkmode-400"
                >
                  <div
                    class="first:rounded-l last:rounded-r border border-theme-1/40 -m-px bg-theme-1/30 w-[75%]"
                  ></div>
                </div>
              </div>
              <div>
                <div class="flex items-center text-slate-500">
                  <div class="mr-auto">Revenue Progress</div>
                  <span class="ml-auto">$8,500 / $10,000</span>
                </div>
                <div
                  class="flex h-2 mt-2.5 border rounded-full bg-slate-50 dark:bg-darkmode-400"
                >
                  <div
                    class="first:rounded-l last:rounded-r border border-theme-2/40 -m-px bg-theme-2/30 w-[45%]"
                  ></div>
                </div>
              </div>
              <div>
                <div class="flex items-center text-slate-500">
                  <div class="mr-auto">Completed Orders</div>
                  <span class="ml-auto">395 / 450</span>
                </div>
                <div
                  class="flex h-2 mt-2.5 border rounded-full bg-slate-50 dark:bg-darkmode-400"
                >
                  <div
                    class="first:rounded-l last:rounded-r border border-primary/40 -m-px bg-primary/30 w-[75%]"
                  ></div>
                </div>
              </div>
            </div>
            <div class="px-5 py-6">
              <Button
                as="a"
                variant="outline-primary"
                rounded
                class="relative justify-start w-full px-4 border-primary/20 py-2.5"
                href=""
              >
                Explore Details
                <div
                  class="absolute right-0 w-9 h-9 mr-0.5 flex items-center justify-center border rounded-full bg-primary/[0.15] border-primary/[0.15]"
                >
                  <Lucide icon="ArrowRight" class="w-4 h-4" />
                </div>
              </Button>
            </div>
          </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
          <div class="flex items-center h-10">
            <div
              class="text-base font-medium md:group-[.mode--light]:text-white 2xl:group-[.mode--light]:text-current"
            >
              Sales Breakdown
            </div>
          </div>
          <div class="p-5 mt-3.5 box box--stacked">
            <Tab.Group class="mt-1">
              <Tab.List
                variant="boxed-tabs"
                class="w-3/4 mx-auto shadow-sm rounded-[0.6rem]"
              >
                <Tab
                  class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
                >
                  <Tab.Button
                    class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem]"
                    as="button"
                  >
                    Daily
                  </Tab.Button>
                </Tab>
                <Tab
                  class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
                >
                  <Tab.Button
                    class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem]"
                    as="button"
                  >
                    Weekly
                  </Tab.Button>
                </Tab>
                <Tab
                  class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
                >
                  <Tab.Button
                    class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem]"
                    as="button"
                  >
                    Monthly
                  </Tab.Button>
                </Tab>
              </Tab.List>
              <Tab.Panels class="mt-8">
                <Tab.Panel>
                  <div
                    class="[&>div]:!h-[200px] [&>div]:sm:!h-[160px] [&>div]:2xl:!h-[200px] relative w-4/5 mx-auto"
                  >
                    <ReportDonutChart5 class="relative z-10" :height="200" />
                    <div
                      class="absolute inset-0 flex items-center justify-center"
                    >
                      <div class="text-center">
                        <div class="text-lg font-medium text-slate-600/90">
                          781,224
                        </div>
                        <div class="mt-1 text-slate-500">Total Sales</div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex flex-wrap items-center justify-center mt-7 gap-y-3 gap-x-5"
                  >
                    <div class="flex items-center text-slate-500">
                      <div
                        class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
                      ></div>
                      Coffee
                    </div>
                    <div class="flex items-center text-slate-500">
                      <div
                        class="w-2 h-2 mr-2 border rounded-full border-success/60 bg-success/60"
                      ></div>
                      Pastries
                    </div>
                    <div class="flex items-center text-slate-500">
                      <div
                        class="w-2 h-2 mr-2 border rounded-full border-warning/60 bg-warning/60"
                      ></div>
                      Beverages
                    </div>
                  </div>
                  <Button
                    class="w-full border-dashed mt-9 border-slate-300 hover:bg-slate-50"
                  >
                    <Lucide
                      icon="ExternalLink"
                      class="stroke-[1.3] w-4 h-4 mr-2"
                    />
                    Export Report
                  </Button>
                </Tab.Panel>
              </Tab.Panels>
            </Tab.Group>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 2xl:col-span-7 gap-y-10">
      <div>
        <div class="flex items-center h-10">
          <div
            class="text-base font-medium 2xl:group-[.mode--light]:text-white"
          >
            Cafe Insight
          </div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="flex flex-col lg:items-center lg:flex-row gap-y-5">
            <div
              class="flex flex-col sm:items-center sm:flex-row gap-x-3 gap-y-2"
            >
              <div class="relative">
                <Lucide
                  icon="CalendarCheck2"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                />
                <FormSelect class="sm:w-44 pl-9">
                  <option value="custom-date">Custom Date</option>
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
                </FormSelect>
              </div>
              <div class="relative">
                <Lucide
                  icon="Calendar"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                />
                <Litepicker
                  v-model="generalReportFilter"
                  :options="{
                    autoApply: false,
                    singleMode: false,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    showWeekNumbers: true,
                    dropdowns: {
                      minYear: 1990,
                      maxYear: null,
                      months: true,
                      years: true,
                    },
                  }"
                  class="pl-9 sm:w-64 rounded-[0.3rem]"
                />
              </div>
            </div>
            <div class="flex items-center lg:ml-auto gap-3.5">
              <a href="" class="flex items-center text-slate-500">
                <Lucide icon="Printer" class="w-3.5 h-3.5 stroke-[1.7]" />
                <div
                  class="ml-1.5 whitespace-nowrap underline decoration-dotted decoration-slate-300 underline-offset-[3px]"
                >
                  Export to PDF
                </div>
              </a>
              <a href="" class="flex items-center text-primary">
                <Lucide icon="ExternalLink" class="w-3.5 h-3.5 stroke-[1.7]" />
                <div
                  class="ml-1.5 whitespace-nowrap underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                >
                  Show full report
                </div>
              </a>
            </div>
          </div>
          <div
            class="py-5 mt-5 border border-dashed rounded-md border-slate-300/70"
          >
            <div class="flex flex-col md:flex-row">
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="KanbanSquare"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Total Orders</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">876,221</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      11%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="PersonStanding"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Customer Feedback</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">46,221</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      2%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="Banknote"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Coffee Orders</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">350</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-danger"
                    >
                      4%
                      <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="h-px mx-5 my-5 border-t border-dashed border-slate-300/70"
            ></div>
            <div class="flex flex-col md:flex-row">
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="Coffee"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Total Supplier</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">1,523</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      11%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="CreditCard"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Expenses Analysis</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">261</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      2%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-center flex-1 py-3 border-dashed md:border-r border-slate-300/70 last:border-0"
              >
                <div
                  :class="[
                    'group flex items-center justify-center w-10 h-10 border rounded-full mr-5',
                    '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                    '[&.success]:border-success/10 [&.success]:bg-success/10',
                    ['primary', 'success'][_.random(0, 1)],
                  ]"
                >
                  <Lucide
                    icon="PackageSearch"
                    :class="[
                      'w-5 h-5',
                      'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                      'group-[.success]:text-success group-[.success]:fill-success/10',
                    ]"
                  />
                </div>
                <div class="flex flex-col flex-start">
                  <div class="text-slate-500">Coffee Varieties</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">141</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-danger"
                    >
                      4%
                      <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Revenue Analysis</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="flex flex-col lg:items-center lg:flex-row gap-y-5">
            <div
              class="flex flex-col sm:items-center sm:flex-row gap-x-3 gap-y-2"
            >
              <div class="relative">
                <Lucide
                  icon="CalendarCheck2"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                />
                <FormSelect class="sm:w-44 pl-9">
                  <option value="custom-date">Custom Date</option>
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
                </FormSelect>
              </div>
              <div class="relative">
                <Lucide
                  icon="Calendar"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                />
                <Litepicker
                  v-model="generalReportFilter"
                  :options="{
                    autoApply: false,
                    singleMode: false,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    showWeekNumbers: true,
                    dropdowns: {
                      minYear: 1990,
                      maxYear: null,
                      months: true,
                      years: true,
                    },
                  }"
                  class="pl-9 sm:w-64 rounded-[0.3rem]"
                />
              </div>
            </div>
            <div class="flex items-center lg:ml-auto gap-3.5">
              <a href="" class="flex items-center text-slate-500">
                <Lucide icon="Printer" class="w-3.5 h-3.5 stroke-[1.7]" />
                <div
                  class="ml-1.5 whitespace-nowrap underline decoration-dotted decoration-slate-300 underline-offset-[3px]"
                >
                  Export to PDF
                </div>
              </a>
              <a href="" class="flex items-center text-primary">
                <Lucide icon="ExternalLink" class="w-3.5 h-3.5 stroke-[1.7]" />
                <div
                  class="ml-1.5 whitespace-nowrap underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                >
                  Show full report
                </div>
              </a>
            </div>
          </div>
          <div class="mb-1 mt-7">
            <ReportBarChart5 :height="220" />
          </div>
          <div
            class="flex flex-wrap items-center justify-center mt-5 gap-y-3 gap-x-5"
          >
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
              ></div>
              Total Revenue
            </div>
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-slate-500/60 bg-slate-500/60"
              ></div>
              Customer Visits
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Quick Links</div>
          <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
            <div class="relative">
              <Lucide
                icon="CalendarCheck2"
                class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
              />
              <FormSelect class="sm:w-44 rounded-[0.5rem] pl-9 dark:!box">
                <option value="custom-date">Custom Date</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
              </FormSelect>
            </div>
            <div class="relative">
              <Lucide
                icon="Calendar"
                class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
              />
              <Litepicker
                v-model="generalReportFilter"
                :options="{
                  autoApply: false,
                  singleMode: false,
                  numberOfColumns: 2,
                  numberOfMonths: 2,
                  showWeekNumbers: true,
                  dropdowns: {
                    minYear: 1990,
                    maxYear: null,
                    months: true,
                    years: true,
                  },
                }"
                class="pl-9 sm:w-64 rounded-[0.5rem] dark:!box"
              />
            </div>
          </div>
        </div>
        <div class="mt-3.5 box box--stacked">
          <div class="overflow-auto xl:overflow-visible">
            <Table>
              <Table.Thead>
                <Table.Tr>
                  <Table.Td
                    class="font-medium bg-slate-50 dark:bg-darkmode-500 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] py-5 border-slate-200/80 text-slate-500"
                  >
                    Date
                  </Table.Td>
                  <Table.Td
                    class="w-56 font-medium bg-slate-50 dark:bg-darkmode-500 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] py-5 border-slate-200/80 text-slate-500"
                  >
                    Menu Items Sold
                  </Table.Td>
                  <Table.Td
                    class="truncate font-medium bg-slate-50 dark:bg-darkmode-500 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] py-5 border-slate-200/80 text-slate-500"
                  >
                    Customer Feedback
                  </Table.Td>
                  <Table.Td
                    class="w-32 truncate text-right font-medium bg-slate-50 dark:bg-darkmode-500 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] py-5 border-slate-200/80 text-slate-500"
                  >
                    Total Sales
                  </Table.Td>
                  <Table.Td
                    class="w-32 font-medium bg-slate-50 dark:bg-darkmode-500 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] py-5 text-center border-slate-200/80 text-slate-500"
                  >
                    Action
                  </Table.Td>
                </Table.Tr>
              </Table.Thead>
              <Table.Tbody>
                <template
                  v-for="(faker, fakerKey) in _.take(cafe.fakeCafeSales(), 5)"
                  :key="fakerKey"
                >
                  <Table.Tr class="[&_td]:last:border-b-0">
                    <Table.Td
                      class="py-5 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed dark:bg-darkmode-600"
                    >
                      <a href="" class="whitespace-nowrap">
                        {{ faker.date }}
                      </a>
                    </Table.Td>
                    <Table.Td
                      class="py-5 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed dark:bg-darkmode-600"
                    >
                      <a href="" class="flex items-center text-primary">
                        <Lucide
                          icon="ExternalLink"
                          class="w-3.5 h-3.5 stroke-[1.7]"
                        />
                        <div class="ml-1.5 whitespace-nowrap">
                          {{ faker.menuItemsSold }}
                        </div>
                      </a>
                    </Table.Td>
                    <Table.Td
                      class="py-5 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed dark:bg-darkmode-600"
                    >
                      <div class="flex items-center">
                        <div class="flex items-center">
                          <Lucide
                            icon="Star"
                            class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                          />
                          <Lucide
                            icon="Star"
                            class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                          />
                          <Lucide
                            icon="Star"
                            class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                          />
                          <Lucide
                            icon="Star"
                            class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                          />
                          <Lucide
                            icon="Star"
                            class="w-3.5 h-3.5 mr-1 text-slate-400 fill-slate/30"
                          />
                        </div>
                        <div class="ml-1 text-xs text-slate-500">
                          ({{ faker.customerFeedback }})
                        </div>
                      </div>
                    </Table.Td>
                    <Table.Td
                      class="text-right py-5 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed dark:bg-darkmode-600"
                    >
                      <a href="" class="font-medium whitespace-nowrap">
                        {{ faker.totalSales }}
                      </a>
                    </Table.Td>
                    <Table.Td
                      class="py-5 relative first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 border-t-0 border-dashed dark:bg-darkmode-600"
                    >
                      <div class="flex items-center justify-center">
                        <Menu class="h-5">
                          <Menu.Button class="w-5 h-5 text-slate-500">
                            <Lucide
                              icon="MoreVertical"
                              class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
                            />
                          </Menu.Button>
                          <Menu.Items class="w-40">
                            <Menu.Item>
                              <Lucide
                                icon="FileLineChart"
                                class="w-4 h-4 mr-2"
                              />
                              Sales Report
                            </Menu.Item>
                            <Menu.Item>
                              <Lucide icon="FileCheck2" class="w-4 h-4 mr-2" />
                              Item Details
                            </Menu.Item>
                          </Menu.Items>
                        </Menu>
                      </div>
                    </Table.Td>
                  </Table.Tr>
                </template>
              </Table.Tbody>
            </Table>
          </div>
        </div>
        <div
          class="flex flex-col-reverse flex-wrap items-center mt-8 flex-reverse gap-y-2 sm:flex-row"
        >
          <Pagination class="flex-1 w-full mr-auto sm:w-auto">
            <Pagination.Link>
              <Lucide icon="ChevronsLeft" class="w-4 h-4" />
            </Pagination.Link>
            <Pagination.Link>
              <Lucide icon="ChevronLeft" class="w-4 h-4" />
            </Pagination.Link>
            <Pagination.Link>...</Pagination.Link>
            <Pagination.Link>1</Pagination.Link>
            <Pagination.Link active>2</Pagination.Link>
            <Pagination.Link>3</Pagination.Link>
            <Pagination.Link>...</Pagination.Link>
            <Pagination.Link>
              <Lucide icon="ChevronRight" class="w-4 h-4" />
            </Pagination.Link>
            <Pagination.Link>
              <Lucide icon="ChevronsRight" class="w-4 h-4" />
            </Pagination.Link>
          </Pagination>
          <FormSelect class="sm:w-20 rounded-[0.5rem] dark:!box">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
          </FormSelect>
        </div>
      </div>
    </div>
  </div>
</template>
