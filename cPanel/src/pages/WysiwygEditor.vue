<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import { ref } from "vue";
import Preview from "@/components/Base/Preview";
import { ClassicEditor } from "@/components/Base/Ckeditor";
import { FormSwitch } from "@/components/Base/Form";

const editorData = ref("<p>Content of the editor.</p>");
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Wysiwyg Editor
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Discover the power of our WYSIWYG Editor component for creating rich
          and interactive content in your web applications.
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
                <div class="text-[0.94rem] font-medium">CKEditor</div>
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
                  The "Wysiwyg CKEditor" component provides a rich text editor
                  for your web application, allowing users to create and edit
                  formatted content with ease. This section demonstrates how to
                  integrate the CKEditor into your application and use it for
                  text editing.
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
                      <ClassicEditor v-model="editorData" />
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <ClassicEditor v-model="editorData" />
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Wysiwyg CKEditor" component enhances your web application
                  by providing a powerful and user-friendly rich text editor.
                  Users can create, format, and edit content seamlessly.
                  Customize the CKEditor's appearance and behavior to suit your
                  application's needs, and retrieve the edited content as
                  required. With CKEditor, you can empower users to create and
                  manage rich text content effortlessly.
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
                  <div class="-mt-px">ClassicEditor</div>
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
                          The HTML element type to render as. Defaults to "div".
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`disabled`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Indicates whether the editor should be disabled.
                          Default is false.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`config`</Table.Td>
                        <Table.Td>`{}`</Table.Td>
                        <Table.Td>
                          Configuration options for the CKEditor.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`value`</Table.Td>
                        <Table.Td>`string`</Table.Td>
                        <Table.Td>The content of the CKEditor.</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onChange`</Table.Td>
                        <Table.Td>`(value: string) =&gt; void`</Table.Td>
                        <Table.Td>
                          A callback function to handle changes in the editor
                          content.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onFocus`</Table.Td>
                        <Table.Td>`(value: string) =&gt; void`</Table.Td>
                        <Table.Td>
                          A callback function to handle the editor's focus
                          event.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onBlur`</Table.Td>
                        <Table.Td>`(value: string) =&gt; void`</Table.Td>
                        <Table.Td>
                          A callback function to handle the editor's blur event.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onReady`</Table.Td>
                        <Table.Td>`(value: string) =&gt; void`</Table.Td>
                        <Table.Td>
                          A callback function that is called when the CKEditor
                          is ready.
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`getRef`</Table.Td>
                        <Table.Td>
                          `(el: CkeditorElement) =&gt; void`
                        </Table.Td>
                        <Table.Td>
                          A function that receives a reference to the CKEditor
                          element.
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
                <a class="block -mt-px truncate" href=""> CKEditor </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
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
