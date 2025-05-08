<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import Tippy from "@/components/Base/Tippy";
import transactions from "@/fakers/transactions";
import Button from "@/components/Base/Button";
import ImageZoom from "@/components/Base/ImageZoom";
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
          Orders
          <Lucide
            icon="ArrowRight"
            class="stroke-[1.3] w-3.5 h-3.5 sm:w-5 sm:h-5 mx-1 sm:mx-2"
          />
          <div class="text-sm sm:text-lg">
            #{{ transactions.fakeTransactions()[0].orderId }}
          </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 lg:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="ArrowLeft" class="stroke-[1.3] w-4 h-4 mr-3" />
            Prev Order
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="ArrowRight" class="stroke-[1.3] w-4 h-4 mr-3" />
            Next Order
          </Button>
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="Printer" class="stroke-[1.3] w-4 h-4 mr-3" />
            Print Order
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
                  <div class="-mt-px">Transaction Details</div>
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
                      <div class="sm:mr-auto w-54">Purchase Date:</div>
                      {{ transactions.fakeTransactions()[0].orderDate }}
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
                      <div class="sm:mr-auto w-54">Transaction Status:</div>
                      <div
                        class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px mr-auto sm:mr-0"
                      >
                        <span class="-mt-px">
                          {{
                            transactions.fakeTransactions()[0].orderStatus.name
                          }}
                        </span>
                      </div>
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
                      <div class="sm:mr-auto w-54">Payment Method:</div>
                      Direct bank transfer
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
                  <div class="-mt-px">Shipping Details</div>
                </div>
                <div class="p-5 mt-2.5 flex flex-col gap-5">
                  <div class="flex items-center">
                    <Lucide
                      icon="Calendar"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">
                        Total Price ({{ _.random(2, 20) }} items):
                      </div>
                      ${{ transactions.fakeTransactions()[0].amount }}
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
                      <div class="sm:mr-auto w-54">Total Shipping Cost:</div>
                      ${{ _.random(30, 100) }}
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
                      <div class="sm:mr-auto w-54">Shipping Insurance:</div>
                      ${{ _.random(100, 300) }}
                    </div>
                  </div>
                  <div class="flex items-center">
                    <Lucide
                      icon="Banknote"
                      class="w-4 h-4 mr-2.5 stroke-[1.3] text-slate-500"
                    />
                    <div
                      class="flex flex-col flex-wrap w-full sm:items-center sm:flex-row gap-y-1"
                    >
                      <div class="sm:mr-auto w-54">Grand Total:</div>
                      $
                      {{ transactions.fakeTransactions()[0].amount }}
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Buyer Details</div>
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
                      <div class="sm:mr-auto w-54">Name:</div>
                      <a
                        href=""
                        class="underline decoration-dotted decoration-primary/30 underline-offset-[3px]"
                      >
                        {{ transactions.fakeTransactions()[0].user.name }}
                      </a>
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
                      <div class="sm:mr-auto w-54">Phone Number:</div>
                      {{ transactions.fakeTransactions()[0].user.phone }}
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
                </div>
              </div>
              <div
                class="border rounded-[0.6rem] border-slate-200/80 dark:border-darkmode-400 relative mt-3"
              >
                <div
                  class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600 dark:bg-darkmode-600"
                >
                  <div class="-mt-px">Shipping Information</div>
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
                      <div class="sm:mr-auto w-54">Courier:</div>
                      Left4code Express
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
                      <div class="sm:mr-auto w-54">Tracking Number:</div>
                      {{ _.random(1000000, 5000000) }}
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
                <div class="-mt-px">Product Details</div>
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
                            class="px-5 py-4 font-medium bg-slate-50 dark:bg-darkmode-400 border-slate-200/80 text-slate-500 border-y"
                          >
                            Item
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-right bg-slate-50 dark:bg-darkmode-400 border-slate-200/80 text-slate-500 border-y"
                          >
                            Quantity
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-right bg-slate-50 dark:bg-darkmode-400 border-slate-200/80 text-slate-500 border-y"
                          >
                            Rate
                          </div>
                        </Table.Td>
                        <Table.Td
                          class="px-0 py-0 [&_div]:first:border-l [&_div]:last:border-r [&_div]:first:rounded-l-md [&_div]:last:rounded-r-md border-b-0"
                        >
                          <div
                            class="px-5 py-4 font-medium text-right bg-slate-50 dark:bg-darkmode-400 border-slate-200/80 text-slate-500 border-y"
                          >
                            Amount
                          </div>
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
                        <Table.Tr
                          class="[&_td]:last:border-b-0 [&_td]:first:pt-5 [&_td]:last:pb-5"
                        >
                          <Table.Td
                            class="py-3.5 border-dashed dark:bg-darkmode-600"
                          >
                            <div class="flex items-center">
                              <div class="w-11 h-11 image-fit zoom-in">
                                <Tippy
                                  as="img"
                                  alt="Tailwise - Admin Dashboard Template"
                                  class="rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]"
                                  :src="faker.images[0].path"
                                  :content="faker.images[0].uploadDate"
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
                                  class="text-slate-500 text-xs mt-1 flex flex-col gap-0.5 whitespace-nowrap"
                                >
                                  {{
                                    ["Size", "Gender", "Color"][_.random(0, 2)]
                                  }}
                                  : {{ ["XL", "Men", "Red"][_.random(0, 2)] }}
                                </div>
                              </div>
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div class="whitespace-nowrap">
                              {{ _.random(2, 5) }}
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div class="whitespace-nowrap">
                              ${{ formatCurrency(Math.floor(faker.price * 2)) }}
                            </div>
                          </Table.Td>
                          <Table.Td
                            class="py-4 text-right border-dashed dark:bg-darkmode-600"
                          >
                            <div class="font-medium whitespace-nowrap">
                              ${{ formatCurrency(Math.floor(faker.price * 3)) }}
                            </div>
                          </Table.Td>
                        </Table.Tr>
                      </template>
                    </Table.Tbody>
                  </Table>
                </div>
                <div
                  class="flex flex-col gap-3.5 pr-5 mt-3 mb-5 ml-auto text-right"
                >
                  <div class="flex items-center justify-end">
                    <div class="text-slate-500">Subtotal:</div>
                    <div
                      class="w-20 font-medium sm:w-48 text-slate-600 dark:text-slate-400"
                    >
                      ${{ transactions.fakeTransactions()[0].amount }}
                    </div>
                  </div>
                  <div class="flex items-center justify-end">
                    <div class="text-slate-500">Total:</div>
                    <div
                      class="w-20 font-medium sm:w-48 text-slate-600 dark:text-slate-400"
                    >
                      ${{ transactions.fakeTransactions()[0].amount }}
                    </div>
                  </div>
                  <div class="flex items-center justify-end">
                    <div class="text-slate-500">Tax:</div>
                    <div
                      class="w-20 font-medium sm:w-48 text-slate-600 dark:text-slate-400"
                    >
                      ${{ _.random(30, 100) }}
                    </div>
                  </div>
                  <div class="flex items-center justify-end">
                    <div class="text-slate-500">Amount paid:</div>
                    <div
                      class="w-20 font-medium sm:w-48 text-slate-600 dark:text-slate-400"
                    >
                      ${{ transactions.fakeTransactions()[0].amount }}
                    </div>
                  </div>
                  <div class="flex items-center justify-end">
                    <div class="text-slate-500">Due balance:</div>
                    <div
                      class="w-20 font-medium sm:w-48 text-slate-600 dark:text-slate-400"
                    >
                      ${{ _.random(30, 100) }}
                    </div>
                  </div>
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
                <div class="-mt-px">Tracking Info</div>
              </div>
              <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                <div
                  class="relative overflow-hidden before:content-[''] before:absolute before:w-px before:bg-slate-200/60 before:left-0 before:inset-y-0 before:dark:bg-darkmode-400 before:ml-[14px]"
                >
                  <div
                    :class="[
                      'mb-3 last:mb-0 relative',
                      'first:before:content-[\'\'] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute dark:first:before:bg-darkmode-600',
                      'last:after:content-[\'\'] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0 dark:last:after:bg-darkmode-600',
                    ]"
                  >
                    <div
                      :class="[
                        'px-4 py-3 ml-8',
                        'before:content-[\'\'] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10',
                        'after:content-[\'\'] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10',
                      ]"
                    >
                      <a href="" class="font-medium text-primary">
                        Transaction Completed.
                      </a>
                      <div
                        class="flex flex-col sm:flex-row sm:items-center gap-y-1.5 mt-1.5 leading-relaxed text-slate-500 text-[0.8rem]"
                      >
                        Funds will be forwarded to the seller.
                      </div>
                      <div
                        class="sm:w-1/2 my-3.5 p-1 border rounded-[0.6rem] bg-slate-50/80"
                      >
                        <div
                          class="grid grid-cols-1 md:grid-cols-3 overflow-hidden rounded-[0.6rem]"
                        >
                          <div
                            class="h-20 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                          >
                            <ImageZoom
                              alt="Tailwise - Admin Dashboard Template"
                              :src="
                                transactions.fakeTransactions()[0].products[0]
                                  .images[0].path
                              "
                            />
                          </div>
                          <div
                            class="h-20 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                          >
                            <ImageZoom
                              alt="Tailwise - Admin Dashboard Template"
                              :src="
                                transactions.fakeTransactions()[0].products[0]
                                  .images[1].path
                              "
                            />
                          </div>
                          <div
                            class="h-20 overflow-hidden border image-fit border-slate-100 saturate-[.6] hover:saturate-100 cursor-pointer"
                          >
                            <ImageZoom
                              alt="Tailwise - Admin Dashboard Template"
                              :src="
                                transactions.fakeTransactions()[0].products[0]
                                  .images[2].path
                              "
                            />
                          </div>
                        </div>
                      </div>
                      <div class="mt-1.5 text-xs text-slate-500">
                        25 Mar 2046, 10:28 AM
                      </div>
                    </div>
                  </div>
                  <div
                    :class="[
                      'mb-3 last:mb-0 relative',
                      'first:before:content-[\'\'] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute dark:first:before:bg-darkmode-600',
                      'last:after:content-[\'\'] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0 dark:last:after:bg-darkmode-600',
                    ]"
                  >
                    <div
                      :class="[
                        'px-4 py-3 ml-8',
                        'before:content-[\'\'] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10',
                        'after:content-[\'\'] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10',
                      ]"
                    >
                      <a href="" class="font-medium text-primary">
                        The order has arrived.
                      </a>
                      <div
                        class="flex flex-col sm:flex-row sm:items-center gap-y-1.5 mt-1.5 leading-relaxed text-slate-500 text-[0.8rem]"
                      >
                        Received by Calvin.
                      </div>
                      <div class="mt-1.5 text-xs text-slate-500">
                        23 Mar 2023, 08:28 AM
                      </div>
                    </div>
                  </div>
                  <div
                    :class="[
                      'mb-3 last:mb-0 relative',
                      'first:before:content-[\'\'] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute dark:first:before:bg-darkmode-600',
                      'last:after:content-[\'\'] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0 dark:last:after:bg-darkmode-600',
                    ]"
                  >
                    <div
                      :class="[
                        'px-4 py-3 ml-8',
                        'before:content-[\'\'] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10',
                        'after:content-[\'\'] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10',
                      ]"
                    >
                      <a href="" class="font-medium text-primary">
                        The order has been sent.
                      </a>
                      <div
                        class="flex flex-col sm:flex-row sm:items-center gap-y-1.5 mt-1.5 leading-relaxed text-slate-500 text-[0.8rem]"
                      >
                        The order is being shipped by courier.
                      </div>
                      <div class="mt-1.5 text-xs text-slate-500">
                        23 Mar 2023, 12:21 AM
                      </div>
                    </div>
                  </div>
                  <div
                    :class="[
                      'mb-3 last:mb-0 relative',
                      'first:before:content-[\'\'] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute dark:first:before:bg-darkmode-600',
                      'last:after:content-[\'\'] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0 dark:last:after:bg-darkmode-600',
                    ]"
                  >
                    <div
                      :class="[
                        'px-4 py-3 ml-8',
                        'before:content-[\'\'] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10',
                        'after:content-[\'\'] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10',
                      ]"
                    >
                      <a href="" class="font-medium text-primary">
                        Payment Verified.
                      </a>
                      <div
                        class="flex flex-col sm:flex-row sm:items-center gap-y-1.5 mt-1.5 leading-relaxed text-slate-500 text-[0.8rem]"
                      >
                        Payment has been received.
                      </div>
                      <div class="mt-1.5 text-xs text-slate-500">
                        23 Mar 2023, 12:21 AM
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
