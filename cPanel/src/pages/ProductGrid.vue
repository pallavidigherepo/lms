<script setup lang="ts">
import Lucide from "@/components/Base/Lucide";
import { Menu, Popover } from "@/components/Base/Headless";
import Pagination from "@/components/Base/Pagination";
import { FormInput, FormSelect } from "@/components/Base/Form";
import Tippy from "@/components/Base/Tippy";
import products from "@/fakers/products";
import reviews from "@/fakers/reviews";
import Button from "@/components/Base/Button";
import _ from "lodash";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex flex-col md:h-10 gap-y-3 md:items-center md:flex-row">
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Products
        </div>
        <div class="flex flex-col sm:flex-row gap-x-3 gap-y-2 md:ml-auto">
          <Button
            variant="primary"
            class="group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200 group-[.mode--light]:!border-transparent dark:group-[.mode--light]:!bg-darkmode-900/30 dark:!box"
          >
            <Lucide icon="PenLine" class="stroke-[1.3] w-4 h-4 mr-2" />
            Add New Product
          </Button>
        </div>
      </div>
      <div class="mt-3.5">
        <div class="flex flex-col box box--stacked">
          <div class="flex flex-col p-5 sm:items-center sm:flex-row gap-y-2">
            <div>
              <div class="relative">
                <Lucide
                  icon="Search"
                  class="absolute inset-y-0 left-0 z-10 w-4 h-4 my-auto ml-3 stroke-[1.3] text-slate-500"
                />
                <FormInput
                  type="text"
                  placeholder="Search products..."
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
          <div class="overflow-hidden">
            <div class="grid grid-cols-12 px-5 -mx-5 border-dashed border-y">
              <template
                v-for="(faker, fakerKey) in _.take(products.fakeProducts(), 8)"
                :key="fakerKey"
              >
                <div
                  class="col-span-12 sm:col-span-6 xl:col-span-3 border-dashed border-slate-300/80 [&:nth-child(4n)]:border-r-0 px-5 py-5 [&:nth-last-child(-n+4)]:border-b-0 border-r border-b flex flex-col"
                >
                  <div
                    class="overflow-hidden rounded-lg h-52 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-slate-900/90 before:to-black/20"
                  >
                    <img
                      alt="Tailwise - Admin Dashboard Template"
                      class="rounded-md"
                      :src="faker.images[0].path"
                    />
                    <template v-if="faker.isActive">
                      <span
                        class="absolute top-0 z-10 px-2.5 py-1 m-5 text-xs text-white rounded-lg bg-success/80 font-medium border-white/20 border"
                      >
                        Active
                      </span>
                    </template>
                    <template v-else>
                      <span
                        class="absolute top-0 z-10 px-2.5 py-1 m-5 text-xs text-white rounded-lg bg-pending/80 font-medium border-white/20 border"
                      >
                        Inactive
                      </span>
                    </template>
                    <div
                      class="absolute bottom-0 z-10 w-full px-5 pb-6 text-white"
                    >
                      <a href="" class="block text-lg font-medium truncate">
                        {{ faker.name }}
                      </a>
                      <span class="mt-3 text-xs text-white/80">
                        {{ faker.category.name }}
                      </span>
                    </div>
                  </div>
                  <div class="pt-5">
                    <div
                      class="flex flex-col gap-3.5 mb-5 pb-5 mt-auto border-b border-dashed border-slate-300/70"
                    >
                      <div class="flex items-center">
                        <div class="text-slate-500">Category:</div>
                        <div class="ml-auto">
                          <div
                            class="flex items-center text-xs font-medium rounded-md text-success bg-success/10 border border-success/10 px-1.5 py-px"
                          >
                            <span class="-mt-px">
                              {{ faker.category.name }}
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="flex items-center">
                        <div class="text-slate-500">Rated:</div>
                        <div class="ml-auto">
                          <div class="flex items-center">
                            <div class="flex items-center">
                              <Lucide
                                icon="Star"
                                class="w-4 h-4 mr-1 text-pending fill-pending/30"
                              />
                              <Lucide
                                icon="Star"
                                class="w-4 h-4 mr-1 text-pending fill-pending/30"
                              />
                              <Lucide
                                icon="Star"
                                class="w-4 h-4 mr-1 text-pending fill-pending/30"
                              />
                              <Lucide
                                icon="Star"
                                class="w-4 h-4 mr-1 text-pending fill-pending/30"
                              />
                              <Lucide
                                icon="Star"
                                class="w-4 h-4 mr-1 text-slate-400 fill-slate/30"
                              />
                            </div>
                            <div class="ml-1 text-xs text-slate-500">
                              (4.5+)
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex items-center">
                        <div class="text-slate-500">Reviews:</div>
                        <div class="ml-auto">
                          <div class="flex justify-center">
                            <div class="w-6 h-6 image-fit zoom-in">
                              <Tippy
                                as="img"
                                alt="Tailwise - Admin Dashboard Template"
                                class="border-2 border-white rounded-full"
                                :src="reviews.fakeReviews()[0].user.photo"
                                :content="`${reviews.fakeReviews()[0].comment}`"
                              />
                            </div>
                            <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                              <Tippy
                                as="img"
                                alt="Tailwise - Admin Dashboard Template"
                                class="border-2 border-white rounded-full"
                                :src="reviews.fakeReviews()[0].user.photo"
                                :content="`${reviews.fakeReviews()[0].comment}`"
                              />
                            </div>
                            <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                              <Tippy
                                as="img"
                                alt="Tailwise - Admin Dashboard Template"
                                class="border-2 border-white rounded-full"
                                :src="reviews.fakeReviews()[0].user.photo"
                                :content="`${reviews.fakeReviews()[0].comment}`"
                              />
                            </div>
                            <div class="w-6 h-6 -ml-2 image-fit zoom-in">
                              <Tippy
                                as="img"
                                alt="Tailwise - Admin Dashboard Template"
                                class="border-2 border-white rounded-full"
                                :src="reviews.fakeReviews()[0].user.photo"
                                :content="`${reviews.fakeReviews()[0].comment}`"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <a
                        class="flex items-center mr-auto text-primary"
                        href="#"
                      >
                        <Lucide
                          icon="KanbanSquare"
                          class="w-4 h-4 stroke-[1.3] mr-1.5"
                        />
                        Preview
                      </a>
                      <a class="flex items-center mr-3" href="#">
                        <Lucide
                          icon="CheckSquare"
                          class="w-4 h-4 stroke-[1.3] mr-1.5"
                        />
                        Edit
                      </a>
                      <a class="flex items-center text-danger" href="#">
                        <Lucide
                          icon="Trash2"
                          class="w-4 h-4 stroke-[1.3] mr-1.5"
                        />
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
              </template>
            </div>
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
        </div>
      </div>
    </div>
  </div>
</template>
