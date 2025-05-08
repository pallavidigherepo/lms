<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu } from "@/components/Base/Headless";
import ReportBarChart3 from "@/components/ReportBarChart3";
import ReportBarChart4 from "@/components/ReportBarChart4";
import { FormSelect, FormInput } from "@/components/Base/Form";
import Button from "@/components/Base/Button";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12 2xl:col-span-3">
      <div class="grid grid-cols-12 gap-y-10 gap-x-6">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-12">
          <div
            class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
          >
            <div class="text-base font-medium group-[.mode--light]:text-white">
              Current Balance
            </div>
          </div>
          <div class="p-5 mt-3.5 box box--stacked">
            <Menu class="absolute top-0 right-0 mt-5 mr-5">
              <Menu.Button class="w-5 h-5 text-slate-500">
                <Lucide
                  icon="MoreVertical"
                  class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
                />
              </Menu.Button>
              <Menu.Items class="w-40">
                <Menu.Item>
                  <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                  Delete
                </Menu.Item>
              </Menu.Items>
            </Menu>
            <div
              class="flex items-center justify-center w-12 h-12 border rounded-full border-info/10 bg-info/10"
            >
              <Lucide icon="Box" class="w-6 h-6 text-info fill-info/10" />
            </div>
            <div class="mt-8 mb-6 lg:mt-16 lg:mb-7 2xl:mt-7 2xl:mb-5">
              <div class="text-base text-slate-500">Available</div>
              <div class="flex items-center mt-1 text-2xl font-medium">
                <span class="text-[1.3rem]">$</span>
                <span class="ml-px mr-1.5">435,220,00</span>
                <span class="text-base mt-0.5">USD</span>
              </div>
            </div>
            <a class="flex items-center font-medium text-primary" href="">
              Setup auto transfers
              <Lucide icon="MoveRight" class="w-4 h-4 ml-1.5" />
            </a>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-12">
          <div
            class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
          >
            <div
              class="text-base font-medium lg:group-[.mode--light]:text-white 2xl:group-[.mode--light]:text-current"
            >
              Money In
            </div>
          </div>
          <div class="p-5 mt-3.5 box box--stacked">
            <Menu class="absolute top-0 right-0 mt-5 mr-5">
              <Menu.Button class="w-5 h-5 text-slate-500">
                <Lucide
                  icon="MoreVertical"
                  class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
                />
              </Menu.Button>
              <Menu.Items class="w-40">
                <Menu.Item>
                  <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                  Delete
                </Menu.Item>
              </Menu.Items>
            </Menu>
            <div class="pb-5 mb-5 border-b border-dashed border-slate-300/70">
              <div class="text-base text-slate-500">Total received</div>
              <div class="flex items-center mt-1">
                <div class="flex items-center text-xl font-medium">
                  <span class="mr-px">$</span>2,176,221
                  <span class="ml-1.5 text-sm">USD</span>
                </div>
              </div>
            </div>
            <ReportBarChart3 class="relative z-10 -ml-1" :height="80" />
            <a class="flex items-center mt-6 font-medium text-primary" href="">
              Request Money
              <Lucide icon="MoveRight" class="w-4 h-4 ml-1.5" />
            </a>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-4 2xl:col-span-12">
          <div
            class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
          >
            <div
              class="text-base font-medium lg:group-[.mode--light]:text-white 2xl:group-[.mode--light]:text-current"
            >
              Money Out
            </div>
          </div>
          <div class="p-5 mt-3.5 box box--stacked">
            <Menu class="absolute top-0 right-0 mt-5 mr-5">
              <Menu.Button class="w-5 h-5 text-slate-500">
                <Lucide
                  icon="MoreVertical"
                  class="w-6 h-6 stroke-slate-400/70 fill-slate-400/70"
                />
              </Menu.Button>
              <Menu.Items class="w-40">
                <Menu.Item>
                  <Lucide icon="Copy" class="w-4 h-4 mr-2" /> Copy Link
                </Menu.Item>
                <Menu.Item>
                  <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                  Delete
                </Menu.Item>
              </Menu.Items>
            </Menu>
            <div class="pb-5 mb-5 border-b border-dashed border-slate-300/70">
              <div class="text-base text-slate-500">Total sent or spent</div>
              <div class="flex items-center mt-1">
                <div class="flex items-center text-xl font-medium">
                  <span class="mr-px">$</span>4,176,132
                  <span class="ml-1.5 text-sm">USD</span>
                </div>
              </div>
            </div>
            <ReportBarChart4 class="relative z-10 -ml-1" :height="80" />
            <a class="flex items-center mt-6 font-medium text-primary" href="">
              Send Money
              <Lucide icon="MoveRight" class="w-4 h-4 ml-1.5" />
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-12 2xl:col-span-9 gap-y-10">
      <div>
        <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
          <div
            class="text-base font-medium 2xl:group-[.mode--light]:text-white"
          >
            Quick Links
          </div>
        </div>
        <div class="mt-3.5 box box--stacked">
          <div
            class="grid grid-cols-2 px-5 py-10 border-b sm:grid-cols-3 md:grid-cols-5 gap-y-5 lg:grid-cols-7"
          >
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
              >
                <Lucide
                  icon="CreditCard"
                  class="w-6 h-6 text-primary fill-primary/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Business Tools</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-info/10 bg-info/10"
              >
                <Lucide
                  icon="WalletCards"
                  class="w-6 h-6 text-info fill-info/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Invoicing</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-info/10 bg-info/10"
              >
                <Lucide icon="Airplay" class="w-6 h-6 text-info fill-info/10" />
              </div>
              <div class="mt-3 text-slate-500">Request Money</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-success/10 bg-success/10"
              >
                <Lucide
                  icon="Banknote"
                  class="w-6 h-6 text-success fill-success/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Send Money</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-pending/10 bg-pending/10"
              >
                <Lucide
                  icon="Users"
                  class="w-6 h-6 text-pending fill-pending/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Share Profile</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-primary/10 bg-primary/10"
              >
                <Lucide
                  icon="ShoppingBag"
                  class="w-6 h-6 text-primary fill-primary/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Checkout</div>
            </a>
            <a href="" class="flex flex-col items-center">
              <div
                class="flex items-center justify-center w-12 h-12 border rounded-full border-warning/10 bg-warning/10"
              >
                <Lucide
                  icon="CircleDollarSign"
                  class="w-6 h-6 text-warning fill-warning/10"
                />
              </div>
              <div class="mt-3 text-slate-500">Accept Payments</div>
            </a>
          </div>
          <div
            class="flex flex-col items-center gap-5 px-6 pt-5 pb-6 rounded-b-lg md:flex-row bg-slate-50 dark:bg-darkmode-700"
          >
            <div
              class="flex items-center justify-center w-12 h-12 border rounded-full border-info/10 bg-info/10"
            >
              <Lucide icon="Box" class="w-6 h-6 text-info fill-info/10" />
            </div>
            <div class="text-center md:text-left">
              <div class="mt-1 text-lg font-medium">Invoicing</div>
              <div
                class="mt-1 leading-relaxed text-slate-600 dark:text-slate-500"
              >
                Send an invoice or estimate in minutes. Customers can pay with
                cards or Tailwise.
              </div>
            </div>
            <div
              class="flex flex-col w-full gap-3 sm:w-auto sm:flex-row md:ml-auto"
            >
              <Button as="a" rounded class="w-full sm:w-36" href="">
                Not Now
              </Button>
              <Button
                as="a"
                variant="outline-primary"
                rounded
                class="w-full sm:w-36 border-primary/50"
                href=""
              >
                Learn More
              </Button>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 gap-x-6">
        <div class="flex flex-col gap-y-10">
          <div>
            <div
              class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
            >
              <div class="text-base font-medium">Send Payments</div>
            </div>
            <div class="p-5 mt-3.5 box box--stacked">
              <FormInput
                type="text"
                placeholder="Add an email or name"
                class="py-3"
              />
              <Button
                variant="outline-primary"
                rounded
                class="px-10 mt-6 border-primary/50"
              >
                Next
              </Button>
            </div>
          </div>
          <div>
            <div
              class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
            >
              <div class="text-base font-medium">Request Money</div>
            </div>
            <div class="p-5 mt-3.5 box box--stacked">
              <div class="flex">
                <div class="flex items-center text-2xl">
                  <span class="mr-1.5 -mt-1 text-base font-medium"> $ </span>
                  <span
                    contentEditable="true"
                    :suppressContentEditableWarning="true"
                    class="outline-none"
                  >
                    0,00
                  </span>
                  <div class="relative flex items-center ml-2 text-primary">
                    <FormSelect
                      class="p-0 pr-4 text-sm border-0 shadow-none bg-none focus:ring-0 dark:bg-none dark:!bg-transparent"
                    >
                      <option value="USD">USD</option>
                      <option value="AUD">AUD</option>
                      <option value="BRL">BRL</option>
                      <option value="CAD">CAD</option>
                      <option value="CHF">CHF</option>
                      <option value="CZK">CZK</option>
                      <option value="DKK">DKK</option>
                      <option value="EUR">EUR</option>
                      <option value="GBP">GBP</option>
                      <option value="HKD">HKD</option>
                      <option value="HUF">HUF</option>
                      <option value="ILS">ILS</option>
                      <option value="JPY">JPY</option>
                      <option value="MXN">MXN</option>
                      <option value="NOK">NOK</option>
                      <option value="NZD">NZD</option>
                      <option value="PHP">PHP</option>
                      <option value="PLN">PLN</option>
                      <option value="RUB">RUB</option>
                      <option value="SEK">SEK</option>
                      <option value="SGD">SGD</option>
                      <option value="THB">THB</option>
                      <option value="TWD">TWD</option>
                    </FormSelect>
                    <Lucide
                      icon="ChevronDown"
                      class="absolute right-0 my-auto inset-y-0 stroke-[1.3] w-4 h-4 ml-1"
                    />
                  </div>
                </div>
              </div>
              <FormInput
                type="text"
                placeholder="Add an email or name"
                class="py-3 mt-5"
              />
              <Button
                variant="outline-primary"
                rounded
                class="px-10 mt-6 border-primary/50"
              >
                Next
              </Button>
            </div>
          </div>
          <div>
            <div
              class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
            >
              <div class="text-base font-medium">Issue a Refund</div>
            </div>
            <div class="p-5 mt-3.5 box box--stacked">
              <div class="relative">
                <Lucide
                  icon="Search"
                  class="absolute inset-y-0 left-0 w-6 h-6 my-auto ml-3 text-slate-400"
                />
                <FormInput
                  type="text"
                  placeholder="Transaction id, invoice id or email"
                  class="py-3 pl-11"
                />
              </div>
              <div class="mt-3 text-slate-500">
                Find any payment that’s refundable and not related to any open
                cases. Enter the refund amount and send.
              </div>
              <div class="mt-5 text-slate-500">
                <a href="" class="font-medium text-primary"> Learn more </a>
                about refunds
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-y-10">
          <div>
            <div
              class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
            >
              <div class="text-base font-medium">Create a Subscription</div>
            </div>
            <div class="p-5 mt-3.5 box box--stacked">
              <FormInput
                type="text"
                placeholder="Enter product name"
                class="py-3"
              />
              <FormInput
                type="text"
                placeholder="Enter plan name"
                class="py-3 mt-3"
              />
              <div class="flex gap-3 mt-3">
                <FormSelect class="py-3">
                  <option value="USD">USD</option>
                  <option value="AUD">AUD</option>
                  <option value="BRL">BRL</option>
                  <option value="CAD">CAD</option>
                  <option value="CHF">CHF</option>
                  <option value="CZK">CZK</option>
                  <option value="DKK">DKK</option>
                  <option value="EUR">EUR</option>
                  <option value="GBP">GBP</option>
                  <option value="HKD">HKD</option>
                  <option value="HUF">HUF</option>
                  <option value="ILS">ILS</option>
                  <option value="JPY">JPY</option>
                  <option value="MXN">MXN</option>
                  <option value="NOK">NOK</option>
                  <option value="NZD">NZD</option>
                  <option value="PHP">PHP</option>
                  <option value="PLN">PLN</option>
                  <option value="RUB">RUB</option>
                  <option value="SEK">SEK</option>
                  <option value="SGD">SGD</option>
                  <option value="THB">THB</option>
                  <option value="TWD">TWD</option>
                </FormSelect>
                <FormInput type="text" placeholder="0,00" class="py-3" />
                <FormSelect class="py-3">
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
                  <option value="weekly">Weekly</option>
                  <option value="daily">Daily</option>
                </FormSelect>
              </div>
              <div class="flex gap-3 mt-6">
                <Button
                  rounded
                  variant="primary"
                  class="px-7 border-primary/50"
                >
                  Create Now
                </Button>
                <Button
                  rounded
                  variant="outline-primary"
                  class="px-7 border-primary/50"
                >
                  More Options
                </Button>
              </div>
            </div>
          </div>
          <div>
            <div
              class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row"
            >
              <div class="text-base font-medium">Create an Invoice</div>
            </div>
            <div class="p-5 mt-3.5 box box--stacked">
              <FormInput
                type="text"
                placeholder="Customers email's"
                class="py-3"
              />
              <FormInput
                type="text"
                placeholder="Item name"
                class="py-3 mt-3"
              />
              <div class="flex gap-3 mt-3">
                <FormInput type="text" placeholder="Item amount" class="py-3" />
                <FormSelect class="py-3">
                  <option value="USD">USD</option>
                  <option value="AUD">AUD</option>
                  <option value="BRL">BRL</option>
                  <option value="CAD">CAD</option>
                  <option value="CHF">CHF</option>
                  <option value="CZK">CZK</option>
                  <option value="DKK">DKK</option>
                  <option value="EUR">EUR</option>
                  <option value="GBP">GBP</option>
                  <option value="HKD">HKD</option>
                  <option value="HUF">HUF</option>
                  <option value="ILS">ILS</option>
                  <option value="JPY">JPY</option>
                  <option value="MXN">MXN</option>
                  <option value="NOK">NOK</option>
                  <option value="NZD">NZD</option>
                  <option value="PHP">PHP</option>
                  <option value="PLN">PLN</option>
                  <option value="RUB">RUB</option>
                  <option value="SEK">SEK</option>
                  <option value="SGD">SGD</option>
                  <option value="THB">THB</option>
                  <option value="TWD">TWD</option>
                </FormSelect>
              </div>
              <div class="flex gap-3 mt-6">
                <Button
                  rounded
                  variant="primary"
                  class="px-7 border-primary/50"
                >
                  Send
                </Button>
                <Button
                  as="a"
                  rounded
                  class="px-0 ml-2.5 border-transparent shadow-none text-primary"
                  href=""
                >
                  Add more details
                </Button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
