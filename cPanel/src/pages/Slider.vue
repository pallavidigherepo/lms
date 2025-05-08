<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import TinySlider from "@/components/Base/TinySlider";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
import products from "@/fakers/products";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Slider
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Explore the world of interactive sliders with our Slider component.
          Engage users, gather input, and enhance user experiences effortlessly.
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
                <div class="text-[0.94rem] font-medium">Single Item</div>
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
                  The "Tiny Slider" component is a lightweight and responsive
                  slider/carousel library for displaying images or content in a
                  slideshow format. This section focuses on using Tiny Slider to
                  create a simple single-item slider, which is useful for
                  showcasing one piece of content at a time, such as a featured
                  image or a product.
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
                      <div class="mx-6">
                        <TinySlider
                          :options="{
                            controls: true,
                          }"
                        >
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                1
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                2
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                3
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                4
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                5
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                6
                              </h3>
                            </div>
                          </div>
                        </TinySlider>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {`
                        <div class="mx-6">
                          <TinySlider
                            :options="{
                              controls: true,
                            }"
                          >
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  1
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  2
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  3
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  4
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  5
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  6
                                </h3>
                              </div>
                            </div>
                          </TinySlider>
                        </div>
                        `}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The single-item slider created using Tiny Slider is an
                  excellent choice when you need to display content one item at
                  a time in a visually appealing and responsive manner. You can
                  easily integrate this slider into your web application to
                  showcase featured images, products, or any other content that
                  benefits from a carousel-style presentation.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Multiple Item</div>
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
                  The "Tiny Slider" component allows you to create responsive
                  and feature-rich sliders/carousels to display multiple items
                  simultaneously. This section focuses on using Tiny Slider to
                  create a multiple-item slider, which is ideal for showcasing a
                  collection of images, products, or content in a compact and
                  visually appealing format.
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
                      <div class="mx-6">
                        <TinySlider
                          :options="{
                            autoplay: false,
                            controls: true,
                            items: 1,
                            responsive: {
                              600: {
                                items: 3,
                              },
                              480: {
                                items: 2,
                              },
                            },
                          }"
                        >
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                1
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                2
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                3
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                4
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                5
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                6
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                7
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                8
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                9
                              </h3>
                            </div>
                          </div>
                        </TinySlider>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {`
                        <div class="mx-6">
                          <TinySlider
                            :options="{
                              autoplay: false,
                              controls: true,
                              items: 1,
                              responsive: {
                                600: {
                                  items: 3,
                                },
                                480: {
                                  items: 2,
                                },
                              },
                            }"
                          >
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  1
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  2
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  3
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  4
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  5
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  6
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  7
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  8
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  9
                                </h3>
                              </div>
                            </div>
                          </TinySlider>
                        </div>
                        `}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The multiple-item slider created using Tiny Slider is a
                  versatile component for showcasing collections of content,
                  images, or products in a visually appealing and responsive
                  manner. By following the steps outlined above and customizing
                  the slider settings to meet your specific needs, you can
                  enhance your website or application with an interactive and
                  user-friendly carousel.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Responsive Display</div>
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
                  The "Tiny Slider" component provides an easy way to create
                  responsive sliders and carousels that adapt to various screen
                  sizes. This section focuses on configuring Tiny Slider for
                  responsive display, ensuring that your slider looks and
                  functions seamlessly on both desktop and mobile devices.
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
                      <div class="pb-8 mx-6">
                        <TinySlider
                          :options="{
                            autoplay: false,
                            controls: true,
                            items: 1,
                            nav: true,
                            responsive: {
                              600: {
                                items: 3,
                              },
                              480: {
                                items: 2,
                              },
                            },
                          }"
                        >
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                1
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                2
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                3
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                4
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                5
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                6
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                7
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                8
                              </h3>
                            </div>
                          </div>
                        </TinySlider>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {`
                        <div class="pb-8 mx-6">
                          <TinySlider
                            :options="{
                              autoplay: false,
                              controls: true,
                              items: 1,
                              nav: true,
                              responsive: {
                                600: {
                                  items: 3,
                                },
                                480: {
                                  items: 2,
                                },
                              },
                            }"
                          >
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  1
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  2
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  3
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  4
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  5
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  6
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  7
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  8
                                </h3>
                              </div>
                            </div>
                          </TinySlider>
                        </div>
                        `}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  By configuring Tiny Slider with responsive settings, you
                  ensure that your slider adapts gracefully to different devices
                  and screen sizes. This flexibility enhances the user
                  experience and ensures that your content looks stunning on
                  both desktop and mobile platforms.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Center Mode</div>
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
                  Center mode is a popular slider configuration that places the
                  active slide in the center of the slider container, with
                  partially visible slides on each side. This creates an
                  engaging and visually appealing carousel effect. This section
                  demonstrates how to configure Tiny Slider to achieve center
                  mode.
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
                      <div class="mx-6">
                        <TinySlider
                          :options="{
                            autoplay: false,
                            controls: true,
                            center: true,
                            items: 1,
                            responsive: {
                              600: {
                                items: 2,
                              },
                            },
                          }"
                        >
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                1
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                2
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                3
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                4
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                5
                              </h3>
                            </div>
                          </div>
                          <div class="h-32 px-2">
                            <div
                              class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                            >
                              <h3
                                class="flex items-center justify-center h-full text-2xl font-medium"
                              >
                                6
                              </h3>
                            </div>
                          </div>
                        </TinySlider>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {`
                        <div class="mx-6">
                          <TinySlider
                            :options="{
                              autoplay: false,
                              controls: true,
                              center: true,
                              items: 1,
                              responsive: {
                                600: {
                                  items: 2,
                                },
                              },
                            }"
                          >
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  1
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  2
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  3
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  4
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  5
                                </h3>
                              </div>
                            </div>
                            <div class="h-32 px-2">
                              <div
                                class="h-full rounded-md bg-slate-100 dark:bg-darkmode-400"
                              >
                                <h3
                                  class="flex items-center justify-center h-full text-2xl font-medium"
                                >
                                  6
                                </h3>
                              </div>
                            </div>
                          </TinySlider>
                        </div>
                        `}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Center mode is a popular slider configuration that places the
                  active slide in the center of the slider container, with
                  partially visible slides on each side. This creates an
                  engaging and visually appealing carousel effect. This section
                  demonstrates how to configure Tiny Slider to achieve center
                  mode.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Fade Animation</div>
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
                  Fade animation is a sleek and elegant way to transition
                  between slides in a slider. Tiny Slider provides a simple
                  configuration to achieve a fade effect when moving from one
                  slide to another. This section demonstrates how to set up Tiny
                  Slider with fade animation.
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
                      <div class="pb-8 mx-6">
                        <TinySlider
                          :options="{
                            mode: 'gallery',
                            controls: true,
                            nav: true,
                            speed: 500,
                          }"
                        >
                          <div class="h-64 px-2">
                            <div
                              class="h-full overflow-hidden rounded-md image-fit"
                            >
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                :src="products.fakeProducts()[0].images[0].path"
                              />
                            </div>
                          </div>
                          <div class="h-64 px-2">
                            <div
                              class="h-full overflow-hidden rounded-md image-fit"
                            >
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                :src="products.fakeProducts()[1].images[0].path"
                              />
                            </div>
                          </div>
                          <div class="h-64 px-2">
                            <div
                              class="h-full overflow-hidden rounded-md image-fit"
                            >
                              <img
                                alt="Tailwise - Admin Dashboard Template"
                                :src="products.fakeProducts()[2].images[0].path"
                              />
                            </div>
                          </div>
                        </TinySlider>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {`
                        <div class="pb-8 mx-6">
                          <TinySlider
                            :options="{
                              mode: 'gallery',
                              controls: true,
                              nav: true,
                              speed: 500,
                            }"
                          >
                            <div class="h-64 px-2">
                              <div
                                class="h-full overflow-hidden rounded-md image-fit"
                              >
                                <img
                                  alt="Tailwise - Admin Dashboard Template"
                                  :src="
                                    products.fakeProducts()[0].images[0].path
                                  "
                                />
                              </div>
                            </div>
                            <div class="h-64 px-2">
                              <div
                                class="h-full overflow-hidden rounded-md image-fit"
                              >
                                <img
                                  alt="Tailwise - Admin Dashboard Template"
                                  :src="
                                    products.fakeProducts()[1].images[0].path
                                  "
                                />
                              </div>
                            </div>
                            <div class="h-64 px-2">
                              <div
                                class="h-full overflow-hidden rounded-md image-fit"
                              >
                                <img
                                  alt="Tailwise - Admin Dashboard Template"
                                  :src="
                                    products.fakeProducts()[2].images[0].path
                                  "
                                />
                              </div>
                            </div>
                          </TinySlider>
                        </div>
                        `}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The fade animation in Tiny Slider provides a smooth and
                  visually appealing way to transition between slides. It's
                  particularly effective for sliders that need to convey a sense
                  of elegance and style. With fade animation enabled, your
                  slider will seamlessly fade in and out between slides,
                  creating an engaging user experience.
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
                  <div class="-mt-px">TinySlider</div>
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
                          `(el: TinySliderElement) =&gt; void`
                        </Table.Td>
                        <Table.Td>
                          A function that receives a reference to the TinySlider
                          container element.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`options`</Table.Td>
                        <Table.Td>`TinySliderSettings`</Table.Td>
                        <Table.Td>
                          The settings and configuration options for the
                          TinySlider. Defaults to an empty object.
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
                <a class="block -mt-px truncate" href=""> Single Item </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Multiple Item </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Responsive Display
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Center Mode </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Fade Animation </a>
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
