<script setup lang="ts">
import "@/assets/css/vendors/simplebar.css";
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import { FormInput, FormTextarea } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import ImageZoom from "@/components/Base/ImageZoom";
import users from "@/fakers/users";
import messages from "@/fakers/messages";
import projectDetails from "@/fakers/project-details";
import { Tab } from "@/components/Base/Headless";
import Button from "@/components/Base/Button";
import { onMounted, ref } from "vue";
import SimpleBar from "simplebar";
import _ from "lodash";

const scrollableRef = ref<HTMLDivElement>();

onMounted(() => {
  if (scrollableRef.value) {
    new SimpleBar(scrollableRef.value);
  }
});
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Chat
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="MessagesSquare" class="stroke-[1.3] w-4 h-4 mr-2" />
            Start a New Chat
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="Cog" class="stroke-[1.3] w-4 h-4 mr-2" /> Chat
            Settings
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
                    <Lucide
                      icon="MessagesSquare"
                      class="w-4 h-4 stroke-[1.4]"
                    />
                    Chats
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
                    Contacts
                  </Tab.Button>
                </Tab>
              </Tab.List>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Tab.Panels>
                <Tab.Panel>
                  <div class="">
                    <div class="relative">
                      <Lucide
                        icon="Search"
                        class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-4 stroke-[1.3] text-slate-500/90"
                      />
                      <FormInput
                        type="text"
                        rounded
                        placeholder="Search for messages..."
                        class="pl-10 py-2.5"
                      />
                    </div>
                    <div class="flex flex-col gap-1 mt-4">
                      <template
                        v-for="(faker, fakerKey) in messages.fakeMessages()"
                        :key="fakerKey"
                      >
                        <div
                          class="flex items-center gap-4 px-2 py-2.5 -mx-2 rounded-lg cursor-pointer hover:bg-slate-50 dark:hover:bg-darkmode-400"
                        >
                          <div class="relative">
                            <div
                              class="w-12 h-12 overflow-hidden border-2 rounded-full image-fit border-slate-200/70"
                            >
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                :src="faker.sender.photo"
                              />
                            </div>
                            <template v-if="_.random(0, 1) == 0">
                              <div
                                class="absolute top-0 left-0 w-2.5 h-2.5 border border-white rounded-full bg-success/80 mt-0.5 ml-0.5"
                              ></div>
                            </template>
                          </div>
                          <div class="w-full">
                            <div class="flex items-center w-full">
                              <div
                                class="font-medium max-w-[7rem] md:max-w-[8rem] truncate"
                              >
                                {{ faker.sender.name }}
                              </div>
                              <div class="flex items-center gap-2 ml-auto">
                                <template v-if="_.random(0, 1) == 0">
                                  <Lucide
                                    icon="CheckCheck"
                                    class="w-3.5 h-3.5 stroke-[1.4] text-slate-500/90"
                                  />
                                </template>
                                <div class="text-xs text-slate-500/90">
                                  {{ faker.time }}
                                </div>
                              </div>
                            </div>
                            <div class="flex items-center mt-1.5">
                              <div
                                class="text-slate-500/90 max-w-[7rem] md:max-w-[10rem] truncate"
                              >
                                {{ faker.content }}
                              </div>
                              <div class="flex items-center gap-2 ml-auto">
                                <template v-if="_.random(0, 2) == 0">
                                  <div
                                    class="min-w-[1.15rem] rounded-full bg-white flex items-center justify-center text-xs"
                                  >
                                    <div
                                      class="w-full h-full px-1.5 py-0.5 leading-none rounded-full bg-theme-1/[0.75] text-white"
                                    >
                                      {{ _.random(1, 5) }}
                                    </div>
                                  </div>
                                </template>
                                <template v-if="_.random(0, 1) == 0">
                                  <Lucide
                                    icon="Pin"
                                    class="w-3.5 h-3.5 stroke-[1] text-slate-500 fill-slate-500/10 rotate-45"
                                  />
                                </template>
                              </div>
                            </div>
                          </div>
                        </div>
                      </template>
                    </div>
                  </div>
                </Tab.Panel>
              </Tab.Panels>
            </div>
          </Tab.Group>
        </div>
        <div class="flex flex-col w-full gap-y-7">
          <div class="flex flex-col p-5 box box--stacked">
            <div class="flex items-center gap-3.5 border-b border-dashed pb-5">
              <div>
                <div
                  class="w-12 h-12 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div class="font-medium truncate max-w-[9rem] md:max-w-none">
                  {{ users.fakeUsers()[0].name }}
                </div>
                <div
                  class="text-slate-500 mt-0.5 truncate max-w-[9rem] md:max-w-none"
                >
                  {{ users.fakeUsers()[0].position }}
                </div>
              </div>
              <div class="flex gap-2 ml-auto">
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/30 bg-primary/5"
                  content="Call"
                >
                  <Lucide
                    icon="Phone"
                    class="w-4 h-4 text-primary fill-primary/10"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/30 bg-primary/5"
                  content="Send a message"
                >
                  <Lucide
                    icon="Mail"
                    class="w-4 h-4 text-primary fill-primary/10"
                  />
                </Tippy>
              </div>
            </div>
            <div
              :class="[
                'h-[46.6rem] -mx-3 overflow-y-auto [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent',
                '[&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/20',
              ]"
              ref="scrollableRef"
            >
              <div class="flex flex-col gap-3.5 py-5 px-3">
                <template
                  v-for="(faker, fakerKey) in _.take(
                    messages.fakeMessages(),
                    9
                  )"
                  :key="fakerKey"
                >
                  <div
                    :class="[
                      'max-w-[85%] sm:max-w-none relative mr-auto group [&.right]:mr-0 [&.right]:ml-auto flex items-end gap-3 [&.right]:flex-row-reverse',
                      { right: [0, 0, 1, 1, 1][_.random(0, 5)] },
                    ]"
                  >
                    <div class="hidden sm:block">
                      <div
                        class="w-12 h-12 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                      >
                        <img
                          alt="Tailwise - Admin Dashboard Template"
                          :src="users.fakeUsers()[0].photo"
                        />
                      </div>
                    </div>
                    <div
                      class="border px-4 pt-3 pb-4 rounded-r-xl rounded-tl-xl bg-slate-50/80 group-[.right]:text-right group-[.right]:rounded-l-xl group-[.right]:rounded-br-none border-slate-200/80 dark:bg-darkmode-400"
                    >
                      <div>{{ faker.content }}</div>
                      <template v-if="_.random(0, 1) == 0">
                        <template v-if="_.random(0, 1)">
                          <div
                            class="flex items-center gap-3 mt-3.5 mb-3 group-[.right]:justify-end"
                          >
                            <Tippy
                              as="a"
                              class="flex items-center justify-center w-6 h-6 rounded-full bg-primary/80"
                              content="Play"
                            >
                              <Lucide
                                icon="Play"
                                class="w-3 h-3 -mr-0.5 fill-white/80"
                              />
                            </Tippy>
                            <div class="flex items-center h-6 gap-0.5">
                              <div
                                class="w-0.5 h-[15%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[25%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[35%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[45%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[30%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[20%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[25%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[35%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[45%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[30%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[50%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[70%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70 active"
                              ></div>
                              <div
                                class="w-0.5 h-[100%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[90%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[70%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[50%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[30%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[45%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[35%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[25%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[15%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[15%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[25%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[35%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[45%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[40%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[30%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                              <div
                                class="w-0.5 h-[20%] rounded-full bg-slate-300/80 [&.active]:bg-gradient-to-b [&.active]:from-theme-1/70 [&.active]:to-theme-2/70"
                              ></div>
                            </div>
                            <Tippy
                              as="a"
                              class="flex items-center justify-center gap-1 pl-1 pr-1.5 py-px text-xs border rounded-md border-theme-1/30 bg-theme-1/5 text-primary/90"
                              content="Call"
                            >
                              <Lucide
                                icon="MoveRight"
                                class="w-3.5 h-3.5 fill-white/80 stroke-[1.3]"
                              />
                              A
                            </Tippy>
                          </div>
                        </template>
                      </template>
                      <template v-else>
                        <div
                          class="mt-3 mb-4 w-64 h-32 overflow-hidden rounded-lg image-fit group-[.right]:ml-auto"
                        >
                          <ImageZoom
                            alt="Tailwise - Admin Dashboard Template"
                            class="p-0.5 border rounded-lg saturate-150"
                            :src="projectDetails.fakeProjectDetails()[0].image"
                          />
                        </div>
                      </template>
                      <div
                        class="flex group-[.right]:flex-row-reverse items-center mt-4 gap-10"
                      >
                        <div
                          class="flex items-center gap-2 mr-auto group-[.right]:mr-0 group-[.right]:ml-auto group-[.right]:flex-row-reverse"
                        >
                          <div class="text-xs text-slate-500/70">
                            {{ faker.time }}
                          </div>
                          <div class="flex items-center gap-1">
                            <Lucide
                              icon="Eye"
                              class="w-3.5 h-3.5 stroke-[1] text-slate-500/80 fill-slate-100"
                            />
                            <div class="text-xs text-slate-500/70">
                              {{ _.random(1, 7) }}
                            </div>
                          </div>
                        </div>
                        <div class="flex">
                          <div class="w-5 h-5 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                              :src="users.fakeUsers()[0].photo"
                              :content="users.fakeUsers()[0].name"
                            />
                          </div>
                          <div class="w-5 h-5 -ml-0.5 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                              :src="users.fakeUsers()[1].photo"
                              :content="users.fakeUsers()[1].name"
                            />
                          </div>
                          <div class="w-5 h-5 -ml-0.5 image-fit zoom-in">
                            <Tippy
                              as="img"
                              alt="Tailwise - Admin Dashboard Template"
                              class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                              :src="users.fakeUsers()[2].photo"
                              :content="users.fakeUsers()[2].name"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <Menu
                      class="absolute inset-y-0 right-0 w-5 h-5 my-auto -mr-8 group-[.right]:-ml-8 group-[.right]:left-0"
                    >
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
                  </div>
                </template>
              </div>
            </div>
            <div class="relative">
              <FormTextarea
                class="-mb-1.5 pr-16 rounded-xl resize-none"
                placeholder="Type a message..."
              />
              <div
                class="absolute inset-y-0 right-0 flex items-center justify-center w-[3.8rem]"
              >
                <a
                  href=""
                  class="flex items-center justify-center border-transparent rounded-full cursor-pointer w-9 h-9 box bg-gradient-to-b from-theme-1/90 to-theme-2/90"
                >
                  <Lucide
                    icon="Send"
                    class="stroke-[1.3] w-4 h-4 -ml-0.5 text-white/70"
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
