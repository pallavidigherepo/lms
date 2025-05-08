<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import {
  FormSelect,
  FormInput,
  FormLabel,
  FormHelp,
  FormCheck,
  FormSwitch,
  FormInline,
  InputGroup,
} from "@/components/Base/Form";
import Button from "@/components/Base/Button";
import Preview from "@/components/Base/Preview";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Regular Form
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Unlock the potential of our Form component for creating user-friendly
          and interactive web forms effortlessly.
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
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Input</div>
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
                  Input fields are a fundamental part of web forms and allow
                  users to provide information or interact with your
                  application. This section covers how to use input components
                  in your web application and provides examples of different
                  input styles.
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
                      <div>
                        <FormLabel htmlFor="regular-form-1">
                          Input Text
                        </FormLabel>
                        <FormInput
                          id="regular-form-1"
                          type="text"
                          placeholder="Input text"
                        />
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="regular-form-2">
                          Rounded
                        </FormLabel>
                        <FormInput
                          id="regular-form-2"
                          type="text"
                          rounded
                          placeholder="Rounded"
                        />
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="regular-form-3">
                          With Help
                        </FormLabel>
                        <FormInput
                          id="regular-form-3"
                          type="text"
                          placeholder="With help"
                        />
                        <FormHelp>
                          Lorem Ipsum is simply dummy text of the printing and
                          typesetting industry.
                        </FormHelp>
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="regular-form-4">
                          Password
                        </FormLabel>
                        <FormInput
                          id="regular-form-4"
                          type="password"
                          placeholder="Password"
                        />
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="regular-form-5">
                          Disabled
                        </FormLabel>
                        <FormInput
                          id="regular-form-5"
                          type="text"
                          placeholder="Disabled"
                          disabled
                        />
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div>
                          <FormLabel htmlFor="regular-form-1"
                            >Input Text</FormLabel
                          >
                          <FormInput
                            id="regular-form-1"
                            type="text"
                            placeholder="Input text"
                          />
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="regular-form-2"
                            >Rounded</FormLabel
                          >
                          <FormInput
                            id="regular-form-2"
                            type="text"
                            rounded
                            placeholder="Rounded"
                          />
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="regular-form-3"
                            >With Help</FormLabel
                          >
                          <FormInput
                            id="regular-form-3"
                            type="text"
                            placeholder="With help"
                          />
                          <FormHelp>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.
                          </FormHelp>
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="regular-form-4"
                            >Password</FormLabel
                          >
                          <FormInput
                            id="regular-form-4"
                            type="password"
                            placeholder="Password"
                          />
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="regular-form-5"
                            >Disabled</FormLabel
                          >
                          <FormInput
                            id="regular-form-5"
                            type="text"
                            placeholder="Disabled"
                            disabled
                          />
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  By using the `Input` component and customizing its attributes,
                  you can create versatile input fields that meet your
                  application's requirements and provide a seamless user
                  experience. Be sure to choose the appropriate input type and
                  validation rules based on your specific use case.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Input Sizing</div>
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
                  Input sizing is an important aspect of user interface design.
                  It allows you to control the dimensions of input fields to
                  ensure they fit well within your application's layout. This
                  section covers how to adjust the size of input components and
                  provides examples of different sizing options.
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
                      <FormInput
                        type="text"
                        formInputSize="lg"
                        placeholder=".form-control-lg"
                        aria-label=".form-control-lg example"
                      />
                      <FormInput
                        type="text"
                        class="mt-2"
                        placeholder="Default input"
                        aria-label="default input example"
                      />
                      <FormInput
                        type="text"
                        formInputSize="sm"
                        class="mt-2"
                        placeholder=".form-control-sm"
                        aria-label=".form-control-sm example"
                      />
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <FormInput
                          type="text"
                          formInputSize="lg"
                          placeholder=".form-control-lg"
                          aria-label=".form-control-lg example"
                        />
                        <FormInput
                          type="text"
                          class="mt-2"
                          placeholder="Default input"
                          aria-label="default input example"
                        />
                        <FormInput
                          type="text"
                          formInputSize="sm"
                          class="mt-2"
                          placeholder=".form-control-sm"
                          aria-label=".form-control-sm example"
                        />
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Controlling the size of input components is essential for
                  achieving a visually appealing and user-friendly design. By
                  using the `Input` component and specifying the desired size,
                  you can ensure that input fields match your application's
                  layout and styling requirements. Experiment with different
                  sizes to find the one that best fits your design goals and
                  provides an optimal user experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Input Groups</div>
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
                  Input groups are a useful UI element for combining form inputs
                  with additional text or icons. They are often used to create
                  visually integrated and contextually relevant input fields.
                  This section covers how to create input groups using the
                  `InputGroup` component and provides examples of various input
                  group configurations.
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
                      <InputGroup>
                        <InputGroup.Text id="input-group-email">
                          @
                        </InputGroup.Text>
                        <FormInput
                          type="text"
                          placeholder="Email"
                          aria-label="Email"
                          aria-describedby="input-group-email"
                        />
                      </InputGroup>
                      <InputGroup class="mt-2">
                        <FormInput
                          type="text"
                          placeholder="Price"
                          aria-label="Price"
                          aria-describedby="input-group-price"
                        />
                        <InputGroup.Text id="input-group-price">
                          .00
                        </InputGroup.Text>
                      </InputGroup>
                      <InputGroup class="mt-2">
                        <InputGroup.Text>@</InputGroup.Text>
                        <FormInput
                          type="text"
                          placeholder="Price"
                          aria-label="Amount (to the nearest dollar)"
                        />
                        <InputGroup.Text>.00</InputGroup.Text>
                      </InputGroup>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <InputGroup>
                          <InputGroup.Text id="input-group-email">
                            @
                          </InputGroup.Text>
                          <FormInput
                            type="text"
                            placeholder="Email"
                            aria-label="Email"
                            aria-describedby="input-group-email"
                          />
                        </InputGroup>
                        <InputGroup class="mt-2">
                          <FormInput
                            type="text"
                            placeholder="Price"
                            aria-label="Price"
                            aria-describedby="input-group-price"
                          />
                          <InputGroup.Text id="input-group-price">
                            .00
                          </InputGroup.Text>
                        </InputGroup>
                        <InputGroup class="mt-2">
                          <InputGroup.Text>@</InputGroup.Text>
                          <FormInput
                            type="text"
                            placeholder="Price"
                            aria-label="Amount (to the nearest dollar)"
                          />
                          <InputGroup.Text>.00</InputGroup.Text>
                        </InputGroup>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Input groups are a versatile tool for enhancing the usability
                  and visual appeal of your forms. Whether you need to add
                  icons, labels, or supplementary text to your input fields, the
                  `InputGroup` component allows you to create cohesive and
                  informative input groups. Experiment with different
                  configurations to find the best way to present your form
                  elements and improve the user experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Input State</div>
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
                  Input states provide visual feedback to users about the status
                  or validity of form inputs. This section covers how to apply
                  different states to form inputs using CSS classes and provides
                  examples of various input states.
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
                      <div>
                        <FormLabel htmlFor="input-state-1">
                          Input Success
                        </FormLabel>
                        <FormInput
                          id="input-state-1"
                          type="text"
                          class="border-success"
                          placeholder="Input text"
                        />
                        <div class="grid w-full h-1 grid-cols-12 gap-4 mt-3">
                          <div
                            class="h-full col-span-3 rounded bg-success"
                          ></div>
                          <div
                            class="h-full col-span-3 rounded bg-success"
                          ></div>
                          <div
                            class="h-full col-span-3 rounded bg-success"
                          ></div>
                          <div
                            class="h-full col-span-3 rounded bg-slate-100 dark:bg-darkmode-800"
                          ></div>
                        </div>
                        <div class="mt-2 text-success">Strong password</div>
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="input-state-2">
                          Input Warning
                        </FormLabel>
                        <FormInput
                          id="input-state-2"
                          type="text"
                          class="border-warning"
                          placeholder="Input text"
                        />
                        <div class="mt-2 text-warning">
                          Attempting to reconnect to server...
                        </div>
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="input-state-3">
                          Input Error
                        </FormLabel>
                        <FormInput
                          id="input-state-3"
                          type="text"
                          class="border-danger"
                          placeholder="Input text"
                        />
                        <div class="mt-2 text-danger">
                          This field is required
                        </div>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div>
                          <FormLabel htmlFor="input-state-1">
                            Input Success
                          </FormLabel>
                          <FormInput
                            id="input-state-1"
                            type="text"
                            class="border-success"
                            placeholder="Input text"
                          />
                          <div class="grid w-full h-1 grid-cols-12 gap-4 mt-3">
                            <div
                              class="h-full col-span-3 rounded bg-success"
                            ></div>
                            <div
                              class="h-full col-span-3 rounded bg-success"
                            ></div>
                            <div
                              class="h-full col-span-3 rounded bg-success"
                            ></div>
                            <div
                              class="h-full col-span-3 rounded bg-slate-100 dark:bg-darkmode-800"
                            ></div>
                          </div>
                          <div class="mt-2 text-success">Strong password</div>
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="input-state-2">
                            Input Warning
                          </FormLabel>
                          <FormInput
                            id="input-state-2"
                            type="text"
                            class="border-warning"
                            placeholder="Input text"
                          />
                          <div class="mt-2 text-warning">
                            Attempting to reconnect to server...
                          </div>
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="input-state-3"
                            >Input Error</FormLabel
                          >
                          <FormInput
                            id="input-state-3"
                            type="text"
                            class="border-danger"
                            placeholder="Input text"
                          />
                          <div class="mt-2 text-danger">
                            This field is required
                          </div>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Input states are crucial for providing feedback to users and
                  enhancing the user experience in your forms. By applying the
                  appropriate state classes, you can visually communicate the
                  status of each input field, making it easier for users to
                  understand and interact with your forms. Experiment with
                  different styles and states to match the design and
                  functionality of your web application.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Select Options</div>
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
                  The "Select Options" component allows you to create dropdown
                  select elements with various options. This section covers how
                  to use the component and provides examples of different select
                  options.
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
                      <div class="flex flex-col items-center sm:flex-row">
                        <FormSelect
                          formSelectSize="lg"
                          class="sm:mt-2 sm:mr-2"
                          aria-label=".form-select-lg example"
                        >
                          <option>Chris Evans</option>
                          <option>Liam Neeson</option>
                          <option>Daniel Craig</option>
                        </FormSelect>
                        <FormSelect
                          class="mt-2 sm:mr-2"
                          aria-label="Default select example"
                        >
                          <option>Chris Evans</option>
                          <option>Liam Neeson</option>
                          <option>Daniel Craig</option>
                        </FormSelect>
                        <FormSelect
                          formSelectSize="sm"
                          class="mt-2"
                          aria-label=".form-select-sm example"
                        >
                          <option>Chris Evans</option>
                          <option>Liam Neeson</option>
                          <option>Daniel Craig</option>
                        </FormSelect>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col items-center sm:flex-row">
                          <FormSelect
                            formSelectSize="lg"
                            class="sm:mt-2 sm:mr-2"
                            aria-label=".form-select-lg example"
                          >
                            <option>Chris Evans</option>
                            <option>Liam Neeson</option>
                            <option>Daniel Craig</option>
                          </FormSelect>
                          <FormSelect
                            class="mt-2 sm:mr-2"
                            aria-label="Default select example"
                          >
                            <option>Chris Evans</option>
                            <option>Liam Neeson</option>
                            <option>Daniel Craig</option>
                          </FormSelect>
                          <FormSelect
                            formSelectSize="sm"
                            class="mt-2"
                            aria-label=".form-select-sm example"
                          >
                            <option>Chris Evans</option>
                            <option>Liam Neeson</option>
                            <option>Daniel Craig</option>
                          </FormSelect>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Select Options" component is a versatile tool for
                  creating dropdown select elements with a wide range of
                  options. You can use it to build various forms and user
                  interfaces that require user selection from predefined
                  choices. Customize the options and styles to match your
                  project's requirements, and make the user experience smooth
                  and efficient.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Vertical Form</div>
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
                  The "Vertical Form" component allows you to create forms with
                  a vertical layout, where form fields and labels are stacked on
                  top of each other. This section covers how to use the
                  component and provides examples of vertical forms.
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
                      <div>
                        <FormLabel htmlFor="vertical-form-1"> Email </FormLabel>
                        <FormInput
                          id="vertical-form-1"
                          type="text"
                          placeholder="example@gmail.com"
                        />
                      </div>
                      <div class="mt-3">
                        <FormLabel htmlFor="vertical-form-2">
                          Password
                        </FormLabel>
                        <FormInput
                          id="vertical-form-2"
                          type="text"
                          placeholder="secret"
                        />
                      </div>
                      <FormCheck class="mt-5">
                        <FormCheck.Input
                          id="vertical-form-3"
                          type="checkbox"
                          value=""
                        />
                        <FormCheck.Label htmlFor="vertical-form-3">
                          Remember me
                        </FormCheck.Label>
                      </FormCheck>
                      <Button variant="primary" class="mt-5"> Login </Button>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div>
                          <FormLabel htmlFor="vertical-form-1">Email</FormLabel>
                          <FormInput
                            id="vertical-form-1"
                            type="text"
                            placeholder="example@gmail.com"
                          />
                        </div>
                        <div class="mt-3">
                          <FormLabel htmlFor="vertical-form-2"
                            >Password</FormLabel
                          >
                          <FormInput
                            id="vertical-form-2"
                            type="text"
                            placeholder="secret"
                          />
                        </div>
                        <FormCheck class="mt-5">
                          <FormCheck.Input
                            id="vertical-form-3"
                            type="checkbox"
                            value=""
                          />
                          <FormCheck.Label htmlFor="vertical-form-3">
                            Remember me
                          </FormCheck.Label>
                        </FormCheck>
                        <Button variant="primary" class="mt-5"> Login </Button>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Vertical Form" component is ideal for creating forms with
                  a clean and straightforward layout, ensuring a seamless user
                  experience. Customize it according to your project's needs,
                  such as adding validation, error handling, and styling. This
                  component simplifies the process of creating forms, making it
                  easy to collect user input in a structured manner.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Horizontal Form</div>
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
                  The "Horizontal Form" component allows you to create forms
                  with a horizontal layout, where form labels are aligned to the
                  left of the form fields. This section covers how to use the
                  component and provides examples of horizontal forms.
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
                      <FormInline>
                        <FormLabel htmlFor="horizontal-form-1" class="sm:w-20">
                          Email
                        </FormLabel>
                        <FormInput
                          id="horizontal-form-1"
                          type="text"
                          placeholder="example@gmail.com"
                        />
                      </FormInline>
                      <FormInline class="mt-5">
                        <FormLabel htmlFor="horizontal-form-2" class="sm:w-20">
                          Password
                        </FormLabel>
                        <FormInput
                          id="horizontal-form-2"
                          type="password"
                          placeholder="secret"
                        />
                      </FormInline>
                      <FormCheck class="mt-5 sm:ml-20 sm:pl-5">
                        <FormCheck.Input
                          id="horizontal-form-3"
                          type="checkbox"
                          value=""
                        />
                        <FormCheck.Label htmlFor="horizontal-form-3">
                          Remember me
                        </FormCheck.Label>
                      </FormCheck>
                      <div class="mt-5 sm:ml-20 sm:pl-5">
                        <Button variant="primary">Login</Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <FormInline>
                          <FormLabel
                            htmlFor="horizontal-form-1"
                            class="sm:w-20"
                          >
                            Email
                          </FormLabel>
                          <FormInput
                            id="horizontal-form-1"
                            type="text"
                            placeholder="example@gmail.com"
                          />
                        </FormInline>
                        <FormInline class="mt-5">
                          <FormLabel
                            htmlFor="horizontal-form-2"
                            class="sm:w-20"
                          >
                            Password
                          </FormLabel>
                          <FormInput
                            id="horizontal-form-2"
                            type="password"
                            placeholder="secret"
                          />
                        </FormInline>
                        <FormCheck class="mt-5 sm:ml-20 sm:pl-5">
                          <FormCheck.Input
                            id="horizontal-form-3"
                            type="checkbox"
                            value=""
                          />
                          <FormCheck.Label htmlFor="horizontal-form-3">
                            Remember me
                          </FormCheck.Label>
                        </FormCheck>
                        <div class="mt-5 sm:ml-20 sm:pl-5">
                          <Button variant="primary">Login</Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Horizontal Form" component is useful for creating forms
                  with a traditional horizontal layout, where labels are aligned
                  to the left of input fields. Customize it according to your
                  project's needs, such as adding validation, error handling,
                  and styling. This component provides a clear and organized way
                  to collect user input in a structured manner while maintaining
                  a familiar form layout.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Inline Form</div>
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
                  The "Inline Form" component allows you to create forms with
                  inline elements, where form fields and labels appear
                  horizontally on the same line. This section covers how to use
                  the component and provides examples of inline forms.
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
                      <div class="grid grid-cols-12 gap-2">
                        <FormInput
                          type="text"
                          class="col-span-4"
                          placeholder="Input inline 1"
                          aria-label="default input inline 1"
                        />
                        <FormInput
                          type="text"
                          class="col-span-4"
                          placeholder="Input inline 2"
                          aria-label="default input inline 2"
                        />
                        <FormInput
                          type="text"
                          class="col-span-4"
                          placeholder="Input inline 3"
                          aria-label="default input inline 3"
                        />
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="grid grid-cols-12 gap-2">
                          <FormInput
                            type="text"
                            class="col-span-4"
                            placeholder="Input inline 1"
                            aria-label="default input inline 1"
                          />
                          <FormInput
                            type="text"
                            class="col-span-4"
                            placeholder="Input inline 2"
                            aria-label="default input inline 2"
                          />
                          <FormInput
                            type="text"
                            class="col-span-4"
                            placeholder="Input inline 3"
                            aria-label="default input inline 3"
                          />
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Inline Form" component is useful for creating compact and
                  space-efficient forms where form fields and labels appear on
                  the same line. Customize it according to your project's needs,
                  such as adding validation, error handling, and styling. This
                  component provides a clean and concise way to collect user
                  input in an inline manner, ideal for search bars, filters, and
                  other compact form elements.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Checkbox & Switch</div>
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
                  The "Checkbox & Switch" components provide a way to create
                  interactive checkboxes and switches that users can toggle on
                  and off. This section covers how to use these components and
                  provides examples of checkboxes and switches.
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
                      <div>
                        <label>Vertical Checkbox</label>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="checkbox-switch-1"
                            type="checkbox"
                            value=""
                          />
                          <FormCheck.Label htmlFor="checkbox-switch-1">
                            Chris Evans
                          </FormCheck.Label>
                        </FormCheck>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="checkbox-switch-2"
                            type="checkbox"
                            value=""
                          />
                          <FormCheck.Label htmlFor="checkbox-switch-2">
                            Liam Neeson
                          </FormCheck.Label>
                        </FormCheck>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="checkbox-switch-3"
                            type="checkbox"
                            value=""
                          />
                          <FormCheck.Label htmlFor="checkbox-switch-3">
                            Daniel Craig
                          </FormCheck.Label>
                        </FormCheck>
                      </div>
                      <div class="mt-3">
                        <label>Horizontal Checkbox</label>
                        <div class="flex flex-col mt-2 sm:flex-row">
                          <FormCheck class="mr-2">
                            <FormCheck.Input
                              id="checkbox-switch-4"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-4">
                              Chris Evans
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2 mr-2 sm:mt-0">
                            <FormCheck.Input
                              id="checkbox-switch-5"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-5">
                              Liam Neeson
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2 mr-2 sm:mt-0">
                            <FormCheck.Input
                              id="checkbox-switch-6"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-6">
                              Daniel Craig
                            </FormCheck.Label>
                          </FormCheck>
                        </div>
                      </div>
                      <div class="mt-3">
                        <label>Switch</label>
                        <div class="mt-2">
                          <FormSwitch>
                            <FormSwitch.Input
                              id="checkbox-switch-7"
                              type="checkbox"
                            />
                            <FormSwitch.Label htmlFor="checkbox-switch-7">
                              Default switch checkbox input
                            </FormSwitch.Label>
                          </FormSwitch>
                        </div>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div>
                          <label>Vertical Checkbox</label>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="checkbox-switch-1"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-1">
                              Chris Evans
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="checkbox-switch-2"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-2">
                              Liam Neeson
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="checkbox-switch-3"
                              type="checkbox"
                              value=""
                            />
                            <FormCheck.Label htmlFor="checkbox-switch-3">
                              Daniel Craig
                            </FormCheck.Label>
                          </FormCheck>
                        </div>
                        <div class="mt-3">
                          <label>Horizontal Checkbox</label>
                          <div class="flex flex-col mt-2 sm:flex-row">
                            <FormCheck class="mr-2">
                              <FormCheck.Input
                                id="checkbox-switch-4"
                                type="checkbox"
                                value=""
                              />
                              <FormCheck.Label htmlFor="checkbox-switch-4">
                                Chris Evans
                              </FormCheck.Label>
                            </FormCheck>
                            <FormCheck class="mt-2 mr-2 sm:mt-0">
                              <FormCheck.Input
                                id="checkbox-switch-5"
                                type="checkbox"
                                value=""
                              />
                              <FormCheck.Label htmlFor="checkbox-switch-5">
                                Liam Neeson
                              </FormCheck.Label>
                            </FormCheck>
                            <FormCheck class="mt-2 mr-2 sm:mt-0">
                              <FormCheck.Input
                                id="checkbox-switch-6"
                                type="checkbox"
                                value=""
                              />
                              <FormCheck.Label htmlFor="checkbox-switch-6">
                                Daniel Craig
                              </FormCheck.Label>
                            </FormCheck>
                          </div>
                        </div>
                        <div class="mt-3">
                          <label>Switch</label>
                          <div class="mt-2">
                            <FormSwitch>
                              <FormSwitch.Input
                                id="checkbox-switch-7"
                                type="checkbox"
                              />
                              <FormSwitch.Label htmlFor="checkbox-switch-7">
                                Default switch checkbox input
                              </FormSwitch.Label>
                            </FormSwitch>
                          </div>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Checkbox & Switch" components provide an easy way to
                  create interactive elements for user input. Customize them
                  according to your project's needs, and use event handling to
                  respond to user interactions. These components are commonly
                  used for settings, preferences, and forms where users need to
                  make binary choices.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Radio</div>
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
                  The "Radio" component is a fundamental input element that
                  allows users to make a single selection from a list of
                  options. It is commonly used in forms and questionnaires where
                  users need to choose one option among several.
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
                      <div>
                        <label>Vertical Radio Button</label>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="radio-switch-1"
                            type="radio"
                            name="vertical_radio_button"
                            value="vertical-radio-chris-evans"
                          />
                          <FormCheck.Label htmlFor="radio-switch-1">
                            Chris Evans
                          </FormCheck.Label>
                        </FormCheck>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="radio-switch-2"
                            type="radio"
                            name="vertical_radio_button"
                            value="vertical-radio-liam-neeson"
                          />
                          <FormCheck.Label htmlFor="radio-switch-2">
                            Liam Neeson
                          </FormCheck.Label>
                        </FormCheck>
                        <FormCheck class="mt-2">
                          <FormCheck.Input
                            id="radio-switch-3"
                            type="radio"
                            name="vertical_radio_button"
                            value="vertical-radio-daniel-craig"
                          />
                          <FormCheck.Label htmlFor="radio-switch-3">
                            Daniel Craig
                          </FormCheck.Label>
                        </FormCheck>
                      </div>
                      <div class="mt-3">
                        <label>Horizontal Radio Button</label>
                        <div class="flex flex-col mt-2 sm:flex-row">
                          <FormCheck class="mr-2">
                            <FormCheck.Input
                              id="radio-switch-4"
                              type="radio"
                              name="horizontal_radio_button"
                              value="horizontal-radio-chris-evans"
                            />
                            <FormCheck.Label htmlFor="radio-switch-4">
                              Chris Evans
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2 mr-2 sm:mt-0">
                            <FormCheck.Input
                              id="radio-switch-5"
                              type="radio"
                              name="horizontal_radio_button"
                              value="horizontal-radio-liam-neeson"
                            />
                            <FormCheck.Label htmlFor="radio-switch-5">
                              Liam Neeson
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2 mr-2 sm:mt-0">
                            <FormCheck.Input
                              id="radio-switch-6"
                              type="radio"
                              name="horizontal_radio_button"
                              value="horizontal-radio-daniel-craig"
                            />
                            <FormCheck.Label htmlFor="radio-switch-6">
                              Daniel Craig
                            </FormCheck.Label>
                          </FormCheck>
                        </div>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div>
                          <label>Vertical Radio Button</label>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="radio-switch-1"
                              type="radio"
                              name="vertical_radio_button"
                              value="vertical-radio-chris-evans"
                            />
                            <FormCheck.Label htmlFor="radio-switch-1">
                              Chris Evans
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="radio-switch-2"
                              type="radio"
                              name="vertical_radio_button"
                              value="vertical-radio-liam-neeson"
                            />
                            <FormCheck.Label htmlFor="radio-switch-2">
                              Liam Neeson
                            </FormCheck.Label>
                          </FormCheck>
                          <FormCheck class="mt-2">
                            <FormCheck.Input
                              id="radio-switch-3"
                              type="radio"
                              name="vertical_radio_button"
                              value="vertical-radio-daniel-craig"
                            />
                            <FormCheck.Label htmlFor="radio-switch-3">
                              Daniel Craig
                            </FormCheck.Label>
                          </FormCheck>
                        </div>
                        <div class="mt-3">
                          <label>Horizontal Radio Button</label>
                          <div class="flex flex-col mt-2 sm:flex-row">
                            <FormCheck class="mr-2">
                              <FormCheck.Input
                                id="radio-switch-4"
                                type="radio"
                                name="horizontal_radio_button"
                                value="horizontal-radio-chris-evans"
                              />
                              <FormCheck.Label htmlFor="radio-switch-4">
                                Chris Evans
                              </FormCheck.Label>
                            </FormCheck>
                            <FormCheck class="mt-2 mr-2 sm:mt-0">
                              <FormCheck.Input
                                id="radio-switch-5"
                                type="radio"
                                name="horizontal_radio_button"
                                value="horizontal-radio-liam-neeson"
                              />
                              <FormCheck.Label htmlFor="radio-switch-5">
                                Liam Neeson
                              </FormCheck.Label>
                            </FormCheck>
                            <FormCheck class="mt-2 mr-2 sm:mt-0">
                              <FormCheck.Input
                                id="radio-switch-6"
                                type="radio"
                                name="horizontal_radio_button"
                                value="horizontal-radio-daniel-craig"
                              />
                              <FormCheck.Label htmlFor="radio-switch-6">
                                Daniel Craig
                              </FormCheck.Label>
                            </FormCheck>
                          </div>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  The "Radio" component is versatile and can be used to create
                  both vertical and horizontal radio button groups. These radio
                  buttons are commonly used in forms, surveys, and any scenario
                  where exclusive choices are required.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <div
              class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
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
                  <div class="-mt-px">FormCheck</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormCheck.Label</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormCheck.Input</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormInput</div>
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
                        <Table.Td>`formInputSize`</Table.Td>
                        <Table.Td>`sm`, `lg`</Table.Td>
                        <Table.Td>
                          Specifies the size or dimensions of the input field
                          within a form. Use this prop to control the visual
                          appearance of the input, with options such as 'small',
                          'medium', or 'large' to suit your design and layout
                          needs."
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`rounded`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Whether to apply rounded corners to the textarea
                          element
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
                  <div class="-mt-px">FormTextarea</div>
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
                        <Table.Td>`formTextareaSize`</Table.Td>
                        <Table.Td>`sm`, `lg`</Table.Td>
                        <Table.Td>
                          Specifies the size or dimensions of the input field
                          within a form. Use this prop to control the visual
                          appearance of the input, with options such as 'small',
                          'medium', or 'large' to suit your design and layout
                          needs
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`rounded`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Whether to apply rounded corners to the textarea
                          element
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
                  <div class="-mt-px">FormHelp</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormInline</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormLabel</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormSelect</div>
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
                        <Table.Td>`formSelectSize`</Table.Td>
                        <Table.Td>`sm`, `lg`</Table.Td>
                        <Table.Td>
                          Defines the size or dimensions of the select dropdown
                          element within a form. Utilize this prop to customize
                          the visual presentation of the select input, offering
                          choices like 'small', 'medium', or 'large' to align
                          with your design and layout preferences
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
                  <div class="-mt-px">FormSwitch</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormSwitch.Label</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">FormSwitch.Input</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">InputGroup</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                  <div class="-mt-px">InputGroup.Text</div>
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
                        <Table.Td class="text-center" colSpan="3">
                          No spesific props
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
                <a class="block -mt-px truncate" href=""> Input </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Input Sizing </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Input Groups </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Input State </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Select Options </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Vertical Form </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Horizontal Form </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Inline Form </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Checkbox & Switch </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Radio </a>
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
