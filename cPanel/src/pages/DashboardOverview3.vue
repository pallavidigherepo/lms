<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import ReportBarChart6 from "@/components/ReportBarChart6";
import ReportRadarChart from "@/components/ReportRadarChart";
import { FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import Litepicker from "@/components/Base/Litepicker";
import { ref } from "vue";
import _ from "lodash";

const generalReportFilter = ref<string>("");
const salesPerformance = () => {
  return [
    "bg-opacity-50",
    "bg-opacity-40",
    "bg-opacity-30",
    "bg-opacity-20",
    "bg-opacity-10",
  ][_.random(0, 4)];
};
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12 xl:col-span-8">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium group-[.mode--light]:text-white">
            General Report
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
          <div class="mt-5">
            <ReportBarChart6 :height="280" />
          </div>
          <div
            class="flex flex-wrap items-center justify-center mt-5 gap-y-3 gap-x-5"
          >
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
              ></div>
              Patient Admissions Over Time
            </div>
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-slate-500/60 bg-slate-500/60"
              ></div>
              Bed Occupancy Rate Over Time
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-12 md:col-span-6 xl:col-span-4">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium xl:group-[.mode--light]:text-white">
            Patient Overview
          </div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="flex flex-col gap-3 sm:items-center sm:flex-row">
            <div>
              <div class="text-xl font-medium">24,782</div>
              <div class="mt-1 text-base text-slate-500">Total Patients</div>
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
          <div class="mt-6 mb-9">
            <div class="pt-6 border-t border-dashed border-slate-300/70">
              <div class="text-slate-500">Medical condition distribution</div>
              <div class="flex h-2.5 mt-3">
                <Tippy
                  as="div"
                  content="Heart Disease"
                  class="h-full first:rounded-l last:rounded-r border border-primary/50 bg-primary/50 w-[35%]"
                ></Tippy>
                <Tippy
                  as="div"
                  content="Diabetes"
                  class="h-full first:rounded-l last:rounded-r border border-info/50 bg-info/50 w-[20%]"
                ></Tippy>
                <Tippy
                  as="div"
                  content="Respiratory Issues"
                  class="h-full first:rounded-l last:rounded-r border border-pending/50 bg-pending/50 w-[5%]"
                ></Tippy>
                <Tippy
                  as="div"
                  content="Other"
                  class="h-full first:rounded-l last:rounded-r border border-success/50 bg-success/50 w-[40%]"
                ></Tippy>
              </div>
            </div>
            <div class="flex justify-center mt-8">
              <div>
                <div class="flex flex-col items-end">
                  <div class="text-right truncate w-28 text-slate-500">
                    Heart Disease
                  </div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">2,974</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      11%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-0.5" />
                    </div>
                  </div>
                </div>
                <div class="flex flex-col items-end mt-6">
                  <div class="text-right truncate w-28 text-slate-500">
                    Diabetes
                  </div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">1,696</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      2%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-0.5" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-px mx-12 border-r border-dashed"></div>
              <div>
                <div class="flex flex-col">
                  <div class="truncate w-28 text-slate-500">
                    Respiratory Issues
                  </div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">2,556</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      11%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-0.5" />
                    </div>
                  </div>
                </div>
                <div class="flex flex-col mt-6">
                  <div class="truncate w-28 text-slate-500">Other</div>
                  <div class="flex items-center mt-1.5">
                    <div class="text-base font-medium">1,278</div>
                    <div
                      class="flex items-center ml-2 -mr-1 text-xs text-success"
                    >
                      2%
                      <Lucide icon="ChevronUp" class="w-4 h-4 ml-0.5" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <Button
            class="w-full border-dashed border-slate-300 hover:bg-slate-50"
          >
            <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-2" />
            See Full Report
          </Button>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Patient Admissions</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="overflow-x-auto overflow-y-hidden">
            <div class="min-w-[420px] xl:min-w-0">
              <div class="flex gap-3.5">
                <div class="w-full -mr-[13%]">
                  <div class="h-5 text-xs text-slate-400"></div>
                  <div
                    class="grid grid-cols-4 mt-2 gap-[0.4rem] text-slate-500"
                  >
                    <div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem]"
                      ></div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem] relative"
                      >
                        <div
                          class="absolute inset-y-0 my-auto text-xs -mt-0.5 text-slate-400"
                        >
                          Mon
                        </div>
                      </div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem]"
                      ></div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem] relative"
                      >
                        <div
                          class="absolute inset-y-0 my-auto text-xs -mt-0.5 text-slate-400"
                        >
                          Tue
                        </div>
                      </div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem]"
                      ></div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem] relative"
                      >
                        <div
                          class="absolute inset-y-0 my-auto text-xs -mt-0.5 text-slate-400"
                        >
                          Wed
                        </div>
                      </div>
                      <div
                        class="rounded-[0.17rem] w-full pt-[100%] mb-[0.4rem]"
                      ></div>
                    </div>
                  </div>
                </div>
                <template
                  v-for="month in ['Sep', 'Oct', 'Nov', 'Dec']"
                  :key="month"
                >
                  <div class="w-full">
                    <div class="h-5 text-xs text-slate-500">{{ month }}</div>
                    <div
                      class="grid grid-cols-4 mt-2 gap-y-[0.4rem] gap-x-[0.4rem]"
                    >
                      <template v-for="week in [1, 2, 3, 4]" :key="week">
                        <div>
                          <template
                            v-for="day in [
                              'Mon',
                              'Tue',
                              'Wed',
                              'Thu',
                              'Fri',
                              'Sat',
                              'Sun',
                            ]"
                            :key="day"
                          >
                            <Tippy
                              as="div"
                              :content="`${_.random(
                                1,
                                50
                              )} sales on 2 Sep, 2021`"
                              :class="[
                                'rounded w-full pt-[84%] mb-[0.4rem] cursor-pointer zoom-in bg-primary border border-primary/20',
                                [salesPerformance()],
                              ]"
                            />
                          </template>
                        </div>
                      </template>
                    </div>
                  </div>
                </template>
              </div>
              <div class="flex items-center w-full mt-2 xl:justify-end">
                <div class="mr-2.5 text-xs text-slate-500">Less</div>
                <Tippy
                  as="div"
                  content="1 - 5 sales"
                  class="rounded-[0.17rem] mr-1 w-3 h-3 -mt-0.5 bg-primary/10"
                />
                <Tippy
                  as="div"
                  content="5 - 15 sales"
                  class="rounded-[0.17rem] mr-1 w-3 h-3 -mt-0.5 bg-primary/20"
                />
                <Tippy
                  as="div"
                  content="15 - 35 sales"
                  class="rounded-[0.17rem] mr-1 w-3 h-3 -mt-0.5 bg-primary/30"
                />
                <Tippy
                  as="div"
                  content="35 - 65 sales"
                  class="rounded-[0.17rem] mr-1 w-3 h-3 -mt-0.5 bg-primary/40"
                />
                <Tippy
                  as="div"
                  content="65+ sales"
                  class="rounded-[0.17rem] mr-1 w-3 h-3 -mt-0.5 bg-primary/60"
                />
                <div class="ml-1.5 text-xs text-slate-500">More</div>
              </div>
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
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Bed Occupancy Overview</div>
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
          <div class="pb-5 border-b border-dashed mb-7 border-slate-300/70">
            <div class="text-base text-slate-500">Total Beds</div>
            <div class="flex items-center mt-1">
              <div class="text-xl font-medium">476,221</div>
              <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                11%
                <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
              </div>
            </div>
          </div>
          <div class="flex items-center mb-8">
            <div class="flex-1">
              <div
                class="truncate flex text-slate-500 items-center h-3.5 pl-2 font-medium border-l-4 border-success/40"
              >
                Occupied Beds
              </div>
              <div class="mt-3 mb-2 text-lg font-medium">40%</div>
              <div class="text-slate-500">190,488 Beds</div>
            </div>
            <div class="flex justify-center flex-1">
              <div
                class="flex items-center justify-center w-10 h-10 mx-auto font-medium rounded-full box"
              >
                vs
              </div>
            </div>
            <div class="flex-1 text-right">
              <div
                class="truncate flex text-slate-500 items-center justify-end h-3.5 pr-2 font-medium border-r-4 border-danger/40"
              >
                Available Beds
              </div>
              <div class="mt-3 mb-2 text-lg font-medium">60%</div>
              <div class="text-slate-500">285,733 Beds</div>
            </div>
          </div>
          <div class="flex h-2.5 mt-2">
            <Tippy
              as="div"
              content="Occupied Beds"
              class="h-full first:rounded-l last:rounded-r border border-primary/50 bg-primary/50 w-[60%]"
            ></Tippy>
            <Tippy
              as="div"
              content="Available Beds"
              class="h-full first:rounded-l last:rounded-r border border-info/50 bg-info/50 w-[40%]"
            ></Tippy>
          </div>
          <div class="mt-2.5 text-slate-500 text-center">
            +42 Bed Allocation
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Department Performance</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <ReportRadarChart class="relative z-10" :height="216" />
          <div
            class="flex flex-wrap items-center justify-center mt-5 gap-y-3 gap-x-5"
          >
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
              ></div>
              Cardiovascular Unit
            </div>
            <div class="flex items-center text-slate-500">
              <div
                class="w-2 h-2 mr-2 border rounded-full border-info/60 bg-info/60"
              ></div>
              Radiology Department
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
