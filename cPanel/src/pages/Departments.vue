<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import Pagination from "@/components/Base/Pagination";
import { FormInput, FormSelect, FormCheck } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import departments from "@/fakers/departments";
import Button from "@/components/Base/Button";
import { Tab } from "@/components/Base/Headless";
import Table from "@/components/Base/Table";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <Tab.Group>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div class="text-base font-medium group-[.mode--light]:text-white">
            Departments
          </div>
          <Tab.List
            variant="boxed-tabs"
            class="w-auto md:ml-auto bg-white box rounded-[0.6rem] border-slate-200 group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Daily
              </Tab.Button>
            </Tab>
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Monthly
              </Tab.Button>
            </Tab>
            <Tab
              class="bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current group-[.mode--light]:bg-transparent group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[0.12] group-[.mode--light]:[&[aria-selected='true']_button]:border-transparent dark:group-[.mode--light]:[&[aria-selected='true']_button]:bg-white/[.05] dark:bg-transparent"
            >
              <Tab.Button
                class="w-24 text-slate-500 whitespace-nowrap rounded-[0.6rem] group-[.mode--light]:text-slate-200"
                as="button"
              >
                Yearly
              </Tab.Button>
            </Tab>
          </Tab.List>
        </div>
        <Tab.Panels class="mt-3.5 box flex flex-col box--stacked">
          <Tab.Panel>
            <div class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2">
              <div>
                <div class="relative">
                  <Lucide
                    icon="Search"
                    class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500"
                  />
                  <FormInput
                    type="text"
                    placeholder="Search departments..."
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
                        <div class="text-left text-slate-500">Location</div>
                        <FormSelect class="flex-1 mt-2">
                          <template
                            v-for="(faker, fakerKey) in _.take(
                              departments.fakeDepartments(),
                              5
                            )"
                            :key="fakerKey"
                          >
                            <option :value="faker.location.image">
                              {{ faker.location.name }}
                            </option>
                          </template>
                        </FormSelect>
                      </div>
                      <div class="mt-3">
                        <div class="text-left text-slate-500">Employees</div>
                        <FormSelect class="flex-1 mt-2">
                          <option value="1 - 50">1 - 50</option>
                          <option value="51 - 100">50 - 100</option>
                          <option value="> 100">&gt; 100</option>
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
            <div class="overflow-auto xl:overflow-visible">
              <Table class="border-b border-slate-200/60">
                <Table.Thead>
                  <Table.Tr>
                    <Table.Td
                      class="w-5 py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      <FormCheck.Input type="checkbox" />
                    </Table.Td>
                    <Table.Td
                      class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Department
                    </Table.Td>
                    <Table.Td
                      class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Location
                    </Table.Td>
                    <Table.Td
                      class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Employees
                    </Table.Td>
                    <Table.Td
                      class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Budget
                    </Table.Td>
                    <Table.Td
                      class="py-4 font-medium border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Review Rate
                    </Table.Td>
                    <Table.Td
                      class="w-20 py-4 font-medium text-center border-t bg-slate-50 border-slate-200/60 text-slate-500 dark:bg-darkmode-400"
                    >
                      Action
                    </Table.Td>
                  </Table.Tr>
                </Table.Thead>
                <Table.Tbody>
                  <template
                    v-for="(faker, fakerKey) in _.take(
                      departments.fakeDepartments(),
                      10
                    )"
                    :key="fakerKey"
                  >
                    <Table.Tr class="[&_td]:last:border-b-0">
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <FormCheck.Input type="checkbox" />
                      </Table.Td>
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <a href="" class="font-medium whitespace-nowrap">
                          {{ faker.name }}
                        </a>
                        <div
                          class="text-slate-500 text-xs whitespace-nowrap mt-0.5"
                        >
                          {{ faker.head }}
                        </div>
                      </Table.Td>
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <div class="whitespace-nowrap">
                          <div class="flex items-center gap-2.5">
                            <div
                              class="w-[22px] h-[22px] overflow-hidden rounded-full border-2 image-fit zoom-in border-slate-200/70 box"
                            >
                              <Tippy
                                as="img"
                                alt="Tailwise - Admin Dashboard Template"
                                :src="faker.location.image"
                                :content="faker.location.name"
                              />
                            </div>
                            <a href="">{{ faker.location.name }}</a>
                          </div>
                        </div>
                      </Table.Td>
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <div class="whitespace-nowrap">
                          {{ faker.employees }}
                        </div>
                      </Table.Td>
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <div class="whitespace-nowrap">
                          <div class="flex items-center">
                            <div>{{ faker.budget }}</div>
                            <div
                              :class="[
                                'flex items-center text-xs ml-2',
                                ['text-success', 'text-danger'][_.random(0, 1)],
                              ]"
                            >
                              <span class="-mt-px">
                                {{ _.random(1, 5) }}%
                              </span>
                              <Lucide
                                icon="ChevronUp"
                                class="w-4 h-4 ml-px -mr-1"
                              />
                            </div>
                          </div>
                        </div>
                      </Table.Td>
                      <Table.Td class="py-4 border-dashed dark:bg-darkmode-600">
                        <div class="flex items-center">
                          <div class="flex items-center">
                            <Lucide
                              icon="Star"
                              class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                            />
                            <Lucide
                              icon="Star"
                              class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                            />
                            <Lucide
                              icon="Star"
                              class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                            />
                            <Lucide
                              icon="Star"
                              class="w-3.5 h-3.5 mr-1 text-pending fill-pending/30"
                            />
                            <Lucide
                              icon="Star"
                              class="w-3.5 h-3.5 mr-1 text-slate-400 fill-slate/30"
                            />
                          </div>
                          <div class="ml-1 text-xs text-slate-500">
                            ({{ _.random(3, 4) }}.{{ _.random(1, 5) }}+)
                          </div>
                        </div>
                      </Table.Td>
                      <Table.Td
                        class="relative py-4 border-dashed dark:bg-darkmode-600"
                      >
                        <div class="flex items-center justify-center">
                          <Menu class="h-5">
                            <Menu.Button class="w-5 h-5 text-slate-500">
                              <Lucide
                                icon="MoreVertical"
                                class="w-5 h-5 stroke-slate-400/70 fill-slate-400/70"
                              />
                            </Menu.Button>
                            <Menu.Items class="w-40">
                              <Menu.Item>
                                <Lucide
                                  icon="CheckSquare"
                                  class="w-4 h-4 mr-2"
                                />
                                Edit
                              </Menu.Item>
                              <Menu.Item class="text-danger">
                                <Lucide icon="Trash2" class="w-4 h-4 mr-2" />
                                Delete
                              </Menu.Item>
                            </Menu.Items>
                          </Menu>
                        </div>
                      </Table.Td>
                    </Table.Tr>
                  </template>
                </Table.Tbody>
              </Table>
            </div>
            <div
              class="flex flex-col-reverse flex-wrap items-center p-5 flex-reverse gap-y-2 sm:flex-row"
            >
              <Pagination class="flex-1 w-full mr-auto sm:w-auto">
                <Pagination.Link>
                  <Lucide icon="ChevronsLeft" class="w-4 h-4" />
                </Pagination.Link>
                <Pagination.Link>
                  <Lucide icon="ChevronLeft" class="w-4 h-4" />
                </Pagination.Link>
                <Pagination.Link>...</Pagination.Link>
                <Pagination.Link>1</Pagination.Link>
                <Pagination.Link active>2</Pagination.Link>
                <Pagination.Link>3</Pagination.Link>
                <Pagination.Link>...</Pagination.Link>
                <Pagination.Link>
                  <Lucide icon="ChevronRight" class="w-4 h-4" />
                </Pagination.Link>
                <Pagination.Link>
                  <Lucide icon="ChevronsRight" class="w-4 h-4" />
                </Pagination.Link>
              </Pagination>
              <FormSelect class="sm:w-20 rounded-[0.5rem]">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
              </FormSelect>
            </div>
          </Tab.Panel>
        </Tab.Panels>
      </Tab.Group>
    </div>
  </div>
</template>
