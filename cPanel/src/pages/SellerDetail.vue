<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import Pagination from "@/components/Base/Pagination";
import { FormInput, FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import users from "@/fakers/users";
import products from "@/fakers/products";
import transactions from "@/fakers/transactions";
import Button from "@/components/Base/Button";
import { formatCurrency } from "@/utils/helper";
import Table from "@/components/Base/Table";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col lg:h-10 gap-y-3 lg:items-center lg:flex-row">
        <div
          class="text-lg font-medium group-[.mode--light]:text-white flex items-center"
        >
          Sellers
          <Lucide
            icon="ArrowRight"
            class="stroke-[1.3] w-3.5 h-3.5 sm:w-5 sm:h-5 mx-1 sm:mx-2"
          />
          <div class="text-sm sm:text-lg">
            {{ users.fakeUsers()[0].name }} - #{{
              _.random(1000000000, 9000000000)
            }}
          </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 lg:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="MailCheck" class="stroke-[1.3] w-4 h-4 mr-2.5" />
            Send Message
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="XCircle" class="stroke-[1.3] w-4 h-4 mr-2.5" />
            Block User
          </Button>
        </div>
      </div>
      <div class="grid grid-cols-10 gap-5 mt-3.5">
        <div class="col-span-12 xl:col-span-3">
          <div class="flex flex-col p-5 box box--stacked">
            <div class="flex flex-col gap-5">
              <div
                class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">User Details</div>
                </div>
                <div class="p-5 mt-2.5 flex flex-col gap-5">
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Name:</div>
                      <a
                        href=""
                        class="underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                      >
                        {{ users.fakeUsers()[0].name }}
                      </a>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Phone Number:</div>
                      {{ users.fakeUsers()[0].phone }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Inbox"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Email:</div>
                      <div class="text-right truncate w-52">
                        {{ users.fakeUsers()[0].email }}
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Map"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Location:</div>
                      {{ users.fakeUsers()[0].location }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Address:</div>
                      <a
                        href=""
                        class="flex items-center underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                      >
                        <Lucide icon="MapPin" class="w-3.5 h-3.5 mr-1.5" />
                        View Address
                      </a>
                    </div>
                  </div>
                  <div class="mt-1.5">
                    <Button
                      class="w-full border-primary/20 text-primary/80 hover:bg-slate-50"
                    >
                      <Lucide
                        icon="PenSquare"
                        class="stroke-[1.3] w-4 h-4 mr-2"
                      />
                      Change Status
                    </Button>
                  </div>
                </div>
              </div>
              <div
                class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Store Details</div>
                </div>
                <div class="p-5 mt-2.5 flex flex-col gap-5">
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Unique ID:</div>
                      STR-{{ _.random(1000000000, 9000000000) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Calendar"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Name:</div>
                      Themeforest
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Phone Number:</div>
                      {{ users.fakeUsers()[0].phone }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Address:</div>
                      <a
                        href=""
                        class="flex items-center underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                      >
                        <Lucide icon="MapPin" class="w-3.5 h-3.5 mr-1.5" />
                        View Address
                      </a>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Status:</div>
                      <div
                        class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px mr-auto sm:mr-0"
                      >
                        <span class="-mt-px">Active</span>
                      </div>
                    </div>
                  </div>
                  <div class="mt-1.5">
                    <Button
                      class="w-full border-primary/20 text-primary/80 hover:bg-slate-50"
                    >
                      <Lucide
                        icon="PenSquare"
                        class="stroke-[1.3] w-4 h-4 mr-2"
                      />
                      Change Status
                    </Button>
                  </div>
                </div>
              </div>
              <div
                class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Transaction Reports</div>
                </div>
                <div class="p-5 mt-2.5 flex flex-col gap-5">
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Daily Average:</div>
                      $
                      {{ formatCurrency(_.random(10000000, 90000000)) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Calendar"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Monthly Average:</div>
                      $
                      {{ formatCurrency(_.random(10000000, 90000000)) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Annually Average:</div>
                      ${{ formatCurrency(_.random(10000000, 90000000)) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Rating Average:</div>
                      ( {{ _.random(3, 4) }}.{{ _.random(1, 5) }}+)
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Calendar"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Total Products:</div>
                      {{ _.random(1000, 10000) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clock"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Total Transactions:</div>
                      {{ formatCurrency(_.random(10000000, 90000000)) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Clipboard"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Active Disputes:</div>
                      {{ _.random(20, 100) }}
                    </div>
                  </div>
                  <div class="mt-1.5">
                    <Button
                      class="w-full border-primary/20 text-primary/80 hover:bg-slate-50"
                    >
                      <Lucide
                        icon="PenSquare"
                        class="stroke-[1.3] w-4 h-4 mr-2"
                      />
                      More Details
                    </Button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col col-span-12 xl:col-span-7 gap-7">
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
            >
              <div
                class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
              >
                <div class="-mt-px">Products</div>
              </div>
              <div class="p-5 mt-2.5 flex flex-col gap-5">
                <div class="flex flex-col sm:items-center sm:flex-row gap-y-2">
                  <div>
                    <div class="relative">
                      <Lucide
                        icon="Search"
                        class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500"
                      />
                      <FormInput
                        type="text"
                        placeholder="Search products..."
                        class="pl-9 sm:w-64 rounded-[0.5rem] shadow-none"
                      />
                    </div>
                  </div>
                  <div
                    class="flex flex-col sm:flex-row gap-x-3 gap-y-2 sm:ml-auto"
                  >
                    <div class="relative">
                      <Lucide
                        icon="PieChart"
                        class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3]"
                      />
                      <FormSelect class="shadow-none pl-9 rounded-[0.5rem]">
                        <option value="custom-date">Active</option>
                        <option value="daily">Inactive</option>
                      </FormSelect>
                    </div>
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
                            <div class="text-left text-slate-500">Status</div>
                            <FormSelect class="flex-1 mt-2">
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </FormSelect>
                          </div>
                          <div class="mt-3">
                            <div class="text-left text-slate-500">Stock</div>
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
                  <Table class="border-b border-dashed border-slate-200/80">
                    <Table.Thead>
                      <Table.Tr>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Item
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-right bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Price
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-center bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Status
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-center bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Action
                          </div>
                        </Table.Td>
                      </Table.Tr>
                    </Table.Thead>
                    <Table.Tbody>
                      <template
                        v-for="(faker, fakerKey) in _.take(
                          products.fakeProducts(),
                          10
                        )"
                        :key="fakerKey"
                      >
                        <Table.Tr
                          class="[&_td]:last:border-b-0 [&_td]:first:pt-5"
                        >
                          <Table.Td
                            class="py-3.5 border-dashed dark:bg-darkmode-600"
                          >
                            <div class="flex items-center">
                              <div class="w-10 h-10 image-fit zoom-in">
                                <Tippy
                                  as="img"
                                  alt="Tailwise - Admin Dashboard Template"
                                  class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                  :src="faker.images[0].path"
                                  :content="`Uploaded at ${faker.images[0].uploadDate}`"
                                />
                              </div>
                              <div class="ml-5">
                                <a
                                  href=""
                                  class="font-medium whitespace-nowrap"
                                >
                                  {{ faker.name }}
                                </a>
                                <div
                                  class="text-slate-500 text-xs whitespace-nowrap mt-0.5"
                                >
                                  Tags: {{ faker.category.tags.join(", ") }}
                                </div>
                              </div>
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div class="whitespace-nowrap">
                              ${{ formatCurrency(Math.floor(faker.price)) }}
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div
                              :class="[
                                'flex items-center justify-center',
                                { 'text-success': faker.isActive },
                                { 'text-danger': !faker.isActive },
                              ]"
                            >
                              <Lucide
                                icon="Database"
                                class="w-3.5 h-3.5 stroke-[1.7]"
                              />
                              <div class="ml-1.5 whitespace-nowrap">
                                {{ faker.isActive ? "Active" : "Inactive" }}
                              </div>
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-center border-dashed dark:bg-darkmode-600"
                          >
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
                          </Table.Td>
                        </Table.Tr>
                      </template>
                    </Table.Tbody>
                  </Table>
                </div>
                <div
                  class="flex flex-col-reverse flex-wrap items-center flex-reverse gap-y-2 sm:flex-row"
                >
                  <Pagination
                    class="flex-1 w-full mr-auto sm:w-auto [&_a]:shadow-none"
                  >
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
                  <FormSelect class="sm:w-20 rounded-[0.5rem] shadow-none">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                  </FormSelect>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
            >
              <div
                class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
              >
                <div class="-mt-px">Latest Transactions</div>
              </div>
              <div class="p-5 mt-2.5 flex flex-col gap-5">
                <div class="overflow-auto xl:overflow-visible">
                  <Table class="border-b border-dashed border-slate-200/80">
                    <Table.Thead>
                      <Table.Tr>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Reference
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Status
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-right bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Amount
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-center bg-slate-50 border-slate-200/80 text-slate-500 border-y dark:bg-darkmode-400"
                          >
                            Action
                          </div>
                        </Table.Td>
                      </Table.Tr>
                    </Table.Thead>
                    <Table.Tbody>
                      <template
                        v-for="(faker, fakerKey) in _.take(
                          transactions.fakeTransactions(),
                          5
                        )"
                        :key="fakerKey"
                      >
                        <Table.Tr class="[&_td]:last:border-b-0">
                          <Table.Td
                            class="py-4 border-dashed dark:bg-darkmode-600"
                          >
                            <div class="whitespace-nowrap">
                              {{ faker.orderId }}
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 border-dashed dark:bg-darkmode-600"
                          >
                            <div
                              :class="[
                                'flex items-center',
                                faker.orderStatus.textColor,
                              ]"
                            >
                              <Lucide
                                :icon="faker.orderStatus.icon"
                                class="w-3.5 h-3.5 stroke-[1.7]"
                              />
                              <div class="ml-1.5 whitespace-nowrap">
                                {{ faker.orderStatus.name }}
                              </div>
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div class="whitespace-nowrap">
                              ${{ faker.amount }}
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-center border-dashed dark:bg-darkmode-600"
                          >
                            <a
                              class="flex items-center justify-center text-primary whitespace-nowrap"
                              href=""
                            >
                              <Lucide
                                icon="Eye"
                                class="w-4 h-4 mr-1.5 stroke-[1.3]"
                              />
                              Quick View
                            </a>
                          </Table.Td>
                        </Table.Tr>
                      </template>
                    </Table.Tbody>
                  </Table>
                </div>
                <div class="mt-2">
                  <Button
                    variant="primary"
                    class="w-full bg-white text-primary border-primary/20 hover:bg-primary/20 dark:bg-darkmode-400"
                  >
                    View all transactions
                    <Lucide
                      icon="ArrowRight"
                      class="stroke-[1.3] w-4 h-4 ml-2"
                    />
                  </Button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
