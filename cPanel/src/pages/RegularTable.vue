<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Regular Table
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Explore table component variations with simplified styling for dynamic
          tables!
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
                <div class="text-[0.94rem] font-medium">Basic Table</div>
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
                  The "Basic Table" component provides a straightforward way to
                  create structured tables in your web applications. This table
                  style is clean and minimal, making it suitable for a wide
                  range of use cases.
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
                      <div class="overflow-x-auto">
                        <Table>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                        <Table dark class="mt-5">
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                          <Table dark class="mt-5">
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The example above demonstrates how to create a basic table
                  with columns for "First Name," "Last Name," and "Username."
                  The table is easy to read and can be customized further to
                  suit your application's needs. Use the "Basic Table" component
                  when you want a simple, clean table structure without
                  additional styling or complexity.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Bordered Table</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-2"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-2"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Bordered Table" component is a variation of the basic
                  table, with the added feature of borders around the table and
                  its cells. This styling choice enhances the visual distinction
                  between rows and columns, making the table content more
                  defined and organized.
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
                      <div class="overflow-x-auto">
                        <Table bordered>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table bordered>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, a "Bordered Table" is created with borders
                  around the table and its cells. This added visual distinction
                  can be particularly useful when you want to emphasize the
                  structure of your table. Use the "Bordered Table" component
                  when you need a table with well-defined borders to enhance the
                  visual separation between rows and columns.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Hoverable Table</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Hoverable Table" component is designed to enhance the
                  user experience by adding a hover effect to the table rows.
                  When users hover their mouse over a row, it becomes
                  highlighted, providing a visual cue and improving
                  interactivity.
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
                      <div class="overflow-x-auto">
                        <Table bordered hover>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table bordered hover>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, a "Hoverable Table" is created by adding the
                  hover prop to the Table component. As users hover over rows,
                  they visually respond by highlighting, making it easier to
                  track their interactions. Use the "Hoverable Table" component
                  when you want to improve user engagement and provide a more
                  interactive experience in your table-based content.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Table Row States</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Table Row States" feature allows you to add visual
                  indicators to table rows, enhancing the presentation and
                  conveying additional information to users. You can apply
                  different styles to rows to represent various states or
                  categories, making your tables more informative and engaging.
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
                      <div class="overflow-x-auto">
                        <Table>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr class="text-white bg-primary">
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr class="text-white bg-danger">
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr class="bg-warning">
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr class="text-white bg-primary">
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr class="text-white bg-danger">
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr class="bg-warning">
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, we've applied different row states to
                  highlight specific rows:
                </p>
                <ul class="mt-2 mb-4 leading-relaxed list-decimal ml-7">
                  <li class="mb-0.5">
                    The first row is marked with a primary state, typically used
                    for positive or highlighted content.
                  </li>
                  <li class="mb-0.5">
                    The second row is marked with a danger state, often used for
                    indicating a critical or negative condition.
                  </li>
                  <li class="mb-0.5">
                    The third row is marked with a warning state, suitable for
                    alerting users to a cautionary situation.
                  </li>
                </ul>
                <p class="leading-relaxed">
                  By using "Table Row States," you can visually differentiate
                  rows based on their significance or category, making it easier
                  for users to understand the content within the table.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Table Head Options</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Table Head Options" feature allows you to customize the
                  appearance of the table header to better match your
                  application's design and styling. You can choose between two
                  different variants: "dark" and "light," each offering a
                  distinct visual style for the table header.
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
                      <div class="overflow-x-auto">
                        <Table>
                          <Table.Thead variant="dark">
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                        <Table class="mt-5">
                          <Table.Thead variant="light">
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table>
                            <Table.Thead variant="dark">
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                          <Table class="mt-5">
                            <Table.Thead variant="light">
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, we showcase two different table headers using
                  the "dark" and "light" variants:
                </p>
                <ul class="mt-2 mb-4 leading-relaxed list-decimal ml-7">
                  <li class="mb-0.5">
                    The first table header is styled with the "dark" variant,
                    which provides a dark background color and white text,
                    creating a visually distinct header.
                  </li>
                  <li class="mb-0.5">
                    The second table header utilizes the "light" variant,
                    offering a light background with dark text for a more subtle
                    appearance.
                  </li>
                </ul>
                <p class="leading-relaxed">
                  By using "Table Head Options," you can align your table
                  headers with your application's design scheme, ensuring a
                  cohesive and aesthetically pleasing user interface.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Responsive Table</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Responsive Table" feature ensures that your table content
                  adapts gracefully to different screen sizes, offering an
                  optimal viewing experience on both large desktop screens and
                  smaller mobile devices. When you enable the "Responsive Table"
                  component, it allows users to scroll horizontally to view the
                  entire table, ensuring that no data is cut off on smaller
                  screens.
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
                      <div class="overflow-x-auto">
                        <Table>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Email
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Address
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td class="whitespace-nowrap"> 1 </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Angelina
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Jolie
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                @angelinajolie
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                angelinajolie@gmail.com
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                260 W. Storm Street New York, NY 10025.
                              </Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td class="whitespace-nowrap"> 2 </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Brad
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Pitt
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                @bradpitt
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                bradpitt@gmail.com
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                47 Division St. Buffalo, NY 14241.
                              </Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td class="whitespace-nowrap"> 3 </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Charlie
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                Hunnam
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                @charliehunnam
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                charliehunnam@gmail.com
                              </Table.Td>
                              <Table.Td class="whitespace-nowrap">
                                8023 Amerige Street Harriman, NY 10926.
                              </Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Email
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Address
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td class="whitespace-nowrap">1</Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Angelina
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Jolie
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  @angelinajolie
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  angelinajolie@gmail.com
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  260 W. Storm Street New York, NY 10025.
                                </Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td class="whitespace-nowrap">2</Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Brad
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Pitt
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  @bradpitt
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  bradpitt@gmail.com
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  47 Division St. Buffalo, NY 14241.
                                </Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td class="whitespace-nowrap">3</Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Charlie
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  Hunnam
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  @charliehunnam
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  charliehunnam@gmail.com
                                </Table.Td>
                                <Table.Td class="whitespace-nowrap">
                                  8023 Amerige Street Harriman, NY 10926.
                                </Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, a "Responsive Table" is created by wrapping
                  it within a container with horizontal overflow. This allows
                  users to scroll horizontally to view the complete table,
                  ensuring that all columns and data remain accessible on
                  smaller screens. Use the "Responsive Table" component when you
                  want your table to maintain readability and usability across
                  various devices, regardless of screen size.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Small Table</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Small Table" component allows you to create a compact and
                  space-efficient table, ideal for situations where you need to
                  display tabular data in a confined space or emphasize a
                  minimalistic design. By adding the sm (small) prop to the
                  table, you can reduce the overall size of the table, making it
                  more suitable for displaying information in a concise manner.
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
                      <div class="overflow-x-auto">
                        <Table sm>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table sm>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, a "Small Table" is created by applying the sm
                  prop to the table component. This reduces the table's overall
                  size, making it more compact and suitable for situations where
                  space is limited. Use the "Small Table" component when you
                  need to display tabular data in a constrained space or when
                  you want to maintain a clean and minimalist design.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Striped Rows Table</div>
                <FormSwitch class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0">
                  <FormSwitch.Label
                    htmlFor="show-example-3"
                    class="ml-0 sm:ml-2"
                  >
                    Show example code
                  </FormSwitch.Label>
                  <FormSwitch.Input
                    id="show-example-3"
                    @click="toggle"
                    class="ml-3 mr-0"
                    type="checkbox"
                  />
                </FormSwitch>
              </div>
              <div>
                <p class="leading-relaxed">
                  The "Striped Rows Table" feature enhances the readability and
                  visual appeal of your tables by applying alternating
                  background colors to rows. This creates a clear distinction
                  between even and odd rows, making it easier for users to track
                  and interpret tabular data.
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
                      <div class="overflow-x-auto">
                        <Table striped>
                          <Table.Thead>
                            <Table.Tr>
                              <Table.Th class="whitespace-nowrap"> # </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                First Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Last Name
                              </Table.Th>
                              <Table.Th class="whitespace-nowrap">
                                Username
                              </Table.Th>
                            </Table.Tr>
                          </Table.Thead>
                          <Table.Tbody>
                            <Table.Tr>
                              <Table.Td>1</Table.Td>
                              <Table.Td>Angelina</Table.Td>
                              <Table.Td>Jolie</Table.Td>
                              <Table.Td>@angelinajolie</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>2</Table.Td>
                              <Table.Td>Brad</Table.Td>
                              <Table.Td>Pitt</Table.Td>
                              <Table.Td>@bradpitt</Table.Td>
                            </Table.Tr>
                            <Table.Tr>
                              <Table.Td>3</Table.Td>
                              <Table.Td>Charlie</Table.Td>
                              <Table.Td>Hunnam</Table.Td>
                              <Table.Td>@charliehunnam</Table.Td>
                            </Table.Tr>
                          </Table.Tbody>
                        </Table>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="overflow-x-auto">
                          <Table striped>
                            <Table.Thead>
                              <Table.Tr>
                                <Table.Th class="whitespace-nowrap">#</Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  First Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Last Name
                                </Table.Th>
                                <Table.Th class="whitespace-nowrap">
                                  Username
                                </Table.Th>
                              </Table.Tr>
                            </Table.Thead>
                            <Table.Tbody>
                              <Table.Tr>
                                <Table.Td>1</Table.Td>
                                <Table.Td>Angelina</Table.Td>
                                <Table.Td>Jolie</Table.Td>
                                <Table.Td>@angelinajolie</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>2</Table.Td>
                                <Table.Td>Brad</Table.Td>
                                <Table.Td>Pitt</Table.Td>
                                <Table.Td>@bradpitt</Table.Td>
                              </Table.Tr>
                              <Table.Tr>
                                <Table.Td>3</Table.Td>
                                <Table.Td>Charlie</Table.Td>
                                <Table.Td>Hunnam</Table.Td>
                                <Table.Td>@charliehunnam</Table.Td>
                              </Table.Tr>
                            </Table.Tbody>
                          </Table>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  In this example, a "Striped Rows Table" is created by adding
                  the striped prop to the table component. Even-numbered rows
                  are styled with a background color, while odd-numbered rows
                  remain with the default background. This alternating pattern
                  improves the visual separation of rows and enhances the
                  overall readability of the table. Use the "Striped Rows Table"
                  component when you want to present tabular data in a visually
                  organized and easy-to-read format.
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
                  <div class="-mt-px">Table</div>
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
                        <Table.Td>`dark`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Enables dark mode styling for the table.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`bordered`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>Adds borders to the table cells.</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`hover`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Enables hover effects on table rows.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`striped`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Alternates row background colors for improved
                          readability.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`sm`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Reduces the size of the table for a more compact
                          display.
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
                  <div class="-mt-px">Table.Thead</div>
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
                        <Table.Td>`variant`</Table.Td>
                        <Table.Td>`default`, `light`, `dark`</Table.Td>
                        <Table.Td>
                          Sets the variant style for the table head.
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
                  <div class="-mt-px">Tab.Tbody</div>
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
                        <Table.Td class="text-center" :colSpan="3">
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
                  <div class="-mt-px">Table.Tr</div>
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
                        <Table.Td class="text-center" :colSpan="3">
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
                  <div class="-mt-px">Table.Th</div>
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
                        <Table.Td class="text-center" :colSpan="3">
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
                  <div class="-mt-px">Table.Td</div>
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
                        <Table.Td class="text-center" :colSpan="3">
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
                <a class="block -mt-px truncate" href=""> Basic Table </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Bordered Table </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Hoverable Table </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Table Row States </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Table Head Options
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Responsive Table </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Small Table </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Striped Rows </a>
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
