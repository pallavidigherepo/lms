<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import ReportLineChart3 from "@/components/ReportLineChart3";
import ReportLineChart4 from "@/components/ReportLineChart1";
import ReportDonutChart6 from "@/components/ReportDonutChart6";
import { FormSelect } from "@/components/Base/Form";
import hotel from "@/fakers/hotel";
import Button from "@/components/Base/Button";
import Litepicker from "@/components/Base/Litepicker";
import { Tab } from "@/components/Base/Headless";
import Tippy from "@/components/Base/Tippy";
import { ref } from "vue";
import _ from "lodash";

const generalReportFilter = ref<string>("");
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12 2xl:col-span-9">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium group-[.mode--light]:text-white">
            Hotel Performance Insights
          </div>
        </div>
        <div class="mt-3.5">
          <div class="flex flex-col gap-3 p-3 xl:flex-row box box--stacked">
            <div>
              <div
                class="z-10 gap-5 xl:gap-14 flex flex-col lg:flex-row xl:flex-col items-center xl:items-start xl:w-[300px] overflow-hidden flex-1 px-10 rounded-[0.6rem] bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85] py-12 xl:py-9 relative before:content-[''] before:w-full before:h-[130%] before:bg-gradient-to-b before:from-black/[0.08] before:to-transparent before:absolute before:left-0 before:top-0 before:-rotate-[38deg] before:hidden before:xl:block before:-ml-[35%]"
              >
                <div>
                  <div
                    class="flex items-center justify-center w-12 h-12 border rounded-full border-white/10 bg-white/10"
                  >
                    <Lucide
                      icon="CreditCard"
                      class="w-6 h-6 text-white fill-white/10"
                    />
                  </div>
                </div>
                <div>
                  <div class="text-base text-center text-white lg:text-left">
                    Total Revenue
                  </div>
                  <div
                    class="flex items-center justify-center mt-2 lg:justify-start"
                  >
                    <div class="text-2xl font-medium text-white">
                      $92,464.00
                    </div>
                    <div
                      class="flex items-center ml-2.5 border border-success/50 bg-success/50 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-white/90 dark:bg-white/10"
                    >
                      12%
                      <Lucide
                        icon="ChevronUp"
                        class="w-4 h-4 ml-px stroke-[1.5]"
                      />
                    </div>
                  </div>
                  <div
                    class="mt-3 leading-normal text-center xl:text-left text-white/70"
                  >
                    The total revenue generated from room bookings and hotel
                    services.
                  </div>
                </div>
                <div class="lg:ml-auto w-52 xl:ml-0 xl:w-full">
                  <Button
                    as="a"
                    rounded
                    class="relative justify-start w-full px-4 border-white/20 py-2.5 bg-white/10 text-white hover:bg-white/[0.15] dark:bg-darkmode-900/30 dark:border-darkmode-900/30"
                    href=""
                  >
                    Show full reports
                    <div
                      class="absolute right-0 w-9 h-9 mr-0.5 flex items-center justify-center border rounded-full bg-white/10 border-white/10"
                    >
                      <Lucide icon="ArrowRight" class="w-4 h-4" />
                    </div>
                  </Button>
                </div>
              </div>
            </div>
            <div
              class="flex flex-col w-full p-5 sm:py-7 sm:px-8 border rounded-[0.6rem] border-slate-300/80 border-dashed"
            >
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
              <div
                class="flex flex-col flex-1 mt-6 gap-y-5 sm:mt-8 sm:mb-4 lg:mt-6 xl:mb-0 md:flex-row"
              >
                <div class="grid grid-cols-2 gap-5 md:-mt-2 md:-mb-4 xl:gap-0">
                  <template
                    v-for="(faker, fakerKey) in _.take(
                      hotel.fakePerformanceInsight(),
                      4
                    )"
                    :key="fakerKey"
                  >
                    <div
                      class="flex flex-col justify-center flex-1 col-span-2 sm:col-span-1 md:col-span-2"
                    >
                      <div class="flex items-center mb-1.5">
                        <div class="text-base">{{ faker.value }}</div>
                        <div
                          :class="[
                            'flex items-center ml-2 -mr-1 text-xs',
                            { 'text-danger': faker.percentageChange < 0 },
                            { 'text-success': faker.percentageChange > 0 },
                          ]"
                        >
                          {{ faker.percentageChange }}%
                          <Lucide
                            class="w-4 h-4 ml-px stroke-[1]"
                            :icon="
                              faker.percentageChange > 0
                                ? 'ChevronUp'
                                : 'ChevronDown'
                            "
                          />
                        </div>
                      </div>
                      <div class="flex items-center text-slate-500">
                        <span class="sm:max-w-[9rem] truncate">
                          {{ faker.title }}
                        </span>
                        <Tippy as="a" :content="faker.description">
                          <Lucide
                            class="w-3.5 h-3.5 ml-1.5 stroke-[1.3] text-slate-400"
                            icon="Info"
                          />
                        </Tippy>
                      </div>
                    </div>
                  </template>
                </div>
                <div
                  class="grid grid-cols-2 gap-5 md:mx-auto md:-mt-2 md:-mb-4 xl:gap-0"
                >
                  <template
                    v-for="(faker, fakerKey) in _.take(
                      hotel.fakePerformanceInsight(),
                      4
                    )"
                    :key="fakerKey"
                  >
                    <div
                      class="flex flex-col justify-center flex-1 col-span-2 sm:col-span-1 md:col-span-2"
                    >
                      <div class="flex items-center mb-1.5">
                        <div class="text-base">{{ faker.value }}</div>
                        <div
                          :class="[
                            'flex items-center ml-2 -mr-1 text-xs',
                            { 'text-danger': faker.percentageChange < 0 },
                            { 'text-success': faker.percentageChange > 0 },
                          ]"
                        >
                          {{ faker.percentageChange }}%
                          <Lucide
                            class="w-4 h-4 ml-px stroke-[1]"
                            :icon="
                              faker.percentageChange > 0
                                ? 'ChevronUp'
                                : 'ChevronDown'
                            "
                          />
                        </div>
                      </div>
                      <div class="flex items-center text-slate-500">
                        <span class="sm:max-w-[9rem] truncate">
                          {{ faker.title }}
                        </span>
                        <Tippy as="a" :content="faker.description">
                          <Lucide
                            class="w-3.5 h-3.5 ml-1.5 stroke-[1.3] text-slate-400"
                            icon="Info"
                          />
                        </Tippy>
                      </div>
                    </div>
                  </template>
                </div>
                <div class="grid grid-cols-2 gap-5 md:-mt-2 md:-mb-4 xl:gap-0">
                  <template
                    v-for="(faker, fakerKey) in _.take(
                      hotel.fakePerformanceInsight(),
                      4
                    )"
                    :key="fakerKey"
                  >
                    <div
                      class="flex flex-col justify-center flex-1 col-span-2 sm:col-span-1 md:col-span-2"
                    >
                      <div class="flex items-center mb-1.5">
                        <div class="text-base">{{ faker.value }}</div>
                        <div
                          :class="[
                            'flex items-center ml-2 -mr-1 text-xs',
                            { 'text-danger': faker.percentageChange < 0 },
                            { 'text-success': faker.percentageChange > 0 },
                          ]"
                        >
                          {{ faker.percentageChange }}%
                          <Lucide
                            class="w-4 h-4 ml-px stroke-[1]"
                            :icon="
                              faker.percentageChange > 0
                                ? 'ChevronUp'
                                : 'ChevronDown'
                            "
                          />
                        </div>
                      </div>
                      <div class="flex items-center text-slate-500">
                        <span class="sm:max-w-[9rem] truncate">
                          {{ faker.title }}
                        </span>
                        <Tippy as="a" :content="faker.description">
                          <Lucide
                            class="w-3.5 h-3.5 ml-1.5 stroke-[1.3] text-slate-400"
                            icon="Info"
                          />
                        </Tippy>
                      </div>
                    </div>
                  </template>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div
            class="text-base font-medium 2xl:group-[.mode--light]:text-white"
          >
            Occupancy vs. Revenue
          </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div
            class="col-span-2 sm:col-span-1 2xl:col-span-2 p-5 mt-3.5 box box--stacked"
          >
            <div class="relative h-1/2">
              <div class="text-base text-slate-500">
                Occupancy Rate Over Time
              </div>
              <div class="flex items-center mt-1">
                <div class="text-xl font-medium">78.5%</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                  4%
                  <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                </div>
              </div>
              <div class="mt-4">
                <ReportLineChart3 class="-mb-3 -ml-1.5" :height="87" />
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
            class="col-span-2 sm:col-span-1 2xl:col-span-2 p-5 mt-3.5 box box--stacked"
          >
            <div class="relative h-1/2">
              <div class="text-base text-slate-500">Revenue Trends</div>
              <div class="flex items-center mt-1">
                <div class="text-xl font-medium">$452,300</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  8%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
              <div class="mt-4">
                <ReportLineChart4 class="-mb-3 -ml-1.5" :height="87" />
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
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Activity Stream</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="pb-5 mb-5 border-b border-dashed border-slate-300/70">
            <div class="flex flex-col gap-3 sm:items-center sm:flex-row">
              <div>
                <div class="flex items-center">
                  <div class="text-xl font-medium">481,421</div>
                  <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                    4%
                    <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                  </div>
                </div>
                <div class="mt-1 text-slate-500">Recent Hotel Activities.</div>
              </div>
              <div class="sm:ml-auto">
                <FormSelect>
                  <option value="daily">24 Hours</option>
                  <option value="weekly">48 Hours</option>
                  <option value="monthly">64 Hours</option>
                </FormSelect>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-5">
            <template
              v-for="(faker, fakerKey) in _.take(hotel.fakeActivityStream(), 5)"
              :key="fakerKey"
            >
              <div class="flex items-center">
                <div>
                  <div
                    :class="[
                      'group flex items-center justify-center w-[2.5rem] h-[2.5rem] border rounded-full',
                      '[&.primary]:border-primary/10 [&.primary]:bg-primary/10',
                      '[&.success]:border-success/10 [&.success]:bg-success/10',
                      ['primary', 'success'][_.random(0, 1)],
                    ]"
                  >
                    <Lucide
                      :icon="faker.icon"
                      :class="[
                        'w-[1.15rem] h-[1.15rem]',
                        'group-[.primary]:text-primary group-[.primary]:fill-primary/10',
                        'group-[.success]:text-success group-[.success]:fill-success/10',
                      ]"
                    />
                  </div>
                </div>
                <div
                  class="ml-3.5 flex gap-y-2 flex-col sm:items-center sm:flex-row w-full"
                >
                  <div>
                    <a href="" class="font-medium whitespace-nowrap">
                      Room {{ faker.roomNumber }}
                    </a>
                    <div
                      class="mt-0.5 text-xs text-slate-500 whitespace-nowrap"
                    >
                      {{ faker.activity }}
                    </div>
                  </div>
                  <span
                    :class="[
                      'sm:ml-auto mr-auto sm:mr-0 group flex items-center text-xs font-medium rounded-lg border px-2.5 py-1',
                      '[&.success]:border-success/10 [&.success]:bg-success/10 [&.success]:text-success',
                      '[&.primary]:border-primary/10 [&.primary]:bg-primary/10 [&.primary]:text-primary',
                      '[&.pending]:border-pending/10 [&.pending]:bg-pending/10 [&.pending]:text-pending',
                      ['primary', 'success', 'pending'][_.random(0, 2)],
                    ]"
                  >
                    <div
                      :class="[
                        'w-1 h-1 mr-1.5 rounded-full border ',
                        'group-[.success]:border-success/50 group-[.success]:bg-success/50',
                        'group-[.primary]:border-primary/50 group-[.primary]:bg-primary/50',
                        'group-[.pending]:border-pending/50 group-[.pending]:bg-pending/50',
                      ]"
                    ></div>
                    <span class="-mt-px">{{ faker.roomType }}</span>
                  </span>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Occupancy Overview</div>
        </div>
        <div class="mt-3.5 box box--stacked">
          <div
            :class="[
              'relative flex flex-col pt-[94px] m-2.5 border-dashed rounded-[0.6rem] border box shadow-sm bg-gradient-to-b from-transparent to-theme-1/[0.03] dark:to-theme-1/20',
              'before:content-[\'\'] before:opacity-90 before:inset-0 before:absolute before:bg-texture-black before:bg-[center_1rem] before:bg-cover before:bg-no-repeat dark:before:bg-texture-white',
            ]"
          >
            <div
              class="z-10 p-1 mx-auto mt-auto -mb-6 border rounded-full bg-white/80 w-14 h-14 border-theme-1/20 dark:bg-darkmode-400"
            >
              <div
                class="w-full h-full relative z-10 flex items-center justify-center rounded-full bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85] shadow-sm border border-primary/[0.15]"
              >
                <Lucide
                  icon="MailPlus"
                  class="w-5 h-5 text-white fill-white/10"
                />
              </div>
            </div>
          </div>
          <div class="p-5">
            <div class="mb-12 text-center mt-9">
              <div class="flex items-center justify-center">
                <div class="text-xl font-medium">7,971,421</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  2%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
              <div class="mt-1.5 text-slate-500">Current guest status.</div>
              <div class="flex justify-center gap-3 mt-4">
                <span
                  class="flex items-center text-xs rounded-md text-primary bg-primary/10 border border-primary/10 px-2 py-0.5"
                >
                  <Tippy as="span" content="4,353" class="-mt-px">
                    Checked-In
                  </Tippy>
                </span>
                <span
                  class="flex items-center text-xs rounded-md text-primary bg-primary/10 border border-primary/10 px-2 py-0.5"
                >
                  <Tippy as="span" content="1,929" class="-mt-px">
                    Checked-Out
                  </Tippy>
                </span>
                <span
                  class="flex items-center text-xs rounded-md text-primary bg-primary/10 border border-primary/10 px-2 py-0.5"
                >
                  <Tippy as="span" content="3,124" class="-mt-px">
                    Pending
                  </Tippy>
                </span>
              </div>
            </div>
            <Button
              class="w-full mt-2 border-dashed border-slate-300 hover:bg-slate-50"
            >
              <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-2" />
              Check-In Guest
            </Button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Booking Distribution</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <Tab.Group class="mt-1">
            <Tab.List
              variant="boxed-tabs"
              class="w-3/4 mx-auto shadow-sm rounded-[0.6rem] border-slate-200"
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
                <div class="relative w-4/5 mx-auto">
                  <ReportDonutChart6 class="relative z-10" :height="190" />
                  <div
                    class="absolute inset-0 flex items-center justify-center"
                  >
                    <div class="text-center">
                      <div class="text-lg font-medium text-slate-600/90">
                        781,224
                      </div>
                      <div class="mt-1 text-slate-500">Total Bookings</div>
                    </div>
                  </div>
                </div>
                <div class="flex justify-center gap-5 mt-5">
                  <div class="flex items-center text-slate-500">
                    <div
                      class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
                    ></div>
                    Standard Room
                  </div>
                  <div class="flex items-center text-slate-500">
                    <div
                      class="w-2 h-2 mr-2 border rounded-full border-info/60 bg-info/60"
                    ></div>
                    Suite Room
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
