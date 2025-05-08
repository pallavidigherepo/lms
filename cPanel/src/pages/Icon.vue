<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Lucide from "@/components/Base/Lucide";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Icon
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Unleash the power of our Icon component to add a touch of visual
          appeal and meaning to your web content.
        </div>
      </div>
      <div
        class="mt-3.5 grid grid-cols-12 xl:grid-cols-10 gap-y-7 lg:gap-y-10 gap-x-6"
      >
        <div
          class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7"
        >
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Lucide Icon</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-1"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-1"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  Icons are graphical symbols used to represent objects,
                  actions, or concepts in a visual way. They are commonly used
                  in web development to enhance the user interface and provide a
                  more intuitive and visually appealing experience. This section
                  covers how to use icons in your web application and provides
                  examples of how to integrate and style them effectively.
                </p>
                <div
                  class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80"
                >
                  <div
                    class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600"
                  >
                    <div class="-mt-px">Example code / preview</div>
                  </div>
                  <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                    <Preview.Panel>
                      <div class="grid grid-cols-12 py-3 sm:gap-7 gap-y-6">
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Activity" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ActivityIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Airplay" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AirplayIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlertCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlertCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlertOctagon" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlertOctagonIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlertTriangle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlertTriangleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlignCenter" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlignCenterIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlignJustify" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlignJustifyIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlignLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlignLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AlignRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            AlignRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Anchor" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">AnchorIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Aperture" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ApertureIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Archive" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArchiveIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="ArrowDownCircle"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            ArrowDownCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowDownLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowDownLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowDownRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowDownRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="ArrowLeftCircle"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            ArrowLeftCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="ArrowRightCircle"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            ArrowRightCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowUpCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowUpCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowUpLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowUpLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowUpRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowUpRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ArrowUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ArrowUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="AtSign" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">AtSignIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Award" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">AwardIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="BarChart2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BarChart2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="BarChart" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BarChartIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="BatteryCharging"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            BatteryChargingIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Battery" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BatteryIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="BellOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BellOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Bell" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">BellIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Bluetooth" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BluetoothIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Bold" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">BoldIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="BookOpen" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BookOpenIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Book" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">BookIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Bookmark" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BookmarkIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Box" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">BoxIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Briefcase" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            BriefcaseIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Calendar" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CalendarIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CameraOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CameraOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Camera" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CameraIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Cast" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CastIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CheckCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CheckCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CheckSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CheckSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Check" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CheckIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronsDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronsDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronsLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronsLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronsRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronsRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ChevronsUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ChevronsUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Chrome" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ChromeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Circle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CircleIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Clipboard" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ClipboardIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Clock" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ClockIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CloudDrizzle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CloudDrizzleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CloudLightning" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CloudLightningIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CloudOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CloudOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CloudRain" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CloudRainIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CloudSnow" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CloudSnowIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Cloud" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CloudIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Code" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CodeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Codepen" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CodepenIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Codesandbox" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CodesandboxIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Coffee" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CoffeeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Columns2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Columns2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Command" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CommandIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Compass" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CompassIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Copy" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CopyIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerDownLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerDownLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="CornerDownRight"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            CornerDownRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerLeftDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerLeftDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerLeftUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerLeftUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="CornerRightDown"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            CornerRightDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerRightUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerRightUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerUpLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerUpLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CornerUpRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CornerUpRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Cpu" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CpuIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="CreditCard" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CreditCardIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Crop" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">CropIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Crosshair" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            CrosshairIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Database" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DatabaseIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Delete" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">DeleteIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Disc" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">DiscIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="DivideCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DivideCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="DivideSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DivideSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Divide" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">DivideIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="DollarSign" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DollarSignIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="DownloadCloud" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DownloadCloudIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Download" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DownloadIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Dribbble" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DribbbleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Droplet" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            DropletIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ExternalLink" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ExternalLinkIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="EyeOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">EyeOffIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Eye" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">EyeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Facebook" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FacebookIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FastForward" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FastForwardIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Figma" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FigmaIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FileMinus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FileMinusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FilePlus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FilePlusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FileText" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FileTextIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="File" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FileIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Film" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FilmIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Filter" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FilterIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Flag" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FlagIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FolderMinus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FolderMinusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="FolderPlus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            FolderPlusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Folder" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FolderIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Framer" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FramerIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Frown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">FrownIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Gift" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">GiftIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="GitBranch" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            GitBranchIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide
                            icon="GitCommitHorizontal"
                            class="block mx-auto"
                          />
                          <div class="mt-2 text-xs text-center">
                            GitCommitHorizontal
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="GitMerge" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            GitMergeIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="GitPullRequest" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            GitPullRequestIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Github" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">GithubIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Gitlab" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">GitlabIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Globe" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">GlobeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="LayoutGrid" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">GridIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="HardDrive" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            HardDriveIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Hash" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">HashIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Headphones" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            HeadphonesIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Heart" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">HeartIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="HelpCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            HelpCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Hexagon" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            HexagonIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Home" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">HomeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Image" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ImageIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Inbox" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">InboxIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Info" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">InfoIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Instagram" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            InstagramIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Italic" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ItalicIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Key" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">KeyIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Layers" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LayersIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PanelsTopLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LayoutIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="LifeBuoy" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            LifeBuoyIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Link2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">Link2Icon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Link" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LinkIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Linkedin" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            LinkedinIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="List" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ListIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Loader" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LoaderIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Lock" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LockIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="LogIn" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LogInIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="LogOut" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">LogOutIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Mail" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MailIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MapPin" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MapPinIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Map" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MapIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Maximize2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Maximize2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Maximize" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MaximizeIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Meh" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MehIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Menu" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MenuIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MessageCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MessageCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MessageSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MessageSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MicOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MicOffIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Mic" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MicIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Minimize2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Minimize2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Minimize" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MinimizeIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MinusCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MinusCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MinusSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MinusSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Minus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MinusIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Monitor" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MonitorIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Moon" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MoonIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MoreHorizontal" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MoreHorizontalIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MoreVertical" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MoreVerticalIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="MousePointer" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            MousePointerIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Move" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MoveIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Music" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">MusicIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Navigation2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Navigation2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Navigation" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            NavigationIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Octagon" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            OctagonIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Package" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PackageIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Paperclip" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PaperclipIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PauseCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PauseCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Pause" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PauseIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PenTool" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PenToolIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Percent" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PercentIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneCall" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneCallIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneForwarded" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneForwardedIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneIncoming" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneIncomingIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneMissed" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneMissedIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PhoneOutgoing" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PhoneOutgoingIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Phone" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PhoneIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PieChart" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PieChartIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PlayCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PlayCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Play" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PlayIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PlusCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PlusCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="PlusSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PlusSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Plus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PlusIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Pocket" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PocketIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Power" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">PowerIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Printer" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            PrinterIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Radio" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">RadioIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="RefreshCcw" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            RefreshCcwIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="RefreshCw" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            RefreshCwIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Repeat" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">RepeatIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Rewind" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">RewindIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="RotateCcw" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            RotateCcwIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="RotateCw" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            RotateCwIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Rss" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">RssIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Save" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SaveIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Scissors" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ScissorsIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Search" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SearchIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Send" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SendIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Server" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ServerIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Settings" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SettingsIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Share2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">Share2Icon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Share" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ShareIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ShieldOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ShieldOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Shield" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ShieldIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ShoppingBag" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ShoppingBagIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ShoppingCart" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ShoppingCartIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Shuffle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ShuffleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="SkipBack" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SkipBackIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="SkipForward" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SkipForwardIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Slack" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SlackIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Sliders" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SlidersIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Smartphone" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SmartphoneIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Smile" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SmileIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Speaker" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SpeakerIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Square" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SquareIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Star" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">StarIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="StopCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            StopCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Sun" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SunIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Sunrise" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            SunriseIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Sunset" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">SunsetIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Tablet" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TabletIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Tag" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TagIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Target" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TargetIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Terminal" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            TerminalIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Thermometer" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ThermometerIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ThumbsDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ThumbsDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ThumbsUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ThumbsUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ToggleLeft" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ToggleLeftIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ToggleRight" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ToggleRightIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Trash2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">Trash2Icon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Trash" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TrashIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Trello" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TrelloIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="TrendingDown" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            TrendingDownIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="TrendingUp" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            TrendingUpIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Triangle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            TriangleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Truck" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TruckIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Tv" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TvIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Twitch" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TwitchIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Twitter" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            TwitterIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Type" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">TypeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Umbrella" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UmbrellaIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Underline" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UnderlineIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Unlock" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">UnlockIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="UploadCloud" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UploadCloudIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Upload" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">UploadIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="UserCheck" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UserCheckIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="UserMinus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UserMinusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="UserPlus" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            UserPlusIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="UserX" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">UserXIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="User" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">UserIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Users" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">UsersIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="VideoOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            VideoOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Video" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">VideoIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Voicemail" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            VoicemailIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Volume1" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Volume1Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Volume2" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            Volume2Icon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="VolumeX" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            VolumeXIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Volume" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">VolumeIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Watch" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">WatchIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="WifiOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            WifiOffIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Wifi" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">WifiIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Wind" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">WindIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="XCircle" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            XCircleIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="XOctagon" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            XOctagonIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="XSquare" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            XSquareIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="X" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">XIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Youtube" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            YoutubeIcon
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ZapOff" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ZapOffIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="Zap" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ZapIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ZoomIn" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">ZoomInIcon</div>
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                          <Lucide icon="ZoomOut" class="block mx-auto" />
                          <div class="mt-2 text-xs text-center">
                            ZoomOutIcon
                          </div>
                        </div>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="grid grid-cols-12 py-3 sm:gap-7 gap-y-6">
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Activity" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ActivityIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Airplay" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AirplayIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlertCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlertCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlertOctagon" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlertOctagonIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="AlertTriangle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              AlertTriangleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlignCenter" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlignCenterIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlignJustify" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlignJustifyIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlignLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlignLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AlignRight" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AlignRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Anchor" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AnchorIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Aperture" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ApertureIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Archive" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArchiveIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowDownCircle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowDownCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowDownLeft"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowDownLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowDownRight"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowDownRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowDown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowLeftCircle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowLeftCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowRightCircle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowRightCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowRight" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ArrowUpCircle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ArrowUpCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowUpLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowUpLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowUpRight" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowUpRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ArrowUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ArrowUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="AtSign" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AtSignIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Award" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              AwardIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="BarChart2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BarChart2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="BarChart" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BarChartIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="BatteryCharging"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              BatteryChargingIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Battery" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BatteryIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="BellOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BellOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Bell" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">BellIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Bluetooth" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BluetoothIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Bold" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">BoldIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="BookOpen" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BookOpenIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Book" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">BookIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Bookmark" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BookmarkIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Box" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">BoxIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Briefcase" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              BriefcaseIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Calendar" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CalendarIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CameraOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CameraOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Camera" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CameraIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Cast" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">CastIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CheckCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CheckCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CheckSquare" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CheckSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Check" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CheckIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronDown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronRight" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronsDown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronsDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronsLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronsLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="ChevronsRight"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              ChevronsRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ChevronsUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChevronsUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Chrome" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ChromeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Circle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Clipboard" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ClipboardIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Clock" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ClockIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CloudDrizzle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CloudDrizzleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CloudLightning"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CloudLightningIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CloudOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CloudOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CloudRain" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CloudRainIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CloudSnow" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CloudSnowIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Cloud" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CloudIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Code" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">CodeIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Codepen" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CodepenIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Codesandbox" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CodesandboxIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Coffee" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CoffeeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Columns" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ColumnsIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Command" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CommandIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Compass" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CompassIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Copy" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">CopyIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerDownLeft"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerDownLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerDownRight"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerDownRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerLeftDown"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerLeftDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CornerLeftUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CornerLeftUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerRightDown"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerRightDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerRightUp"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerRightUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CornerUpLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CornerUpLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="CornerUpRight"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              CornerUpRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Cpu" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">CpuIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="CreditCard" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CreditCardIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Crop" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">CropIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Crosshair" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              CrosshairIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Database" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DatabaseIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Delete" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DeleteIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Disc" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">DiscIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="DivideCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DivideCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="DivideSquare" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DivideSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Divide" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DivideIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="DollarSign" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DollarSignIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="DownloadCloud"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              DownloadCloudIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Download" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DownloadIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Dribbble" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DribbbleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Droplet" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              DropletIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ExternalLink" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ExternalLinkIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="EyeOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              EyeOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Eye" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">EyeIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Facebook" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FacebookIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FastForward" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FastForwardIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Figma" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FigmaIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FileMinus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FileMinusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FilePlus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FilePlusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FileText" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FileTextIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="File" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">FileIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Film" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">FilmIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Filter" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FilterIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Flag" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">FlagIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FolderMinus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FolderMinusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="FolderPlus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FolderPlusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Folder" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FolderIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Framer" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FramerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Frown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              FrownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Gift" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">GiftIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="GitBranch" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GitBranchIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="GitCommit" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GitCommitIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="GitMerge" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GitMergeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="GitPullRequest"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              GitPullRequestIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Github" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GithubIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Gitlab" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GitlabIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Globe" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              GlobeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="LayoutGrid" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">GridIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="HardDrive" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              HardDriveIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Hash" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">HashIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Headphones" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              HeadphonesIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Heart" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              HeartIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="HelpCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              HelpCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Hexagon" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              HexagonIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Home" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">HomeIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Image" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ImageIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Inbox" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              InboxIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Info" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">InfoIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Instagram" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              InstagramIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Italic" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ItalicIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Key" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">KeyIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Layers" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LayersIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="PanelsTopLeft"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              LayoutIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="LifeBuoy" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LifeBuoyIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Link2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Link2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Link" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">LinkIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Linkedin" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LinkedinIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="List" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">ListIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Loader" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LoaderIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Lock" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">LockIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="LogIn" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LogInIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="LogOut" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              LogOutIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Mail" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MailIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MapPin" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MapPinIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Map" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MapIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Maximize2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Maximize2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Maximize" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MaximizeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Meh" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MehIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Menu" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MenuIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="MessageCircle"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              MessageCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="MessageSquare"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              MessageSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MicOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MicOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Mic" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MicIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Minimize2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Minimize2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Minimize" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MinimizeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MinusCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MinusCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MinusSquare" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MinusSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Minus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MinusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Monitor" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MonitorIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Moon" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MoonIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="MoreHorizontal"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              MoreHorizontalIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MoreVertical" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MoreVerticalIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="MousePointer" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MousePointerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Move" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">MoveIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Music" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              MusicIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Navigation2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Navigation2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Navigation" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              NavigationIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Octagon" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              OctagonIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Package" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PackageIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Paperclip" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PaperclipIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PauseCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PauseCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Pause" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PauseIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PenTool" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PenToolIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Percent" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PercentIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PhoneCall" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PhoneCallIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="PhoneForwarded"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              PhoneForwardedIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="PhoneIncoming"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              PhoneIncomingIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PhoneMissed" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PhoneMissedIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PhoneOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PhoneOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide
                              icon="PhoneOutgoing"
                              class="block mx-auto"
                            />
                            <div class="mt-2 text-xs text-center">
                              PhoneOutgoingIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Phone" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PhoneIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PieChart" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PieChartIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PlayCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PlayCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Play" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">PlayIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PlusCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PlusCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="PlusSquare" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PlusSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Plus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">PlusIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Pocket" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PocketIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Power" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PowerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Printer" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              PrinterIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Radio" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RadioIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="RefreshCcw" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RefreshCcwIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="RefreshCw" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RefreshCwIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Repeat" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RepeatIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Rewind" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RewindIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="RotateCcw" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RotateCcwIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="RotateCw" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              RotateCwIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Rss" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">RssIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Save" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">SaveIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Scissors" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ScissorsIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Search" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SearchIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Send" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">SendIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Server" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ServerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Settings" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SettingsIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Share2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Share2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Share" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ShieldOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShieldOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Shield" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShieldIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ShoppingBag" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShoppingBagIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ShoppingCart" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShoppingCartIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Shuffle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ShuffleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="SkipBack" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SkipBackIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="SkipForward" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SkipForwardIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Slack" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SlackIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Sliders" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SlidersIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Smartphone" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SmartphoneIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Smile" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SmileIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Speaker" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SpeakerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Square" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Star" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">StarIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="StopCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              StopCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Sun" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">SunIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Sunrise" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SunriseIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Sunset" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              SunsetIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Tablet" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TabletIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Tag" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">TagIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Target" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TargetIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Terminal" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TerminalIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Thermometer" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ThermometerIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ThumbsDown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ThumbsDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ThumbsUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ThumbsUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ToggleLeft" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ToggleLeftIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ToggleRight" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ToggleRightIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Trash2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Trash2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Trash" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TrashIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Trello" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TrelloIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="TrendingDown" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TrendingDownIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="TrendingUp" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TrendingUpIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Triangle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TriangleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Truck" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TruckIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Tv" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">TvIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Twitch" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TwitchIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Twitter" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              TwitterIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Type" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">TypeIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Umbrella" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UmbrellaIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Underline" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UnderlineIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Unlock" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UnlockIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="UploadCloud" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UploadCloudIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Upload" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UploadIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="UserCheck" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UserCheckIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="UserMinus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UserMinusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="UserPlus" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UserPlusIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="UserX" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UserXIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="User" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">UserIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Users" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              UsersIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="VideoOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              VideoOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Video" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              VideoIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Voicemail" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              VoicemailIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Volume1" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Volume1Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Volume2" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              Volume2Icon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="VolumeX" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              VolumeXIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Volume" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              VolumeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Watch" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              WatchIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="WifiOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              WifiOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Wifi" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">WifiIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Wind" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">WindIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="XCircle" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              XCircleIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="XOctagon" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              XOctagonIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="XSquare" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              XSquareIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="X" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">XIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Youtube" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              YoutubeIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ZapOff" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ZapOffIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="Zap" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">ZapIcon</div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ZoomIn" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ZoomInIcon
                            </div>
                          </div>
                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <Lucide icon="ZoomOut" class="block mx-auto" />
                            <div class="mt-2 text-xs text-center">
                              ZoomOutIcon
                            </div>
                          </div>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
            >
              <div class="text-[0.94rem] font-medium">Component API</div>
            </div>
            <div>
              <p class="leading-relaxed">
                In this section, you will find detailed information about the
                available props, classes, and options that can be used with the
                component. Understanding these properties is essential for
                customizing and configuring the component to suit your specific
                requirements.
              </p>
              <p class="mt-2 leading-relaxed">
                Below is a list of props that can be passed to the component:
              </p>
              <div
                class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2.5 font-medium bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Lucide</div>
                </div>
                <div
                  class="px-5 pt-2 pb-5 mt-2.5 flex flex-col gap-3.5 leading-relaxed overflow-x-auto"
                >
                  <Table sm>
                    <Table.Thead>
                      <Table.Tr>
                        <Table.Th class="w-44 whitespace-nowrap">
                          Prop
                        </Table.Th>
                        <Table.Th class="w-56 whitespace-nowrap">
                          Type
                        </Table.Th>
                        <Table.Th class="whitespace-nowrap">
                          Description
                        </Table.Th>
                      </Table.Tr>
                    </Table.Thead>
                    <Table.Tbody>
                      <Table.Tr>
                        <Table.Td>`icon`</Table.Td>
                        <Table.Td>`keyof typeof icons`</Table.Td>
                        <Table.Td>
                          Specifies the name of the Lucide icon to render
                        </Table.Td>
                      </Table.Tr>
                    </Table.Tbody>
                  </Table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="relative order-first col-span-12 lg:order-last lg:col-span-3 xl:col-span-2"
        >
          <div class="sticky top-[104px]">
            <ul
              class="relative flex flex-col py-2.5 rounded-[0.6rem] bg-primary/[0.03] group-[.mode--light]:bg-slate-300/10 border border-primary/10 group-[.mode--light]:border-slate-300/20 text-slate-600/80 dark:group-[.mode--light]:bg-darkmode-500/60 dark:group-[.mode--light]:border-darkmode-200/60"
            >
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400 active',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Lucide Icon </a>
              </li>
              <li
                :class="[
                  'relative pl-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Component API </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
