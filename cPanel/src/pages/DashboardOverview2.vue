<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import users from "@/fakers/users";
import projects from "@/fakers/projects";
import projectDetails from "@/fakers/project-details";
import { FormSelect, FormInput, FormCheck } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import { Tab } from "@/components/Base/Headless";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <Tab.Group>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium group-[.mode--light]:text-white">
            Project Statistic
          </div>
          <Tab.List
            variant="boxed-tabs"
            class="w-auto md:ml-auto bg-white box rounded-[0.6rem] border-slate-200 group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-full md:w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Daily
              </Tab.Button>
            </Tab>
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-full md:w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Monthly
              </Tab.Button>
            </Tab>
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-full md:w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Yearly
              </Tab.Button>
            </Tab>
          </Tab.List>
        </div>
        <Tab.Panels class="mt-3.5 box box--stacked">
          <Tab.Panel
            class="flex flex-col xl:flex-row gap-2 p-1.5 leading-relaxed"
          >
            <div class="grid w-full grid-cols-4 gap-2">
              <div
                class="col-span-4 sm:col-span-2 xl:col-span-1 bg-gradient-to-b from-theme-2/90 to-theme-1/[0.85] flex-1 p-5 border-0 relative rounded-[0.6rem] box border-slate-200/60 bg-slate-50 overflow-hidden before:content-[''] before:w-full before:h-[130%] before:bg-gradient-to-b before:from-black/[0.15] before:to-transparent before:absolute before:right-0 before:top-0 before:rotate-45 before:-mr-[62%]"
              >
                <div
                  class="flex items-center justify-center w-12 h-12 border rounded-full border-white/10 bg-white/10"
                >
                  <Lucide
                    icon="Database"
                    class="w-6 h-6 text-white fill-white/10"
                  />
                </div>
                <div class="flex items-center mt-12">
                  <div class="text-2xl font-medium text-white">247,220</div>
                  <div
                    class="flex items-center ml-3.5 border border-success/50 bg-success/50 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-white/90 dark:bg-white/10"
                  >
                    12%
                    <Lucide
                      icon="ChevronUp"
                      class="w-4 h-4 ml-px stroke-[1.5]"
                    />
                  </div>
                </div>
                <div class="mt-1 text-base text-white/70">
                  Customer Engagement
                </div>
                <Menu class="absolute top-0 right-0 mt-5 mr-5">
                  <Menu.Button class="w-5 h-5 text-slate-500">
                    <Lucide
                      icon="MoreVertical"
                      class="w-6 h-6 stroke-white/70 fill-white/70"
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
              <div
                class="col-span-4 sm:col-span-2 xl:col-span-1 flex-1 p-5 border relative rounded-[0.6rem] bg-slate-50/50 overflow-hidden dark:bg-darkmode-400"
              >
                <div
                  class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
                >
                  <Lucide
                    icon="AppWindow"
                    class="w-6 h-6 text-primary fill-primary/10"
                  />
                </div>
                <div class="flex items-center mt-12">
                  <div class="text-2xl font-medium">124,625</div>
                  <div
                    class="flex items-center ml-3.5 border border-danger/50 bg-danger/70 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-white/90"
                  >
                    3%
                    <Lucide
                      icon="ChevronDown"
                      class="w-4 h-4 ml-px stroke-[1.5]"
                    />
                  </div>
                </div>
                <div class="mt-1 text-base text-slate-500">Lead Generation</div>
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
              </div>
              <div
                class="col-span-4 sm:col-span-2 xl:col-span-1 flex-1 p-5 border relative rounded-[0.6rem] bg-slate-50/50 overflow-hidden dark:bg-darkmode-400"
              >
                <div
                  class="flex items-center justify-center w-12 h-12 border rounded-full border-info/10 bg-info/10"
                >
                  <Lucide icon="Box" class="w-6 h-6 text-info fill-info/10" />
                </div>
                <div class="flex items-center mt-12">
                  <div class="text-2xl font-medium">749,220</div>
                  <div
                    class="flex items-center ml-3.5 border border-success/50 bg-success/70 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-white/90"
                  >
                    4%
                    <Lucide
                      icon="ChevronUp"
                      class="w-4 h-4 ml-px stroke-[1.5]"
                    />
                  </div>
                </div>
                <div class="mt-1 text-base text-slate-500">Support Tickets</div>
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
              </div>
              <div
                class="col-span-4 sm:col-span-2 xl:col-span-1 flex-1 p-5 border relative rounded-[0.6rem] bg-slate-50/50 overflow-hidden dark:bg-darkmode-400"
              >
                <div
                  class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
                >
                  <Lucide
                    icon="PanelsTopLeft"
                    class="w-6 h-6 text-primary fill-primary/10"
                  />
                </div>
                <div class="flex items-center mt-12">
                  <div class="text-2xl font-medium">273,235</div>
                  <div
                    class="flex items-center ml-3.5 border border-success/50 bg-success/70 rounded-full pl-[7px] pr-1 py-[2px] text-xs font-medium text-white/90"
                  >
                    9%
                    <Lucide
                      icon="ChevronUp"
                      class="w-4 h-4 ml-px stroke-[1.5]"
                    />
                  </div>
                </div>
                <div class="mt-1 text-base text-slate-500">
                  Pipeline Management
                </div>
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
              </div>
            </div>
            <a
              href=""
              class="bg-slate-50 xl:w-20 text-slate-400/80 flex flex-col justify-center items-center p-5 border border-slate-300/80 rounded-[0.6rem] hover:bg-slate-50 border-dashed [&:hover_svg]:rotate-180 dark:bg-darkmode-400"
            >
              <Lucide
                icon="PlusSquare"
                class="w-6 h-6 transition-transform transform"
              />
            </a>
          </Tab.Panel>
          <Tab.Panel class="p-5 leading-relaxed"></Tab.Panel>
          <Tab.Panel class="p-5 leading-relaxed"></Tab.Panel>
        </Tab.Panels>
      </Tab.Group>
    </div>
    <div class="flex flex-col col-span-12 xl:col-span-6 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Contact Details</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div
            class="flex flex-col items-center pb-5 mb-5 border-b border-dashed gap-y-2 sm:flex-row border-slate-300/70"
          >
            <div
              class="overflow-hidden rounded-full w-14 h-14 image-fit border-[3px] border-slate-200/70"
            >
              <img
                alt="Tailwise - Admin Dashboard Template"
                :src="users.fakeUsers()[0].photo"
              />
            </div>
            <div class="text-center sm:text-left sm:ml-4">
              <div class="text-base font-medium">
                {{ users.fakeUsers()[0].name }}
              </div>
              <div class="text-slate-500 mt-0.5">
                {{ users.fakeUsers()[0].position }}
              </div>
            </div>
            <div
              class="flex items-center px-3 py-1 font-medium border rounded-full sm:ml-auto border-success/10 bg-success/10 text-success"
            >
              <div
                class="w-1.5 h-1.5 mr-2 rounded-full border border-success/50 bg-success/50"
              ></div>
              High priority
            </div>
          </div>
          <div class="flex flex-col text-center gap-y-3 sm:flex-row">
            <div class="flex-1 border-dashed sm:border-r last:border-0">
              <div class="text-slate-500">Leads Generated</div>
              <div class="flex items-center justify-center mt-1">
                <div class="text-base font-medium">2,176</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  11%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
            </div>
            <div class="flex-1 border-dashed sm:border-r last:border-0">
              <div class="text-slate-500">Deals Closed</div>
              <div class="flex items-center justify-center mt-1">
                <div class="text-base font-medium">2,027</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-success">
                  2%
                  <Lucide icon="ChevronUp" class="w-4 h-4 ml-px" />
                </div>
              </div>
            </div>
            <div class="flex-1 border-dashed sm:border-r last:border-0">
              <div class="text-slate-500">Meetings Scheduled</div>
              <div class="flex items-center justify-center mt-1">
                <div class="text-base font-medium">342</div>
                <div class="flex items-center ml-2 -mr-1 text-xs text-danger">
                  4%
                  <Lucide icon="ChevronDown" class="w-4 h-4 ml-px" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Invite Team Member</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="pb-5 mb-5 border-b border-dashed border-slate-300/70">
            <div>Everyone at project can access this file</div>
            <div class="relative mt-3">
              <FormInput
                type="text"
                placeholder="everyone@gmail.com"
                class="sm:py-3"
              />
              <Button
                variant="primary"
                size="sm"
                class="w-full sm:w-auto sm:absolute inset-y-0 right-0 pl-3.5 pr-4 my-auto mt-2 sm:mt-auto mr-2 h-9 sm:h-8 bg-primary/10 text-primary border-primary/20 hover:bg-primary/20"
              >
                <Lucide icon="Send" class="w-3.5 h-3.5 mr-1.5 stroke-[1.3]" />
                Send Invitation
              </Button>
            </div>
          </div>
          <div
            class="flex flex-col gap-5 pb-5 mb-5 border-b border-dashed border-slate-300/70"
          >
            <template
              v-for="(faker, fakerKey) in _.take(users.fakeUsers(), 5)"
              key="fakerKey"
            >
              <div class="flex items-center gap-3.5">
                <div>
                  <div
                    class="w-12 h-12 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="faker.photo"
                    />
                  </div>
                </div>
                <div
                  class="flex flex-col w-full sm:items-center gap-y-2.5 sm:flex-row"
                >
                  <div>
                    <div class="font-medium">{{ faker.name }}</div>
                    <div class="text-xs text-slate-500 mt-0.5">
                      {{ faker.email }}
                    </div>
                  </div>
                  <div class="relative sm:ml-auto">
                    <Lucide
                      icon="Settings"
                      class="absolute inset-y-0 w-3.5 h-3.5 my-auto ml-2.5 stroke-[1.2]"
                    />
                    <FormSelect
                      class="bg-[length:15px_auto] sm:w-48 pl-8 pr-2.5 py-1.5 text-xs"
                      :value="faker.position"
                      @change="() => {}"
                    >
                      <template
                        v-for="(faker, fakerKey) in users.fakeUsers()"
                        :key="fakerKey"
                      >
                        <option :value="faker.position">
                          {{ faker.position }}
                        </option>
                      </template>
                    </FormSelect>
                  </div>
                </div>
              </div>
            </template>
          </div>
          <div>
            <div>Share invitation link</div>
            <div class="flex gap-3 mt-3">
              <FormInput
                type="text"
                placeholder="everyone@gmail.com"
                value="https://left4code.com/invitation?token=abcdefgh12345678"
                disabled
                class="text-slate-500"
              />
              <Tippy
                content="Copy link"
                :as="Button"
                variant="outline-secondary"
              >
                <Lucide icon="Copy" class="w-4 h-4 stroke-[1.5]" />
              </Tippy>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 xl:col-span-6 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium">Team Collaboration</div>
        </div>
        <div class="p-5 mt-3.5 box box--stacked">
          <div class="pb-5 mb-5 border-b border-dashed border-slate-300/70">
            <div>Collaboration progress report</div>
            <div
              class="flex items-center w-full px-3 py-3 mt-3 border rounded-lg bg-success/10 border-success/10 text-success"
            >
              <Lucide icon="Clock" class="w-5 h-5 mr-2" />
              Project kick-off date:
              <div class="ml-2">{{ projects.fakeProjects()[0].dueDate }}</div>
            </div>
            <div class="flex flex-col gap-4 mt-5">
              <div class="flex flex-col items-center sm:flex-row gap-y-2">
                <div class="sm:w-36 text-slate-500">Project Name</div>
                <div class="flex items-center font-medium sm:ml-5 sm:h-7">
                  {{ projects.fakeProjects()[0].projectName }}
                </div>
              </div>
              <div class="flex flex-col items-center sm:flex-row gap-y-2">
                <div class="sm:w-36 text-slate-500">Project Manager</div>
                <div class="flex items-center h-5 sm:ml-5">
                  <div
                    class="w-6 h-6 overflow-hidden border-2 rounded-full image-fit zoom-in border-slate-200/70 box"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="projects.fakeProjects()[0].projectManager.photo"
                    />
                  </div>
                  <div
                    class="ml-2.5 underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                  >
                    {{ projects.fakeProjects()[0].projectManager.name }}
                  </div>
                </div>
              </div>
              <div class="flex flex-col items-center sm:flex-row gap-y-2">
                <div class="sm:w-36 text-slate-500">Creative Director</div>
                <div class="flex items-center sm:ml-5 sm:h-7">
                  <div
                    class="w-6 h-6 overflow-hidden border-2 rounded-full image-fit zoom-in border-slate-200/70 box"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="projects.fakeProjects()[1].projectManager.photo"
                    />
                  </div>
                  <div
                    class="ml-2.5 underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                  >
                    {{ projects.fakeProjects()[1].projectManager.name }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="flex items-center w-full px-3 py-3 font-medium border rounded-lg bg-slate-50 text-slate-500 dark:bg-darkmode-400"
            >
              <Lucide icon="KanbanSquare" class="w-5 h-5 mr-2 stroke-[1.3]" />
              Project Details for Team Members
              <Menu class="ml-auto">
                <Menu.Button as="a">
                  <Lucide
                    icon="MoreVertical"
                    class="w-5 h-5 stroke-slate-500/70 fill-slate-500/70"
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
            <div class="flex flex-col gap-3 mt-3">
              <template
                v-for="(faker, fakerKey) in _.take(
                  projectDetails.fakeProjectDetails(),
                  4
                )"
                :key="fakerKey"
              >
                <div
                  class="relative flex flex-col items-center gap-5 p-3 border border-dashed rounded-lg sm:flex-row border-slate-300/60"
                >
                  <div class="absolute top-0 right-0 mt-3 mr-3">
                    <FormCheck.Input
                      class="border"
                      type="checkbox"
                      :checked="[true, false][_.random(0, 1)]"
                      @change="() => {}"
                    />
                  </div>
                  <div>
                    <div
                      class="w-40 h-24 rounded-md image-fit border-[3px] border-slate-200/70"
                    >
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        class="rounded-md saturate-[0.7]"
                        :src="faker.image"
                      />
                    </div>
                  </div>
                  <div class="-mt-1">
                    <a
                      href=""
                      class="block font-medium text-center sm:text-left"
                    >
                      {{ faker.title }}
                    </a>
                    <div
                      class="flex items-center mt-2.5 text-xs text-slate-500 dark:text-slate-500"
                    >
                      <Lucide
                        icon="Link"
                        class="w-2.5 h-2.5 mr-1.5 stroke-[2]"
                      />
                      <a
                        href=""
                        class="truncate underline decoration-dotted underline-offset-[3px] decoration-slate-300"
                      >
                        {{ faker.link }}
                      </a>
                    </div>
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
                        <div class="w-6 h-6 -ml-2.5 image-fit zoom-in">
                          <Tippy
                            as="img"
                            alt="Tailwise - Admin Dashboard Template"
                            class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                            :src="faker.contributors[1].photo"
                            :content="faker.contributors[1].name"
                          />
                        </div>
                        <div class="w-6 h-6 -ml-2.5 image-fit zoom-in">
                          <Tippy
                            as="img"
                            alt="Tailwise - Admin Dashboard Template"
                            class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                            :src="faker.contributors[2].photo"
                            :content="faker.contributors[2].name"
                          />
                        </div>
                      </div>
                      <div class="ml-3 text-xs text-slate-500">4+ Members</div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
