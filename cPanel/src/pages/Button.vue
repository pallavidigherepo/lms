<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Button from "@/components/Base/Button";
import Lucide from "@/components/Base/Lucide";
import LoadingIcon from "@/components/Base/LoadingIcon";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Buttons
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Explore the versatility of our Buttons component for enhancing user
          interactions on your application.
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
                <div class="text-[0.94rem] font-medium">Basic Buttons</div>
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
                  Buttons are fundamental elements in web and app design,
                  allowing users to interact with your content and perform
                  actions. The Basic Buttons component provides a range of
                  button styles that you can easily incorporate into your
                  project. These buttons come in various color variants to suit
                  your design needs.
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
                      <div class="flex flex-wrap gap-2">
                        <Button variant="primary" class="w-24">
                          Primary
                        </Button>
                        <Button variant="secondary" class="w-24">
                          Secondary
                        </Button>
                        <Button variant="success" class="w-24">
                          Success
                        </Button>
                        <Button variant="warning" class="w-24">
                          Warning
                        </Button>
                        <Button variant="pending" class="w-24">
                          Pending
                        </Button>
                        <Button variant="danger" class="w-24"> Danger </Button>
                        <Button variant="dark" class="w-24"> Dark </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap gap-2">
                          <Button variant="primary" class="w-24">
                            Primary
                          </Button>
                          <Button variant="secondary" class="w-24">
                            Secondary
                          </Button>
                          <Button variant="success" class="w-24">
                            Success
                          </Button>
                          <Button variant="warning" class="w-24">
                            Warning
                          </Button>
                          <Button variant="pending" class="w-24">
                            Pending
                          </Button>
                          <Button variant="danger" class="w-24">
                            Danger
                          </Button>
                          <Button variant="dark" class="w-24"> Dark </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Buttons are essential for user interaction in your web or app
                  project. The Basic Buttons component provides a wide range of
                  styles and customization options to ensure your buttons are
                  not only functional but also visually appealing.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Button Sizes</div>
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
                  The Button Sizes component allows you to adjust the size of
                  buttons to match your design requirements. Whether you need
                  small, medium, or large buttons, this feature ensures that
                  your buttons fit seamlessly within your user interface.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary" size="sm" class="w-24">
                          Small
                        </Button>
                        <Button variant="primary" class="w-24"> Medium </Button>
                        <Button variant="primary" size="lg" class="w-24">
                          Large
                        </Button>
                      </div>
                      <div class="flex flex-wrap items-center gap-2 mt-5">
                        <Button variant="secondary" size="sm" class="w-24">
                          Small
                        </Button>
                        <Button variant="secondary" class="w-24">
                          Medium
                        </Button>
                        <Button variant="secondary" size="lg" class="w-24">
                          Large
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary" size="sm" class="w-24">
                            Small
                          </Button>
                          <Button variant="primary" class="w-24">
                            Medium
                          </Button>
                          <Button variant="primary" size="lg" class="w-24">
                            Large
                          </Button>
                        </div>
                        <div class="flex flex-wrap items-center gap-2 mt-5">
                          <Button variant="secondary" size="sm" class="w-24">
                            Small
                          </Button>
                          <Button variant="secondary" class="w-24">
                            Medium
                          </Button>
                          <Button variant="secondary" size="lg" class="w-24">
                            Large
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Button Sizes provide the flexibility you need to create
                  buttons that seamlessly integrate with your project's design.
                  Whether you want small, medium, or large buttons, you can
                  easily achieve the desired button size with this component.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Working with Links</div>
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
                  The Button Link component allows you to create buttons that
                  function as links. These buttons are versatile and can be used
                  to navigate to different sections of your website or external
                  URLs.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button
                          as="a"
                          variant="primary"
                          href=""
                          class="inline-block w-24"
                        >
                          Link
                        </Button>
                        <Button
                          as="a"
                          variant="secondary"
                          href=""
                          class="inline-block w-24"
                        >
                          Button
                        </Button>
                        <Button
                          as="a"
                          variant="success"
                          href=""
                          class="inline-block w-24"
                        >
                          Input
                        </Button>
                        <Button
                          as="a"
                          variant="warning"
                          href=""
                          class="inline-block w-24"
                        >
                          Submit
                        </Button>
                        <Button
                          as="a"
                          variant="pending"
                          href=""
                          class="inline-block w-24"
                        >
                          Pending
                        </Button>
                        <Button
                          as="a"
                          variant="danger"
                          href=""
                          class="inline-block w-24"
                        >
                          Reset
                        </Button>
                        <Button
                          as="a"
                          variant="dark"
                          href=""
                          class="inline-block w-24"
                        >
                          Metal
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button
                            as="a"
                            variant="primary"
                            href=""
                            class="inline-block w-24"
                          >
                            Link
                          </Button>
                          <Button
                            as="a"
                            variant="secondary"
                            href=""
                            class="inline-block w-24"
                          >
                            Button
                          </Button>
                          <Button
                            as="a"
                            variant="success"
                            href=""
                            class="inline-block w-24"
                          >
                            Input
                          </Button>
                          <Button
                            as="a"
                            variant="warning"
                            href=""
                            class="inline-block w-24"
                          >
                            Submit
                          </Button>
                          <Button
                            as="a"
                            variant="pending"
                            href=""
                            class="inline-block w-24"
                          >
                            Pending
                          </Button>
                          <Button
                            as="a"
                            variant="danger"
                            href=""
                            class="inline-block w-24"
                          >
                            Reset
                          </Button>
                          <Button
                            as="a"
                            variant="dark"
                            href=""
                            class="inline-block w-24"
                          >
                            Metal
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Button Link components offer a seamless way to incorporate
                  interactive links into your web project. Use them to create
                  buttons that guide users to different sections of your website
                  or external URLs, enhancing user experience and navigation.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Elevated Buttons</div>
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
                  Elevated buttons are designed to stand out and provide visual
                  depth. They add a sense of interactivity to your user
                  interface, making it clear that these are clickable elements.
                  This section covers elevated buttons in various styles.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary" elevated class="w-24">
                          Primary
                        </Button>
                        <Button variant="secondary" elevated class="w-24">
                          Secondary
                        </Button>
                        <Button variant="success" elevated class="w-24">
                          Success
                        </Button>
                        <Button variant="warning" elevated class="w-24">
                          Warning
                        </Button>
                        <Button variant="pending" elevated class="w-24">
                          Pending
                        </Button>
                        <Button variant="danger" elevated class="w-24">
                          Danger
                        </Button>
                        <Button variant="dark" elevated class="w-24">
                          Dark
                        </Button>
                      </div>
                      <div class="flex flex-wrap items-center gap-2 mt-5">
                        <Button variant="primary" elevated rounded class="w-24">
                          Primary
                        </Button>
                        <Button
                          variant="secondary"
                          elevated
                          rounded
                          class="w-24"
                        >
                          Secondary
                        </Button>
                        <Button variant="success" elevated rounded class="w-24">
                          Success
                        </Button>
                        <Button variant="warning" elevated rounded class="w-24">
                          Warning
                        </Button>
                        <Button variant="pending" elevated rounded class="w-24">
                          Pending
                        </Button>
                        <Button variant="danger" elevated rounded class="w-24">
                          Danger
                        </Button>
                        <Button variant="dark" elevated rounded class="w-24">
                          Dark
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary" elevated class="w-24">
                            Primary
                          </Button>
                          <Button variant="secondary" elevated class="w-24">
                            Secondary
                          </Button>
                          <Button variant="success" elevated class="w-24">
                            Success
                          </Button>
                          <Button variant="warning" elevated class="w-24">
                            Warning
                          </Button>
                          <Button variant="pending" elevated class="w-24">
                            Pending
                          </Button>
                          <Button variant="danger" elevated class="w-24">
                            Danger
                          </Button>
                          <Button variant="dark" elevated class="w-24">
                            Dark
                          </Button>
                        </div>
                        <div class="flex flex-wrap items-center gap-2 mt-5">
                          <Button
                            variant="primary"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Primary
                          </Button>
                          <Button
                            variant="secondary"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Secondary
                          </Button>
                          <Button
                            variant="success"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Success
                          </Button>
                          <Button
                            variant="warning"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Warning
                          </Button>
                          <Button
                            variant="pending"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Pending
                          </Button>
                          <Button
                            variant="danger"
                            elevated
                            rounded
                            class="w-24"
                          >
                            Danger
                          </Button>
                          <Button variant="dark" elevated rounded class="w-24">
                            Dark
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Elevated buttons are an effective way to enhance the
                  interactivity and visual appeal of your user interface. They
                  offer a clear indication of clickable elements and can be
                  customized to match your design preferences.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">
                  Social Media Buttons
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
                  Social media buttons are essential for connecting with your
                  audience and promoting your content across various platforms.
                  This section covers social media buttons with different icons
                  and styles.
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
                      <div class="flex flex-wrap items-center gap-2 mt-5">
                        <Button variant="facebook" class="w-32">
                          <Lucide icon="Facebook" class="w-4 h-4 mr-2" />
                          Facebook
                        </Button>
                        <Button variant="twitter" class="w-32">
                          <Lucide icon="Twitter" class="w-4 h-4 mr-2" />
                          Twitter
                        </Button>
                        <Button variant="instagram" class="w-32">
                          <Lucide icon="Instagram" class="w-4 h-4 mr-2" />
                          Instagram
                        </Button>
                        <Button variant="linkedin" class="w-32">
                          <Lucide icon="Linkedin" class="w-4 h-4 mr-2" />
                          Linkedin
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2 mt-5">
                          <Button variant="facebook" class="w-32">
                            <Lucide icon="Facebook" class="w-4 h-4 mr-2" />
                            Facebook
                          </Button>
                          <Button variant="twitter" class="w-32">
                            <Lucide icon="Twitter" class="w-4 h-4 mr-2" />
                            Twitter
                          </Button>
                          <Button variant="instagram" class="w-32">
                            <Lucide icon="Instagram" class="w-4 h-4 mr-2" />{"
                            "} Instagram
                          </Button>
                          <Button variant="linkedin" class="w-32">
                            <Lucide icon="Linkedin" class="w-4 h-4 mr-2" />
                            Linkedin
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Use these social media buttons strategically to promote your
                  content and connect with your users on their preferred
                  platforms, ultimately driving engagement and growth.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Outline Buttons</div>
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
                  Outline buttons provide a subtle and stylish way to present
                  actions or choices to your users. They maintain a clean and
                  minimalist appearance while offering clear interaction points.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button
                          variant="outline-primary"
                          class="inline-block w-24"
                        >
                          Primary
                        </Button>
                        <Button
                          variant="outline-secondary"
                          class="inline-block w-24"
                        >
                          Secondary
                        </Button>
                        <Button
                          variant="outline-success"
                          class="inline-block w-24"
                        >
                          Success
                        </Button>
                        <Button
                          variant="outline-warning"
                          class="inline-block w-24"
                        >
                          Warning
                        </Button>
                        <Button
                          variant="outline-pending"
                          class="inline-block w-24"
                        >
                          Pending
                        </Button>
                        <Button
                          variant="outline-danger"
                          class="inline-block w-24"
                        >
                          Danger
                        </Button>
                        <Button
                          variant="outline-dark"
                          class="inline-block w-24"
                        >
                          Dark
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button
                            variant="outline-primary"
                            class="inline-block w-24"
                          >
                            Primary
                          </Button>
                          <Button
                            variant="outline-secondary"
                            class="inline-block w-24"
                          >
                            Secondary
                          </Button>
                          <Button
                            variant="outline-success"
                            class="inline-block w-24"
                          >
                            Success
                          </Button>
                          <Button
                            variant="outline-warning"
                            class="inline-block w-24"
                          >
                            Warning
                          </Button>
                          <Button
                            variant="outline-pending"
                            class="inline-block w-24"
                          >
                            Pending
                          </Button>
                          <Button
                            variant="outline-danger"
                            class="inline-block w-24"
                          >
                            Danger
                          </Button>
                          <Button
                            variant="outline-dark"
                            class="inline-block w-24"
                          >
                            Dark
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Use outline buttons for actions like form submissions,
                  navigation, or as alternatives to regular buttons to enhance
                  your website or application's overall user experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">
                  Loading State Buttons
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
                  Loading state buttons are an essential part of a user-friendly
                  interface. They indicate ongoing actions, such as saving,
                  adding, loading, or deleting, and provide feedback to users
                  while they wait for a process to complete.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary">
                          Saving
                          <LoadingIcon
                            icon="oval"
                            color="white"
                            class="w-4 h-4 ml-2"
                          />
                        </Button>
                        <Button variant="success">
                          Adding
                          <LoadingIcon
                            icon="spinning-circles"
                            color="white"
                            class="w-4 h-4 ml-2"
                          />
                        </Button>
                        <Button variant="warning">
                          Loading
                          <LoadingIcon
                            icon="three-dots"
                            color="1a202c"
                            class="w-4 h-4 ml-2"
                          />
                        </Button>
                        <Button variant="danger">
                          Deleting
                          <LoadingIcon
                            icon="puff"
                            color="white"
                            class="w-4 h-4 ml-2"
                          />
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary">
                            Saving
                            <LoadingIcon
                              icon="oval"
                              color="white"
                              class="w-4 h-4 ml-2"
                            />
                          </Button>
                          <Button variant="success">
                            Adding
                            <LoadingIcon
                              icon="spinning-circles"
                              color="white"
                              class="w-4 h-4 ml-2"
                            />
                          </Button>
                          <Button variant="warning">
                            Loading
                            <LoadingIcon
                              icon="three-dots"
                              color="1a202c"
                              class="w-4 h-4 ml-2"
                            />
                          </Button>
                          <Button variant="danger">
                            Deleting
                            <LoadingIcon
                              icon="puff"
                              color="white"
                              class="w-4 h-4 ml-2"
                            />
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Consider using loading state buttons for actions like saving,
                  adding, loading data, or deleting items to improve the overall
                  usability of your website or application.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Rounded Buttons</div>
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
                  Rounded buttons provide a visually pleasing and modern touch
                  to your user interface. They soften the edges of traditional
                  buttons, making them appear more inviting and user-friendly.
                  This section explores how to use rounded buttons effectively
                  in your project.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary" rounded class="w-24">
                          Primary
                        </Button>
                        <Button variant="secondary" rounded class="w-24">
                          Secondary
                        </Button>
                        <Button variant="success" rounded class="w-24">
                          Success
                        </Button>
                        <Button variant="warning" rounded class="w-24">
                          Warning
                        </Button>
                        <Button variant="pending" rounded class="w-24">
                          Pending
                        </Button>
                        <Button variant="danger" rounded class="w-24">
                          Danger
                        </Button>
                        <Button variant="dark" rounded class="w-24">
                          Dark
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary" rounded class="w-24">
                            Primary
                          </Button>
                          <Button variant="secondary" rounded class="w-24">
                            Secondary
                          </Button>
                          <Button variant="success" rounded class="w-24">
                            Success
                          </Button>
                          <Button variant="warning" rounded class="w-24">
                            Warning
                          </Button>
                          <Button variant="pending" rounded class="w-24">
                            Pending
                          </Button>
                          <Button variant="danger" rounded class="w-24">
                            Danger
                          </Button>
                          <Button variant="dark" rounded class="w-24">
                            Dark
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Consider using rounded buttons for various actions, such as
                  primary actions, secondary actions, success notifications, and
                  more, to make your UI elements more aesthetically pleasing and
                  approachable.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Soft Color Buttons</div>
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
                  Soft color buttons add a touch of elegance and subtlety to
                  your user interface. These buttons use gentle, muted colors
                  that are visually appealing without being too overpowering. In
                  this section, you'll learn how to use soft color buttons
                  effectively in your project.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="soft-primary" rounded class="w-24">
                          Primary
                        </Button>
                        <Button variant="soft-secondary" rounded class="w-24">
                          Secondary
                        </Button>
                        <Button variant="soft-success" rounded class="w-24">
                          Success
                        </Button>
                        <Button variant="soft-warning" rounded class="w-24">
                          Warning
                        </Button>
                        <Button variant="soft-pending" rounded class="w-24">
                          Pending
                        </Button>
                        <Button variant="soft-danger" rounded class="w-24">
                          Danger
                        </Button>
                        <Button variant="soft-dark" rounded class="w-24">
                          Dark
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="soft-primary" rounded class="w-24">
                            Primary
                          </Button>
                          <Button variant="soft-secondary" rounded class="w-24">
                            Secondary
                          </Button>
                          <Button variant="soft-success" rounded class="w-24">
                            Success
                          </Button>
                          <Button variant="soft-warning" rounded class="w-24">
                            Warning
                          </Button>
                          <Button variant="soft-pending" rounded class="w-24">
                            Pending
                          </Button>
                          <Button variant="soft-danger" rounded class="w-24">
                            Danger
                          </Button>
                          <Button variant="soft-dark" rounded class="w-24">
                            Dark
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Soft color buttons provide a subtle yet visually appealing
                  option for your UI elements. Their gentle colors can enhance
                  the aesthetics of your user interface without overwhelming the
                  user.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Icon Buttons</div>
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
                  Icon buttons allow you to incorporate meaningful icons into
                  your user interface for various actions or functions. In this
                  section, you'll discover how to use icon buttons effectively
                  and enhance your user experience.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary" class="w-32">
                          <Lucide icon="Activity" class="w-4 h-4 mr-2" />
                          Activity
                        </Button>
                        <Button variant="secondary" class="w-32">
                          <Lucide icon="HardDrive" class="w-4 h-4 mr-2" />
                          Hard Drive
                        </Button>
                        <Button variant="success" class="w-32">
                          <Lucide icon="Calendar" class="w-4 h-4 mr-2" />
                          Calendar
                        </Button>
                        <Button variant="warning" class="w-32">
                          <Lucide icon="Share2" class="w-4 h-4 mr-2" />
                          Share
                        </Button>
                        <Button variant="pending" class="w-32">
                          <Lucide icon="Download" class="w-4 h-4 mr-2" />
                          Pending
                        </Button>
                        <Button variant="danger" class="w-32">
                          <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                          Trash
                        </Button>
                        <Button variant="dark" class="w-32">
                          <Lucide icon="Image" class="w-4 h-4 mr-2" />
                          Image
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary" class="w-32">
                            <Lucide icon="Activity" class="w-4 h-4 mr-2" />
                            Activity
                          </Button>
                          <Button variant="secondary" class="w-32">
                            <Lucide icon="HardDrive" class="w-4 h-4 mr-2" />{"
                            "} Hard Drive
                          </Button>
                          <Button variant="success" class="w-32">
                            <Lucide icon="Calendar" class="w-4 h-4 mr-2" />
                            Calendar
                          </Button>
                          <Button variant="warning" class="w-32">
                            <Lucide icon="Share2" class="w-4 h-4 mr-2" />
                            Share
                          </Button>
                          <Button variant="pending" class="w-32">
                            <Lucide icon="Download" class="w-4 h-4 mr-2" />
                            Pending
                          </Button>
                          <Button variant="danger" class="w-32">
                            <Lucide icon="Trash" class="w-4 h-4 mr-2" />
                            Trash
                          </Button>
                          <Button variant="dark" class="w-32">
                            <Lucide icon="Image" class="w-4 h-4 mr-2" />
                            Image
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Consider using icon buttons to streamline user interactions,
                  convey meaning at a glance, and create a more intuitive
                  interface for your audience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Icon Only Buttons</div>
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
                  Icon-only buttons are a powerful tool for creating minimalist
                  and intuitive user interfaces. In this section, you'll learn
                  how to use icon-only buttons effectively to enhance the
                  usability and aesthetics of your web or app project.
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
                      <div class="flex flex-wrap items-center gap-2">
                        <Button variant="primary">
                          <Lucide icon="Activity" class="w-5 h-5" />
                        </Button>
                        <Button variant="secondary">
                          <Lucide icon="HardDrive" class="w-5 h-5" />
                        </Button>
                        <Button variant="success">
                          <Lucide icon="Calendar" class="w-5 h-5" />
                        </Button>
                        <Button variant="warning">
                          <Lucide icon="Share2" class="w-5 h-5" />
                        </Button>
                        <Button variant="pending">
                          <Lucide icon="Download" class="w-5 h-5" />
                        </Button>
                        <Button variant="danger">
                          <Lucide icon="Trash" class="w-5 h-5" />
                        </Button>
                        <Button variant="dark">
                          <Lucide icon="Image" class="w-5 h-5" />
                        </Button>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-wrap items-center gap-2">
                          <Button variant="primary">
                            <Lucide icon="Activity" class="w-5 h-5" />
                          </Button>
                          <Button variant="secondary">
                            <Lucide icon="HardDrive" class="w-5 h-5" />
                          </Button>
                          <Button variant="success">
                            <Lucide icon="Calendar" class="w-5 h-5" />
                          </Button>
                          <Button variant="warning">
                            <Lucide icon="Share2" class="w-5 h-5" />
                          </Button>
                          <Button variant="pending">
                            <Lucide icon="Download" class="w-5 h-5" />
                          </Button>
                          <Button variant="danger">
                            <Lucide icon="Trash" class="w-5 h-5" />
                          </Button>
                          <Button variant="dark">
                            <Lucide icon="Image" class="w-5 h-5" />
                          </Button>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Icon-only buttons are an excellent choice for modern user
                  interfaces, offering simplicity, clarity, and a sleek design.
                  Whether you're designing a mobile app or a web application,
                  consider using icon-only buttons to create a user-friendly and
                  visually appealing interface that keeps users engaged and
                  informed.
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
                  <div class="-mt-px">Button</div>
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
                          HTML element type for the button (default is "button"
                          or "a")
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`size`</Table.Td>
                        <Table.Td>`Size`</Table.Td>
                        <Table.Td>Size of the button ("sm" or "lg")</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`variant`</Table.Td>
                        <Table.Td>`Variant`</Table.Td>
                        <Table.Td>Variant of the button style</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`elevated`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Indicates if the button has an elevated shadow
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`rounded`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Indicates if the button is rounded
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
                <a class="block -mt-px truncate" href=""> Basic Buttons </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Button Sizes </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Workign with Links
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Elevated Buttons </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Social Media Buttons
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Outline Buttons </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Loading State Buttons
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Rounded Buttons </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Soft Color Buttons
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Icon Buttons </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Icon Only Buttons </a>
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
