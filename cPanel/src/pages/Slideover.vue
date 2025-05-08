<script setup lang="ts">
import Preview from "@/components/Base/Preview";
import { Menu, Slideover } from "@/components/Base/Headless";
import {
  FormLabel,
  FormInput,
  FormSelect,
  FormSwitch,
} from "@/components/Base/Form";
import Table from "@/components/Base/Table";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import { ref } from "vue";

const basicSlideoverPreview = ref(false);
const setBasicSlideoverPreview = (value: boolean) => {
  basicSlideoverPreview.value = value;
};
const smallSlideoverSizePreview = ref(false);
const setSmallSlideoverSizePreview = (value: boolean) => {
  smallSlideoverSizePreview.value = value;
};
const mediumSlideoverSizePreview = ref(false);
const setMediumSlideoverSizePreview = (value: boolean) => {
  mediumSlideoverSizePreview.value = value;
};
const largeSlideoverSizePreview = ref(false);
const setLargeSlideoverSizePreview = (value: boolean) => {
  largeSlideoverSizePreview.value = value;
};
const superlargeSlideoverSizePreview = ref(false);
const setSuperlargeSlideoverSizePreview = (value: boolean) => {
  superlargeSlideoverSizePreview.value = value;
};
const programmaticallySlideover = ref(false);
const setProgrammaticallySlideover = (value: boolean) => {
  programmaticallySlideover.value = value;
};
const buttonSlideoverPreview = ref(false);
const setButtonSlideoverPreview = (value: boolean) => {
  buttonSlideoverPreview.value = value;
};
const overlappingSlideoverPreview = ref(false);
const setOverlappingSlideoverPreview = (value: boolean) => {
  overlappingSlideoverPreview.value = value;
};
const nextOverlappingSlideoverPreview = ref(false);
const setNextOverlappingSlideoverPreview = (value: boolean) => {
  nextOverlappingSlideoverPreview.value = value;
};
const headerFooterSlideoverPreview = ref(false);
const setHeaderFooterSlideoverPreview = (value: boolean) => {
  headerFooterSlideoverPreview.value = value;
};
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Slide Over
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Elevate your web design with slideover components, versatile dialogs
          for custom content, sizing options, and more!
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
                <div class="text-[0.94rem] font-medium">Blank Slide Over</div>
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
                  The "Blank Slide Over" component is a versatile tool that
                  allows you to create customizable slide-over dialogs for
                  various purposes on your website. It provides a clean and
                  simple canvas for you to add your own content, making it
                  suitable for a wide range of use cases.
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
                      <!-- BEGIN: Slide Over Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setBasicSlideoverPreview(true);
                                }"
                        >
                          Show Slide Over
                        </Button>
                      </div>
                      <!-- END: Slide Over Toggle -->
                      <!-- BEGIN: Slide Over Content -->
                      <Slideover
                        :open="basicSlideoverPreview"
                        @close="
                          () => {
                            setBasicSlideoverPreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Blank Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome blank slide over!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Slide Over Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Slide Over Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setBasicSlideoverPreview(true);
                    }"
                          >
                            Show Slide Over
                          </Button>
                        </div>
                        <!-- END: Slide Over Toggle -->
                        <!-- BEGIN: Slide Over Content -->
                        <Slideover
                          :open="basicSlideoverPreview"
                          @close="
                            () => {
                              setBasicSlideoverPreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Blank Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome blank slide over!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Slide Over Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Whether you want to display additional information, gather
                  user input, or present important updates, the "Blank
                  Slideover" is a flexible solution that ensures your content
                  remains accessible and engaging. Explore the possibilities and
                  unlock new ways to interact with your audience using the
                  "Blank Slideover" component.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Slide Over Size</div>
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
                  The "Slideover Size" component allows you to control the
                  dimensions of your slide-over dialogs, ensuring that they are
                  visually appealing and perfectly tailored to your content.
                  With multiple size options available, you can choose the one
                  that best suits your specific use case.
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
                        <!-- BEGIN: Small Slide Over Toggle -->
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setSmallSlideoverSizePreview(true);
                                }"
                          class="mb-2 mr-1"
                        >
                          Show Small Slide Over
                        </Button>
                        <!-- END: Small Slide Over Toggle -->
                        <!-- BEGIN: Medium Slide Over Toggle -->
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setMediumSlideoverSizePreview(true);
                                }"
                          class="mb-2 mr-1"
                        >
                          Show Medium Slide Over
                        </Button>
                        <!-- END: Medium Slide Over Toggle -->
                        <!-- BEGIN: Large Slide Over Toggle -->
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setLargeSlideoverSizePreview(true);
                                }"
                          class="mb-2 mr-1"
                        >
                          Show Large Slide Over
                        </Button>
                        <!-- END: Large Slide Over Toggle -->
                        <!-- BEGIN: Super Large Slide Over Toggle -->
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setSuperlargeSlideoverSizePreview(true);
                                }"
                          class="mb-2 mr-1"
                        >
                          Show Superlarge Slide Over
                        </Button>
                        <!-- END: Super Large Slide Over Toggle -->
                      </div>
                      <!-- BEGIN: Small Slide Over Content -->
                      <Slideover
                        size="sm"
                        :open="smallSlideoverSizePreview"
                        @close="
                          () => {
                            setSmallSlideoverSizePreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Small Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome small slide over!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Small Slide Over Content -->
                      <!-- BEGIN: Medium Slide Over Content -->
                      <Slideover
                        :open="mediumSlideoverSizePreview"
                        @close="
                          () => {
                            setMediumSlideoverSizePreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Medium Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome medium slide over!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Medium Slide Over Content -->
                      <!-- BEGIN: Large Slide Over Content -->
                      <Slideover
                        size="lg"
                        :open="largeSlideoverSizePreview"
                        @close="
                          () => {
                            setLargeSlideoverSizePreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Large Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome large slide over!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Large Slide Over Content -->
                      <!-- BEGIN: Super Large Slide Over Content -->
                      <Slideover
                        size="xl"
                        :open="superlargeSlideoverSizePreview"
                        @close="
                          () => {
                            setSuperlargeSlideoverSizePreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Superlarge Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome superlarge slide over!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Super Large Slide Over Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="text-center">
                          <!-- BEGIN: Small Slide Over Toggle -->
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setSmallSlideoverSizePreview(true);
                    }"
                            class="mb-2 mr-1"
                          >
                            Show Small Slide Over
                          </Button>
                          <!-- END: Small Slide Over Toggle -->
                          <!-- BEGIN: Medium Slide Over Toggle -->
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setMediumSlideoverSizePreview(true);
                    }"
                            class="mb-2 mr-1"
                          >
                            Show Medium Slide Over
                          </Button>
                          <!-- END: Medium Slide Over Toggle -->
                          <!-- BEGIN: Large Slide Over Toggle -->
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setLargeSlideoverSizePreview(true);
                    }"
                            class="mb-2 mr-1"
                          >
                            Show Large Slide Over
                          </Button>
                          <!-- END: Large Slide Over Toggle -->
                          <!-- BEGIN: Super Large Slide Over Toggle -->
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setSuperlargeSlideoverSizePreview(true);
                    }"
                            class="mb-2 mr-1"
                          >
                            Show Superlarge Slide Over
                          </Button>
                          <!-- END: Super Large Slide Over Toggle -->
                        </div>
                        <!-- BEGIN: Small Slide Over Content -->
                        <Slideover
                          size="sm"
                          :open="smallSlideoverSizePreview"
                          @close="
                            () => {
                              setSmallSlideoverSizePreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Small Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome small slide over!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Small Slide Over Content -->
                        <!-- BEGIN: Medium Slide Over Content -->
                        <Slideover
                          :open="mediumSlideoverSizePreview"
                          @close="
                            () => {
                              setMediumSlideoverSizePreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Medium Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome medium slide over!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Medium Slide Over Content -->
                        <!-- BEGIN: Large Slide Over Content -->
                        <Slideover
                          size="lg"
                          :open="largeSlideoverSizePreview"
                          @close="
                            () => {
                              setLargeSlideoverSizePreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Large Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome large slide over!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Large Slide Over Content -->
                        <!-- BEGIN: Super Large Slide Over Content -->
                        <Slideover
                          size="xl"
                          :open="superlargeSlideoverSizePreview"
                          @close="
                            () => {
                              setSuperlargeSlideoverSizePreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Superlarge Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome superlarge slide over!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Super Large Slide Over Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Tailor the size of your slideover to create a user-friendly
                  and visually engaging experience. Whether you need a compact
                  notification or a spacious form, the "Slideover Size"
                  component gives you the flexibility to achieve your desired
                  layout. Explore the different size options and elevate your
                  website's user experience with the "Slideover Size" component.
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
                  Slide Over with Close Button
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
                  The "Slide Over with Close Button" component adds an extra
                  layer of user convenience to your slide-over dialogs. This
                  feature allows users to easily dismiss the slide-over by
                  clicking a close button, enhancing the overall user
                  experience.
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
                      <!-- BEGIN: Modal Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setButtonSlideoverPreview(true);
                                }"
                        >
                          Show Slide Over
                        </Button>
                      </div>
                      <!-- END: Modal Toggle -->
                      <!-- BEGIN: Modal Content -->
                      <Slideover
                        staticBackdrop
                        :open="buttonSlideoverPreview"
                        @close="
                          () => {
                            setButtonSlideoverPreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <a
                            @click="(event: MouseEvent) => {
                                    event.preventDefault();
                                    setButtonSlideoverPreview(false);
                                  }"
                            class="absolute top-0 left-0 right-auto mt-4 -ml-12"
                            href="#"
                          >
                            <Lucide icon="X" class="w-8 h-8 text-slate-400" />
                          </a>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Slide Over With Close Button
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description>
                            This is totally awesome slide over with close
                            button!
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Modal Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Modal Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setButtonSlideoverPreview(true);
                    }"
                          >
                            Show Slide Over
                          </Button>
                        </div>
                        <!-- END: Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        <Slideover
                          staticBackdrop
                          :open="buttonSlideoverPreview"
                          @close="
                            () => {
                              setButtonSlideoverPreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <a
                              @click="(event: MouseEvent) => {
                        event.preventDefault();
                        setButtonSlideoverPreview(false);
                      }"
                              class="absolute top-0 left-0 right-auto mt-4 -ml-12"
                              href="#"
                            >
                              <Lucide icon="X" class="w-8 h-8 text-slate-400" />
                            </a>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Slide Over With Close Button
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description>
                              This is totally awesome slide over with close
                              button!
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Modal Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Slide Over with Close Button" component enhances user
                  interaction by offering a clear and intuitive method for
                  closing the slide-over. It's particularly useful for scenarios
                  where users may want to quickly exit or minimize the dialog
                  without navigating away from the current page.
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
                  Overlapping Slide Over
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
                  The "Overlapping Slide Over" is a versatile feature that
                  allows you to create layered slide-over dialogs within your
                  web application. This feature is perfect for scenarios where
                  you need to present information or actions in a sequential
                  manner while keeping the user focused.
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
                      <!-- BEGIN: Slide Over Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setOverlappingSlideoverPreview(true);
                                }"
                        >
                          Show Slide Over
                        </Button>
                      </div>
                      <!-- END: Slide Over Toggle -->
                      <!-- BEGIN: Slide Over Content -->
                      <Slideover
                        :open="overlappingSlideoverPreview"
                        @close="
                          () => {
                            setOverlappingSlideoverPreview(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Overlapping Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description class="px-5 py-10">
                            <div class="text-center">
                              <div class="mb-5">
                                Click button bellow to show overlapping slide
                                over!
                              </div>
                              <!-- BEGIN: Overlapping Slide Over Toggle -->
                              <Button
                                as="a"
                                href="#"
                                variant="primary"
                                @click="(event: MouseEvent) => {
                                        event.preventDefault();
                                        setNextOverlappingSlideoverPreview(
                                          true
                                        );
                                      }"
                              >
                                Show Overlapping Slide Over
                              </Button>
                              <!-- END: Overlapping Slide Over Toggle -->
                              <!-- BEGIN: Overlapping Slide Over Content -->
                              <Slideover
                                :open="nextOverlappingSlideoverPreview"
                                @close="
                                  () => {
                                    setNextOverlappingSlideoverPreview(false);
                                  }
                                "
                              >
                                <Slideover.Panel>
                                  <Slideover.Title class="p-5">
                                    <h2 class="mr-auto text-base font-medium">
                                      Overlapping Slide Over
                                    </h2>
                                  </Slideover.Title>
                                  <Slideover.Description class="text-center">
                                    This is totally awesome overlapping slide
                                    over!
                                  </Slideover.Description>
                                </Slideover.Panel>
                              </Slideover>
                              <!-- END: Overlapping Slide Over Content -->
                            </div>
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Slide Over Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Slide Over Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setOverlappingSlideoverPreview(true);
                    }"
                          >
                            Show Slide Over
                          </Button>
                        </div>
                        <!-- END: Slide Over Toggle -->
                        <!-- BEGIN: Slide Over Content -->
                        <Slideover
                          :open="overlappingSlideoverPreview"
                          @close="
                            () => {
                              setOverlappingSlideoverPreview(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Overlapping Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description class="px-5 py-10">
                              <div class="text-center">
                                <div class="mb-5">
                                  Click button bellow to show overlapping slide
                                  over!
                                </div>
                                <!-- BEGIN: Overlapping Slide Over Toggle -->
                                <Button
                                  as="a"
                                  href="#"
                                  variant="primary"
                                  @click="(event: MouseEvent) => {
                            event.preventDefault();
                            setNextOverlappingSlideoverPreview(true);
                          }"
                                >
                                  Show Overlapping Slide Over
                                </Button>
                                <!-- END: Overlapping Slide Over Toggle -->
                                <!-- BEGIN: Overlapping Slide Over Content -->
                                <Slideover
                                  :open="nextOverlappingSlideoverPreview"
                                  @close="
                                    () => {
                                      setNextOverlappingSlideoverPreview(false);
                                    }
                                  "
                                >
                                  <Slideover.Panel>
                                    <Slideover.Title class="p-5">
                                      <h2 class="mr-auto text-base font-medium">
                                        Overlapping Slide Over
                                      </h2>
                                    </Slideover.Title>
                                    <Slideover.Description class="text-center">
                                      This is totally awesome overlapping slide
                                      over!
                                    </Slideover.Description>
                                  </Slideover.Panel>
                                </Slideover>
                                <!-- END: Overlapping Slide Over Content -->
                              </div>
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Slide Over Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Overlapping Slide Over" feature provides a user-friendly
                  way to present information or actions progressively, ensuring
                  that users can focus on one piece of content at a time. It's a
                  valuable tool for creating engaging user experiences and
                  guiding users through complex workflows. Explore the
                  possibilities of this feature to enhance your web
                  application's usability and interactivity.
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
                  Header & Footer Slide Over
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
                  The "Header & Footer Slide Over" component is a powerful tool
                  to create slide-over dialogs with customized headers and
                  footers. This feature enables you to present content to your
                  users while maintaining a consistent user interface and
                  providing additional functionality in the header and footer
                  sections.
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
                      <!-- BEGIN: Slide Over Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          href="#"
                          variant="primary"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setHeaderFooterSlideoverPreview(true);
                                }"
                        >
                          Show Slide Over
                        </Button>
                      </div>
                      <!-- END: Slide Over Toggle -->
                      <!-- BEGIN: Slide Over Content -->
                      <Slideover
                        staticBackdrop
                        :open="headerFooterSlideoverPreview"
                        @close="
                          () => {
                            setHeaderFooterSlideoverPreview(false);
                          }
                        "
                      >
                        <!-- BEGIN: Slide Over Header -->
                        <Slideover.Panel>
                          <a
                            @click="(event: MouseEvent) => {
                                    event.preventDefault();
                                    setHeaderFooterSlideoverPreview(false);
                                  }"
                            class="absolute top-0 left-0 right-auto mt-4 -ml-12"
                            href="#"
                          >
                            <Lucide icon="X" class="w-8 h-8 text-slate-400" />
                          </a>
                          <Slideover.Title>
                            <h2 class="mr-auto text-base font-medium">
                              Broadcast Message
                            </h2>
                            <Button
                              variant="outline-secondary"
                              class="hidden sm:flex"
                            >
                              <Lucide icon="File" class="w-4 h-4 mr-2" />
                              Download Docs
                            </Button>
                            <Menu class="sm:hidden">
                              <Menu.Button
                                as="a"
                                class="block w-5 h-5"
                                href="#"
                              >
                                <Lucide
                                  icon="MoreHorizontal"
                                  class="w-5 h-5 text-slate-500"
                                />
                              </Menu.Button>
                              <Menu.Items class="w-40">
                                <Menu.Item>
                                  <Lucide icon="File" class="w-4 h-4 mr-2" />
                                  Download Docs
                                </Menu.Item>
                              </Menu.Items>
                            </Menu>
                          </Slideover.Title>
                          <!-- END: Slide Over Header -->
                          <!-- BEGIN: Slide Over Body -->
                          <Slideover.Description>
                            <div>
                              <FormLabel htmlFor="modal-form-1">
                                From
                              </FormLabel>
                              <FormInput
                                id="modal-form-1"
                                type="text"
                                placeholder="example@gmail.com"
                              />
                            </div>
                            <div class="mt-3">
                              <FormLabel htmlFor="modal-form-2"> To </FormLabel>
                              <FormInput
                                id="modal-form-2"
                                type="text"
                                placeholder="example@gmail.com"
                              />
                            </div>
                            <div class="mt-3">
                              <FormLabel htmlFor="modal-form-3">
                                Subject
                              </FormLabel>
                              <FormInput
                                id="modal-form-3"
                                type="text"
                                placeholder="Important Meeting"
                              />
                            </div>
                            <div class="mt-3">
                              <FormLabel htmlFor="modal-form-4">
                                Has the Words
                              </FormLabel>
                              <FormInput
                                id="modal-form-4"
                                type="text"
                                placeholder="Job, Work, Documentation"
                              />
                            </div>
                            <div class="mt-3">
                              <FormLabel htmlFor="modal-form-5">
                                Doesn't Have
                              </FormLabel>
                              <FormInput
                                id="modal-form-5"
                                type="text"
                                placeholder="Job, Work, Documentation"
                              />
                            </div>
                            <div class="mt-3">
                              <FormLabel htmlFor="modal-form-6">
                                Size
                              </FormLabel>
                              <FormSelect id="modal-form-6">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                              </FormSelect>
                            </div>
                          </Slideover.Description>
                          <!-- END: Slide Over Body -->
                          <!-- BEGIN: Slide Over Footer -->
                          <Slideover.Footer>
                            <Button
                              variant="outline-secondary"
                              type="button"
                              @click="
                                () => {
                                  setHeaderFooterSlideoverPreview(false);
                                }
                              "
                              class="w-20 mr-1"
                            >
                              Cancel
                            </Button>
                            <Button
                              variant="primary"
                              type="button"
                              class="w-20"
                            >
                              Send
                            </Button>
                          </Slideover.Footer>
                        </Slideover.Panel>
                        <!-- END: Slide Over Footer -->
                      </Slideover>
                      <!-- END: Slide Over Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Slide Over Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            href="#"
                            variant="primary"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setHeaderFooterSlideoverPreview(true);
                    }"
                          >
                            Show Slide Over
                          </Button>
                        </div>
                        <!-- END: Slide Over Toggle -->
                        <!-- BEGIN: Slide Over Content -->
                        <Slideover
                          staticBackdrop
                          :open="headerFooterSlideoverPreview"
                          @close="
                            () => {
                              setHeaderFooterSlideoverPreview(false);
                            }
                          "
                        >
                          <!-- BEGIN: Slide Over Header -->
                          <Slideover.Panel>
                            <a
                              @click="(event: MouseEvent) => {
                        event.preventDefault();
                        setHeaderFooterSlideoverPreview(false);
                      }"
                              class="absolute top-0 left-0 right-auto mt-4 -ml-12"
                              href="#"
                            >
                              <Lucide icon="X" class="w-8 h-8 text-slate-400" />
                            </a>
                            <Slideover.Title>
                              <h2 class="mr-auto text-base font-medium">
                                Broadcast Message
                              </h2>
                              <Button
                                variant="outline-secondary"
                                class="hidden sm:flex"
                              >
                                <Lucide icon="File" class="w-4 h-4 mr-2" />
                                Download Docs
                              </Button>
                              <Menu class="sm:hidden">
                                <Menu.Button
                                  as="a"
                                  class="block w-5 h-5"
                                  href="#"
                                >
                                  <Lucide
                                    icon="MoreHorizontal"
                                    class="w-5 h-5 text-slate-500"
                                  />
                                </Menu.Button>
                                <Menu.Items class="w-40">
                                  <Menu.Item>
                                    <Lucide icon="File" class="w-4 h-4 mr-2" />
                                    Download Docs
                                  </Menu.Item>
                                </Menu.Items>
                              </Menu>
                            </Slideover.Title>
                            <!-- END: Slide Over Header -->
                            <!-- BEGIN: Slide Over Body -->
                            <Slideover.Description>
                              <div>
                                <FormLabel htmlFor="modal-form-1">
                                  From
                                </FormLabel>
                                <FormInput
                                  id="modal-form-1"
                                  type="text"
                                  placeholder="example@gmail.com"
                                />
                              </div>
                              <div class="mt-3">
                                <FormLabel htmlFor="modal-form-2">
                                  To
                                </FormLabel>
                                <FormInput
                                  id="modal-form-2"
                                  type="text"
                                  placeholder="example@gmail.com"
                                />
                              </div>
                              <div class="mt-3">
                                <FormLabel htmlFor="modal-form-3">
                                  Subject
                                </FormLabel>
                                <FormInput
                                  id="modal-form-3"
                                  type="text"
                                  placeholder="Important Meeting"
                                />
                              </div>
                              <div class="mt-3">
                                <FormLabel htmlFor="modal-form-4">
                                  Has the Words
                                </FormLabel>
                                <FormInput
                                  id="modal-form-4"
                                  type="text"
                                  placeholder="Job, Work, Documentation"
                                />
                              </div>
                              <div class="mt-3">
                                <FormLabel htmlFor="modal-form-5">
                                  Doesn't Have
                                </FormLabel>
                                <FormInput
                                  id="modal-form-5"
                                  type="text"
                                  placeholder="Job, Work, Documentation"
                                />
                              </div>
                              <div class="mt-3">
                                <FormLabel htmlFor="modal-form-6">
                                  Size
                                </FormLabel>
                                <FormSelect id="modal-form-6">
                                  <option>10</option>
                                  <option>25</option>
                                  <option>35</option>
                                  <option>50</option>
                                </FormSelect>
                              </div>
                            </Slideover.Description>
                            <!-- END: Slide Over Body -->
                            <!-- BEGIN: Slide Over Footer -->
                            <Slideover.Footer>
                              <Button
                                variant="outline-secondary"
                                type="button"
                                @click="
                                  () => {
                                    setHeaderFooterSlideoverPreview(false);
                                  }
                                "
                                class="w-20 mr-1"
                              >
                                Cancel
                              </Button>
                              <Button
                                variant="primary"
                                type="button"
                                class="w-20"
                              >
                                Send
                              </Button>
                            </Slideover.Footer>
                          </Slideover.Panel>
                          <!-- END: Slide Over Footer -->
                        </Slideover>
                        <!-- END: Slide Over Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Header & Footer Slide Over" component empowers you to
                  create dynamic slide-over dialogs that are both informative
                  and interactive. You can easily tailor the header and footer
                  sections to suit your application's needs, making it a
                  versatile solution for a wide range of use cases. Enhance your
                  user experience by presenting content with clarity and
                  providing users with intuitive actions through this feature.
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
                  Programmatically Show/Hide Slide Over
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
                  The "Programmatically Show/Hide Slide Over" feature provides
                  you with the capability to control the visibility of the
                  slide-over dialog through your code. This functionality allows
                  you to trigger the opening, closing, or toggling of the
                  slide-over programmatically, providing a seamless and
                  interactive user experience.
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
                      <!-- BEGIN: Show Slide Over Toggle -->
                      <div class="text-center">
                        <Button
                          as="a"
                          id="programmatically-show-slideover"
                          href="#"
                          variant="primary"
                          class="mb-2 mr-1"
                          @click="(event: MouseEvent) => {
                                  event.preventDefault();
                                  setProgrammaticallySlideover(true);
                                }"
                        >
                          Show Slide Over
                        </Button>
                      </div>
                      <!-- END: Show Slide Over Toggle -->
                      <!-- BEGIN: Slide Over Content -->
                      <Slideover
                        :open="programmaticallySlideover"
                        @close="
                          () => {
                            setProgrammaticallySlideover(false);
                          }
                        "
                      >
                        <Slideover.Panel>
                          <Slideover.Title class="p-5">
                            <h2 class="mr-auto text-base font-medium">
                              Programmatically Show/Hide Slide Over
                            </h2>
                          </Slideover.Title>
                          <Slideover.Description class="p-10 text-center">
                            <!-- BEGIN: Hide Slide Over Toggle -->
                            <Button
                              as="a"
                              id="programmatically-hide-slideover"
                              href="#"
                              variant="primary"
                              class="mr-1"
                              @click="(event: MouseEvent) => {
                                      event.preventDefault();
                                      setProgrammaticallySlideover(false);
                                    }"
                            >
                              Hide Slide Over
                            </Button>
                            <!-- END: Hide Slide Over Toggle -->
                            <!-- BEGIN: Toggle Slide Over Toggle -->
                            <Button
                              as="a"
                              id="programmatically-toggle-slideover"
                              href="#"
                              variant="primary"
                              class="mt-2 mr-1 sm:mt-0"
                              @click="(event: MouseEvent) => {
                                      event.preventDefault();
                                      setProgrammaticallySlideover(
                                        !programmaticallySlideover
                                      );
                                    }"
                            >
                              Toggle Slide Over
                            </Button>
                            <!-- END: Toggle Slide Over Toggle -->
                          </Slideover.Description>
                        </Slideover.Panel>
                      </Slideover>
                      <!-- END: Slide Over Content -->
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <!-- BEGIN: Show Slide Over Toggle -->
                        <div class="text-center">
                          <Button
                            as="a"
                            id="programmatically-show-slideover"
                            href="#"
                            variant="primary"
                            class="mb-2 mr-1"
                            @click="(event: MouseEvent) => {
                      event.preventDefault();
                      setProgrammaticallySlideover(true);
                    }"
                          >
                            Show Slide Over
                          </Button>
                        </div>
                        <!-- END: Show Slide Over Toggle -->
                        <!-- BEGIN: Slide Over Content -->
                        <Slideover
                          :open="programmaticallySlideover"
                          @close="
                            () => {
                              setProgrammaticallySlideover(false);
                            }
                          "
                        >
                          <Slideover.Panel>
                            <Slideover.Title class="p-5">
                              <h2 class="mr-auto text-base font-medium">
                                Programmatically Show/Hide Slide Over
                              </h2>
                            </Slideover.Title>
                            <Slideover.Description class="p-10 text-center">
                              <!-- BEGIN: Hide Slide Over Toggle -->
                              <Button
                                as="a"
                                id="programmatically-hide-slideover"
                                href="#"
                                variant="primary"
                                class="mr-1"
                                @click="(event: MouseEvent) => {
                          event.preventDefault();
                          setProgrammaticallySlideover(false);
                        }"
                              >
                                Hide Slide Over
                              </Button>
                              <!-- END: Hide Slide Over Toggle -->
                              <!-- BEGIN: Toggle Slide Over Toggle -->
                              <Button
                                as="a"
                                id="programmatically-toggle-slideover"
                                href="#"
                                variant="primary"
                                class="mt-2 mr-1 sm:mt-0"
                                @click="(event: MouseEvent) => {
                          event.preventDefault();
                          setProgrammaticallySlideover(
                            !programmaticallySlideover
                          );
                        }"
                              >
                                Toggle Slide Over
                              </Button>
                              <!-- END: Toggle Slide Over Toggle -->
                            </Slideover.Description>
                          </Slideover.Panel>
                        </Slideover>
                        <!-- END: Slide Over Content -->
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Programmatically Show/Hide Slide Over" functionality
                  enhances your control over the slide-over dialog, making it a
                  dynamic and responsive element in your user interface. By
                  using these programmatic methods, you can create engaging user
                  experiences and tailor the slide-over's visibility to suit
                  your application's needs. Whether it's showing additional
                  information, capturing user input, or providing context-based
                  interactions, this feature empowers you to take full control
                  of your slide-over dialogs.
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
                  <div class="-mt-px">Slideover</div>
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
                          The HTML element type to be used for the Slideover
                          (default is "div").
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`open`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Indicates whether the Slideover is open or closed
                          (default is false).
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onClose`</Table.Td>
                        <Table.Td>`function`</Table.Td>
                        <Table.Td>
                          A function to be called when the Slideover is closed.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`staticBackdrop`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          If true, the Slideover backdrop remains static when
                          the Slideover is closed (default is false).
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`size`</Table.Td>
                        <Table.Td>`Size`</Table.Td>
                        <Table.Td>
                          The size of the Slideover, which can be "sm," "md,"
                          "lg," or "xl" (default is "md").
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
                  <div class="-mt-px">Slideover.Panel</div>
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
                          The HTML element type to be used for the Slideover
                          panel (default is "div").
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
                  <div class="-mt-px">Slideover.Title</div>
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
                          The HTML element type to be used for the Slideover
                          title (default is "div").
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
                  <div class="-mt-px">Slideover.Description</div>
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
                          The HTML element type to be used for the Slideover
                          description (default is "div").
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
                  <div class="-mt-px">Slideover.Footer</div>
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
                          The HTML element type to be used for the Slideover
                          footer (default is "div").
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
                <a class="block -mt-px truncate" href=""> Blank Slide Over </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Slide Over Size </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Slide Over with Close Button
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Overlapping Slide Over
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Header & Footer Slide Over
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Programmatically Show/Hide Slide Over
                </a>
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
