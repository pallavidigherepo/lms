<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import { FormCheck, FormInput, FormSelect } from "@/components/Base/Form";
import TomSelect from "@/components/Base/TomSelect";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import mails from "@/fakers/mails";
import Button from "@/components/Base/Button";
import { ref } from "vue";
import _ from "lodash";

const selectedUser = ref("1");
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Inbox
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="MailPlus" class="stroke-[1.3] w-4 h-4 mr-2" />
            Compose New Mail
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="Cog" class="stroke-[1.3] w-4 h-4 mr-2" /> Mail
            Settings
          </Button>
        </div>
      </div>
      <div class="gap-5 flex flex-col sm:flex-row mt-3.5">
        <div class="relative">
          <div class="sticky top-[104px]">
            <div
              class="box sm:w-[102px] grid grid-cols-3 sm:grid-cols-1 px-3.5 py-4 gap-3.5 before:content-[''] before:z-[-1] box--stacked"
            >
              <Tippy
                as="a"
                href=""
                content="Inbox"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 active place-content-center"
              >
                <Lucide
                  icon="AppWindow"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
                <div
                  class="min-w-[1.15rem] h-[1.2rem] rounded-full bg-white flex items-center justify-center text-xs font-medium absolute right-0 top-0 -mt-1.5 -mr-1.5"
                >
                  <div
                    class="w-full h-full px-2 border rounded-full bg-pending/10 border-pending/20 text-pending"
                  >
                    12+
                  </div>
                </div>
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Starred"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="MailCheck"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Snoozed"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="KeyRound"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
                <div
                  class="min-w-[1.15rem] h-[1.2rem] rounded-full bg-white flex items-center justify-center text-xs font-medium absolute right-0 top-0 -mt-1.5 -mr-1.5"
                >
                  <div
                    class="w-full h-full px-2 border rounded-full bg-pending/10 border-pending/20 text-pending"
                  >
                    3
                  </div>
                </div>
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Important"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="PackageCheck"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Sent"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="ShieldCheck"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
                <div
                  class="min-w-[1.15rem] h-[1.2rem] rounded-full bg-white flex items-center justify-center text-xs font-medium absolute right-0 top-0 -mt-1.5 -mr-1.5"
                >
                  <div
                    class="w-full h-full px-2 border rounded-full bg-pending/10 border-pending/20 text-pending"
                  >
                    41
                  </div>
                </div>
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Drafts"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="Smartphone"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Categories"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="BellDot"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
                <div
                  class="min-w-[1.15rem] h-[1.2rem] rounded-full bg-white flex items-center justify-center text-xs font-medium absolute right-0 top-0 -mt-1.5 -mr-1.5"
                >
                  <div
                    class="w-full h-full px-2 border rounded-full bg-pending/10 border-pending/20 text-pending"
                  >
                    21
                  </div>
                </div>
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Chats"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="Workflow"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="Scheduled"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="Podcast"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
              <Tippy
                as="a"
                href=""
                content="All Mail"
                :options="{
                  placement: 'right',
                }"
                class="relative h-14 rounded-lg flex items-center py-3 [&.active]:text-primary [&.active]:font-medium [&.active]:shadow-sm hover:text-primary border border-slate-200/80 [&.active]:bg-primary/[0.04] [&.active]:border-primary/10 place-content-center"
              >
                <Lucide
                  icon="Trash2"
                  class="stroke-[0.8] w-5 h-5 fill-theme-1/10"
                />
              </Tippy>
            </div>
          </div>
        </div>
        <div class="w-full pb-10 overflow-hidden">
          <div class="flex flex-col w-full box box--stacked">
            <div class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2">
              <div>
                <div class="relative">
                  <Lucide
                    icon="Search"
                    class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500"
                  />
                  <FormInput
                    type="text"
                    placeholder="Search mails..."
                    class="pl-9 sm:w-64 rounded-[0.5rem]"
                  />
                </div>
              </div>
              <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 sm:ml-auto">
                <Menu>
                  <Menu.Button
                    :as="Button"
                    variant="outline-secondary"
                    class="w-full sm:w-auto"
                  >
                    <Lucide icon="Download" class="stroke-[1.3] w-4 h-4 mr-2" />
                    Export
                    <Lucide
                      icon="ChevronDown"
                      class="stroke-[1.3] w-4 h-4 ml-2"
                    />
                  </Menu.Button>
                  <Menu.Items class="w-40">
                    <Menu.Item>
                      <Lucide icon="FileBarChart" class="w-4 h-4 mr-2" />
                      PDF
                    </Menu.Item>
                    <Menu.Item>
                      <Lucide icon="FileBarChart" class="w-4 h-4 mr-2" />
                      CSV
                    </Menu.Item>
                  </Menu.Items>
                </Menu>
                <Popover class="inline-block" v-slot="{ close }">
                  <Popover.Button
                    :as="Button"
                    variant="outline-secondary"
                    class="w-full sm:w-auto"
                  >
                    <Lucide
                      icon="ArrowDownWideNarrow"
                      class="stroke-[1.3] w-4 h-4 mr-2"
                    />
                    Filter
                    <div
                      class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full bg-slate-100 dark:bg-darkmode-400 dark:bg-darkmode-400"
                    >
                      3
                    </div>
                  </Popover.Button>
                  <Popover.Panel placement="bottom-end">
                    <div class="p-2">
                      <div>
                        <div class="text-left text-slate-500">Sender</div>
                        <TomSelect
                          class="flex-1 mt-2"
                          v-model="selectedUser"
                          :options="{
                            placeholder: 'Search user',
                          }"
                        >
                          <template
                            v-for="(faker, fakerKey) in users.fakeUsers()"
                            :key="fakerKey"
                          >
                            <option :value="fakerKey">
                              {{ faker.name }}
                            </option>
                          </template>
                        </TomSelect>
                      </div>
                      <div class="mt-3">
                        <div class="text-left text-slate-500">Status</div>
                        <FormSelect class="flex-1 mt-2">
                          <option value="Read">Read</option>
                          <option value="Unread">Unread</option>
                          <option value="Pinned">Pinned</option>
                        </FormSelect>
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
                          Apply
                        </Button>
                      </div>
                    </div>
                  </Popover.Panel>
                </Popover>
              </div>
            </div>
            <div class="px-5 mt-0.5">
              <div
                class="flex items-center px-5 py-3.5 border shadow-sm border-slate-200/70 rounded-[0.6rem] bg-primary/[0.01] mb-2"
              >
                <div class="flex items-center">
                  <div class="relative w-5 h-5">
                    <FormCheck.Input
                      type="checkbox"
                      value="checked"
                      @change="() => {}"
                      class="absolute z-10 w-full h-full opacity-0 peer"
                    />
                    <div
                      class="absolute inset-0 flex shadow-sm items-center justify-center w-[16px] h-[16px] m-auto text-white transition-all border rounded opacity-0 bg-primary/60 border-primary/50 peer-checked:opacity-100"
                    >
                      <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                    </div>
                    <div
                      class="absolute inset-0 flex shadow-sm items-center justify-center w-[16px] h-[16px] m-auto transition-all border-[1.5px] rounded text-primary border-primary/30 peer-checked:opacity-0 peer-hover:bg-primary/10"
                    ></div>
                  </div>
                  <Lucide
                    icon="ChevronDown"
                    class="stroke-[1.2] w-5 h-5 ml-1 mr-0.5 text-slate-500/80"
                  />
                </div>
                <div class="ml-4 mr-0.5">
                  <Lucide
                    icon="RefreshCcw"
                    class="stroke-[1] w-[17px] h-[17px] text-slate-500/80"
                  />
                </div>
                <div class="ml-4">
                  <Lucide
                    icon="MoreHorizontal"
                    class="stroke-[1] w-[17px] h-[17px] text-slate-500/80"
                  />
                </div>
                <div class="hidden ml-auto sm:block text-slate-500/70">
                  1 - 50 of 5,238
                </div>
                <div class="ml-auto sm:ml-5">
                  <Lucide
                    icon="ArrowLeft"
                    class="stroke-[1] w-[17px] h-[17px] text-slate-500/80"
                  />
                </div>
                <div class="ml-3">
                  <Lucide
                    icon="ArrowRight"
                    class="stroke-[1] w-[17px] h-[17px] text-slate-500/80"
                  />
                </div>
                <div class="ml-5">
                  <Lucide
                    icon="Settings"
                    class="stroke-[1] w-[17px] h-[17px] text-slate-500/80"
                  />
                </div>
              </div>
              <div>
                <div
                  class="shadow-sm overflow-x-auto border rounded-[0.6rem] sm:overflow-x-visible border-slate-200/70 border-t-slate-200/60"
                >
                  <template
                    v-for="(faker, fakerKey) in _.take(mails.fakeMails(), 13)"
                    :key="fakerKey"
                  >
                    <div
                      :class="[
                        'transition duration-200 ease-in-out transform cursor-pointer inline-block sm:block last:border-b-0 border-b border-slate-200/50 dark:border-darkmode-400',
                        'hover:relative hover:bg-slate-50',
                        {
                          'bg-primary/[0.03] text-slate-500 dark:text-slate-500 dark:bg-darkmode-400/70':
                            !faker.opened,
                        },
                        {
                          'dark:text-slate-300 dark:bg-darkmode-600':
                            faker.opened,
                        },
                      ]"
                    >
                      <div class="flex items-center px-5 py-3.5">
                        <div>
                          <div class="relative w-5 h-5">
                            <FormCheck.Input
                              type="checkbox"
                              value="checked"
                              :checked="!faker.opened"
                              @change="() => {}"
                              class="absolute z-10 w-full h-full opacity-0 peer"
                            />
                            <div
                              class="absolute inset-0 flex shadow-sm items-center justify-center w-[16px] h-[16px] m-auto text-white transition-all border rounded opacity-0 bg-primary/60 border-primary/50 peer-checked:opacity-100"
                            >
                              <Lucide
                                icon="Check"
                                class="stroke-[1.5] w-3 h-3"
                              />
                            </div>
                            <div
                              class="absolute inset-0 flex shadow-sm items-center justify-center w-[16px] h-[16px] m-auto transition-all border-[1.5px] rounded text-primary border-primary/30 peer-checked:opacity-0 peer-hover:bg-primary/10"
                            ></div>
                          </div>
                        </div>
                        <div class="ml-4">
                          <div class="relative w-[18px] h-[18px]">
                            <FormCheck.Input
                              type="checkbox"
                              value="checked"
                              @change="() => {}"
                              class="absolute z-10 w-full h-full opacity-0 peer"
                            />
                            <Lucide
                              icon="Star"
                              class="absolute inset-0 stroke-[1] w-[18px] h-[18px] text-primary/50 fill-primary/[0.03] peer-checked:fill-primary/50 peer-checked:text-primary peer-hover:peer-checked:fill-primary/50 peer-hover:fill-primary/10"
                            />
                          </div>
                        </div>
                        <div class="ml-2.5">
                          <div class="relative w-[17px] h-[17px]">
                            <FormCheck.Input
                              type="checkbox"
                              value="checked"
                              @change="() => {}"
                              class="absolute z-10 w-full h-full opacity-0 peer"
                            />
                            <Lucide
                              icon="Bookmark"
                              class="absolute inset-0 stroke-[1] w-[17px] h-[17px] text-primary/50 fill-primary/[0.03] peer-checked:fill-primary/50 peer-checked:text-primary peer-hover:peer-checked:fill-primary/50 peer-hover:fill-primary/10"
                            />
                          </div>
                        </div>
                        <div class="flex items-center flex-none w-40 ml-8 mr-5">
                          <div class="relative flex-none w-5 h-5 image-fit">
                            <img
                              alt="Tailwise - Admin Dashboard Template"
                              class="rounded-full"
                              :src="faker.sender.photo"
                            />
                          </div>
                          <div
                            :class="[
                              'ml-2.5 truncate',
                              { 'font-medium': faker.opened },
                            ]"
                          >
                            {{ faker.sender.name }}
                          </div>
                        </div>
                        <div class="max-w-2xl truncate">
                          <span :class="[{ 'font-medium': faker.opened }]">
                            {{ faker.subject }}
                          </span>
                          <span class="mx-0.5">-</span> {{ faker.content }}
                        </div>
                        <div
                          class="pl-10 ml-auto text-xs whitespace-nowrap text-slate-500/70"
                        >
                          {{ faker.date }}
                        </div>
                      </div>
                    </div>
                  </template>
                </div>
              </div>
            </div>
            <div
              class="flex flex-col items-center p-5 text-center sm:flex-row sm:text-left text-slate-500/80"
            >
              <div>4.41 GB (25%) of 17 GB used Manage</div>
              <div class="mt-2 sm:ml-auto sm:mt-0">
                Last account activity: 36 minutes ago
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
