<script setup lang="ts">
import _ from "lodash";
import { ref } from "vue";
import Table from "@/components/Base/Table";
import TomSelect from "@/components/Base/TomSelect";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";

const select = ref("1");
  const selectMultiple = ref(["1", "3"]);
  const selectHeader = ref(["2", "3", "5"]);
</script>

<template>
    <div class="grid grid-cols-12 gap-y-10 gap-x-6">
      <div class="col-span-12">
        <div class="flex items-center h-10"> 
          <div class="text-lg font-medium group-[.mode--light]:text-white">
            Tom Select
          </div>
          <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
            •
          </div>
          <div class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block">
            Discover the power of our Tom Select component for creating
            versatile and user-friendly select inputs in your web applications.
          </div>
        </div>
        <div class="mt-3.5 grid grid-cols-12 xl:grid-cols-10 gap-y-7 lg:gap-y-10 gap-x-6">
          <div class="relative flex flex-col col-span-12 lg:col-span-9 xl:col-span-8 gap-y-7">
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">
                        Basic Select
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
                        The "Basic Select" component provides a simple dropdown
                        menu for selecting options from a list. It's a
                        fundamental UI element for collecting user input in the
                        form of a single choice from multiple options.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <!-- BEGIN: Basic Select -->
                            <div>
                              <label>Basic</label>
                              <div class="mt-2">
                                <TomSelect
                                  v-model="select"
                                  :options="{
                                    placeholder: 'Select your favorite actors',
                                  }"
                                  class="w-full"
                                >
                                  <option value="1">Leonardo DiCaprio</option>
                                  <option value="2">Johnny Deep</option>
                                  <option value="3">Robert Downey, Jr</option>
                                  <option value="4">Samuel L. Jackson</option>
                                  <option value="5">Morgan Freeman</option>
                                </TomSelect>
                              </div>
                            </div>
                            <!-- END: Basic Select -->
                            <!-- BEGIN: Nested Select -->
                            <div class="mt-3">
                              <label>Nested</label>
                              <div class="mt-2">
                                <TomSelect
                                    v-model="select"
                                    :options="{
                                    placeholder: 'Select your favorite actors',
                                  }"
                                  class="w-full"
                                >
                                  <optgroup label="American Actors">
                                    <option value="1">Leonardo DiCaprio</option>
                                    <option value="2">Johnny Deep</option>
                                    <option value="3">Robert Downey, Jr</option>
                                    <option value="4">Samuel L. Jackson</option>
                                    <option value="5">Morgan Freeman</option>
                                  </optgroup>
                                  <optgroup label="American Actresses">
                                    <option value="6">
                                      Scarlett Johansson
                                    </option>
                                    <option value="7">Jessica Alba</option>
                                    <option value="8">Jennifer Lawrence</option>
                                    <option value="9">Emma Stone</option>
                                    <option value="10">Angelina Jolie</option>
                                  </optgroup>
                                </TomSelect>
                              </div>
                            </div>
                            <!-- END: Nested Select -->
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <!-- BEGIN: Basic Select -->
              <div>
                <label>Basic</label>
                <div class="mt-2">
                  <TomSelect
                    v-model="select"
                    :options="{
                      placeholder: 'Select your favorite actors',
                    }"
                    class="w-full"
                  >
                    <option value="1">Leonardo DiCaprio</option>
                    <option value="2">Johnny Deep</option>
                    <option value="3">Robert Downey, Jr</option>
                    <option value="4">Samuel L. Jackson</option>
                    <option value="5">Morgan Freeman</option>
                  </TomSelect>
                </div>
              </div>
              <!-- END: Basic Select -->
              <!-- BEGIN: Nested Select -->
              <div class="mt-3">
                <label>Nested</label>
                <div class="mt-2">
                  <TomSelect
                    v-model="select"
                    :options="{
                      placeholder: 'Select your favorite actors',
                    }"
                    class="w-full"
                  >
                    <optgroup label="American Actors">
                      <option value="1">Leonardo DiCaprio</option>
                      <option value="2">Johnny Deep</option>
                      <option value="3">Robert Downey, Jr</option>
                      <option value="4">Samuel L. Jackson</option>
                      <option value="5">Morgan Freeman</option>
                    </optgroup>
                    <optgroup label="American Actresses">
                      <option value="6">Scarlett Johansson</option>
                      <option value="7">Jessica Alba</option>
                      <option value="8">Jennifer Lawrence</option>
                      <option value="9">Emma Stone</option>
                      <option value="10">Angelina Jolie</option>
                    </optgroup>
                  </TomSelect>
                </div>
              </div>
              <!-- END: Nested Select -->
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        The "Basic Select" component provides a straightforward
                        way to incorporate dropdown menus into your web
                        application. By following the steps outlined above, you
                        can easily create and customize dropdowns to collect
                        user input or make selections from a list of options.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">
                        Multiple Select
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
                        The "Multiple Select" component allows users to select
                        multiple options from a list. It's a versatile UI
                        element often used in scenarios where users need to make
                        multiple selections, such as choosing multiple items
                        from a list of available options.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <TomSelect
                              v-model="selectMultiple"
                              :options="{
                                placeholder: 'Select your favorite actors',
                              }"
                              class="w-full"
                              multiple
                            >
                              <option value="1">Leonardo DiCaprio</option>
                              <option value="2">Johnny Deep</option>
                              <option value="3">Robert Downey, Jr</option>
                              <option value="4">Samuel L. Jackson</option>
                              <option value="5">Morgan Freeman</option>
                            </TomSelect>
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <TomSelect
                v-model="selectMultiple"
                :options="{
                placeholder: 'Select your favorite actors',
                }"
                class="w-full"
                multiple
              >
                <option value="1">Leonardo DiCaprio</option>
                <option value="2">Johnny Deep</option>
                <option value="3">Robert Downey, Jr</option>
                <option value="4">Samuel L. Jackson</option>
                <option value="5">Morgan Freeman</option>
              </TomSelect>
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        The "Multiple Select" component using TomSelect provides
                        an easy and user-friendly way for users to make multiple
                        selections from a list of options. It's highly
                        customizable and can be adapted to various use cases in
                        your web application.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">Header</div>
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
                        The "TomSelect" component is a versatile select input
                        library that allows you to create customized dropdowns
                        and multi-select inputs. In this section, we'll explore
                        how to enhance your "TomSelect" component by adding a
                        header to the dropdown. This can be particularly useful
                        when you want to provide context or group items within
                        the dropdown.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <TomSelect
                            v-model="selectHeader"
                              :options="{
                                placeholder: 'Select your favorite actors',
                                plugins: {
                                  dropdown_header: {
                                    title: 'Actors',
                                  },
                                },
                              }"
                              class="w-full"
                              multiple
                            >
                              <option value="1">Leonardo DiCaprio</option>
                              <option value="2">Johnny Deep</option>
                              <option value="3">Robert Downey, Jr</option>
                              <option value="4">Samuel L. Jackson</option>
                              <option value="5">Morgan Freeman</option>
                            </TomSelect>
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <TomSelect
                v-model="selectHeader"
                :options="{
                  placeholder: 'Select your favorite actors',
                  plugins: {
                    dropdown_header: {
                      title: "Actors",
                    },
                  },
                }"
                class="w-full"
                multiple
              >
                <option value="1">Leonardo DiCaprio</option>
                <option value="2">Johnny Deep</option>
                <option value="3">Robert Downey, Jr</option>
                <option value="4">Samuel L. Jackson</option>
                <option value="5">Morgan Freeman</option>
              </TomSelect>
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        By adding a header to your "TomSelect" component, you
                        can provide valuable context and grouping for the
                        options within the dropdown. This enhances the user
                        experience and helps users make informed selections.
                        Customize the header title to match your application's
                        requirements and design. The "TomSelect" library offers
                        various plugins to further extend the functionality of
                        your select inputs.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">
                        Input Group
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
                        The "TomSelect" component, combined with an input group,
                        allows you to create a stylish and functional select
                        input with a custom icon or character preceding it. This
                        is useful when you want to provide additional context to
                        the select input.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <div class="flex">
                              <div class="z-30 flex items-center justify-center w-10 -mr-1 border rounded-l bg-slate-100 text-slate-600 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                @
                              </div>
                              <TomSelect
                                v-model="select"
                                class="w-full"
                              >
                                <option value="1">Leonardo DiCaprio</option>
                                <option value="2">Johnny Deep</option>
                                <option value="3">Robert Downey, Jr</option>
                                <option value="4">Samuel L. Jackson</option>
                                <option value="5">Morgan Freeman</option>
                              </TomSelect>
                            </div>
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <div class="flex">
                <div class="flex">
                  <div
                    class="z-30 flex items-center justify-center w-10 -mr-1 border rounded-l bg-slate-100 text-slate-600 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"
                  >
                    @
                  </div>
                  <TomSelect
                  v-model="select"
                    class="w-full"
                  >
                    <option value="1">Leonardo DiCaprio</option>
                    <option value="2">Johnny Deep</option>
                    <option value="3">Robert Downey, Jr</option>
                    <option value="4">Samuel L. Jackson</option>
                    <option value="5">Morgan Freeman</option>
                  </TomSelect>
                </div>
              </div>
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        Combining the "TomSelect" component with an input group
                        allows you to create a select input with a personalized
                        icon or character preceding it. This feature enhances
                        the user interface and provides a unique visual
                        representation for your select input, making it more
                        user-friendly and visually appealing.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">Disabled</div>
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
                        The "TomSelect" component can be easily configured to be
                        disabled, preventing users from interacting with it.
                        This feature is useful when you want to display a select
                        input that should not be altered or selected by the
                        user.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <TomSelect
                            v-model="select"
                              class="w-full"
                              disabled
                            >
                              <option value="1">Leonardo DiCaprio</option>
                              <option value="2">Johnny Deep</option>
                              <option value="3">Robert Downey, Jr</option>
                              <option value="4">Samuel L. Jackson</option>
                              <option value="5">Morgan Freeman</option>
                            </TomSelect>
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <TomSelect
              v-model="select"
                class="w-full"
                disabled
              >
                <option value="1">Leonardo DiCaprio</option>
                <option value="2">Johnny Deep</option>
                <option value="3">Robert Downey, Jr</option>
                <option value="4">Samuel L. Jackson</option>
                <option value="5">Morgan Freeman</option>
              </TomSelect>
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        The "TomSelect" component can be easily disabled by
                        setting the disabled attribute to true, making it
                        unselectable and preventing user interaction. This
                        feature is particularly useful when you want to display
                        a select input that is for informational purposes only
                        and should not be altered by users. You can customize
                        the appearance and content of the disabled "TomSelect"
                        to fit your application's style and layout. Incorporate
                        it into your application as needed to create a
                        user-friendly and accessible interface.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <Preview v-slot="{toggle}">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                      <div class="text-[0.94rem] font-medium">
                        Disabled Option
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
                        The "TomSelect" component allows you to create select
                        inputs with disabled options. Disabled options are
                        elements within the dropdown menu that cannot be
                        selected by users. This can be helpful for providing
                        additional context or indicating unavailable choices
                        within a select input.
                      </p>
                      <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                        <div class="absolute left-0 px-3 ml-4 -mt-2 text-xs uppercase bg-white text-slate-500 dark:bg-darkmode-600">
                          <div class="-mt-px">Example code / preview</div>
                        </div>
                        <div class="px-5 py-2 mt-4 flex flex-col gap-3.5">
                          <Preview.Panel>
                            <TomSelect
                            v-model="select"
                              class="w-full"
                            >
                              <option value="1" disabled>
                                Leonardo DiCaprio
                              </option>
                              <option value="2">Johnny Deep</option>
                              <option value="3">Robert Downey, Jr</option>
                              <option value="4" disabled>
                                Samuel L. Jackson
                              </option>
                              <option value="5">Morgan Freeman</option>
                            </TomSelect>
                          </Preview.Panel>
                          <Preview.Panel type="source">
                            <Preview.Highlight>
                              {{`
              <TomSelect
              v-model="select"
                class="w-full"
              >
                <option value="1" disabled>Leonardo DiCaprio</option>
                <option value="2">Johnny Deep</option>
                <option value="3">Robert Downey, Jr</option>
                <option value="4" disabled>Samuel L. Jackson</option>
                <option value="5">Morgan Freeman</option>
              </TomSelect>
              `}}
                            </Preview.Highlight>
                        </Preview.Panel>
                        </div>
                      </div>
                      <p class="leading-relaxed">
                        The "TomSelect" component allows you to include disabled
                        options within a select input. These disabled options
                        are displayed in the dropdown menu but cannot be
                        selected by users. You can use disabled options to
                        provide additional information or indicate choices that
                        are currently unavailable.
                      </p>
                    </div>
              </Preview>
            </div>
            <div class="flex flex-col p-5 box box--stacked">
              <div class="flex flex-col pb-5 mb-5 border-b border-dashed sm:items-center sm:flex-row border-slate-300/70">
                <div class="text-[0.94rem] font-medium">Component API</div>
              </div>
              <div>
                <p class="leading-relaxed">
                  In this section, you will find detailed information about the
                  available props, classes, and options that can be used with
                  the component. Understanding these properties is essential for
                  customizing and configuring the component to suit your
                  specific requirements.
                </p>
                <p class="mt-2 leading-relaxed">
                  Below is a list of props that can be passed to the component:
                </p>
                <div class="border rounded-[0.6rem] dark:border-darkmode-400 relative mt-7 mb-4 border-slate-200/80">
                  <div class="absolute left-0 px-3 ml-4 -mt-2.5 font-medium bg-white text-slate-500 dark:bg-darkmode-600">
                    <div class="-mt-px">TomSelect</div>
                  </div>
                  <div class="px-5 pt-2 pb-5 mt-2.5 flex flex-col gap-3.5 leading-relaxed overflow-x-auto">
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
                          <Table.Td>`value`</Table.Td>
                          <Table.Td>`string` or `string[]`</Table.Td>
                          <Table.Td>
                            The selected value(s) in the TomSelect component.
                          </Table.Td>
                        </Table.Tr>
                        <Table.Tr>
                          <Table.Td>`onOptionAdd`</Table.Td>
                          <Table.Td>`(value: string) =&gt; void`</Table.Td>
                          <Table.Td>
                            A callback function that is called when an option is
                            added.
                          </Table.Td>
                        </Table.Tr>
                        <Table.Tr>
                          <Table.Td>`onChange`</Table.Td>
                          <Table.Td>
                            `(value: `string` or `string[]`) =&gt; void`
                          </Table.Td>
                          <Table.Td>
                            A callback function that is called when the selected
                            value(s) change.
                          </Table.Td>
                        </Table.Tr>
                        <Table.Tr>
                          <Table.Td>`options`</Table.Td>
                          <Table.Td>`TomSettings`</Table.Td>
                          <Table.Td>TomSelect configuration options.</Table.Td>
                        </Table.Tr>
                        <Table.Tr>
                          <Table.Td>`getRef`</Table.Td>
                          <Table.Td>
                            `(el: TomSelectElement) =&gt; void`
                          </Table.Td>
                          <Table.Td>
                            A function that receives a reference to the
                            TomSelect input element.
                          </Table.Td>
                        </Table.Tr>
                      </Table.Tbody>
                    </Table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="relative order-first col-span-12 lg:order-last lg:col-span-3 xl:col-span-2">
            <div class="sticky top-[104px]">
              <ul class="relative flex flex-col py-2.5 rounded-[0.6rem] bg-primary/[0.03] group-[.mode--light]:bg-slate-300/10 border border-primary/10 group-[.mode--light]:border-slate-300/20 text-slate-600/80 dark:group-[.mode--light]:bg-darkmode-500/60 dark:group-[.mode--light]:border-darkmode-200/60">
                <li
                  :class="[
                    'relative pl-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white active',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Basic Select
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Multiple Select
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Header
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Input Group
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Disabled
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Disabled Option
                  </a>
                </li>
                <li
                  :class="[
                    'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                  ]"
                >
                  <a class="block -mt-px truncate" href="">
                    Component API
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
