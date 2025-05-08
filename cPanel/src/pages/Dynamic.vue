<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { FormInput, FormCheck, FormTextarea } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import events from "@/fakers/events";
import messages from "@/fakers/messages";
import projectDetails from "@/fakers/project-details";
import activities from "@/fakers/activities";
import categories from "@/fakers/categories";
import Button from "@/components/Base/Button";
import LeafletMap from "@/components/LeafletMap";
import { formatCurrency } from "@/utils/helper";
import robotImage from "@/assets/images/miscellaneous/robot.jpg";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Dynamic
        </div>
      </div>
      <div class="grid grid-cols-12 gap-x-6 gap-y-10 mt-3.5">
        <div
          class="flex flex-col col-span-12 gap-x-6 gap-y-10 md:col-span-6 xl:col-span-4"
        >
          <div class="p-5 box box--stacked">
            <div
              class="h-48 overflow-hidden rounded-lg image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/60 before:to-theme-2/5"
            >
              <img
                alt="Tailwise - Admin Dashboard Template"
                class="rounded-md saturate-150"
                :src="robotImage"
              />
            </div>
            <div class="mt-5 text-base font-medium">
              {{ events.fakeEvents()[0].title }}
            </div>
            <div class="flex items-center gap-1 mt-1.5">
              <div class="flex gap-1.5 items-center">
                <Lucide
                  icon="MapPin"
                  class="text-primary fill-primary/10 stroke-[1.3] w-4 h-4"
                />
                <div
                  class="max-w-[7rem] md:max-w-[9rem] truncate text-slate-500"
                >
                  {{ events.fakeEvents()[0].location }}
                </div>
              </div>
              <div class="w-1 h-1 mx-1.5 rounded-full bg-slate-300"></div>
              <div class="flex gap-1.5 items-center">
                <Lucide
                  icon="Users"
                  class="text-primary fill-primary/10 stroke-[1.3] w-4 h-4"
                />
                <div
                  class="max-w-[7rem] md:max-w-[9rem] truncate text-slate-500"
                >
                  By {{ events.fakeEvents()[0].organizer }}
                </div>
              </div>
            </div>
            <div class="flex gap-2 mt-4 mb-5 ml-auto">
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.35]"
                :content="`${_.random(50, 100)} Attendees`"
              >
                <Lucide
                  icon="Users"
                  class="w-4 h-4 text-primary fill-primary/5"
                />
              </Tippy>
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.35]"
                :content="`${_.random(100, 150)} Available Seats`"
              >
                <Lucide
                  icon="RockingChair"
                  class="w-4 h-4 text-primary fill-primary/5"
                />
              </Tippy>
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.35]"
                :content="`${events.fakeEvents()[0].date}, ${
                  events.fakeEvents()[0].time
                }`"
              >
                <Lucide
                  icon="Clock10"
                  class="w-4 h-4 text-primary fill-primary/5"
                />
              </Tippy>
              <Tippy
                as="a"
                class="flex items-center justify-center ml-auto border rounded-full w-9 h-9 border-primary/[0.35]"
                content="Call Support"
              >
                <Lucide
                  icon="Phone"
                  class="w-4 h-4 text-primary fill-primary/5"
                />
              </Tippy>
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.35]"
                content="Send a Message"
              >
                <Lucide
                  icon="Mail"
                  class="w-4 h-4 text-primary fill-primary/5"
                />
              </Tippy>
            </div>
            <div class="flex items-center pt-5 border-t border-dashed">
              <a href="" class="flex items-center gap-2">
                <Lucide
                  icon="MessageSquare"
                  class="text-primary fill-primary/10 stroke-[1.3] w-4 h-4"
                />
                <div class="text-primary">
                  {{ _.random(210, 250) }} Comments
                </div>
                <Lucide
                  icon="ChevronDown"
                  class="text-primary stroke-[1.3] w-4 h-4"
                />
              </a>
              <a href="" class="ml-auto">
                <Lucide
                  icon="Heart"
                  class="w-5 h-5 text-pending fill-pending/30 stroke-[1]"
                />
              </a>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex flex-col items-center">
              <div class="relative w-40 h-40">
                <div
                  class="w-40 h-40 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
                <Lucide
                  icon="CheckCheck"
                  class="w-9 h-9 stroke-[1.3] absolute text-primary fill-primary/10 rounded-full box p-2 top-0 left-0 mt-7 -ml-2.5 bg-white/[0.95]"
                />
                <Lucide
                  icon="Zap"
                  class="w-9 h-9 stroke-[1.3] absolute text-primary fill-primary/10 rounded-full box p-2 bottom-0 right-0 mb-7 -mr-2.5 bg-white/[0.95]"
                />
              </div>
              <div class="mt-3.5 text-slate-500">Welcome Back</div>
              <div class="text-base font-medium mt-0.5">
                {{ users.fakeUsers()[0].name }}
              </div>
              <Button
                type="button"
                rounded
                variant="primary"
                class="w-full mt-5"
              >
                <Lucide icon="Send" class="w-4 h-4 stroke-[1.3] mr-2" />
                Continue
              </Button>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center gap-3.5">
              <div>
                <div
                  class="overflow-hidden border-2 rounded-full w-14 h-14 image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div class="text-base font-medium">
                  {{ messages.fakeMessages()[0].sender.name }}
                </div>
                <div class="text-slate-500 mt-0.5">
                  {{ messages.fakeMessages()[0].content }}
                </div>
              </div>
              <a href="" class="ml-auto">
                <Lucide
                  icon="ChevronDown"
                  class="w-5 h-5 text-slate-500 stroke-[1.3]"
                />
              </a>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center">
              <div class="flex items-center gap-3.5">
                <div>
                  <div
                    class="overflow-hidden border-2 rounded-full w-9 h-9 image-fit border-slate-200/70"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="users.fakeUsers()[0].photo"
                    />
                  </div>
                </div>
                <div>
                  Event by
                  <a href="" class="text-primary">
                    {{ events.fakeEvents()[0].organizer }}
                  </a>
                </div>
              </div>
              <a href="" class="ml-auto">
                <Lucide
                  icon="Maximize2"
                  class="w-4 h-4 text-slate-500 stroke-[1.3]"
                />
              </a>
            </div>
            <div
              class="flex flex-col items-center gap-5 pt-5 mt-3 border-t border-dashed"
            >
              <div
                class="w-full h-48 overflow-hidden rounded-lg image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/60 before:to-theme-2/5"
              >
                <img
                  alt="Tailwise - Admin Dashboard Template"
                  class="rounded-md saturate-150"
                  :src="robotImage"
                />
              </div>
              <div class="w-full">
                <div class="text-base font-medium">Cyber Rush Spectacular</div>
                <div class="mt-2 text-slate-500">
                  Experience the sensational 12.12 Cyber Rush! Discover
                  remarkable discounts and exclusive offers across a variety of
                  products. Elevate your lifestyle without overspending.
                </div>
              </div>
            </div>
            <div class="flex flex-col overflow-hidden mt-7 rounded-xl box">
              <div
                class="flex items-center p-5 bg-slate-50 dark:bg-darkmode-600"
              >
                <div class="font-medium text-slate-500">04:30 PM</div>
                <a
                  href=""
                  class="flex items-center gap-1.5 ml-auto text-primary"
                >
                  <Lucide icon="Pencil" class="w-3.5 h-3.5 stroke-[1.3]" />
                  Update Event
                </a>
              </div>
              <div class="w-full border-t border-dashed"></div>
              <div class="flex items-center p-5">
                <div class="font-medium">04:25:40</div>
                <div
                  class="flex items-center text-xs font-medium rounded-md text-primary bg-primary/10 border border-primary/10 px-1.5 py-px ml-2.5"
                >
                  <span class="-mt-px">Event Started</span>
                </div>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-7 h-7 border-primary/[0.15] box bg-primary/5 ml-auto"
                  content="Pause"
                >
                  <Lucide
                    icon="Pause"
                    class="w-4 h-4 stroke-[0.8] text-primary fill-primary/5"
                  />
                </Tippy>
              </div>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center gap-3.5">
              <div>
                <div
                  class="overflow-hidden border-2 rounded-full w-14 h-14 image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div class="text-base font-medium">
                  {{ messages.fakeMessages()[0].sender.name }}
                </div>
                <div
                  class="flex items-center gap-2 mt-1 leading-relaxed text-slate-500"
                >
                  Are you open for a project?
                  <br />
                  Can I get the price list, please.
                </div>
              </div>
              <div class="ml-auto text-xs truncate text-slate-500/90">
                {{ messages.fakeMessages()[0].time }}
              </div>
            </div>
            <div
              class="flex items-center justify-end gap-3 pt-3 mt-3 border-t border-dashed"
            >
              <a href="" class="text-slate-500"> Close </a>
              <a href="" class="text-primary"> Reply </a>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="text-base font-medium">Color</div>
            <div class="text-slate-500 mt-0.5">Select your preferred color</div>
            <div class="flex gap-2">
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  checked
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-blue-800 rounded-full opacity-0 w-7 h-7 bg-blue-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-blue-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-blue-800/50 bg-blue-800/40 peer-checked:opacity-0 peer-hover:bg-blue-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-red-800 rounded-full opacity-0 w-7 h-7 bg-red-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-red-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-red-800/50 bg-red-800/40 peer-checked:opacity-0 peer-hover:bg-theme-1/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-green-800 rounded-full opacity-0 w-7 h-7 bg-green-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-green-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-green-800/50 bg-green-800/40 peer-checked:opacity-0 peer-hover:bg-green-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-yellow-800 rounded-full opacity-0 w-7 h-7 bg-yellow-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-yellow-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-yellow-800/50 bg-yellow-800/40 peer-checked:opacity-0 peer-hover:bg-yellow-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-orange-800 rounded-full opacity-0 w-7 h-7 bg-orange-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-orange-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-orange-800/50 bg-orange-800/40 peer-checked:opacity-0 peer-hover:bg-orange-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border rounded-full opacity-0 w-7 h-7 bg-amber-800/80 border-amber-800 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 text-amber-800 border-amber-800/50 bg-amber-800/40 peer-checked:opacity-0 peer-hover:bg-amber-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border rounded-full opacity-0 w-7 h-7 bg-cyan-800/80 border-cyan-800 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 text-cyan-800 border-cyan-800/50 bg-cyan-800/40 peer-checked:opacity-0 peer-hover:bg-cyan-800/10"
                ></div>
              </div>
              <div class="relative mt-3 w-7 h-7">
                <FormCheck.Input
                  type="checkbox"
                  value="checked"
                  @change="() => {}"
                  class="absolute z-10 w-full h-full opacity-0 peer"
                />
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-white transition-all border border-teal-800 rounded-full opacity-0 w-7 h-7 bg-teal-800/80 peer-checked:opacity-100"
                >
                  <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                </div>
                <div
                  class="absolute inset-0 flex items-center justify-center m-auto text-teal-800 transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 border-teal-800/50 bg-teal-800/40 peer-checked:opacity-0 peer-hover:bg-teal-800/10"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="flex flex-col col-span-12 gap-x-6 gap-y-10 md:col-span-6 xl:col-span-4"
        >
          <div class="p-5 box box--stacked">
            <div class="flex flex-col items-center my-1">
              <div>
                <div
                  class="w-28 h-28 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div class="mt-3.5 text-base font-medium">Cancer</div>
              <div class="text-slate-500 mt-0.5">My Chemical Romance</div>
              <div class="flex items-center justify-center h-10 gap-1 mt-4">
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
              <div class="flex items-center gap-3.5 mt-5">
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.15] box bg-primary/5"
                  content="Skip Back"
                >
                  <Lucide
                    icon="SkipBack"
                    class="w-4 h-4 stroke-[1.3] text-primary fill-primary/5"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center w-12 h-12 border border-transparent rounded-full box bg-gradient-to-b from-theme-1/90 to-theme-2/90"
                  content="Play"
                >
                  <Lucide
                    icon="Play"
                    class="w-5 h-5 stroke-[0.9] text-white fill-white/5 -mr-1"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.15] box bg-primary/5"
                  content="Skip Forward"
                >
                  <Lucide
                    icon="SkipForward"
                    class="w-4 h-4 stroke-[1.3] text-primary fill-primary/5"
                  />
                </Tippy>
              </div>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center gap-3.5">
              <div>
                <div
                  class="overflow-hidden border-2 rounded-full w-14 h-14 image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div class="text-base font-medium">Waiting confirmation...</div>
                <div class="flex items-center gap-2 mt-1 text-slate-500">
                  <Lucide icon="FileText" class="w-4 h-4 stroke-[1.3]" />
                  <div>Annual_Report_2023.pdf</div>
                </div>
              </div>
              <a href="" class="ml-auto">
                <Lucide
                  icon="ChevronDown"
                  class="w-5 h-5 text-slate-500 stroke-[1.3]"
                />
              </a>
            </div>
          </div>
          <div class="box box--stacked">
            <div
              class="h-48 overflow-hidden rounded-lg box image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/60 before:to-theme-2/5"
            >
              <img
                alt="Tailwise - Admin Dashboard Template"
                class="rounded-md saturate-150"
                :src="robotImage"
              />
            </div>
            <div class="p-5">
              <div class="text-base font-medium">
                {{ events.fakeEvents()[0].title }}
              </div>
              <div class="flex items-center gap-2 mt-2 text-slate-500">
                <Lucide icon="Clock" class="stroke-[1.3] w-4 h-4" />
                {{ events.fakeEvents()[0].date }},
                {{ events.fakeEvents()[0].time }}
              </div>
              <div class="flex items-center gap-2 text-slate-500 mt-1.5">
                <Lucide icon="MapPin" class="stroke-[1.3] w-4 h-4" />
                {{ events.fakeEvents()[0].location }}
              </div>
              <Button
                type="button"
                variant="primary"
                rounded
                class="w-full mt-5"
              >
                <Lucide icon="CreditCard" class="w-4 h-4 stroke-[1.3] mr-2" />
                Book Ticket
              </Button>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex flex-col items-center my-3">
              <div>
                <div
                  class="flex items-center justify-center p-1.5 rounded-full bg-gradient-to-b from-theme-1/20 to-theme-2/20"
                >
                  <div
                    class="flex items-center justify-center p-1.5 rounded-full bg-gradient-to-b from-theme-1/40 to-theme-2/40"
                  >
                    <div
                      class="flex items-center justify-center p-1.5 rounded-full bg-gradient-to-b from-theme-1/60 to-theme-2/60"
                    >
                      <div
                        class="w-24 h-24 overflow-hidden rounded-full image-fit"
                      >
                        <img
                          alt="Tailwise - Admin Dashboard Template"
                          :src="users.fakeUsers()[0].photo"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-3.5 text-base font-medium">
                {{ users.fakeUsers()[0].name }}
              </div>
              <div class="text-slate-500 mt-0.5">
                {{ users.fakeUsers()[0].position }}
              </div>
              <div class="flex gap-3.5 mt-5">
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-11 h-11 border-primary/[0.25] bg-primary/[0.03]"
                  :content="users.fakeUsers()[0].email"
                >
                  <Lucide
                    icon="Mail"
                    class="w-4 h-4 text-primary fill-primary/5"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-11 h-11 border-primary/[0.25] bg-primary/[0.03]"
                  :content="users.fakeUsers()[0].name"
                >
                  <Lucide
                    icon="MessageSquare"
                    class="w-4 h-4 text-primary fill-primary/5"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-11 h-11 border-primary/[0.25] bg-primary/[0.03]"
                  :content="users.fakeUsers()[0].phone"
                >
                  <Lucide
                    icon="Phone"
                    class="w-4 h-4 text-primary fill-primary/5"
                  />
                </Tippy>
              </div>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center justify-center gap-10">
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.15] box bg-primary/5"
                content="Prev"
              >
                <Lucide
                  icon="ChevronLeft"
                  class="w-4 h-4 stroke-[1.3] text-primary fill-primary/5"
                />
              </Tippy>
              <div class="flex flex-col items-center">
                <div
                  class="w-32 h-32 overflow-hidden border-2 rounded-full image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
                <div class="mt-3.5 text-base font-medium">
                  {{ users.fakeUsers()[0].name }}
                </div>
                <div class="mt-0.5 text-slate-500">
                  {{ users.fakeUsers()[0].department }}
                </div>
              </div>
              <Tippy
                as="a"
                class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.15] box bg-primary/5"
                content="Next"
              >
                <Lucide
                  icon="ChevronRight"
                  class="w-4 h-4 stroke-[1.3] text-primary fill-primary/5"
                />
              </Tippy>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center pb-5 mb-5 border-b border-dashed">
              <div class="text-[0.94rem] font-medium">Check Plan</div>
              <a href="" class="ml-auto text-primary"> See All </a>
            </div>
            <div class="flex flex-col mt-3.5 gap-2">
              <template
                v-for="(faker, fakerKey) in _.take(
                  activities.fakeActivities(),
                  5
                )"
                :key="fakerKey"
              >
                <div
                  class="hover:bg-slate-50 transition-all rounded-lg cursor-pointer px-2 -mx-2 py-1.5 flex items-center gap-3.5"
                >
                  <div>
                    <div
                      class="w-10 h-10 overflow-hidden border-2 rounded-full image-fit border-slate-200/70"
                    >
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        :src="users.fakeUsers()[0].photo"
                      />
                    </div>
                  </div>
                  <div>
                    <div class="font-medium truncate max-w-[15rem]">
                      {{ faker.activity }}
                    </div>
                    <div class="mt-1 text-xs text-slate-500">
                      {{ faker.activityDetails }}
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
                      <Lucide icon="Check" class="stroke-[1.5] w-3 h-3" />
                    </div>
                    <div
                      class="absolute inset-0 flex items-center justify-center m-auto transition-all border rounded-full w-7 h-7 peer-hover:rotate-180 text-primary border-theme-1/20 bg-theme-1/5 peer-checked:opacity-0 peer-hover:bg-theme-1/10"
                    >
                      <Lucide icon="Plus" class="stroke-[1.5] w-3 h-3" />
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
        <div
          class="flex flex-col col-span-12 gap-x-6 gap-y-10 md:col-span-6 xl:col-span-4"
        >
          <div class="p-5 box box--stacked">
            <div class="flex flex-col items-center my-1">
              <div
                :class="[
                  'relative flex items-end rounded-full w-48 h-48 bg-gradient-to-r from-slate-100 via-theme-1 to-theme-2',
                  'before:content-[\'\'] before:w-1.5 before:h-2 before:absolute before:bg-white before:inset-y-0 before:my-auto before:right-0 dark:before:bg-darkmode-600',
                  'after:content-[\'\'] after:w-2 after:h-1.5 after:absolute after:bg-white after:inset-x-0 after:mx-auto after:top-0 dark:after:bg-darkmode-600',
                ]"
              >
                <div
                  class="bg-white rounded-full w-[97%] h-[97%] ml-0.5 mb-0.5 flex items-center justify-center dark:bg-darkmode-600"
                >
                  <div>
                    <div
                      class="w-32 h-32 overflow-hidden rounded-full image-fit border-[3px] border-slate-200/70 -mt-1 -mr-1"
                    >
                      <img
                        alt="Tailwise - Admin Dashboard Template"
                        :src="users.fakeUsers()[0].photo"
                      />
                    </div>
                  </div>
                  <div
                    class="absolute left-0 w-6 h-6 overflow-hidden border rounded-full image-fit border-slate-200/70 -ml-2.5"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="users.fakeUsers()[0].photo"
                    />
                  </div>
                  <div
                    class="absolute bottom-0 left-0 w-8 h-8 mb-2.5 ml-2.5 overflow-hidden border rounded-full image-fit border-slate-200/70"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      :src="users.fakeUsers()[0].photo"
                    />
                  </div>
                  <Tippy
                    as="a"
                    class="absolute bottom-0 flex items-center justify-center w-12 h-12 -mb-5 border border-transparent rounded-full box bg-gradient-to-b from-theme-1/90 to-theme-2/90"
                    content="Play"
                  >
                    <Lucide
                      icon="Play"
                      class="w-5 h-5 stroke-[0.9] text-white fill-white/5 -mr-1"
                    />
                  </Tippy>
                </div>
              </div>
              <div class="mt-10 text-base font-medium">Subscription Box</div>
              <div class="text-slate-500 mt-1.5 text-center mx-5">
                The gift that keeps on grooving. Subscribe to Music Box for
                curated music surprises.
              </div>
              <Button
                type="button"
                variant="primary"
                rounded
                class="w-full mt-5"
              >
                <Lucide icon="Send" class="w-4 h-4 stroke-[1.3] mr-2" />
                Subscribe Now
              </Button>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex flex-wrap gap-2.5">
              <template
                v-for="(faker, fakerKey) in _.take(
                  categories.fakeCategories(),
                  5
                )"
                :key="fakerKey"
              >
                <a
                  href=""
                  :class="[
                    'px-3 py-1 border rounded-full bg-primary/5 border-primary/10 text-primary [&.active]:bg-primary/90 [&.active]:text-white',
                    { active: !fakerKey },
                  ]"
                >
                  {{ faker.name }}
                </a>
              </template>
            </div>
            <div class="flex gap-1 mt-5">
              <div class="flex flex-col w-[66%] gap-1">
                <div class="flex gap-1">
                  <div
                    class="relative flex w-1/2 h-24 overflow-hidden rounded-md cursor-pointer bg-slate-100 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
                  >
                    <img :src="projectDetails.fakeProjectDetails()[0].image" />
                  </div>
                  <div
                    class="relative flex w-1/2 h-24 overflow-hidden rounded-md cursor-pointer bg-slate-100 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
                  >
                    <img :src="projectDetails.fakeProjectDetails()[0].image" />
                  </div>
                </div>
                <div class="flex gap-1">
                  <div
                    class="relative flex w-1/2 overflow-hidden rounded-md cursor-pointer bg-slate-100 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
                  >
                    <img :src="projectDetails.fakeProjectDetails()[0].image" />
                  </div>
                  <div class="flex flex-col w-1/2 gap-1">
                    <div
                      class="relative flex w-full h-24 overflow-hidden rounded-md cursor-pointer bg-slate-100 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
                    >
                      <img
                        :src="projectDetails.fakeProjectDetails()[0].image"
                      />
                    </div>
                    <div
                      class="relative flex w-full h-24 overflow-hidden rounded-md cursor-pointer bg-slate-100 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
                    >
                      <img
                        :src="projectDetails.fakeProjectDetails()[0].image"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="cursor-pointer relative flex w-[33%] bg-slate-100 image-fit overflow-hidden rounded-md before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-theme-1/30 before:via-theme-2/30 before:to-transparent"
              >
                <img :src="projectDetails.fakeProjectDetails()[0].image" />
              </div>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center gap-3.5">
              <div>
                <div
                  class="overflow-hidden border-2 rounded-full w-14 h-14 image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div
                  class="text-base font-medium truncate max-w-[9rem] md:max-w-none"
                >
                  Welcome!
                </div>
                <div
                  class="text-slate-500 mt-0.5 truncate max-w-[9rem] md:max-w-none"
                >
                  {{ users.fakeUsers()[0].name.split(" ")[0] }}
                </div>
              </div>
              <a
                href=""
                class="font-medium flex items-center py-1.5 px-3.5 ml-auto border rounded-full border-primary/20 bg-primary/5 text-primary"
              >
                <Lucide icon="CreditCard" class="w-4 h-4 stroke-[1.5] mr-2" />
                ${{ formatCurrency(_.random(4000, 5000)) }}
              </a>
            </div>
            <div class="pt-4 mt-4 border-t border-dashed">
              <div class="relative">
                <FormInput
                  type="text"
                  rounded
                  class="pr-11"
                  placeholder="Where are you going?"
                />
                <div
                  class="absolute inset-y-0 right-0 flex items-center justify-center w-11"
                >
                  <Lucide
                    icon="Search"
                    class="stroke-[1.3] w-4 h-4 text-slate-400"
                  />
                </div>
              </div>
              <LeafletMap class="h-48 mt-3 rounded-lg bg-slate-100" />
              <Button
                type="button"
                variant="primary"
                rounded
                class="w-full mt-3"
              >
                <Lucide icon="Goal" class="w-4 h-4 stroke-[1.3] mr-2" />
                Pin Location
              </Button>
            </div>
          </div>
          <div class="p-5 box box--stacked">
            <div class="flex items-center gap-3.5">
              <div>
                <div
                  class="overflow-hidden border-2 rounded-full w-14 h-14 image-fit border-slate-200/70"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </div>
              </div>
              <div>
                <div
                  class="text-base font-medium truncate max-w-[8rem] md:max-w-none"
                >
                  {{ users.fakeUsers()[0].name }}
                </div>
                <div class="text-slate-500 mt-0.5">Available</div>
              </div>
              <div class="flex items-center ml-auto gap-2.5">
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.25] bg-primary/[0.03] ml-auto"
                  content="Make a phone call"
                >
                  <Lucide
                    icon="Phone"
                    class="w-4 h-4 text-primary fill-primary/5"
                  />
                </Tippy>
                <Tippy
                  as="a"
                  class="flex items-center justify-center border rounded-full w-9 h-9 border-primary/[0.25] bg-primary/[0.03] ml-auto"
                  content="Make a phone call"
                >
                  <Lucide
                    icon="Settings"
                    class="w-4 h-4 text-primary fill-primary/5"
                  />
                </Tippy>
              </div>
            </div>
            <div class="flex flex-col gap-2.5 border-y border-dashed py-5 my-5">
              <template
                v-for="(faker, fakerKey) in _.take(messages.fakeMessages(), 4)"
                :key="fakerKey"
              >
                <div
                  :class="[
                    'mr-auto border px-4 py-3 rounded-r-xl rounded-bl-xl bg-slate-50 [&.right]:text-right [&.right]:mr-0 [&.right]:ml-auto [&.right]:rounded-l-xl [&.right]:rounded-tr-none dark:bg-darkmode-400',
                    { right: [0, 0, 1, 1, 1][_.random(0, 5)] },
                  ]"
                >
                  <div>{{ faker.content }}</div>
                  <div class="mt-1 text-xs text-slate-500/70">
                    {{ faker.time }}
                  </div>
                </div>
              </template>
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
