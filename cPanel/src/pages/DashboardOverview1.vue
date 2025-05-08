<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import TinySlider, { TinySliderElement } from "@/components/Base/TinySlider";
import { getColor } from "@/utils/colors";
import ReportLineChart from "@/components/ReportLineChart";
import ReportDonutChart3 from "@/components/ReportDonutChart3";
import Pagination from "@/components/Base/Pagination";
import { FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import eCommerce from "@/fakers/e-commerce";
import transactions from "@/fakers/transactions";
import Button from "@/components/Base/Button";
import Litepicker from "@/components/Base/Litepicker";
import Table from "@/components/Base/Table";
import { ref, provide } from "vue";
import _ from "lodash";

const generalReportFilter = ref<string>("");
const sliderRef = ref<TinySliderElement>();

provide("bind[sliderRef]", (el: TinySliderElement) => {
  sliderRef.value = el;
});

const prevImportantNotes = () => {
  sliderRef.value?.tns.goTo("prev");
};
const nextImportantNotes = () => {
  sliderRef.value?.tns.goTo("next");
};
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          General Report
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <div class="relative">
            <Lucide
              icon="CalendarCheck2"
              class="absolute group-[.mode--light]:!text-slate-200 inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
            />
            <FormSelect
              class="sm:w-44 rounded-[0.5rem] group-[.mode--light]:bg-chevron-white group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box pl-9 dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
            >
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
              class="absolute group-[.mode--light]:!text-slate-200 inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
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
              class="pl-9 sm:w-64 rounded-[0.5rem] group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
            />
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-5 mt-3.5">
        <div
          class="col-span-12 p-1 md:col-span-6 2xl:col-span-3 box box--stacked"
        >
          <div
            class="-mx-1 overflow-hidden h-[244px] [&_.tns-outer_.tns-nav]:bottom-auto [&_.tns-outer_.tns-nav]:w-auto [&_.tns-outer_.tns-nav]:ml-5 [&_.tns-outer_.tns-nav]:mt-5 [&_.tns-outer_.tns-nav_button]:w-2 [&_.tns-outer_.tns-nav_button]:h-2 [&_.tns-outer_.tns-nav_button.tns-nav-active]:w-5 [&_.tns-outer_.tns-nav_button]:mx-0.5 [&_.tns-outer_.tns-nav_button]:bg-white/40 [&_.tns-outer_.tns-nav_button.tns-nav-active]:bg-white/70"
          >
            <TinySlider :options="{ mode: 'gallery', nav: true }">
              <div class="px-1">
                <div
                  class="overflow-hidden relative flex flex-col w-full h-full p-5 rounded-[0.5rem] bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85]"
                >
                  <Lucide
                    icon="Medal"
                    class="absolute top-0 right-0 w-36 h-36 -mt-5 -mr-5 text-white/20 fill-white/[0.03] transform rotate-[-10deg] stroke-[0.3]"
                  />
                  <div class="mt-12 mb-9">
                    <div class="text-2xl font-medium leading-snug text-white">
                      New feature
                      <br />
                      unlocked!
                    </div>
                    <div class="mt-1.5 text-lg text-white/70">
                      Boost your performance!
                    </div>
                  </div>
                  <a class="flex items-center font-medium text-white" href="">
                    Upgrade now
                    <Lucide icon="MoveRight" class="w-4 h-4 ml-1.5" />
                  </a>
                </div>
              </div>
              <div class="px-1">
                <div
                  class="overflow-hidden relative flex flex-col w-full h-full p-5 rounded-[0.5rem] bg-gradient-to-b from-theme-2/90 to-theme-1/90"
                >
                  <Lucide
                    icon="Database"
                    class="absolute top-0 right-0 w-36 h-36 -mt-5 -mr-5 text-white/20 fill-white/[0.03] transform rotate-[-10deg] stroke-[0.3]"
                  />
                  <div class="mt-12 mb-9">
                    <div class="text-2xl font-medium leading-snug text-white">
                      Stay ahead
                      <br />
                      with upgrades
                    </div>
                    <div class="mt-1.5 text-lg text-white/70">
                      New features and updates!
                    </div>
                  </div>
                  <a class="flex items-center font-medium text-white" href="">
                    Discover now
                    <Lucide icon="ArrowRight" class="w-4 h-4 ml-1.5" />
                  </a>
                </div>
              </div>
              <div class="px-1">
                <div
                  class="overflow-hidden relative flex flex-col w-full h-full p-5 rounded-[0.5rem] bg-gradient-to-b from-theme-2/90 to-theme-1/90"
                >
                  <Lucide
                    icon="Gauge"
                    class="absolute top-0 right-0 w-36 h-36 -mt-5 -mr-5 text-white/20 fill-white/[0.03] transform rotate-[-10deg] stroke-[0.3]"
                  />
                  <div class="mt-12 mb-9">
                    <div class="text-2xl font-medium leading-snug text-white">
                      Supercharge
                      <br />
                      your workflow
                    </div>
                    <div class="mt-1.5 text-lg text-white/70">
                      Boost performance!
                    </div>
                  </div>
                  <a class="flex items-center font-medium text-white" href="">
                    Get started
                    <Lucide icon="ArrowRight" class="w-4 h-4 ml-1.5" />
                  </a>
                </div>
              </div>
            </TinySlider>
          </div>
        </div>
        <div
          class="flex flex-col col-span-12 p-5 md:col-span-6 2xl:col-span-3 box box--stacked"
        >
          <Menu class="absolute top-0 right-0 mt-5 mr-5">
            <Menu.Button class="w-5 h-5 text-slate-500">
              <Lucide
                icon="MoreVertical"
                class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
              />
            </Menu.Button>
            <Menu.Items class="w-40">
              <Menu.Item>
                <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
              </Menu.Item>
              <Menu.Item>
                <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                Delete
              </Menu.Item>
            </Menu.Items>
          </Menu>
          <div class="flex items-center">
            <div
              class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
            >
              <Lucide
                icon="Database"
                class="w-6 h-6 text-primary fill-primary/10"
              />
            </div>
            <div class="ml-4">
              <div class="text-base font-medium">41k Products Sold</div>
              <div class="text-slate-500 mt-0.5">Across 21 stores</div>
            </div>
          </div>
          <div class="relative mt-5 mb-6 overflow-hidden">
            <div
              class="absolute inset-0 h-px my-auto tracking-widest text-slate-400/60 whitespace-nowrap leading-[0] text-xs"
            >
              .......................................................................
            </div>
            <ReportLineChart
              class="relative z-10 -ml-1.5"
              :height="100"
              :index="2"
              :borderColor="() => getColor('primary')"
              :backgroundColor="() => getColor('primary', 0.3)"
            />
          </div>
          <div
            class="flex flex-wrap items-center justify-center gap-y-3 gap-x-5"
          >
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-primary/70"></div>
              <div class="ml-2.5">Products Sold</div>
            </div>
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-slate-400"></div>
              <div class="ml-2.5">Store Locations</div>
            </div>
          </div>
        </div>
        <div
          class="flex flex-col col-span-12 p-5 md:col-span-6 2xl:col-span-3 box box--stacked"
        >
          <Menu class="absolute top-0 right-0 mt-5 mr-5">
            <Menu.Button class="w-5 h-5 text-slate-500">
              <Lucide
                icon="MoreVertical"
                class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
              />
            </Menu.Button>
            <Menu.Items class="w-40">
              <Menu.Item>
                <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
              </Menu.Item>
              <Menu.Item>
                <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                Delete
              </Menu.Item>
            </Menu.Items>
          </Menu>
          <div class="flex items-center">
            <div
              class="flex items-center justify-center w-12 h-12 border rounded-full border-success/10 bg-success/10"
            >
              <Lucide
                icon="Files"
                class="w-6 h-6 text-success fill-success/10"
              />
            </div>
            <div class="ml-4">
              <div class="text-base font-medium">36k Products Shipped</div>
              <div class="text-slate-500 mt-0.5">Across 14 warehouses</div>
            </div>
          </div>
          <div class="relative mt-5 mb-6 overflow-hidden">
            <div
              class="absolute inset-0 h-px my-auto tracking-widest text-slate-400/60 whitespace-nowrap leading-[0] text-xs"
            >
              .......................................................................
            </div>
            <ReportLineChart
              class="relative z-10 -ml-1.5"
              :height="100"
              :index="0"
              :borderColor="() => getColor('success')"
              :backgroundColor="() => getColor('success', 0.3)"
            />
          </div>
          <div
            class="flex flex-wrap items-center justify-center gap-y-3 gap-x-5"
          >
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-success/70"></div>
              <div class="ml-2.5">Total Shipped</div>
            </div>
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-slate-400"></div>
              <div class="ml-2.5">Warehouses</div>
            </div>
          </div>
        </div>
        <div
          class="flex flex-col col-span-12 p-5 md:col-span-6 2xl:col-span-3 box box--stacked"
        >
          <Menu class="absolute top-0 right-0 mt-5 mr-5">
            <Menu.Button class="w-5 h-5 text-slate-500">
              <Lucide
                icon="MoreVertical"
                class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
              />
            </Menu.Button>
            <Menu.Items class="w-40">
              <Menu.Item>
                <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
              </Menu.Item>
              <Menu.Item>
                <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                Delete
              </Menu.Item>
            </Menu.Items>
          </Menu>
          <div class="flex items-center">
            <div
              class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
            >
              <Lucide icon="Zap" class="w-6 h-6 text-primary fill-primary/10" />
            </div>
            <div class="ml-4">
              <div class="text-base font-medium">3.7k Orders Processed</div>
              <div class="text-slate-500 mt-0.5">Across 9 regions</div>
            </div>
          </div>
          <div class="relative mt-5 mb-6">
            <ReportDonutChart3 class="relative z-10" :height="100" />
          </div>
          <div
            class="flex flex-wrap items-center justify-center gap-y-3 gap-x-5"
          >
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-primary/70"></div>
              <div class="ml-2.5">Order Volume</div>
            </div>
            <div class="flex items-center">
              <div class="w-2 h-2 rounded-full bg-danger/70"></div>
              <div class="ml-2.5">Coverage Area</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium">Performance Insights</div>
        <div class="flex gap-x-3 gap-y-2 md:ml-auto">
          <Button
            data-carousel="important-notes"
            data-target="prev"
            class="box"
            @click="prevImportantNotes"
          >
            <div class="flex items-center justify-center w-3.5 h-5">
              <Lucide icon="ChevronLeft" class="w-4 h-4" />
            </div>
          </Button>
          <Button
            data-carousel="important-notes"
            data-target="next"
            class="box"
            @click="nextImportantNotes"
          >
            <div class="flex items-center justify-center w-3.5 h-5">
              <Lucide icon="ChevronRight" class="w-4 h-4" />
            </div>
          </Button>
        </div>
      </div>
      <div class="mt-3.5 -mx-2.5">
        <TinySlider
          refKey="sliderRef"
          :options="{
            autoplay: false,
            controls: false,
            items: 1,
            responsive: {
              640: { items: 2 },
              768: { items: 3 },
              1024: { items: 4 },
              1320: {
                items: 5,
              },
            },
          }"
        >
          <template
            v-for="(faker, fakerKey) in eCommerce.fakePerformanceInsights()"
            :key="fakerKey"
          >
            <div class="px-2.5 pb-3">
              <div class="relative p-5 box box--stacked">
                <div class="flex items-center">
                  <div
                    :class="[
                      'group flex items-center justify-center w-10 h-10 border rounded-full',
                      '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                      '[&.success]:border-success/10 [&.success]:bg-success/10',
                      ['primary', 'success'][_.random(0, 1)],
                    ]"
                  >
                    <Lucide
                      :icon="faker.icon"
                      :class="[
                        'w-5 h-5',
                        'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                        'group-[.success]:text-success group-[.success]:fill-success/10',
                      ]"
                    />
                  </div>
                  <div class="flex ml-auto">
                    <div class="w-8 h-8 image-fit zoom-in">
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.images[0].path"
                      />
                    </div>
                    <div class="w-8 h-8 -ml-3 image-fit zoom-in">
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.images[1].path"
                      />
                    </div>
                    <div class="w-8 h-8 -ml-3 image-fit zoom-in">
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.images[2].path"
                      />
                    </div>
                  </div>
                </div>
                <div class="mt-11">
                  <div class="text-base font-medium">{{ faker.title }}</div>
                  <div class="text-slate-500 mt-0.5">
                    {{ faker.subtitle }}
                  </div>
                </div>
                <a
                  class="flex items-center pt-4 mt-4 font-medium border-t border-dashed text-primary"
                  href=""
                >
                  {{ faker.link }}
                  <Lucide icon="ArrowRight" class="w-4 h-4 ml-1.5" />
                </a>
              </div>
            </div>
          </template>
        </TinySlider>
      </div>
    </div>
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium">Recent Orders</div>
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
              class="pl-9 sm:w-64 rounded-[0.5rem] dark:box"
            />
          </div>
        </div>
      </div>
      <div class="mt-2 overflow-auto lg:overflow-visible">
        <Table class="border-spacing-y-[10px] border-separate">
          <Table.Tbody>
            <template
              v-for="(faker, fakerKey) in _.take(
                transactions.fakeTransactions(),
                5
              )"
              key="fakerKey"
            >
              <Table.Tr>
                <Table.Td
                  class="box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
                >
                  <div class="flex items-center">
                    <Lucide
                      :icon="faker.category.icon"
                      class="w-6 h-6 text-theme-1 fill-primary/10 stroke-[0.8]"
                    />
                    <div class="ml-3.5">
                      <a href="" class="font-medium whitespace-nowrap">
                        {{ faker.orderId }}
                      </a>
                      <div
                        class="mt-1 text-xs text-slate-500 whitespace-nowrap"
                      >
                        {{ faker.category.name }}
                      </div>
                    </div>
                  </div>
                </Table.Td>
                <Table.Td
                  class="w-60 box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
                >
                  <div class="mb-1 text-xs text-slate-500 whitespace-nowrap">
                    Customer Name
                  </div>
                  <a href="" class="flex items-center text-primary">
                    <Lucide
                      icon="ExternalLink"
                      class="w-3.5 h-3.5 stroke-[1.7]"
                    />
                    <div class="ml-1.5 whitespace-nowrap">
                      {{ faker.user.name }}
                    </div>
                  </a>
                </Table.Td>
                <Table.Td
                  class="w-44 box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
                >
                  <div class="mb-1.5 text-xs text-slate-500 whitespace-nowrap">
                    Purchased Items
                  </div>
                  <div class="flex mb-1">
                    <div class="w-5 h-5 image-fit zoom-in">
                      <Tippy
                        as="img"
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.products[0].images[0].path"
                        :content="faker.products[0].name"
                      />
                    </div>
                    <div class="w-5 h-5 -ml-1.5 image-fit zoom-in">
                      <Tippy
                        as="img"
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.products[1].images[0].path"
                        :content="faker.products[1].name"
                      />
                    </div>
                    <div class="w-5 h-5 -ml-1.5 image-fit zoom-in">
                      <Tippy
                        as="img"
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                        :src="faker.products[2].images[0].path"
                        :content="faker.products[2].name"
                      />
                    </div>
                  </div>
                </Table.Td>
                <Table.Td
                  class="w-44 box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
                >
                  <div class="mb-1 text-xs text-slate-500 whitespace-nowrap">
                    Status
                  </div>
                  <div
                    :class="['flex items-center', faker.orderStatus.textColor]"
                  >
                    <Lucide
                      :icon="faker.orderStatus.icon"
                      class="w-3.5 h-3.5 stroke-[1.7]"
                    />
                    <div class="ml-1.5 whitespace-nowrap">
                      {{ faker.orderStatus.name }}
                    </div>
                  </div>
                </Table.Td>
                <Table.Td
                  class="w-44 box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
                >
                  <div class="mb-1 text-xs text-slate-500 whitespace-nowrap">
                    Date
                  </div>
                  <div class="whitespace-nowrap">{{ faker.orderDate }}</div>
                </Table.Td>
                <Table.Td
                  class="w-20 relative py-0 box shadow-[5px_3px_5px_#00000005] first:border-l last:border-r first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] rounded-l-none rounded-r-none border-x-0 dark:bg-darkmode-600"
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
                          <Lucide icon="WalletCards" class="w-4 h-4 mr-2" />
                          View Details
                        </Menu.Item>
                        <Menu.Item>
                          <Lucide icon="FilePenLine" class="w-4 h-4 mr-2" />
                          Edit Order
                        </Menu.Item>
                        <Menu.Item>
                          <Lucide icon="Printer" class="w-4 h-4 mr-2" />
                          Print Invoice
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
      <div
        class="flex flex-col-reverse flex-wrap items-center mt-3 flex-reverse gap-y-2 sm:flex-row"
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
</template>
