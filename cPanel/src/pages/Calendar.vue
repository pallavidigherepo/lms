<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import events from "@/fakers/events";
import { Tab, Menu } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import Calendar from "@/components/Calendar";
import { Draggable as FullCalendarDraggable } from "@/components/Base/Calendar";
import { Draggable } from "@fullcalendar/interaction";
import _ from "lodash";

const dragableOptions: Draggable["settings"] = {
  itemSelector: ".event",
  eventData(eventEl) {
    const getDays = () => {
      const days = eventEl.querySelectorAll(".event__days")[0]?.textContent;
      return days ? days : "0";
    };
    return {
      title: eventEl.querySelectorAll(".event__title")[0]?.innerHTML,
      duration: {
        days: parseInt(getDays()),
      },
    };
  },
};
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Calendar
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="CopyPlus" class="stroke-[1.3] w-4 h-4 mr-3" />
            Add New Schedule
          </Button>
        </div>
      </div>
      <div class="mt-3.5 flex flex-col lg:flex-row gap-y-10 gap-x-6">
        <div class="w-full lg:w-[23rem] flex-none">
          <Tab.Group class="flex flex-col gap-y-7">
            <div class="flex flex-col p-2 box box--stacked">
              <Tab.List
                variant="boxed-tabs"
                class="bg-transparent border-transparent"
              >
                <Tab
                  class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current [&[aria-selected='true']_button]:text-primary [&[aria-selected='true']_button]:font-medium [&[aria-selected='true']_button]:shadow-sm [&[aria-selected='true']_button]:bg-primary/[0.04] [&[aria-selected='true']_button]:border-primary/[0.15]"
                >
                  <Tab.Button
                    class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem] py-3 flex items-center gap-2 justify-center"
                    as="button"
                  >
                    <Lucide icon="Send" class="w-4 h-4 stroke-[1.4]" />
                    Upcoming
                    <div
                      class="min-w-[1.15rem] rounded-full bg-white flex items-center justify-center text-xs"
                    >
                      <div
                        class="w-full h-full px-1.5 py-0.5 leading-none rounded-full bg-theme-1/[0.75] text-white"
                      >
                        {{ _.random(5, 15) }}
                      </div>
                    </div>
                  </Tab.Button>
                </Tab>
                <Tab
                  class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current [&[aria-selected='true']_button]:text-primary [&[aria-selected='true']_button]:font-medium [&[aria-selected='true']_button]:shadow-sm [&[aria-selected='true']_button]:bg-primary/[0.04] [&[aria-selected='true']_button]:border-primary/[0.15]"
                >
                  <Tab.Button
                    class="w-full text-slate-500 whitespace-nowrap rounded-[0.6rem] py-3 flex items-center gap-2 justify-center"
                    as="button"
                  >
                    <Lucide icon="UserPlus" class="w-4 h-4 stroke-[1.4]" />
                    Invite
                  </Tab.Button>
                </Tab>
              </Tab.List>
            </div>
            <Tab.Panels>
              <Tab.Panel>
                <FullCalendarDraggable
                  id="calendar-events"
                  :options="dragableOptions"
                  class="flex flex-col gap-y-6"
                >
                  <template
                    v-for="(faker, fakerKey) in _.take(events.fakeEvents(), 5)"
                    :key="fakerKey"
                  >
                    <div
                      class="relative flex items-center gap-3.5 p-5 cursor-move event box box--stacked"
                    >
                      <div>
                        <div
                          class="w-[4.5rem] h-[4.5rem] overflow-hidden rounded-2xl image-fit border-[3px] border-slate-200/70"
                        >
                          <img
                            alt="Tailwise - Admin Dashboard Template"
                            :src="faker.image"
                          />
                        </div>
                      </div>
                      <div>
                        <div
                          class="font-medium text-primary max-w-[7rem] md:max-w-[12rem] truncate event__title"
                        >
                          {{ faker.title }}
                        </div>
                        <div
                          class="mt-1 leading-relaxed text-slate-500 max-w-[7rem] md:max-w-[12rem] truncate"
                        >
                          {{ faker.description }}
                        </div>
                        <div class="mt-1 text-slate-500">
                          <span class="event__days">
                            {{ _.random(2, 5) }}
                          </span>
                          Days <span class="mx-1">•</span> 09:30 AM
                        </div>
                      </div>
                      <Menu
                        class="absolute inset-y-0 right-0 w-5 h-5 my-auto mr-5 group-[.right]:-ml-8 group-[.right]:left-0"
                      >
                        <Menu.Button class="w-5 h-5 text-slate-500">
                          <Lucide
                            icon="MoreVertical"
                            class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
                          />
                        </Menu.Button>
                        <Menu.Items class="w-40">
                          <Menu.Item>
                            <Lucide icon="Copy" class="w-4 h-4 mr-2" />
                            Copy Link
                          </Menu.Item>
                          <Menu.Item>
                            <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                            Delete
                          </Menu.Item>
                        </Menu.Items>
                      </Menu>
                    </div>
                  </template>
                  <div
                    class="hidden p-3 text-center text-slate-500"
                    id="calendar-no-events"
                  >
                    No events yet
                  </div>
                </FullCalendarDraggable>
              </Tab.Panel>
            </Tab.Panels>
          </Tab.Group>
        </div>
        <div class="flex flex-col w-full gap-y-7">
          <div class="flex flex-col p-5 box box--stacked">
            <Calendar />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
