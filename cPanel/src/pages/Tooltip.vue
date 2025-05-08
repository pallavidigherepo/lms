<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Tippy from "@/components/Base/Tippy";
import Button from "@/components/Base/Button";
import TippyContent from "@/components/Base/TippyContent";
import users from "@/fakers/users";
import SimpleLineChart1 from "@/components/SimpleLineChart1";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Tooltip
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Discover the versatility of our Tooltip component for adding helpful
          hints and additional information to your user interface.
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
                <div class="text-[0.94rem] font-medium">Basic Tooltip</div>
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
                  Tooltips are a helpful way to provide additional information
                  or descriptions for elements on a web page. They typically
                  appear when users hover over or interact with an element,
                  offering context and clarification. This section explains how
                  to implement basic tooltips in your web application.
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
                      <div class="text-center">
                        <Tippy
                          :as="Button"
                          variant="primary"
                          content="This is awesome tooltip example!"
                        >
                          Show Tooltip
                        </Tippy>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="text-center">
                          <Tippy
                            :as="Button"
                            variant="primary"
                            content="This is awesome tooltip example!"
                          >
                            Show Tooltip
                          </Tippy>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Basic Tooltip" section has demonstrated how to use
                  tooltips to provide additional information and hints to users
                  when they interact with elements on your web page. By
                  following these guidelines and best practices, you can enhance
                  user experience and provide valuable context without
                  overwhelming your UI.
                </p>
              </div>
            </Preview>
          </div>

          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">On Click Tooltip</div>
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
                  An "On Click Tooltip" is a variation of the traditional
                  tooltip that appears when the user clicks on an element rather
                  than hovering over it. This section explains how to implement
                  tooltips that appear on click events in your web application.
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
                      <div class="text-center">
                        <Tippy
                          :as="Button"
                          variant="primary"
                          content="This is awesome tooltip example!"
                          :options="{
                            trigger: 'click',
                          }"
                        >
                          Show Tooltip
                        </Tippy>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="text-center">
                          <Tippy
                            :as="Button"
                            variant="primary"
                            content="This is awesome tooltip example!"
                            :options="{
                              trigger: 'click',
                            }"
                          >
                            Show Tooltip
                          </Tippy>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "On Click Tooltip" section has demonstrated how to use
                  tooltips that appear when the user clicks on elements in your
                  web application. By following these guidelines and best
                  practices, you can provide additional information and context
                  to your users when they need it, improving the overall user
                  experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Light Tooltip</div>
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
                  A "Light Tooltip" is a type of tooltip that provides
                  additional information when the user hovers over an element.
                  These tooltips are designed with a clean and minimalistic
                  appearance. This section explains how to implement Light
                  Tooltips in your web application.
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
                      <div class="text-center">
                        <Tippy
                          :as="Button"
                          variant="primary"
                          content="This is awesome tooltip example!"
                          :options="{
                            theme: 'light',
                          }"
                        >
                          Show Tooltip
                        </Tippy>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="text-center">
                          <Tippy
                            :as="Button"
                            variant="primary"
                            content="This is awesome tooltip example!"
                            :options="{
                              theme: 'light',
                            }"
                          >
                            Show Tooltip
                          </Tippy>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Light Tooltip" section has demonstrated how to use
                  tooltips that provide additional information when the user
                  hovers over elements in your web application. By following
                  these guidelines and best practices, you can enhance user
                  understanding and improve the overall user experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">
                  Custom Tooltip Content
                </div>
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
                  Custom Tooltip Content allows you to create tooltips with
                  personalized and dynamic information. Instead of using static
                  text, you can populate tooltips with dynamic content such as
                  images, icons, or even React components. This section explains
                  how to implement Custom Tooltip Content in your web
                  application.
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
                      <!-- BEGIN: Custom Tooltip Toggle -->
                      <div class="text-center">
                        <Button
                          variant="primary"
                          data-tooltip="custom-tooltip-content"
                        >
                          Show Tooltip
                        </Button>
                      </div>
                      <!-- END: Custom Tooltip Toggle -->
                      <!-- BEGIN: Custom
                      Tooltip Content -->
                      <div class="tooltip-content">
                        <TippyContent to="custom-tooltip-content">
                          <div class="relative flex items-center px-1 py-2">
                            <div class="w-10 h-10 image-fit">
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                class="rounded-full"
                                :src="users.fakeUsers()[0].photo"
                              />
                            </div>
                            <div class="ml-4 mr-auto">
                              <div
                                class="font-medium leading-normal whitespace-nowrap dark:text-slate-200"
                              >
                                {{ users.fakeUsers()[0].name }}
                              </div>
                              <div
                                class="mt-0.5 text-xs text-slate-500 whitespace-nowrap dark:text-slate-400"
                              >
                                TailwindCSS 3+ Admin Dashboard Template
                              </div>
                            </div>
                          </div>
                        </TippyContent>
                      </div>
                      <!-- END: Custom Tooltip Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Custom Tooltip Toggle -->
                        <div class="text-center">
                          <Button
                            variant="primary"
                            data-tooltip="custom-tooltip-content"
                          >
                            Show Tooltip
                          </Button>
                        </div>
                        <!-- END: Custom Tooltip Toggle -->
                        <!-- BEGIN: Custom
                        Tooltip Content -->
                        <div class="tooltip-content">
                          <TippyContent to="custom-tooltip-content">
                            <div class="relative flex items-center px-1 py-2">
                              <div class="w-10 h-10 image-fit">
                                <img
                                  alt="Tailwise - Admin Dashboard Template"
                                  class="rounded-full"
                                  :src="users.fakeUsers()[0].photo"
                                />
                              </div>
                              <div class="ml-4 mr-auto">
                                <div
                                  class="font-medium leading-normal whitespace-nowrap dark:text-slate-200"
                                >
                                  \{\{ users.fakeUsers()[0].name \}\}
                                </div>
                                <div
                                  class="mt-0.5 text-xs text-slate-500 whitespace-nowrap dark:text-slate-400"
                                >
                                  TailwindCSS 3+ Admin Dashboard Template
                                </div>
                              </div>
                            </div>
                          </TippyContent>
                        </div>
                        <!-- END: Custom Tooltip Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Custom Tooltip Content" section has demonstrated how to
                  create tooltips with personalized and dynamic content,
                  allowing you to provide users with richer and context-specific
                  guidance. By leveraging this feature, you can enhance the
                  overall user experience and usability of your web application.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Chart Tooltip</div>
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
                  Chart tooltips are an essential component of data
                  visualization, providing users with valuable insights when
                  interacting with charts and graphs. This section explains how
                  to implement and customize chart tooltips in your web
                  application.
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
                      <!-- BEGIN: Custom Tooltip Toggle -->
                      <div class="text-center">
                        <Button variant="primary" data-tooltip="chart-tooltip">
                          Show Tooltip
                        </Button>
                      </div>
                      <!-- END: Custom Tooltip Toggle -->
                      <!-- BEGIN: Custom
                      Tooltip Content -->
                      <div class="tooltip-content">
                        <TippyContent to="chart-tooltip" class="px-1 py-2">
                          <div class="font-medium dark:text-slate-200">
                            Net Worth
                          </div>
                          <div class="flex items-center mt-2 sm:mt-0">
                            <div class="flex w-20 mr-2 dark:text-slate-400">
                              USP:
                              <span class="ml-auto font-medium text-success">
                                +23%
                              </span>
                            </div>
                            <div class="w-24 sm:w-32 lg:w-56">
                              <SimpleLineChart1 :height="30" />
                            </div>
                          </div>
                        </TippyContent>
                      </div>
                      <!-- END: Custom Tooltip Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Custom Tooltip Toggle -->
                        <div class="text-center">
                          <Button
                            variant="primary"
                            data-tooltip="chart-tooltip"
                          >
                            Show Tooltip
                          </Button>
                        </div>
                        <!-- END: Custom Tooltip Toggle -->
                        <!-- BEGIN: Custom
                        Tooltip Content -->
                        <div class="tooltip-content">
                          <TippyContent to="chart-tooltip" class="px-1 py-2">
                            <div class="font-medium dark:text-slate-200">
                              Net Worth
                            </div>
                            <div class="flex items-center mt-2 sm:mt-0">
                              <div class="flex w-20 mr-2 dark:text-slate-400">
                                USP:
                                <span class="ml-auto font-medium text-success">
                                  +23%
                                </span>
                              </div>
                              <div class="w-24 sm:w-32 lg:w-56">
                                <SimpleLineChart1 :height="30" />
                              </div>
                            </div>
                          </TippyContent>
                        </div>
                        <!-- END: Custom Tooltip Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Chart Tooltip" section has demonstrated how to create and
                  customize tooltips for your charts and data visualizations. By
                  implementing well-designed chart tooltips, you can provide
                  users with valuable insights, enhance their understanding of
                  the data, and improve overall user engagement.
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
                  <div class="-mt-px">Tippy</div>
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
                        <Table.Td>`getRef`</Table.Td>
                        <Table.Td>
                          `(el: PopperElement | null) =&gt; void`
                        </Table.Td>
                        <Table.Td>
                          A function to get a reference to the PopperElement or
                          null
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`content`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>
                          The content to display in the tooltip
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`as`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>
                          The HTML element type or React component to render
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`options`</Table.Td>
                        <Table.Td>`Props`</Table.Td>
                        <Table.Td>
                          Additional options for customizing the tooltip
                          appearance and behavior
                        </Table.Td>
                      </Table.Tr>
                    </Table.Tbody>
                  </Table>
                </div>
              </div>
              <div
                class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2.5 font-medium bg-white text-slate-500 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">TippyContent</div>
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
                        <Table.Td>`to`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>
                          The target element selector for which the tooltip will
                          be displayed (using the data-tooltip attribute)
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`getRef`</Table.Td>
                        <Table.Td>
                          `(el: HTMLElement | null) =&gt; HTMLElement`
                        </Table.Td>
                        <Table.Td>
                          A function to get a reference to the tooltip element
                          or null
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`options`</Table.Td>
                        <Table.Td>`Props`</Table.Td>
                        <Table.Td>
                          Additional options for customizing the tooltip
                          appearance and behavior
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
                <a class="block -mt-px truncate" href=""> Basic Tooltip </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> On Click Tooltip </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Light Tooltip </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Custom Tooltip Content
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Chart Tooltip </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
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
