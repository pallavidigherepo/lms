<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Preview from "@/components/Base/Preview";
import { FormLabel, FormSwitch } from "@/components/Base/Form";
import { Menu, Dialog } from "@/components/Base/Headless";
import Litepicker from "@/components/Base/Litepicker";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import { ref } from "vue";

const date = ref("");
const daterange = ref("");
const datepickerModalPreview = ref(false);
const setDatepickerModalPreview = (value: boolean) => {
  datepickerModalPreview.value = value;
};
const cancelButtonRef = ref(null);
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Datepicker
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Discover the power of our Datepicker component for simplified date
          selection and input in your web applications.
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
                <div class="text-[0.94rem] font-medium">Basic Datepicker</div>
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
                  The "Basic Datepicker" component allows users to select dates
                  from a calendar. It is a fundamental input element in many web
                  applications, especially in forms that require users to input
                  or select dates.
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
                      <Litepicker
                        v-model="date"
                        :options="{
                          autoApply: false,
                          showWeekNumbers: true,
                          dropdowns: {
                            minYear: 1990,
                            maxYear: null,
                            months: true,
                            years: true,
                          },
                        }"
                        class="block w-56 mx-auto"
                      />
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <Litepicker
                          v-model="date"
                          :options="{
                            autoApply: false,
                            showWeekNumbers: true,
                            dropdowns: {
                              minYear: 1990,
                              maxYear: null,
                              months: true,
                              years: true,
                            },
                          }"
                          class="block w-56 mx-auto"
                        />
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Basic Datepicker" component using Litepicker provides a
                  user-friendly way to select dates for your web application.
                  It's highly configurable and easy to integrate into your
                  projects.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Input Group</div>
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
                  The "Input Group" component combines an input field with a
                  calendar icon and a datepicker to facilitate date selection in
                  your web application. This component is useful for improving
                  the user experience when inputting dates in forms.
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
                      <div class="relative w-56 mx-auto">
                        <div
                          class="absolute flex items-center justify-center w-10 h-full border rounded-l bg-slate-100 text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"
                        >
                          <Lucide icon="Calendar" class="w-4 h-4" />
                        </div>
                        <Litepicker
                          v-model="date"
                          :options="{
                            autoApply: false,
                            showWeekNumbers: true,
                            dropdowns: {
                              minYear: 1990,
                              maxYear: null,
                              months: true,
                              years: true,
                            },
                          }"
                          class="pl-12"
                        />
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="relative w-56 mx-auto">
                          <div
                            class="absolute flex items-center justify-center w-10 h-full border rounded-l bg-slate-100 text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"
                          >
                            <Lucide icon="Calendar" class="w-4 h-4" />
                          </div>
                          <Litepicker
                            v-model="date"
                            :options="{
                              autoApply: false,
                              showWeekNumbers: true,
                              dropdowns: {
                                minYear: 1990,
                                maxYear: null,
                                months: true,
                                years: true,
                              },
                            }"
                            class="pl-12"
                          />
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Input Group Datepicker" component provides an elegant and
                  user-friendly way to select dates in your web application. By
                  combining an input field with a calendar icon and Litepicker,
                  users can easily input dates, making your forms more intuitive
                  and accessible.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Date Range Picker</div>
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
                  The "Date Range Picker" component allows users to select a
                  date range in your web application. This component is useful
                  for scenarios where you need to collect date ranges, such as
                  booking systems or date-based filtering.
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
                      <Litepicker
                        v-model="daterange"
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
                        class="block w-56 mx-auto"
                      />
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <Litepicker
                          v-model="daterange"
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
                          class="block w-56 mx-auto"
                        />
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Date Range Picker" component enhances your web
                  application by providing an easy and intuitive way for users
                  to select date ranges. Whether you're building a booking
                  system or implementing date-based filtering, this component
                  streamlines the process of collecting date ranges, making your
                  application more user-friendly and efficient.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Modal Datepicker</div>
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
                  The "Modal Datepicker" component combines the functionality of
                  a datepicker with a modal window, allowing users to select
                  dates within a modal interface. This component is useful for
                  scenarios where you want to provide a focused and
                  distraction-free date selection experience.
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
                      <!-- BEGIN: Show Modal Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setDatepickerModalPreview(true);
                                }"
                        >
                          Show Modal
                        </Button>
                      </div>
                      <!-- END: Show Modal Toggle -->
                      <!-- BEGIN: Modal Content -->
                      <Dialog
                        :open="datepickerModalPreview"
                        @close="
                          () => {
                            setDatepickerModalPreview(false);
                          }
                        "
                        :initialFocus="cancelButtonRef"
                      >
                        <Dialog.Panel>
                          <!-- BEGIN: Modal Header -->
                          <Dialog.Title>
                            <h2 class="mr-auto text-base font-medium">
                              Filter by Date
                            </h2>
                            <Button
                              variant="outline-secondary"
                              class="hidden sm:flex"
                            >
                              <Lucide icon="File" class="w-4 h-4 mr-2" />
                              Download Docs
                            </Button>
                            <Menu class="sm:hidden">
                              <Menu.Button
                                as="a"
                                class="block w-5 h-5"
                                href="#"
                              >
                                <Lucide
                                  icon="MoreHorizontal"
                                  class="w-5 h-5 text-slate-500"
                                />
                              </Menu.Button>
                              <Menu.Items class="w-40">
                                <Menu.Item>
                                  <Lucide icon="File" class="w-4 h-4 mr-2" />
                                  Download Docs
                                </Menu.Item>
                              </Menu.Items>
                            </Menu>
                          </Dialog.Title>
                          <!-- END: Modal Header -->
                          <!-- BEGIN: Modal Body -->
                          <Dialog.Description
                            class="grid grid-cols-12 gap-4 gap-y-3"
                          >
                            <div class="col-span-12 sm:col-span-6">
                              <FormLabel htmlFor="modal-datepicker-1">
                                From
                              </FormLabel>
                              <Litepicker
                                id="modal-datepicker-1"
                                v-model="date"
                                :options="{
                                  autoApply: false,
                                  showWeekNumbers: true,
                                  dropdowns: {
                                    minYear: 1990,
                                    maxYear: null,
                                    months: true,
                                    years: true,
                                  },
                                }"
                              />
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                              <FormLabel htmlFor="modal-datepicker-2">
                                To
                              </FormLabel>
                              <Litepicker
                                id="modal-datepicker-2"
                                v-model="date"
                                :options="{
                                  autoApply: false,
                                  showWeekNumbers: true,
                                  dropdowns: {
                                    minYear: 1990,
                                    maxYear: null,
                                    months: true,
                                    years: true,
                                  },
                                }"
                              />
                            </div>
                          </Dialog.Description>
                          <!-- END: Modal Body -->
                          <!-- BEGIN: Modal Footer -->
                          <Dialog.Footer class="text-right">
                            <Button
                              variant="outline-secondary"
                              type="button"
                              @click="
                                () => {
                                  setDatepickerModalPreview(false);
                                }
                              "
                              class="w-20 mr-1"
                            >
                              Cancel
                            </Button>
                            <Button
                              variant="primary"
                              type="button"
                              class="w-20"
                              ref="cancelButtonRef"
                            >
                              Submit
                            </Button>
                          </Dialog.Footer>
                          <!-- END: Modal Footer -->
                        </Dialog.Panel>
                      </Dialog>
                      <!-- END: Modal Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Show Modal Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                    event.preventDefault();
                    setDatepickerModalPreview(true);
                  }"
                          >
                            Show Modal
                          </Button>
                        </div>
                        <!-- END: Show Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        <Dialog
                          :open="datepickerModalPreview"
                          @close="
                            () => {
                              setDatepickerModalPreview(false);
                            }
                          "
                          :initialFocus="cancelButtonRef"
                        >
                          <Dialog.Panel>
                            <!-- BEGIN: Modal Header -->
                            <Dialog.Title>
                              <h2 class="mr-auto text-base font-medium">
                                Filter by Date
                              </h2>
                              <Button
                                variant="outline-secondary"
                                class="hidden sm:flex"
                              >
                                <Lucide icon="File" class="w-4 h-4 mr-2" />
                                Download Docs
                              </Button>
                              <Menu class="sm:hidden">
                                <Menu.Button
                                  as="a"
                                  class="block w-5 h-5"
                                  href="#"
                                >
                                  <Lucide
                                    icon="MoreHorizontal"
                                    class="w-5 h-5 text-slate-500"
                                  />
                                </Menu.Button>
                                <Menu.Items class="w-40">
                                  <Menu.Item>
                                    <Lucide icon="File" class="w-4 h-4 mr-2" />
                                    Download Docs
                                  </Menu.Item>
                                </Menu.Items>
                              </Menu>
                            </Dialog.Title>
                            <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <Dialog.Description
                              class="grid grid-cols-12 gap-4 gap-y-3"
                            >
                              <div class="col-span-12 sm:col-span-6">
                                <FormLabel htmlFor="modal-datepicker-1">
                                  From
                                </FormLabel>
                                <Litepicker
                                  id="modal-datepicker-1"
                                  v-model="date"
                                  :options="{
                                    autoApply: false,
                                    showWeekNumbers: true,
                                    dropdowns: {
                                      minYear: 1990,
                                      maxYear: null,
                                      months: true,
                                      years: true,
                                    },
                                  }"
                                />
                              </div>
                              <div class="col-span-12 sm:col-span-6">
                                <FormLabel htmlFor="modal-datepicker-2">
                                  To
                                </FormLabel>
                                <Litepicker
                                  id="modal-datepicker-2"
                                  v-model="date"
                                  :options="{
                                    autoApply: false,
                                    showWeekNumbers: true,
                                    dropdowns: {
                                      minYear: 1990,
                                      maxYear: null,
                                      months: true,
                                      years: true,
                                    },
                                  }"
                                />
                              </div>
                            </Dialog.Description>
                            <!-- END: Modal Body -->
                            <!-- BEGIN: Modal Footer -->
                            <Dialog.Footer class="text-right">
                              <Button
                                variant="outline-secondary"
                                type="button"
                                @click="
                                  () => {
                                    setDatepickerModalPreview(false);
                                  }
                                "
                                class="w-20 mr-1"
                              >
                                Cancel
                              </Button>
                              <Button
                                variant="primary"
                                type="button"
                                class="w-20"
                                ref="cancelButtonRef"
                              >
                                Submit
                              </Button>
                            </Dialog.Footer>
                            <!-- END: Modal Footer -->
                          </Dialog.Panel>
                        </Dialog>
                        <!-- END: Modal Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Modal Datepicker" component combines the convenience of a
                  datepicker with the user-friendly experience of a modal
                  window. This integration provides a clean and organized way
                  for users to select dates in your web application, making it
                  ideal for date-based filtering or any scenario where date
                  selection is required.
                </p>
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
                  class="absolute left-0 px-3 ml-4 -mt-2.5 font-medium bg-white text-slate-500 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Litepicker</div>
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
                        <Table.Td>`options`</Table.Td>
                        <Table.Td>`LitepickerConfig`</Table.Td>
                        <Table.Td>Litepicker configuration options.</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`value`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>
                          The value of the Litepicker input.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onChange`</Table.Td>
                        <Table.Td>`(date: string) =&gt; void`</Table.Td>
                        <Table.Td>
                          A callback function that is called when the Litepicker
                          input value changes.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`getRef`</Table.Td>
                        <Table.Td>
                          `(el: LitepickerElement) =&gt; void`
                        </Table.Td>
                        <Table.Td>
                          A function that receives a reference to the Litepicker
                          input element.
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
                <a class="block -mt-px truncate" href=""> Basic Datepicker </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Input Group </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Date Range Picker </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Modal Datepicker </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
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
