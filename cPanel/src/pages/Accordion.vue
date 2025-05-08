<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import { Disclosure } from "@/components/Base/Headless";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Accordion
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Explore our accordion component, effortless content organization and
          presentation!
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
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Basic Accordion</div>
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
                  The Basic Accordion component is a powerful and flexible way
                  to organize and present information on your website or
                  application. It allows you to create collapsible sections of
                  content, making it easy for users to access information
                  without overwhelming them with too much text or detail at
                  once.
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
                      <Disclosure.Group>
                        <Disclosure>
                          <Disclosure.Button>
                            OpenSSL Essentials: Working with SSL Certificates,
                            Private Keys
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            Understanding IP Addresses, Subnets, and CIDR
                            Notation
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            How To Troubleshoot Common HTTP Error Codes
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            An Introduction to Securing your Linux VPS
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                      </Disclosure.Group>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <Disclosure.Group>
                          <Disclosure>
                            <Disclosure.Button>
                              OpenSSL Essentials: Working with SSL Certificates,
                              Private Keys
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              Understanding IP Addresses, Subnets, and CIDR
                              Notation
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              How To Troubleshoot Common HTTP Error Codes
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              An Introduction to Securing your Linux VPS
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                        </Disclosure.Group>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Customize the appearance of your accordion sections and panels
                  to match your brand's style and design preferences. Experiment
                  with different content types and layouts to create engaging
                  and user-friendly experiences.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Boxed Accordion</div>
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
                  The "Boxed Accordion" component provides a stylish and
                  organized way to create collapsible content sections with a
                  boxed appearance. This variation of the accordion is perfect
                  for presenting information in a structured and visually
                  appealing manner.
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
                      <Disclosure.Group variant="boxed">
                        <Disclosure>
                          <Disclosure.Button>
                            OpenSSL Essentials: Working with SSL Certificates,
                            Private Keys
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            Understanding IP Addresses, Subnets, and CIDR
                            Notation
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            How To Troubleshoot Common HTTP Error Codes
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                        <Disclosure>
                          <Disclosure.Button>
                            An Introduction to Securing your Linux VPS
                          </Disclosure.Button>
                          <Disclosure.Panel
                            class="leading-relaxed text-slate-600 dark:text-slate-500"
                          >
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged.
                          </Disclosure.Panel>
                        </Disclosure>
                      </Disclosure.Group>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <Disclosure.Group variant="boxed">
                          <Disclosure>
                            <Disclosure.Button>
                              OpenSSL Essentials: Working with SSL Certificates,
                              Private Keys
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              Understanding IP Addresses, Subnets, and CIDR
                              Notation
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              How To Troubleshoot Common HTTP Error Codes
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                          <Disclosure>
                            <Disclosure.Button>
                              An Introduction to Securing your Linux VPS
                            </Disclosure.Button>
                            <Disclosure.Panel
                              class="leading-relaxed text-slate-600 dark:text-slate-500"
                            >
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of
                              type and scrambled it to make a type specimen
                              book. It has survived not only five centuries, but
                              also the leap into electronic typesetting,
                              remaining essentially unchanged.
                            </Disclosure.Panel>
                          </Disclosure>
                        </Disclosure.Group>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The Boxed Accordion component offers a visually pleasing way
                  to structure and present content that users can expand and
                  collapse. Customize it to suit your project's needs and
                  enhance the user experience on your website or application.
                  Enjoy using the Boxed Accordion!
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
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
                  <div class="-mt-px">Disclosure</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">Disclosure.Group</div>
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
                        <Table.Td>`as`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>
                          HTML element or React component type.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`selectedIndex`</Table.Td>
                        <Table.Td>`number`</Table.Td>
                        <Table.Td>
                          Currently selected index within the group.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`variant`</Table.Td>
                        <Table.Td>Variant ('default' or 'boxed')</Table.Td>
                        <Table.Td>Disclosure group style variant.</Table.Td>
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
                  <div class="-mt-px">Disclosure.Button</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">Disclosure.Panel</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                <a class="block -mt-px truncate" href=""> Basic Accordion </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Boxed Accordion </a>
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
