<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import ReportLineChart2 from "@/components/ReportLineChart2";
import ReportLineChart3 from "@/components/ReportLineChart3";
import ReportLineChart4 from "@/components/ReportLineChart1";
import ReportDonutChart4 from "@/components/ReportDonutChart4";
import ReportBarChart from "@/components/ReportBarChart";
import products from "@/fakers/products";
import countries from "@/fakers/countries";
import { FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import Litepicker from "@/components/Base/Litepicker";
import { Tab } from "@/components/Base/Headless";
import { ref } from "vue";
import _ from "lodash";

const generalReportFilter = ref<string>("");
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12 lg:col-span-8 2xl:col-span-6">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium group-[.mode--light]:text-white">
            Production Insights
          </div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="flex flex-col gap-3 sm:items-center sm:flex-row">
            <div class="sm:mr-auto">
              <div class="text-base text-slate-500">Total Production Units</div>
              <div class="flex items-center mt-1">
                <div class="text-xl font-medium">24,176,221</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  11%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
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
                class="pl-9 sm:w-64 rounded-[0.5rem]"
              />
            </div>
          </div>
          <div class="mt-3">
            <ReportLineChart2 :height="317" />
          </div>
          <div class="flex flex-col items-center gap-3 mt-5 sm:flex-row">
            <div
              class="flex flex-wrap items-center justify-center gap-y-3 gap-x-5"
            >
              <div class="flex items-center text-slate-500">
                <div
                  class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
                ></div>
                Machine Performance
              </div>
              <div class="flex items-center text-slate-500">
                <div
                  class="w-2 h-2 mr-2 border rounded-full border-slate-500/60 bg-slate-500/60"
                ></div>
                Defect Rate
              </div>
            </div>
            <a href="" class="flex items-center sm:ml-auto text-primary">
              <Lucide icon="ExternalLink" class="w-3.5 h-3.5 stroke-[1.7]" />
              <div
                class="ml-1.5 whitespace-nowrap underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
              >
                Show full report
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium lg:group-[.mode--light]:text-white">
            Production Efficiency
          </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div
            class="col-span-2 md:col-span-1 lg:col-span-2 p-5 mt-3.5 box box--stacked"
          >
            <div class="relative h-1/2">
              <div class="text-base text-slate-500">Raw Materials</div>
              <div class="flex items-center mt-1">
                <div class="text-xl font-medium">3,700,121</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                  4%
                  <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                </div>
              </div>
              <div class="mt-4">
                <ReportLineChart3 class="-mb-3 -ml-1.5" :height="101" />
              </div>
              <Menu class="absolute top-0 right-0">
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
            </div>
          </div>
          <div
            class="col-span-2 md:col-span-1 lg:col-span-2 p-5 mt-3.5 box box--stacked"
          >
            <div class="relative h-1/2">
              <div class="text-base text-slate-500">Product Stock</div>
              <div class="flex items-center mt-1">
                <div class="text-xl font-medium">1,246,221</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  8%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
              <div class="mt-4">
                <ReportLineChart4 class="-mb-3 -ml-1.5" :height="101" />
              </div>
              <Menu class="absolute top-0 right-0">
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-12 md:col-span-6 2xl:col-span-3">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div
            class="text-base font-medium 2xl:group-[.mode--light]:text-white"
          >
            Demographic Summary
          </div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
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
          <div class="pb-5 mb-6 border-b border-dashed border-slate-300/70">
            <div class="text-base text-slate-500">Total Customers</div>
            <div class="flex items-center mt-1">
              <div class="text-xl font-medium">301,081,421</div>
              <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                4%
                <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
              </div>
            </div>
          </div>
          <div>
            <template
              v-for="(faker, fakerKey) in _.take(countries.fakeCountries(), 7)"
              :key="fakerKey"
            >
              <div
                class="flex items-center mb-[18px] [&:nth-of-type(n+5)]:hidden [&:nth-of-type(n+5)]:2xl:flex"
              >
                <div
                  class="w-[22px] h-[22px] overflow-hidden border-2 rounded-full image-fit border-slate-200/70 box"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="faker.image"
                  />
                </div>
                <div class="pr-8 ml-2.5 truncate">{{ faker.name }}</div>
                <div class="ml-auto">
                  {{ _.random(1, 20) * (7 - fakerKey) }},{{ _.random(1, 9) }}M
                </div>
              </div>
            </template>
          </div>
          <Button
            class="w-full mt-1.5 border-dashed border-slate-300 hover:bg-slate-50"
          >
            <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-2" />
            See Full Report
          </Button>
        </div>
      </div>
    </div>
    <div
      class="flex flex-col col-span-12 md:col-span-6 2xl:col-span-4 gap-y-10"
    >
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Targets and Delays</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="pb-5 border-b border-dashed mb-7 border-slate-300/70">
            <div class="flex flex-col gap-3 sm:items-center sm:flex-row">
              <div>
                <div class="text-base text-slate-500">Total Target Units</div>
                <div class="flex items-center mt-1">
                  <div class="text-xl font-medium">24,081,421</div>
                  <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                    4%
                    <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                  </div>
                </div>
              </div>
              <div class="relative sm:ml-auto">
                <Lucide
                  icon="CalendarCheck2"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                />
                <FormSelect class="sm:w-32 pl-9">
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
                </FormSelect>
              </div>
            </div>
          </div>
          <ReportDonutChart4 class="relative z-10" :height="100" />
          <div
            class="flex flex-wrap items-center justify-center mt-5 gap-y-3 gap-x-5"
          >
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
              ></div>
              Production Targets
            </div>
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-info/60 bg-info/60"
              ></div>
              Operational Delays
            </div>
          </div>
          <Button
            class="w-full mt-6 border-dashed border-slate-300 hover:bg-slate-50"
          >
            <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-2" />
            See Full Report
          </Button>
        </div>
      </div>
    </div>
    <div
      class="flex flex-col col-span-12 md:col-span-6 2xl:col-span-4 gap-y-10"
    >
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Production Delay Notification</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
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
            <Lucide
              icon="Zap"
              class="w-6 h-6 mr-2.5 text-warning fill-warning/10"
            />
            <div class="text-base">
              <span class="font-medium">10+ Units</span> delayed in
              manufacturing line.
            </div>
          </div>
          <div class="flex justify-center mt-6">
            <div class="flex">
              <template
                v-for="(faker, fakerKey) in _.take(products.fakeProducts(), 5)"
                :key="fakerKey"
              >
                <div class="w-11 h-11 -ml-3.5 first:ml-0 image-fit zoom-in">
                  <Tippy
                    as="img"
                    alt="Tailwise - Admin Dashboard Template"
                    class="border-[3px] border-slate-50 rounded-full cursor-pointer"
                    :src="faker.images[0].path"
                    :content="faker.name"
                  />
                </div>
              </template>
            </div>
            <div
              class="inset-y-0 z-10 font-medium flex items-center h-[22px] px-2.5 my-auto -ml-3 text-xs bg-white border border-slate-200/80 rounded-full shadow text-primary"
            >
              24+
            </div>
          </div>
          <div class="mt-5 leading-relaxed text-center text-slate-600">
            We have identified a delay in the production line that has affected
            over 10 units. Our team is actively working to resolve the issue and
            get production back on track.
          </div>
          <Button
            class="w-full mt-7 border-primary/20 text-primary/80 hover:bg-slate-50"
          >
            <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-2" />
            View Details
          </Button>
          <Button
            variant="outline-secondary"
            class="w-full mt-2.5 border-slate-300/60 hover:bg-slate-50"
          >
            <Lucide
              icon="ChevronRightSquare"
              class="stroke-[1.3] w-4 h-4 mr-2"
            />
            Acknowledge
          </Button>
        </div>
      </div>
    </div>
    <div
      class="flex flex-col col-span-12 md:col-span-6 2xl:col-span-4 gap-y-10"
    >
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Real-Time Production Output</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <Tab.Group class="mt-1">
            <Tab.List
              variant="boxed-tabs"
              class="w-3/4 mx-auto bg-white shadow-sm rounded-[0.6rem] border-slate-200"
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
                  Monthly
                </Tab.Button>
              </Tab>
              <Tab
                class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
              >
                <Tab.Button
                  class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem]"
                  as="button"
                >
                  Yearly
                </Tab.Button>
              </Tab>
            </Tab.List>
            <Tab.Panels class="mt-10">
              <Tab.Panel>
                <div class="w-4/5 mx-auto">
                  <ReportBarChart class="relative z-10" :height="121" />
                </div>
                <div
                  class="flex flex-wrap items-center justify-center mt-4 gap-y-3 gap-x-5"
                >
                  <div class="flex items-center text-slate-500">
                    <div
                      class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
                    ></div>
                    Production Rate
                  </div>
                  <div class="flex items-center text-slate-500">
                    <div
                      class="w-2 h-2 mr-2 border rounded-full border-info/60 bg-info/60"
                    ></div>
                    Output Speed
                  </div>
                </div>
                <Button
                  class="w-full mt-6 border-dashed border-slate-300 hover:bg-slate-50"
                >
                  <Lucide
                    icon="ExternalLink"
                    class="stroke-[1.3] w-4 h-4 mr-2"
                  />
                  See Full Report
                </Button>
              </Tab.Panel>
            </Tab.Panels>
          </Tab.Group>
        </div>
      </div>
    </div>
  </div>
</template>
