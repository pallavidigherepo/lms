<script setup lang="ts">
import _ from "lodash";
import Table from "@/components/Base/Table";
import Alert from "@/components/Base/Alert";
import Lucide from "@/components/Base/Lucide";
import Preview from "@/components/Base/Preview";
import { FormSwitch } from "@/components/Base/Form";
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div class="flex items-center h-10">
        <div class="text-lg font-medium group-[.mode--light]:text-white">
          Alert
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Discover the power of our Alerts component for delivering important
          messages and notifications to your users.
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
                <div class="text-[0.94rem] font-medium">Basic Alerts</div>
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
                  Alerts are essential for communicating important messages,
                  warnings, or updates to users. In this section, you'll learn
                  how to use basic alerts effectively to provide information and
                  enhance the user experience.
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
                      <div class="flex flex-col gap-2">
                        <Alert variant="primary"> Awesome simple alert </Alert>
                        <Alert variant="secondary">
                          Awesome simple alert
                        </Alert>
                        <Alert variant="success"> Awesome simple alert </Alert>
                        <Alert variant="warning"> Awesome simple alert </Alert>
                        <Alert variant="pending"> Awesome simple alert </Alert>
                        <Alert variant="danger"> Awesome simple alert </Alert>
                        <Alert variant="dark">Awesome simple alert</Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert variant="primary">
                            Awesome simple alert
                          </Alert>
                          <Alert variant="secondary">
                            Awesome simple alert
                          </Alert>
                          <Alert variant="success">
                            Awesome simple alert
                          </Alert>
                          <Alert variant="warning">
                            Awesome simple alert
                          </Alert>
                          <Alert variant="pending">
                            Awesome simple alert
                          </Alert>
                          <Alert variant="danger"> Awesome simple alert </Alert>
                          <Alert variant="dark">Awesome simple alert</Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Basic alerts are a fundamental element of user interface
                  design, serving as a means to communicate important messages
                  clearly and effectively. Whether you're building a website or
                  an application, incorporating basic alerts can greatly improve
                  the user experience by providing timely information and
                  feedback.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Icon Alerts</div>
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
                  Icon alerts combine informative messages with easily
                  recognizable icons to convey important information to users
                  effectively. This section will guide you on how to use icon
                  alerts in your project.
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
                      <div class="flex flex-col gap-2">
                        <Alert variant="primary" class="flex items-center">
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="secondary" class="flex items-center">
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="success" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="warning" class="flex items-center">
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="pending" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="danger" class="flex items-center">
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="dark" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert variant="primary" class="flex items-center">
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="secondary" class="flex items-center">
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="success" class="flex items-center">
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="warning" class="flex items-center">
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="pending" class="flex items-center">
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="danger" class="flex items-center">
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="dark" class="flex items-center">
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Icon alerts are a valuable tool for enhancing user interaction
                  by providing clear and visually appealing messages. By
                  following the steps above, you can easily integrate icon
                  alerts into your project and effectively communicate important
                  information to your users.
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
                  Additional Content Alerts
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
                  Additional content alerts allow you to convey more information
                  to users by including extra elements within the alert, such as
                  icons, labels, or additional text. This section provides
                  guidance on how to use additional content alerts effectively.
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
                      <div class="flex flex-col gap-2">
                        <Alert variant="primary">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="secondary">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs text-white rounded-md bg-slate-500"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="success">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="warning">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="pending">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="danger">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                        <Alert variant="dark">
                          <div class="flex items-center">
                            <div class="text-lg font-medium">
                              Awesome alert with additional info
                            </div>
                            <div
                              class="px-1 ml-auto text-xs text-white rounded-md bg-slate-500"
                            >
                              New
                            </div>
                          </div>
                          <div class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s.
                          </div>
                        </Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert variant="primary">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="secondary">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs text-white rounded-md bg-slate-500"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="success">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="warning">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="pending">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="danger">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs bg-white rounded-md text-slate-700"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                          <Alert variant="dark">
                            <div class="flex items-center">
                              <div class="text-lg font-medium">
                                Awesome alert with additional info
                              </div>
                              <div
                                class="px-1 ml-auto text-xs text-white rounded-md bg-slate-500"
                              >
                                New
                              </div>
                            </div>
                            <div class="mt-3">
                              Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry. Lorem Ipsum has been the
                              industry's standard dummy text ever since the
                              1500s.
                            </div>
                          </Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Additional content alerts are a valuable tool for delivering
                  richer information to users while maintaining a clean and
                  organized design. By following the steps above, you can easily
                  integrate additional content alerts into your project and
                  enhance your communication with users.
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
                  Icon & Dismiss Alerts
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
                  Icon & Dismiss Alerts combine icons with dismiss
                  functionality, allowing you to display important messages to
                  users and give them the option to close the alert when they've
                  read it. This section provides guidance on how to use these
                  alerts effectively.
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
                      <div class="flex flex-col gap-2">
                        <Alert
                          variant="primary"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="text-white"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="secondary"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="success"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="warning"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="pending"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="danger"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="text-white"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="dark"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="text-white"
                            aria-label="Close"
                            @click="dismiss"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert
                            variant="primary"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="text-white"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="secondary"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="success"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="warning"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="pending"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="danger"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="text-white"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="dark"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="text-white"
                              aria-label="Close"
                              @click="dismiss"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Icon & Dismiss Alerts are a user-friendly way to provide
                  information and allow users to manage their notifications. By
                  following the steps above, you can seamlessly integrate these
                  alerts into your project and improve user interaction and
                  communication.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Outline Alerts</div>
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
                  Outline Alerts provide a clean and minimalistic way to display
                  important messages with outlined borders. This section
                  provides guidance on how to use these alerts effectively to
                  convey information to your users.
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
                      <div class="flex flex-col gap-2">
                        <Alert
                          variant="outline-primary"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-secondary"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-success"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-warning"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-pending"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-danger"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                        <Alert
                          variant="outline-dark"
                          class="flex items-center"
                          v-slot="{ dismiss }"
                        >
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                          <Alert.DismissButton
                            type="button"
                            class="btn-close"
                            @click="dismiss"
                            aria-label="Close"
                          >
                            <Lucide icon="X" class="w-4 h-4" />
                          </Alert.DismissButton>
                        </Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert
                            variant="outline-primary"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-secondary"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-success"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-warning"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-pending"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-danger"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                          <Alert
                            variant="outline-dark"
                            class="flex items-center"
                            v-slot="{ dismiss }"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                            <Alert.DismissButton
                              type="button"
                              class="btn-close"
                              @click="dismiss"
                              aria-label="Close"
                            >
                              <Lucide icon="X" class="w-4 h-4" />
                            </Alert.DismissButton>
                          </Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Outline Alerts offer a sleek and effective way to communicate
                  essential information to users while maintaining a clean
                  design. By following the steps above, you can seamlessly
                  integrate these alerts into your project and enhance the user
                  experience.
                </p>
              </div>
            </Preview>
          </div>
          <div class="flex flex-col p-5 box box--stacked">
            <Preview v-slot="{ toggle }">
              <div
                class="flex flex-col sm:items-center pb-5 mb-5 border-b border-dashed sm:flex-row border-slate-300/70"
              >
                <div class="text-[0.94rem] font-medium">Soft Color Alerts</div>
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
                  Soft Color Alerts provide a visually pleasing and gentle way
                  to convey important messages with soft color tones. This
                  section provides guidance on how to use these alerts
                  effectively to enhance the user experience.
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
                      <div class="flex flex-col gap-2">
                        <Alert variant="soft-primary" class="flex items-center">
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert
                          variant="soft-secondary"
                          class="flex items-center"
                        >
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="soft-success" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="soft-warning" class="flex items-center">
                          <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="soft-pending" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="soft-danger" class="flex items-center">
                          <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                        <Alert variant="soft-dark" class="flex items-center">
                          <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                          Awesome alert with icon
                        </Alert>
                      </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                      <Preview.Highlight>
                        {{`
                        <div class="flex flex-col gap-2">
                          <Alert
                            variant="soft-primary"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert
                            variant="soft-secondary"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert
                            variant="soft-success"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert
                            variant="soft-warning"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertCircle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert
                            variant="soft-pending"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert
                            variant="soft-danger"
                            class="flex items-center"
                          >
                            <Lucide icon="AlertOctagon" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                          <Alert variant="soft-dark" class="flex items-center">
                            <Lucide icon="AlertTriangle" class="w-6 h-6 mr-2" />
                            Awesome alert with icon
                          </Alert>
                        </div>
                        `}}
                      </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Soft Color Alerts offer a subtle and pleasing way to
                  communicate essential information to users while maintaining a
                  gentle aesthetic. By following the steps above, you can
                  seamlessly integrate these alerts into your project and create
                  a visually appealing user experience.
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
                  <div class="-mt-px">Alert</div>
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
                        <Table.Td>`dismissible`</Table.Td>
                        <Table.Td>`boolean`</Table.Td>
                        <Table.Td>
                          Indicates if the alert can be dismissed
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`variant`</Table.Td>
                        <Table.Td>`Variant`</Table.Td>
                        <Table.Td>Variant of the alert style</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onShow`</Table.Td>
                        <Table.Td>`() =&gt; {}`</Table.Td>
                        <Table.Td>Callback when the alert is shown</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onShown`</Table.Td>
                        <Table.Td>`() =&gt; {}`</Table.Td>
                        <Table.Td>Callback after the alert is shown</Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onHide`</Table.Td>
                        <Table.Td>`() =&gt; {}`</Table.Td>
                        <Table.Td>
                          Callback when the alert is about to hide
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`onHidden`</Table.Td>
                        <Table.Td>`() =&gt; {}`</Table.Td>
                        <Table.Td>
                          Callback after the alert is hidden
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
                  <div class="-mt-px">Alert.DismissButton</div>
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
                          HTML element type for the dismiss button (default is
                          "button" or "a")
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
                <a class="block -mt-px truncate" href=""> Basic Alerts </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Icon Alerts </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Additional Content Alerts
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Icon & Dismiss Alerts
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Outline Alerts </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                  'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href=""> Soft Color Alerts </a>
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
