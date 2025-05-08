<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import { FormCheck, FormInput } from "@/components/Base/Form";
import FileIcon from "@/components/Base/FileIcon";
import Tippy from "@/components/Base/Tippy";
import activities from "@/fakers/activities";
import users from "@/fakers/users";
import messages from "@/fakers/messages";
import events from "@/fakers/events";
import projectDetails from "@/fakers/project-details";
import achievements from "@/fakers/achievements";
import Button from "@/components/Base/Button";
import Table from "@/components/Base/Table";
import { Tab } from "@/components/Base/Headless";
import ImageZoom from "@/components/Base/ImageZoom";
import { ref, watch, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import _ from "lodash";

const route = useRoute();
const selectedIndex = ref(0);

const setPage = () => {
  const queryParams = new URLSearchParams(window.location.search);
  if (queryParams.get("page") == "events") {
    selectedIndex.value = 1;
  } else if (queryParams.get("page") == "achievements") {
    selectedIndex.value = 2;
  } else if (queryParams.get("page") == "contacts") {
    selectedIndex.value = 3;
  } else if (queryParams.get("page") == "default") {
    selectedIndex.value = 4;
  } else {
    selectedIndex.value = 0;
  }
};

watch(
  computed(() => route),
  () => {
    setPage();
  },
  { deep: true }
);

onMounted(() => {
  setPage();
});
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="p-1.5 box flex flex-col box--stacked">
        <div
          class="h-48 relative w-full rounded-[0.6rem] bg-gradient-to-b from-theme-1/95 to-theme-2/95"
        >
          <div
            :class="[
              'w-full h-full relative overflow-hidden',
              'before:content-[\'\'] before:absolute before:inset-0 before:bg-texture-white before:-mt-[50rem]',
              'after:content-[\'\'] after:absolute after:inset-0 after:bg-texture-white after:-mt-[50rem]',
            ]"
          ></div>
          <div class="absolute inset-x-0 top-0 w-32 h-32 mx-auto mt-24">
            <div
              class="w-full h-full overflow-hidden border-[6px] box border-white rounded-full image-fit"
            >
              <img
                alt="Tailwise - Admin Dashboard Template"
                :src="users.fakeUsers()[0].photo"
              />
            </div>
            <div
              class="absolute bottom-0 right-0 w-5 h-5 mb-2.5 mr-2.5 border-2 border-white rounded-full bg-success box dark:bg-success"
            ></div>
          </div>
        </div>
        <div
          class="rounded-[0.6rem] bg-slate-50 pt-12 pb-6 dark:bg-darkmode-500"
        >
          <div class="flex items-center justify-center text-xl font-medium">
            {{ users.fakeUsers()[0].name }}
            <Lucide
              icon="BadgeCheck"
              class="w-5 h-5 ml-2 text-blue-500 fill-blue-500/30"
            />
          </div>
          <div
            class="flex flex-col sm:flex-row items-center justify-center gap-y-2 gap-x-5 mt-2.5"
          >
            <div class="flex items-center text-slate-500">
              <Lucide
                icon="Briefcase"
                class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]"
              />
              {{ users.fakeUsers()[0].department }}
            </div>
            <div class="flex items-center text-slate-500">
              <Lucide
                icon="MountainSnow"
                class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]"
              />
              <a href="">{{ users.fakeUsers()[0].location }}</a>
            </div>
            <div class="flex items-center text-slate-500">
              <Lucide icon="Signal" class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]" />
              {{ users.fakeUsers()[0].phone }}
            </div>
          </div>
        </div>
      </div>
      <Tab.Group
        class="mt-10"
        :selectedIndex="selectedIndex"
        @change="(index) => (selectedIndex = index)"
      >
        <div class="flex flex-col 2xl:items-center 2xl:flex-row gap-y-3">
          <Tab.List
            variant="boxed-tabs"
            class="flex-col sm:flex-row w-full 2xl:w-auto mr-auto box rounded-[0.6rem] border-slate-200"
          >
            <Tab
              class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
            >
              <Tab.Button
                class="w-full xl:w-40 py-2.5 text-slate-500 whitespace-nowrap rounded-[0.6rem] flex items-center justify-center text-[0.94rem]"
                as="button"
              >
                Profile
              </Tab.Button>
            </Tab>
            <Tab
              class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
            >
              <Tab.Button
                class="w-full xl:w-40 py-2.5 text-slate-500 whitespace-nowrap rounded-[0.6rem] flex items-center justify-center text-[0.94rem]"
                as="button"
              >
                Events
                <div
                  class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full text-theme-1/70 bg-theme-1/10 border-theme-1/10"
                >
                  7
                </div>
              </Tab.Button>
            </Tab>
            <Tab
              class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
            >
              <Tab.Button
                class="w-full xl:w-40 py-2.5 text-slate-500 whitespace-nowrap rounded-[0.6rem] flex items-center justify-center text-[0.94rem]"
                as="button"
              >
                Achievements
              </Tab.Button>
            </Tab>
            <Tab
              class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
            >
              <Tab.Button
                class="w-full xl:w-40 py-2.5 text-slate-500 whitespace-nowrap rounded-[0.6rem] flex items-center justify-center text-[0.94rem]"
                as="button"
              >
                Contacts
                <div
                  class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full text-theme-1/70 bg-theme-1/10 border-theme-1/10"
                >
                  5
                </div>
              </Tab.Button>
            </Tab>
            <Tab
              class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
            >
              <Tab.Button
                class="w-full xl:w-40 py-2.5 text-slate-500 whitespace-nowrap rounded-[0.6rem] flex items-center justify-center text-[0.94rem]"
                as="button"
              >
                Default
              </Tab.Button>
            </Tab>
          </Tab.List>
          <div class="flex items-center gap-3 2xl:ml-auto">
            <Menu class="mr-auto 2xl:mr-0">
              <Menu.Button
                :as="Button"
                variant="secondary"
                class="rounded-[0.6rem] bg-white py-3"
              >
                <Lucide icon="Download" class="stroke-[1.3] w-4 h-4 mr-2" />
                <span class="truncate max-w-[3.8rem] sm:max-w-none">
                  Share Profile
                </span>
                <Lucide icon="ChevronDown" class="stroke-[1.3] w-4 h-4 ml-2" />
              </Menu.Button>
              <Menu.Items class="w-48">
                <Menu.Item>
                  <Lucide icon="Linkedin" class="w-4 h-4 mr-2" /> Share to
                  Linkedin
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Facebook" class="w-4 h-4 mr-2" />
                  Share to Facebook
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Twitter" class="w-4 h-4 mr-2" />
                  Share to Twitter
                </Menu.Item>
              </Menu.Items>
            </Menu>
            <Popover class="inline-block" v-slot="{ close }">
              <Popover.Button
                :as="Button"
                variant="outline-secondary"
                class="rounded-[0.6rem] bg-white py-3 dark:bg-darkmode-400"
              >
                <Lucide
                  icon="ArrowDownWideNarrow"
                  class="stroke-[1.3] w-4 h-4 mr-2"
                />
                Teams
                <div
                  class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full bg-slate-100 dark:bg-darkmode-400 dark:bg-darkmode-400"
                >
                  42
                </div>
              </Popover.Button>
              <Popover.Panel placement="bottom-end">
                <div class="p-2">
                  <div>
                    <div class="text-left">Invite by Email</div>
                    <FormInput
                      class="flex-1 mt-2"
                      :placeholder="users.fakeUsers()[1].email"
                      type="text"
                    />
                  </div>
                  <div class="flex items-center mt-4">
                    <Button
                      variant="secondary"
                      @click="
                        () => {
                          close();
                        }
                      "
                      class="w-32 ml-auto"
                    >
                      Close
                    </Button>
                    <Button variant="primary" class="w-32 ml-2">
                      Search
                    </Button>
                  </div>
                </div>
              </Popover.Panel>
            </Popover>
            <Menu>
              <Menu.Button
                :as="Button"
                variant="secondary"
                class="rounded-[0.6rem] bg-white py-3 text-[0.94rem]"
              >
                <div class="flex items-center justify-center w-5 h-5">
                  <Lucide icon="MoreVertical" class="stroke-[1.3] w-4 h-4" />
                </div>
              </Menu.Button>
              <Menu.Items class="w-44">
                <Menu.Item>
                  <Lucide icon="Settings" class="w-4 h-4 mr-2" /> Settings
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Contact" class="w-4 h-4 mr-2" /> Contacts
                </Menu.Item>
                <Menu.Item class="text-danger">
                  <Lucide icon="Lock" class="w-4 h-4 mr-2" />
                  Lock Account
                </Menu.Item>
              </Menu.Items>
            </Menu>
          </div>
        </div>
        <Tab.Panels>
          <Tab.Panel>
            <div class="grid grid-cols-12 gap-y-7 gap-x-6 mt-3.5">
              <div class="col-span-12 xl:col-span-8">
                <div class="flex flex-col gap-y-7">
                  <div class="flex flex-col p-5 box box--stacked">
                    <div
                      class="pb-5 mb-5 font-medium border-b border-dashed border-slate-300/70 text-[0.94rem]"
                    >
                      Activity Feed
                    </div>
                    <div class="-my-3">
                      <div
                        class="relative overflow-hidden before:content-[''] before:absolute before:w-px before:bg-slate-200/60 before:left-0 before:inset-y-0 before:dark:bg-darkmode-400 before:ml-[14px]"
                      >
                        <template
                          v-for="(faker, fakerKey) in _.take(
                            activities.fakeActivities(),
                            5
                          )"
                          :key="fakerKey"
                        >
                          <div
                            :class="[
                              'mb-3 last:mb-0 relative',
                              'first:before:content-[\'\'] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute dark:before:bg-darkmode-600',
                              'last:after:content-[\'\'] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0 dark:after:bg-darkmode-600',
                            ]"
                          >
                            <div
                              :class="[
                                'px-4 py-3 ml-8',
                                'before:content-[\'\'] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10',
                                'after:content-[\'\'] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10',
                              ]"
                            >
                              <a href="" class="font-medium text-primary">
                                {{ faker.activity }}
                              </a>
                              <div
                                class="flex flex-col sm:flex-row sm:items-center gap-y-1.5 mt-1.5 leading-relaxed text-slate-500 text-[0.8rem]"
                              >
                                {{ faker.activityDetails }}
                                <span
                                  :class="[
                                    'group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0',
                                    '[&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10',
                                    '[&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10',
                                    '[&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10',
                                    '[&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10',
                                    ['primary', 'success', 'warning', 'info'][
                                      _.random(0, 3)
                                    ],
                                  ]"
                                >
                                  <span
                                    class="w-1.5 h-1.5 mr-1.5 rounded-full group-[.success]:bg-success/80 group-[.primary]:bg-primary/80 group-[.warning]:bg-warning/80 group-[.info]:bg-info/80"
                                  ></span>
                                  <span class="-mt-px">
                                    {{ faker.statusBadge }}
                                  </span>
                                </span>
                              </div>
                              <template v-if="faker.uploadedFiles">
                                <div
                                  class="grid grid-cols-1 lg:grid-cols-3 gap-4 my-3.5"
                                >
                                  <template
                                    v-for="(
                                      file, fileKey
                                    ) in faker.uploadedFiles"
                                    :key="fakerKey"
                                  >
                                    <div
                                      class="flex items-center pl-5 pr-2.5 py-4 border rounded-[0.6rem] border-slate-200/80 bg-slate-50/70 dark:bg-darkmode-400"
                                    >
                                      <FileIcon
                                        class="w-10"
                                        variant="directory"
                                      />
                                      <div class="ml-3.5 mr-auto">
                                        <div
                                          class="max-w-[8rem] font-medium truncate text-primary"
                                        >
                                          {{ file.filename }}
                                        </div>
                                        <div
                                          class="mt-1 text-xs text-slate-500"
                                        >
                                          {{ file.size }}
                                        </div>
                                      </div>
                                      <Menu>
                                        <Menu.Button
                                          class="w-5 h-5 text-slate-500"
                                        >
                                          <Lucide
                                            icon="MoreVertical"
                                            class="w-4 h-4"
                                          />
                                        </Menu.Button>
                                        <Menu.Items class="w-40">
                                          <Menu.Item>
                                            <Lucide
                                              icon="Copy"
                                              class="w-4 h-4 mr-2"
                                            />
                                            Copy Link
                                          </Menu.Item>
                                          <Menu.Item>
                                            <Lucide
                                              icon="Trash"
                                              class="w-4 h-4 mr-2"
                                            />
                                            Delete
                                          </Menu.Item>
                                        </Menu.Items>
                                      </Menu>
                                    </div>
                                  </template>
                                </div>
                              </template>
                              <template v-if="faker.images">
                                <div
                                  class="sm:w-1/2 my-3.5 p-1 border rounded-[0.6rem] bg-slate-50/80 dark:bg-darkmode-400"
                                >
                                  <div
                                    class="grid grid-cols-1 md:grid-cols-3 overflow-hidden rounded-[0.6rem]"
                                  >
                                    <div
                                      class="h-24 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                                    >
                                      <ImageZoom
                                        alt="Tailwise - Admin Dashboard Template"
                                        :src="faker.images[0]"
                                      />
                                    </div>
                                    <div
                                      class="h-24 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                                    >
                                      <ImageZoom
                                        alt="Tailwise - Admin Dashboard Template"
                                        :src="faker.images[1]"
                                      />
                                    </div>
                                    <div
                                      class="h-24 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                                    >
                                      <ImageZoom
                                        alt="Tailwise - Admin Dashboard Template"
                                        :src="faker.images[2]"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </template>
                              <div class="mt-1.5 text-xs text-slate-500">
                                {{ faker.date }}
                              </div>
                            </div>
                          </div>
                        </template>
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-10 gap-x-6">
                    <div class="flex flex-col p-5 box box--stacked">
                      <div
                        class="pb-5 mb-5 font-medium border-b border-dashed border-slate-300/70 text-[0.94rem]"
                      >
                        Recent Messages
                      </div>
                      <div class="flex flex-col gap-5">
                        <template
                          v-for="(faker, fakerKey) in _.take(
                            messages.fakeMessages(),
                            5
                          )"
                          :key="fakerKey"
                        >
                          <div class="flex items-center">
                            <div class="relative w-12 h-12">
                              <div
                                class="w-full h-full overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                              >
                                <img
                                  alt="Tailwise - Admin Dashboard Template"
                                  :src="faker.sender.photo"
                                />
                              </div>
                              <div
                                class="absolute bottom-0 right-0 w-2.5 h-2.5 mb-1 mr-1 border border-white rounded-full bg-success box"
                              ></div>
                            </div>
                            <div class="ml-3.5">
                              <div class="font-medium">
                                {{ faker.sender.name }}
                              </div>
                              <div class="text-xs text-slate-500 mt-0.5">
                                {{ faker.content }}
                              </div>
                            </div>
                            <div class="relative ml-auto w-7 h-7">
                              <FormCheck.Input
                                type="checkbox"
                                value="checked"
                                class="absolute z-10 w-full h-full opacity-0 peer"
                              />
                              <div
                                class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border rounded-full opacity-0 w-7 h-7 bg-theme-1/80 border-theme-1 peer-checked:opacity-100"
                              >
                                <Lucide
                                  icon="MailCheck"
                                  class="stroke-[1.5] w-3 h-3"
                                />
                              </div>
                              <div
                                class="absolute inset-0 flex items-center justify-center m-auto transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 text-primary border-theme-1/20 bg-theme-1/5 peer-checked:opacity-0 peer-hover:bg-theme-1/10"
                              >
                                <Lucide
                                  icon="MailPlus"
                                  class="stroke-[1.5] w-3 h-3"
                                />
                              </div>
                            </div>
                          </div>
                        </template>
                      </div>
                      <Button
                        variant="primary"
                        class="w-full mt-5 bg-white border-dashed text-primary border-primary/20 hover:bg-primary/20 dark:bg-darkmode-400"
                      >
                        View All Messages
                        <Lucide
                          icon="ArrowRight"
                          class="stroke-[1.3] w-4 h-4 ml-2"
                        />
                      </Button>
                    </div>
                    <div class="flex flex-col p-5 box box--stacked">
                      <div
                        class="pb-5 mb-5 font-medium border-b border-dashed border-slate-300/70 text-[0.94rem]"
                      >
                        Upcoming Events
                      </div>
                      <div class="flex flex-col gap-5">
                        <template
                          v-for="(faker, fakerKey) in _.take(
                            events.fakeEvents(),
                            5
                          )"
                          :key="fakerKey"
                        >
                          <div class="flex items-center">
                            <div class="relative w-12 h-12">
                              <div
                                class="flex items-center justify-center w-full h-full overflow-hidden border-2 rounded-full border-slate-200/40 bg-theme-1/5"
                              >
                                <Lucide
                                  :icon="faker.icon"
                                  class="w-4 h-4 text-theme-1 fill-theme-1/10"
                                />
                              </div>
                            </div>
                            <div class="ml-3.5">
                              <div class="font-medium">
                                {{ faker.title }}
                              </div>
                              <div class="text-xs text-slate-500 mt-0.5">
                                {{ faker.location }}
                              </div>
                            </div>
                            <div class="relative ml-auto w-7 h-7">
                              <FormCheck.Input
                                type="checkbox"
                                value="checked"
                                class="absolute z-10 w-full h-full opacity-0 peer"
                              />
                              <div
                                class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border rounded-full opacity-0 w-7 h-7 bg-theme-1/80 border-theme-1 peer-checked:opacity-100"
                              >
                                <Lucide
                                  icon="Check"
                                  class="stroke-[1.5] w-3 h-3"
                                />
                              </div>
                              <div
                                class="absolute inset-0 flex items-center justify-center m-auto transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 text-primary border-theme-1/20 bg-theme-1/5 peer-checked:opacity-0 peer-hover:bg-theme-1/10"
                              >
                                <Lucide
                                  icon="Plus"
                                  class="stroke-[1.5] w-3 h-3"
                                />
                              </div>
                            </div>
                          </div>
                        </template>
                      </div>
                      <Button
                        variant="primary"
                        class="w-full mt-5 bg-white border-dashed text-primary border-primary/20 hover:bg-primary/20 dark:bg-darkmode-400"
                      >
                        View All Events
                        <Lucide
                          icon="ArrowRight"
                          class="stroke-[1.3] w-4 h-4 ml-2"
                        />
                      </Button>
                    </div>
                  </div>
                  <div class="flex flex-col box box--stacked">
                    <div class="p-5 font-medium">Projects</div>
                    <div class="overflow-auto xl:overflow-visible">
                      <Table class="border-b border-dashed border-slate-200/80">
                        <Table.Thead>
                          <Table.Tr>
                            <Table.Td
                              class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                            >
                              Title
                            </Table.Td>
                            <Table.Td
                              class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                            >
                              Progress
                            </Table.Td>
                            <Table.Td
                              class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                            >
                              Contributors
                            </Table.Td>
                          </Table.Tr>
                        </Table.Thead>
                        <Table.Tbody>
                          <template
                            v-for="(faker, fakerKey) in _.take(
                              projectDetails.fakeProjectDetails(),
                              5
                            )"
                            :key="fakerKey"
                          >
                            <Table.Tr class="[&_td]:last:border-b-0">
                              <Table.Td
                                class="py-4 border-dashed dark:bg-darkmode-600"
                              >
                                <div class="flex items-center">
                                  <div class="w-9 h-9 image-fit zoom-in">
                                    <Tippy
                                      as="img"
                                      alt="Tailwise - Admin Dashboard Template"
                                      class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                      :src="faker.image"
                                      :content="faker.title"
                                    />
                                  </div>
                                  <div class="ml-3.5">
                                    <a
                                      href=""
                                      class="font-medium whitespace-nowrap"
                                    >
                                      {{ faker.title }}
                                    </a>
                                    <a
                                      href=""
                                      class="block text-slate-500 text-xs whitespace-nowrap mt-0.5"
                                    >
                                      {{ faker.link }}
                                    </a>
                                  </div>
                                </div>
                              </Table.Td>
                              <Table.Td
                                class="py-4 border-dashed dark:bg-darkmode-600"
                              >
                                <div class="w-40">
                                  <div class="text-xs text-slate-500">
                                    {{ _.random(50, 100) }}%
                                  </div>
                                  <div
                                    class="flex h-1 border rounded-sm bg-slate-50 mt-1.5 dark:bg-darkmode-400"
                                  >
                                    <div
                                      :class="[
                                        'first:rounded-l-sm last:rounded-r-sm border border-primary/20 -m-px bg-primary/40',
                                        [
                                          'w-[35%]',
                                          'w-[45%]',
                                          'w-[55%]',
                                          'w-[65%]',
                                          'w-[75%]',
                                        ][_.random(0, 4)],
                                      ]"
                                    ></div>
                                  </div>
                                </div>
                              </Table.Td>
                              <Table.Td
                                class="py-4 border-dashed dark:bg-darkmode-600"
                              >
                                <div class="whitespace-nowrap">
                                  <div
                                    class="flex items-center justify-center mt-4 sm:justify-start"
                                  >
                                    <div class="flex">
                                      <div class="w-6 h-6 image-fit zoom-in">
                                        <Tippy
                                          as="img"
                                          alt="Tailwise - Admin Dashboard Template"
                                          class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                          :src="faker.contributors[0].photo"
                                          :content="faker.contributors[0].name"
                                        />
                                      </div>
                                      <div
                                        class="w-6 h-6 -ml-2.5 image-fit zoom-in"
                                      >
                                        <Tippy
                                          as="img"
                                          alt="Tailwise - Admin Dashboard Template"
                                          class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                          :src="faker.contributors[1].photo"
                                          :content="faker.contributors[1].name"
                                        />
                                      </div>
                                      <div
                                        class="w-6 h-6 -ml-2.5 image-fit zoom-in"
                                      >
                                        <Tippy
                                          as="img"
                                          alt="Tailwise - Admin Dashboard Template"
                                          class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                          :src="faker.contributors[2].photo"
                                          :content="faker.contributors[2].name"
                                        />
                                      </div>
                                    </div>
                                    <div class="ml-3 text-xs text-slate-500">
                                      4+ Members
                                    </div>
                                  </div>
                                </div>
                              </Table.Td>
                            </Table.Tr>
                          </template>
                        </Table.Tbody>
                      </Table>
                    </div>
                    <div class="p-5">
                      <Button
                        variant="primary"
                        class="w-full bg-white border-dashed text-primary border-primary/20 hover:bg-primary/20 dark:bg-darkmode-400"
                      >
                        View All Projects
                        <Lucide
                          icon="ArrowRight"
                          class="stroke-[1.3] w-4 h-4 ml-2"
                        />
                      </Button>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="relative col-span-12 row-start-1 xl:col-start-9 xl:col-span-4"
              >
                <div class="sticky flex flex-col top-[6.2rem] gap-y-7">
                  <div class="flex flex-col p-5 box box--stacked">
                    <div>Complete your profile (83%)</div>
                    <div class="flex h-2 mt-3.5">
                      <div
                        class="h-full first:rounded-l last:rounded-r border border-primary/50 bg-primary/50 w-[60%]"
                      ></div>
                      <div
                        class="h-full first:rounded-l last:rounded-r border border-slate-300 bg-slate-100 w-[40%] dark:bg-darkmode-400"
                      ></div>
                    </div>
                    <Button
                      variant="primary"
                      class="w-full mt-5 bg-white text-primary border-primary/20 hover:bg-primary/20 dark:bg-darkmode-400"
                    >
                      <Lucide icon="Inbox" class="stroke-[1.3] w-4 h-4 mr-2" />
                      Profile Settings
                    </Button>
                  </div>
                  <div class="flex flex-col p-5 box box--stacked">
                    <div
                      class="pb-5 mb-5 font-medium border-b border-dashed border-slate-300/70 text-[0.94rem]"
                    >
                      Profile
                    </div>
                    <div class="flex flex-col gap-8">
                      <div>
                        <div class="text-xs uppercase text-slate-500">
                          Personal Data
                        </div>
                        <div class="mt-3.5">
                          <div class="flex items-center">
                            <Lucide
                              icon="Clipboard"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Department: {{ users.fakeUsers()[0].department }}
                          </div>
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Calendar"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Location: {{ users.fakeUsers()[0].location }}
                          </div>
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Clock"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Manager:
                            <div
                              class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px ml-1"
                            >
                              <span class="-mt-px">
                                {{ users.fakeUsers()[0].manager }}
                              </span>
                            </div>
                          </div>
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Map"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Position: {{ users.fakeUsers()[0].position }}
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="text-xs uppercase text-slate-500">
                          Contacts
                        </div>
                        <div class="mt-3.5">
                          <div class="flex items-center">
                            <Lucide
                              icon="Clipboard"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Email:
                            <a
                              href=""
                              class="ml-1 text-primary whitespace-nowrap underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                            >
                              {{ users.fakeUsers()[0].email }}
                            </a>
                          </div>
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Calendar"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Phone Number:
                            <a
                              href=""
                              class="ml-1 text-primary whitespace-nowrap underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                            >
                              {{ users.fakeUsers()[0].phone }}
                            </a>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="text-xs uppercase text-slate-500">
                          Statistics
                        </div>
                        <div class="mt-3.5">
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Clock"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Teams:
                            <div
                              class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px ml-1"
                            >
                              <span class="-mt-px">5 Members</span>
                            </div>
                          </div>
                          <div class="flex items-center mt-3">
                            <Lucide
                              icon="Map"
                              class="w-4 h-4 mr-2 stroke-[1.3] text-slate-500"
                            />
                            Projects:
                            <a
                              href=""
                              class="ml-1 underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                            >
                              {{ projectDetails.fakeProjectDetails()[0].title }}
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </Tab.Panel>
          <Tab.Panel>
            <div class="grid grid-cols-12 gap-y-10 gap-x-6 mt-3.5">
              <template
                v-for="(faker, fakerKey) in _.take(events.fakeEvents(), 9)"
                :key="fakerKey"
              >
                <div
                  class="flex flex-col col-span-12 p-5 md:col-span-6 xl:col-span-4 box box--stacked"
                >
                  <a class="font-medium text-primary text-[0.94rem]" href="">
                    {{ faker.title }}
                  </a>
                  <div class="mt-1 mb-5 leading-relaxed text-slate-500">
                    {{ faker.description }}
                  </div>
                  <Menu class="absolute top-0 right-0 mt-5 mr-5">
                    <Menu.Button class="w-5 h-5 text-slate-500">
                      <Lucide
                        icon="MoreVertical"
                        class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
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
                  <div
                    class="flex flex-col gap-3 pt-5 mt-auto border-t border-dashed border-slate-300/70"
                  >
                    <div class="flex items-center">
                      <div class="text-slate-500">Organizer:</div>
                      <div class="ml-auto">
                        <div
                          class="flex items-center text-xs rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px"
                        >
                          <span class="-mt-px">{{ faker.organizer }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="text-slate-500">Available Seats:</div>
                      <div class="ml-auto">
                        <div class="flex items-center">
                          <Lucide
                            icon="Armchair"
                            :class="[
                              'w-5 h-5 mr-1 text-slate-400 fill-slate-100 [&.active]:text-pending/80 [&.active]:fill-pending/10 dark:fill-darkmode-600',
                              { active: faker.availableSeats >= 1 },
                            ]"
                          />
                          <Lucide
                            icon="Armchair"
                            :class="[
                              'w-5 h-5 mr-1 text-slate-400 fill-slate-100 [&.active]:text-pending/80 [&.active]:fill-pending/10 dark:fill-darkmode-600',
                              { active: faker.availableSeats >= 2 },
                            ]"
                          />
                          <Lucide
                            icon="Armchair"
                            :class="[
                              'w-5 h-5 mr-1 text-slate-400 fill-slate-100 [&.active]:text-pending/80 [&.active]:fill-pending/10 dark:fill-darkmode-600',
                              { active: faker.availableSeats >= 3 },
                            ]"
                          />
                          <Lucide
                            icon="Armchair"
                            :class="[
                              'w-5 h-5 mr-1 text-slate-400 fill-slate-100 [&.active]:text-pending/80 [&.active]:fill-pending/10 dark:fill-darkmode-600',
                              { active: faker.availableSeats >= 4 },
                            ]"
                          />
                          <Lucide
                            icon="Armchair"
                            :class="[
                              'w-5 h-5 mr-1 text-slate-400 fill-slate-100 [&.active]:text-pending/80 [&.active]:fill-pending/10 dark:fill-darkmode-600',
                              { active: faker.availableSeats >= 5 },
                            ]"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="text-slate-500">Time:</div>
                      <div class="ml-auto text-slate-500">
                        {{ faker.time }}
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="text-slate-500">Attendees:</div>
                      <div class="ml-auto">
                        <div class="flex items-center justify-center">
                          <div class="w-6 h-6 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="border-2 border-white rounded-full"
                              :src="faker.attendees[0].photo"
                              :content="`Uploaded at ${faker.attendees[0].name}`"
                            />
                          </div>
                          <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="border-2 border-white rounded-full"
                              :src="faker.attendees[1].photo"
                              :content="`Uploaded at ${faker.attendees[1].name}`"
                            />
                          </div>
                          <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="border-2 border-white rounded-full"
                              :src="faker.attendees[2].photo"
                              :content="`Uploaded at ${faker.attendees[2].name}`"
                            />
                          </div>
                          <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="border-2 border-white rounded-full"
                              :src="faker.attendees[3].photo"
                              :content="`Uploaded at ${faker.attendees[3].name}`"
                            />
                          </div>
                          <div class="ml-1 text-slate-500">
                            ({{ _.random(20, 100) }}+)
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <div class="text-slate-500">Registration Link:</div>
                      <div class="ml-auto">
                        <a
                          href=""
                          class="text-slate-500 whitespace-nowrap underline decoration-dotted decoration-slate-500/30 underline-offset-[3px] truncate w-40 md:w-52 block text-right"
                        >
                          {{ faker.registrationLink }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </Tab.Panel>
          <Tab.Panel>
            <div class="grid grid-cols-12 gap-y-10 gap-x-6 mt-3.5">
              <template
                v-for="(faker, fakerKey) in _.take(
                  achievements.fakeAchievements(),
                  9
                )"
                :key="fakerKey"
              >
                <div
                  class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 box box--stacked"
                >
                  <div class="flex mt-5 ml-5">
                    <span
                      class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-2 py-0.5 mr-auto"
                    >
                      <span class="-mt-px">{{ faker.category }}</span>
                    </span>
                  </div>
                  <Menu class="absolute top-0 right-0 mt-5 mr-5">
                    <Menu.Button class="w-5 h-5 text-slate-500">
                      <Lucide
                        icon="MoreVertical"
                        class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
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
                  <div class="flex flex-col items-center px-5 pb-10 mt-5">
                    <div class="relative w-[72px] h-[72px]">
                      <div
                        class="flex items-center justify-center w-full h-full overflow-hidden border rounded-full border-slate-200/70 bg-theme-1/5"
                      >
                        <Lucide
                          :icon="faker.event.icon"
                          class="w-6 h-6 text-theme-1 fill-theme-1/10 stroke-[0.7]"
                        />
                      </div>
                    </div>
                    <div class="mt-3 font-medium text-primary text-[0.94rem]">
                      {{ faker.title }}
                    </div>
                    <div class="mt-1.5 text-center text-slate-500">
                      {{ faker.description }}
                    </div>
                    <div class="mt-5 text-xs uppercase text-slate-400">
                      Collaborators
                    </div>
                    <div class="flex justify-center mt-3">
                      <div class="w-10 h-10 image-fit zoom-in">
                        <Tippy
                          as="img"
                          alt="Tailwise - Admin Dashboard Template"
                          class="border-2 border-white rounded-full"
                          :src="faker.collaborators[0].photo"
                          :content="faker.collaborators[0].name"
                        />
                      </div>
                      <div class="w-10 h-10 -ml-3 image-fit zoom-in">
                        <Tippy
                          as="img"
                          alt="Tailwise - Admin Dashboard Template"
                          class="border-2 border-white rounded-full"
                          :src="faker.collaborators[1].photo"
                          :content="faker.collaborators[1].name"
                        />
                      </div>
                      <div class="w-10 h-10 -ml-3 image-fit zoom-in">
                        <Tippy
                          as="img"
                          alt="Tailwise - Admin Dashboard Template"
                          class="border-2 border-white rounded-full"
                          :src="faker.collaborators[2].photo"
                          :content="faker.collaborators[2].name"
                        />
                      </div>
                      <div class="w-10 h-10 -ml-3 image-fit zoom-in">
                        <Tippy
                          as="img"
                          alt="Tailwise - Admin Dashboard Template"
                          class="border-2 border-white rounded-full"
                          :src="faker.collaborators[3].photo"
                          :content="faker.collaborators[3].name"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="flex border-t border-slate-200/80">
                    <div class="flex flex-col items-center flex-1 py-3">
                      <div class="text-base font-medium">
                        {{ faker.level }}
                      </div>
                      <div class="text-slate-500">Level</div>
                    </div>
                    <div
                      class="flex flex-col items-center flex-1 py-3 border-x border-slate-200/80"
                    >
                      <div class="text-base font-medium">
                        {{ faker.duration }}
                      </div>
                      <div class="text-slate-500">Duration</div>
                    </div>
                    <div class="flex flex-col items-center flex-1 py-3">
                      <div class="text-base font-medium">
                        {{ faker.score }}
                      </div>
                      <div class="text-slate-500">Score</div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </Tab.Panel>
          <Tab.Panel>
            <div class="grid grid-cols-12 gap-y-10 gap-x-6 mt-3.5">
              <template
                v-for="(faker, fakerKey) in _.take(users.fakeUsers(), 9)"
                :key="fakerKey"
              >
                <div
                  class="flex flex-col col-span-12 md:col-span-6 xl:col-span-4 box box--stacked"
                >
                  <Menu class="absolute top-0 right-0 mt-5 mr-5">
                    <Menu.Button class="w-5 h-5 text-slate-500">
                      <Lucide
                        icon="MoreVertical"
                        class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
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
                  <div class="flex flex-col items-center px-5 pb-10 mt-10">
                    <div
                      class="w-[72px] h-[72px] overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                    >
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        :src="faker.photo"
                      />
                    </div>
                    <div class="mt-3 font-medium text-primary text-[0.94rem]">
                      {{ faker.name }}
                    </div>
                    <div class="flex items-center justify-center gap-3 mt-2">
                      <div class="flex items-center text-slate-500">
                        <Lucide
                          icon="Hotel"
                          class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]"
                        />
                        {{ faker.location }}
                      </div>
                      <div class="flex items-center text-slate-500">
                        <Lucide
                          icon="Calendar"
                          class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]"
                        />
                        {{ faker.joinedDate }}
                      </div>
                    </div>
                    <div
                      class="flex flex-wrap items-center justify-center gap-2 mt-5 sm:flex-row"
                    >
                      <span
                        class="flex items-center text-xs font-medium rounded-md text-primary bg-primary/10 border border-primary/10 px-2 py-0.5"
                      >
                        <span class="-mt-px truncate">
                          {{ faker.department }}
                        </span>
                      </span>
                      <span
                        class="flex items-center text-xs font-medium rounded-md text-primary bg-primary/10 border border-primary/10 px-2 py-0.5"
                      >
                        <span class="-mt-px truncate">
                          {{ faker.position }}
                        </span>
                      </span>
                    </div>
                  </div>
                  <div
                    class="flex items-center px-5 py-4 border-t border-slate-200/80"
                  >
                    <div class="text-slate-500">
                      {{ _.random(20, 100) }}+ Connections
                    </div>
                    <template v-if="_.random(0, 1)">
                      <Button
                        variant="outline-primary"
                        class="px-4 ml-auto border-primary/50"
                      >
                        <Lucide
                          icon="UserPlus"
                          class="stroke-[1.3] w-4 h-4 -ml-0.5 mr-2"
                        />
                        Connect
                      </Button>
                    </template>
                    <template v-else>
                      <Button variant="primary" class="px-4 ml-auto">
                        <Lucide
                          icon="Check"
                          class="stroke-[1.3] w-4 h-4 -ml-0.5 mr-2"
                        />
                        Connected
                      </Button>
                    </template>
                  </div>
                </div>
              </template>
            </div>
          </Tab.Panel>
          <Tab.Panel>
            <div
              class="flex flex-col items-center py-14 box box--stacked mt-3.5"
            >
              <Lucide
                icon="FileLock2"
                class="stroke-[0.3] w-24 h-24 text-primary/70 fill-primary/5"
              />
              <div class="mt-5 text-base font-medium">
                Two-Factor Authentication (2FA)
              </div>
              <div class="px-10 mt-1 text-center text-slate-500">
                Enhance your account security by enabling Two-Factor
                Authentication in the settings.
              </div>
              <Button variant="primary" class="mt-6">
                <Lucide icon="Lock" class="stroke-[1.3] w-4 h-4 mr-2 -ml-0.5" />
                Enable Now
              </Button>
            </div>
          </Tab.Panel>
        </Tab.Panels>
      </Tab.Group>
    </div>
  </div>
</template>
