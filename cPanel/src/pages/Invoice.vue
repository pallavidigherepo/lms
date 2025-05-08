<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Tab } from "@/components/Base/Headless";
import { formatCurrency } from "@/utils/helper";
import transactions from "@/fakers/transactions";
import users from "@/fakers/users";
import Button from "@/components/Base/Button";
import Table from "@/components/Base/Table";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Invoice
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="ExternalLink" class="stroke-[1.3] w-4 h-4 mr-3" />
            My Profile
          </Button>
        </div>
      </div>
      <div class="mt-3.5 grid grid-cols-12 gap-y-10 gap-x-6">
        <div class="col-span-12 xl:col-span-8">
          <div class="flex flex-col p-5 sm:p-14 box box--stacked">
            <div
              class="flex flex-col gap-y-7 md:flex-row px-8 sm:px-10 py-12 sm:py-16 sm:-mx-10 sm:-mt-10 border bg-primary/[0.03] border-primary/5 rounded-lg"
            >
              <div class="flex flex-col justify-center">
                <div
                  class="rounded-[0.6rem] w-[50px] h-[50px] border border-primary/50 flex items-center justify-center"
                >
                  <div
                    class="flex items-center justify-center w-[45px] rounded-lg h-[45px] bg-gradient-to-r from-theme-1/90 to-theme-2/90 transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:-rotate-180"
                  >
                    <div
                      class="w-[23px] h-[23px] relative -rotate-45 [&_div]:bg-white"
                    >
                      <div
                        class="absolute w-[21%] left-0 inset-y-0 my-auto rounded-full opacity-50 h-[75%]"
                      ></div>
                      <div
                        class="absolute w-[21%] inset-0 m-auto h-[120%] rounded-full"
                      ></div>
                      <div
                        class="absolute w-[21%] right-0 inset-y-0 my-auto rounded-full opacity-50 h-[75%]"
                      ></div>
                    </div>
                  </div>
                </div>
                <div
                  class="mt-3.5 text-lg font-medium text-slate-600/90 dark:text-white"
                >
                  Tailwise Pty Ltd.
                </div>
              </div>
              <div class="md:text-right md:ml-auto">
                <div class="-mt-1 text-lg font-medium text-primary">
                  # INVOICE
                </div>
                <div class="mt-1">
                  {{ transactions.fakeTransactions()[0].orderId }}
                </div>
                <div class="flex flex-col gap-1 mt-7">
                  <div>{{ users.fakeUsers()[0].addressLine1 }}</div>
                  <div>{{ users.fakeUsers()[0].addressLine2 }}</div>
                  <div>{{ users.fakeUsers()[0].location }}</div>
                </div>
              </div>
            </div>
            <div class="flex flex-col px-8 pt-4 mt-6 sm:px-0 sm:flex-row">
              <div>
                <div class="text-slate-500">Bill to :</div>
                <div class="mt-1.5 text-base font-medium text-primary">
                  {{ transactions.fakeTransactions()[1].user.name }}
                </div>
                <div class="flex flex-col gap-1 mt-1.5">
                  <div>{{ users.fakeUsers()[1].addressLine1 }}</div>
                  <div>{{ users.fakeUsers()[1].addressLine2 }}</div>
                  <div>{{ users.fakeUsers()[1].location }}</div>
                </div>
              </div>
              <div
                class="flex flex-col gap-4 sm:ml-auto sm:text-right mt-7 sm:mt-0"
              >
                <div>
                  <div class="text-slate-500">Invoice date :</div>
                  <div
                    class="mt-1.5 font-medium text-slate-600 dark:text-slate-300"
                  >
                    {{ transactions.fakeTransactions()[0].orderDate }}
                  </div>
                </div>
                <div>
                  <div class="text-slate-500">Due date :</div>
                  <div
                    class="mt-1.5 font-medium text-slate-600 dark:text-slate-300"
                  >
                    {{ transactions.fakeTransactions()[0].orderDate }}
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10 border border-slate-200/80 rounded-[0.6rem]">
              <div class="overflow-auto xl:overflow-visible">
                <Table>
                  <Table.Thead>
                    <Table.Tr>
                      <Table.Td
                        class="py-4 font-medium bg-slate-50 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] border-slate-200/80 text-slate-500 dark:bg-darkmode-400"
                      >
                        Item
                      </Table.Td>
                      <Table.Td
                        class="text-right py-4 font-medium bg-slate-50 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] border-slate-200/80 text-slate-500 dark:bg-darkmode-400"
                      >
                        Quantity
                      </Table.Td>
                      <Table.Td
                        class="text-right py-4 font-medium bg-slate-50 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] border-slate-200/80 text-slate-500 dark:bg-darkmode-400"
                      >
                        Rate
                      </Table.Td>
                      <Table.Td
                        class="text-right py-4 font-medium bg-slate-50 first:rounded-tl-[0.6rem] last:rounded-tr-[0.6rem] border-slate-200/80 text-slate-500 dark:bg-darkmode-400"
                      >
                        Amount
                      </Table.Td>
                    </Table.Tr>
                  </Table.Thead>
                  <Table.Tbody>
                    <template
                      v-for="(faker, fakerKey) in _.take(
                        transactions.fakeTransactions()[0].products,
                        5
                      )"
                      :key="fakerKey"
                    >
                      <Table.Tr class="[&_td]:last:border-b-0">
                        <Table.Td
                          class="py-4 border-dashed dark:bg-darkmode-600"
                        >
                          <div class="flex items-center">
                            <div
                              class="w-6 h-6 mr-2.5 overflow-hidden border-2 rounded-full image-fit zoom-in border-slate-200/70 box"
                            >
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                :src="faker.images[0].path"
                              />
                            </div>
                            <div class="whitespace-nowrap">
                              {{ faker.name }}
                            </div>
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="py-4 text-right border-dashed dark:bg-darkmode-600"
                        >
                          <div class="whitespace-nowrap">
                            {{ _.random(1, 5) }}
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
                          <div class="font-medium whitespace-nowrap">
                            $
                            {{
                              formatCurrency(
                                Math.floor(faker.price * _.random(2, 3))
                              )
                            }}
                          </div>
                        </Table.Td>
                      </Table.Tr>
                    </template>
                  </Table.Tbody>
                </Table>
              </div>
            </div>
            <div class="flex flex-col gap-3.5 pr-5 my-10 ml-auto text-right">
              <div class="flex items-center justify-end">
                <div class="text-slate-500">Subtotal:</div>
                <div class="w-20 font-medium sm:w-52 text-slate-600">
                  ${{ formatCurrency(Math.floor(_.random(1300, 1600))) }}
                </div>
              </div>
              <div class="flex items-center justify-end">
                <div class="text-slate-500">Total:</div>
                <div class="w-20 font-medium sm:w-52 text-slate-600">
                  ${{ formatCurrency(Math.floor(_.random(1300, 1600))) }}
                </div>
              </div>
              <div class="flex items-center justify-end">
                <div class="text-slate-500">Tax:</div>
                <div class="w-20 font-medium sm:w-52 text-slate-600">
                  ${{ formatCurrency(Math.floor(_.random(20, 50))) }}
                </div>
              </div>
              <div class="flex items-center justify-end">
                <div class="text-slate-500">Amount paid:</div>
                <div class="w-20 font-medium sm:w-52 text-slate-600">
                  ${{ formatCurrency(Math.floor(_.random(1300, 1600))) }}
                </div>
              </div>
              <div class="flex items-center justify-end">
                <div class="text-slate-500">Due balance:</div>
                <div class="w-20 font-medium sm:w-52 text-slate-600">
                  ${{ formatCurrency(Math.floor(_.random(10, 30))) }}
                </div>
              </div>
            </div>
            <div
              class="px-10 pt-6 -mx-8 border-t border-dashed border-slate-200/80"
            >
              <div class="text-base font-medium">
                Have questions about your invoice?
              </div>
              <div class="mt-1 text-slate-500">
                Get in touch with us for assistance on any billing matters.
              </div>
              <div class="mt-5 text-slate-500">© 2046 Left4code.</div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4">
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="pb-5 mb-5 font-medium border-b border-dashed border-slate-300/70 text-[0.94rem]"
            >
              History
            </div>
            <div>
              <div class="flex">
                <div>
                  <span class="text-lg font-medium">
                    {{ formatCurrency(_.random(2000, 4000)) }}
                  </span>
                  <span>Invoices</span>
                </div>
              </div>
              <div class="flex h-2 mt-3.5">
                <div
                  class="h-full first:rounded-l last:rounded-r border border-primary/50 bg-primary/50 w-[35%]"
                ></div>
                <div
                  class="h-full first:rounded-l last:rounded-r border border-info/50 bg-info/50 w-[20%]"
                ></div>
                <div
                  class="h-full first:rounded-l last:rounded-r border border-success/50 bg-success/50 w-[45%]"
                ></div>
              </div>
              <Tab.Group class="mt-8">
                <Tab.List
                  variant="boxed-tabs"
                  class="bg-white shadow-sm rounded-[0.6rem] border-slate-200"
                >
                  <Tab
                    class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
                  >
                    <Tab.Button
                      class="w-full text-slate-500 flex items-center justify-center whitespace-nowrap rounded-[0.6rem]"
                      as="button"
                    >
                      <div
                        class="w-2 h-2 mr-2 border rounded-full border-primary/60 bg-primary/60"
                      ></div>
                      Pending ({{ _.random(100, 300) }})
                    </Tab.Button>
                  </Tab>
                  <Tab
                    class="first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] [&[aria-selected='true']_button]:text-current"
                  >
                    <Tab.Button
                      class="w-full text-slate-500 flex items-center justify-center whitespace-nowrap rounded-[0.6rem]"
                      as="button"
                    >
                      <div
                        class="w-2 h-2 mr-2 border rounded-full border-danger/60 bg-danger/60"
                      ></div>
                      Canceled ({{ _.random(100, 300) }})
                    </Tab.Button>
                  </Tab>
                </Tab.List>
                <Tab.Panels class="mt-3">
                  <Tab.Panel>
                    <div
                      class="border border-dashed rounded-[0.6rem] border-slate-300/80"
                    >
                      <template
                        v-for="(faker, fakerKey) in _.take(
                          transactions.fakeTransactions(),
                          5
                        )"
                        :key="fakerKey"
                      >
                        <div
                          class="flex items-center px-5 py-4 border-b border-dashed cursor-pointer border-slate-300/80 last:border-b-0 last:border-0 hover:bg-slate-50"
                        >
                          <div>
                            <div
                              class="max-w-[12rem] font-medium truncate text-primary"
                            >
                              {{ faker.user.name }}
                            </div>
                            <div
                              class="whitespace-nowrap text-slate-500 mt-0.5"
                            >
                              {{ faker.category.name }}
                            </div>
                            <div class="mt-1.5 text-xs text-slate-500">
                              {{ faker.orderDate }}
                            </div>
                          </div>
                          <div class="ml-auto font-medium whitespace-nowrap">
                            ${{ faker.amount }} USD
                          </div>
                        </div>
                      </template>
                    </div>
                    <Button
                      variant="primary"
                      class="w-full mt-3 bg-white text-primary border-primary/[0.15] hover:bg-primary/20 dark:bg-darkmode-400"
                    >
                      View all invoices
                      <Lucide
                        icon="ArrowRight"
                        class="stroke-[1.3] w-4 h-4 ml-2"
                      />
                    </Button>
                  </Tab.Panel>
                  <Tab.Panel>
                    <div
                      class="border border-dashed rounded-[0.6rem] border-slate-300/80"
                    >
                      <template
                        v-for="(faker, fakerKey) in _.take(
                          transactions.fakeTransactions(),
                          5
                        )"
                        :key="fakerKey"
                      >
                        <div
                          class="flex items-center px-5 py-4 border-b border-dashed cursor-pointer border-slate-300/80 last:border-b-0 last:border-0 hover:bg-slate-50"
                        >
                          <div>
                            <div
                              class="max-w-[12rem] font-medium truncate text-primary"
                            >
                              {{ faker.user.name }}
                            </div>
                            <div
                              class="whitespace-nowrap text-slate-500 mt-0.5"
                            >
                              {{ faker.category.name }}
                            </div>
                            <div class="mt-1.5 text-xs text-slate-500">
                              {{ faker.orderDate }}
                            </div>
                          </div>
                          <div class="ml-auto font-medium whitespace-nowrap">
                            ${{ faker.amount }} USD
                          </div>
                        </div>
                      </template>
                    </div>
                    <Button
                      variant="primary"
                      class="w-full mt-3 bg-white text-primary border-primary/[0.15] hover:bg-primary/20"
                    >
                      View all invoices
                      <Lucide
                        icon="ArrowRight"
                        class="stroke-[1.3] w-4 h-4 ml-2"
                      />
                    </Button>
                  </Tab.Panel>
                </Tab.Panels>
              </Tab.Group>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
