<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import { FormCheck, FormInput, FormSelect } from "@/components/Base/Form";
import FileIcon from "@/components/Base/FileIcon";
import TomSelect from "@/components/Base/TomSelect";
import Tippy from "@/components/Base/Tippy";
import files from "@/fakers/files";
import users from "@/fakers/users";
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
          File Manager
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="MailPlus" class="stroke-[1.3] w-4 h-4 mr-2" />
            Upload New Files
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="Cog" class="stroke-[1.3] w-4 h-4 mr-2" /> File Manager
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
        <div class="flex flex-col w-full box box--stacked">
          <div
            class="flex flex-col p-5 mb-1 sm:items-center sm:flex-row gap-y-2"
          >
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
                    class="flex items-center justify-center h-5 px-1.5 ml-2 text-xs font-medium border rounded-full bg-slate-100 dark:bg-darkmode-400"
                  >
                    3
                  </div>
                </Popover.Button>
                <Popover.Panel placement="bottom-end">
                  <div class="p-2">
                    <div>
                      <div class="text-left text-slate-500">Uploader</div>
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
                      <div class="text-left text-slate-500">File Type</div>
                      <FormSelect class="flex-1 mt-2">
                        <option value="Document">Document</option>
                        <option value="Music">Music</option>
                        <option value="Video">Video</option>
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
          <div class="flex flex-col gap-6 px-5">
            <div>
              <div
                class="h-4 mt-1 mb-5 text-xs uppercase text-slate-500/60 relative before:content-[''] before:h-px before:bg-slate-200/70 before:w-full before:absolute before:inset-y-0 before:my-auto dark:text-slate-400 dark:before:bg-darkmode-300"
              >
                <span
                  class="flex items-center absolute px-2.5 ml-4 bg-white dark:bg-darkmode-600"
                >
                  <Lucide
                    icon="Clock"
                    class="w-[15px] h-[15px] stroke-[1.7] stroke-slate-400/70 mr-1.5"
                  />
                  Recently Updated Files
                </span>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3.5 gap-x-4">
                <template
                  v-for="(faker, fakerKey) in _.take(files.fakeFiles(), 3)"
                  :key="fakerKey"
                >
                  <div>
                    <div
                      class="flex items-center relative px-3 py-2.5 rounded-[0.6rem] border border-slate-200/80 hover:bg-slate-50 cursor-pointer transition sm:px-5 shadow-sm dark:hover:bg-darkmode-400"
                    >
                      <div class="">
                        <FormCheck.Input
                          class="-mt-1 border"
                          type="checkbox"
                          :checked="_.random(0, 1) ? true : false"
                          @change="() => {}"
                        />
                      </div>
                      <div class="ml-5">
                        <template v-if="faker.type == 'Empty Folder'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="empty-directory"
                          />
                        </template>
                        <template v-else-if="faker.type == 'Folder'">
                          <FileIcon class="w-11 h-11" variant="directory" />
                        </template>
                        <template v-else-if="faker.type == 'Image'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="image"
                            :src="_.toLower(faker['fileName'])"
                          />
                        </template>
                        <template v-else>
                          <FileIcon
                            class="w-11 h-11 text-[0.6rem]"
                            variant="file"
                            :type="faker.type"
                          />
                        </template>
                      </div>
                      <div
                        class="flex flex-col w-full ml-3 lg:items-center lg:flex-row gap-y-1"
                      >
                        <a
                          href=""
                          class="block font-medium capitalize truncate lg:text-center"
                        >
                          {{
                            faker.fileName.split("/")[
                              faker.fileName.split("/").length - 1
                            ]
                          }}
                        </a>
                        <div
                          class="mr-4 text-xs lg:text-center lg:ml-auto text-slate-500/80"
                        >
                          File size: {{ faker.size }}
                        </div>
                      </div>
                      <Menu>
                        <Menu.Button as="a" class="block w-5 h-5" href="#">
                          <Lucide
                            icon="MoreVertical"
                            class="w-5 h-5 stroke-[1] stroke-slate-400/70 fill-slate-400/70"
                          />
                        </Menu.Button>
                        <Menu.Items class="w-40">
                          <Menu.Item>
                            <Lucide icon="Users" class="w-4 h-4 mr-2" />
                            Share File
                          </Menu.Item>
                          <Menu.Item>
                            <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                            Delete
                          </Menu.Item>
                        </Menu.Items>
                      </Menu>
                    </div>
                  </div>
                </template>
              </div>
            </div>
            <div>
              <div
                class="h-4 mt-1 mb-5 text-xs uppercase text-slate-500/60 relative before:content-[''] before:h-px before:bg-slate-200/70 before:w-full before:absolute before:inset-y-0 before:my-auto dark:text-slate-400 dark:before:bg-darkmode-300"
              >
                <span
                  class="flex items-center absolute px-2.5 ml-4 bg-white dark:bg-darkmode-600"
                >
                  <Lucide
                    icon="Pin"
                    class="w-[15px] h-[15px] stroke-[1.7] stroke-slate-400/70 mr-1.5"
                  />
                  Pinned Files
                </span>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3.5 gap-x-4">
                <template
                  v-for="(faker, fakerKey) in _.take(files.fakeFiles(), 10)"
                  :key="fakerKey"
                >
                  <div>
                    <div
                      class="flex items-center relative px-3 py-2.5 rounded-[0.6rem] border border-slate-200/80 hover:bg-slate-50 cursor-pointer transition sm:px-5 shadow-sm dark:hover:bg-darkmode-400"
                    >
                      <div class="">
                        <FormCheck.Input
                          class="-mt-1 border"
                          type="checkbox"
                          :checked="_.random(0, 1) ? true : false"
                          @change="() => {}"
                        />
                      </div>
                      <div class="ml-5">
                        <template v-if="faker.type == 'Empty Folder'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="empty-directory"
                          />
                        </template>
                        <template v-else-if="faker.type == 'Folder'">
                          <FileIcon class="w-11 h-11" variant="directory" />
                        </template>
                        <template v-else-if="faker.type == 'Image'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="image"
                            :src="_.toLower(faker['fileName'])"
                          />
                        </template>
                        <template v-else>
                          <FileIcon
                            class="w-11 h-11 text-[0.6rem]"
                            variant="file"
                            :type="faker.type"
                          />
                        </template>
                      </div>
                      <div
                        class="flex flex-col w-full ml-3 lg:items-center lg:flex-row gap-y-1"
                      >
                        <a
                          href=""
                          class="block font-medium capitalize truncate lg:text-center"
                        >
                          {{
                            faker.fileName.split("/")[
                              faker.fileName.split("/").length - 1
                            ]
                          }}
                        </a>
                        <div
                          class="mr-4 text-xs lg:text-center lg:ml-auto text-slate-500/80"
                        >
                          File size: {{ faker.size }}
                        </div>
                      </div>
                      <Menu>
                        <Menu.Button as="a" class="block w-5 h-5" href="#">
                          <Lucide
                            icon="MoreVertical"
                            class="w-5 h-5 stroke-[1] stroke-slate-400/70 fill-slate-400/70"
                          />
                        </Menu.Button>
                        <Menu.Items class="w-40">
                          <Menu.Item>
                            <Lucide icon="Users" class="w-4 h-4 mr-2" />
                            Share File
                          </Menu.Item>
                          <Menu.Item>
                            <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                            Delete
                          </Menu.Item>
                        </Menu.Items>
                      </Menu>
                    </div>
                  </div>
                </template>
              </div>
            </div>
            <div>
              <div
                class="h-4 mt-1 mb-5 text-xs uppercase text-slate-500/60 relative before:content-[''] before:h-px before:bg-slate-200/70 before:w-full before:absolute before:inset-y-0 before:my-auto dark:text-slate-400 dark:before:bg-darkmode-300"
              >
                <span
                  class="flex items-center absolute px-2.5 ml-4 bg-white dark:bg-darkmode-600"
                >
                  <Lucide
                    icon="Trash2"
                    class="w-[15px] h-[15px] stroke-[1.7] stroke-slate-400/70 mr-1.5"
                  />
                  Deleted Files
                </span>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3.5 gap-x-4">
                <template
                  v-for="(faker, fakerKey) in _.take(files.fakeFiles(), 5)"
                  :key="fakerKey"
                >
                  <div>
                    <div
                      class="flex items-center relative px-3 py-2.5 rounded-[0.6rem] border border-slate-200/80 hover:bg-slate-50 cursor-pointer transition sm:px-5 shadow-sm dark:hover:bg-darkmode-400"
                    >
                      <div class="">
                        <FormCheck.Input
                          class="-mt-1 border"
                          type="checkbox"
                          :checked="_.random(0, 1) ? true : false"
                          @change="() => {}"
                        />
                      </div>
                      <div class="ml-5">
                        <template v-if="faker.type == 'Empty Folder'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="empty-directory"
                          />
                        </template>
                        <template v-else-if="faker.type == 'Folder'">
                          <FileIcon class="w-11 h-11" variant="directory" />
                        </template>
                        <template v-else-if="faker.type == 'Image'">
                          <FileIcon
                            class="w-11 h-11"
                            variant="image"
                            :src="_.toLower(faker['fileName'])"
                          />
                        </template>
                        <template v-else>
                          <FileIcon
                            class="w-11 h-11 text-[0.6rem]"
                            variant="file"
                            :type="faker.type"
                          />
                        </template>
                      </div>
                      <div
                        class="flex flex-col w-full ml-3 lg:items-center lg:flex-row gap-y-1"
                      >
                        <a
                          href=""
                          class="block font-medium capitalize truncate lg:text-center"
                        >
                          {{
                            faker.fileName.split("/")[
                              faker.fileName.split("/").length - 1
                            ]
                          }}
                        </a>
                        <div
                          class="mr-4 text-xs lg:text-center lg:ml-auto text-slate-500/80"
                        >
                          File size: {{ faker.size }}
                        </div>
                      </div>
                      <Menu>
                        <Menu.Button as="a" class="block w-5 h-5" href="#">
                          <Lucide
                            icon="MoreVertical"
                            class="w-5 h-5 stroke-[1] stroke-slate-400/70 fill-slate-400/70"
                          />
                        </Menu.Button>
                        <Menu.Items class="w-40">
                          <Menu.Item>
                            <Lucide icon="Users" class="w-4 h-4 mr-2" />
                            Share File
                          </Menu.Item>
                          <Menu.Item>
                            <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                            Delete
                          </Menu.Item>
                        </Menu.Items>
                      </Menu>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </div>
          <div
            class="flex flex-col items-center p-5 my-1 text-center sm:flex-row sm:text-left text-slate-500/80"
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
</template>
