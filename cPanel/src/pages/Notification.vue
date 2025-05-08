<script setup lang="ts">
import Table from "@/components/Base/Table";
import Preview from "@/components/Base/Preview";
import Lucide from "@/components/Base/Lucide";
import Notification from "@/components/Base/Notification";
import { type NotificationElement } from "@/components/Base/Notification";
import { FormSwitch } from "@/components/Base/Form";
import Button from "@/components/Base/Button";
import users from "@/fakers/users";
import { ref, provide } from "vue";

// Basic non sticky notification
const basicNonStickyNotification = ref<NotificationElement>();
const basicNonStickyNotificationToggle = () => {
  // Show notification
  basicNonStickyNotification.value?.showToast();
};

provide("bind[basicNonStickyNotification]", (el: NotificationElement) => {
  basicNonStickyNotification.value = el;
});

// Basic sticky notification
const basicStickyNotification = ref<NotificationElement>();
const basicStickyNotificationToggle = () => {
  // Show notification
  basicStickyNotification.value?.showToast();
};

provide("bind[basicStickyNotification]", (el: NotificationElement) => {
  basicStickyNotification.value = el;
});

// Success notification
const successNotification = ref<NotificationElement>();
const successNotificationToggle = () => {
  // Show notification
  successNotification.value?.showToast();
};

provide("bind[successNotification]", (el: NotificationElement) => {
  successNotification.value = el;
});

// Notification with actions
const notificationWithActions = ref<NotificationElement>();
const notificationWithActionsToggle = () => {
  // Show notification
  notificationWithActions.value?.showToast();
};

provide("bind[notificationWithActions]", (el: NotificationElement) => {
  notificationWithActions.value = el;
});

// Notification with avatar
const notificationWithAvatar = ref<NotificationElement>();
const notificationWithAvatarToggle = () => {
  // Show notification
  notificationWithAvatar.value?.showToast();
};

provide("bind[notificationWithAvatar]", (el: NotificationElement) => {
  notificationWithAvatar.value = el;
});

// Notification with split buttons
const notificationWithSplitButtons = ref<NotificationElement>();
const notificationWithSplitButtonsToggle = () => {
  // Show notification
  notificationWithSplitButtons.value?.showToast();
};

provide("bind[notificationWithSplitButtons]", (el: NotificationElement) => {
  notificationWithSplitButtons.value = el;
});

// Notification with buttons below
const notificationWithButtonsBelow = ref<NotificationElement>();
const notificationWithButtonsBelowToggle = () => {
  // Show notification
  notificationWithButtonsBelow.value?.showToast();
};

provide("bind[notificationWithButtonsBelow]", (el: NotificationElement) => {
  notificationWithButtonsBelow.value = el;
});
</script>

<template>
  <div class="grid grid-cols-12 gap-y-10 gap-x-6">
    <div class="col-span-12">
      <div
        class="flex flex-col mt-4 md:mt-0 md:h-10 gap-y-3 md:items-center md:flex-row"
      >
        <div class="text-base font-medium group-[.mode--light]:text-white">
          Notification
        </div>
        <div class="group-[.mode--light]:text-white/80 mx-3 hidden lg:block">
          •
        </div>
        <div
          class="group-[.mode--light]:text-white/80 text-slate-500 leading-relaxed hidden lg:block"
        >
          Explore notification component, elevate user experience with simple
          and celebratory notifications!
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
                <div class="text-[0.94rem] font-medium">Basic Notification</div>
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
                  Notifications provide a way to communicate important messages
                  or updates to your users. This section covers two types of
                  basic notifications: non-sticky and sticky notifications.
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
                        <!-- BEGIN: Basic Non Sticky Notification Content -->
                        <Notification
                            refKey="basicNonStickyNotification"
                            :options="{
                            duration: 3000,
                            }"
                            class="flex flex-col sm:flex-row"
                        >
                            <div class="font-medium">Yay! Updates Published!</div>
                            <a
                            class="mt-1 font-medium text-primary dark:text-slate-400 sm:mt-0 sm:ml-40"
                            href=""
                            >
                            Review Changes
                            </a>
                        </Notification>
                        <!-- END: Basic Non Sticky Notification Content -->
                        <!-- BEGIN: Basic Sticky Notification Content -->
                        <Notification
                            refKey="basicStickyNotification"
                            class="flex flex-col sm:flex-row"
                        >
                            <div class="font-medium">Yay! Updates Published!</div>
                            <a
                            class="mt-1 font-medium text-primary dark:text-slate-400 sm:mt-0 sm:ml-40"
                            href=""
                            >
                            Review Changes
                            </a>
                        </Notification>
                        <!-- END: Basic Sticky Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button
                            variant="primary"
                            class="mr-1"
                            @click="basicNonStickyNotificationToggle"
                        >
                            Show Non Sticky Notification
                        </Button>
                        <Button
                            variant="primary"
                            class="mt-2 sm:mt-0"
                            @click="basicStickyNotificationToggle"
                        >
                            Show Sticky Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                        <div class="text-center">
                            <!-- BEGIN: Basic Non Sticky Notification Content -->
                            <Notification
                            refKey="basicNonStickyNotification"
                            :options="{
                                duration: 3000,
                            }"
                            class="flex flex-col sm:flex-row"
                            >
                            <div class="font-medium">Yay! Updates Published!</div>
                            <a
                                class="mt-1 font-medium text-primary dark:text-slate-400 sm:mt-0 sm:ml-40"
                                href=""
                            >
                                Review Changes
                            </a>
                            </Notification>
                            <!-- END: Basic Non Sticky Notification Content -->
                            <!-- BEGIN: Basic Sticky Notification Content -->
                            <Notification
                            refKey="basicStickyNotification"
                            class="flex flex-col sm:flex-row"
                            >
                            <div class="font-medium">Yay! Updates Published!</div>
                            <a
                                class="mt-1 font-medium text-primary dark:text-slate-400 sm:mt-0 sm:ml-40"
                                href=""
                            >
                                Review Changes
                            </a>
                            </Notification>
                            <!-- END: Basic Sticky Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button
                            variant="primary"
                            class="mr-1"
                            @click="basicNonStickyNotificationToggle"
                            >
                            Show Non Sticky Notification
                            </Button>
                            <Button
                            variant="primary"
                            class="mt-2 sm:mt-0"
                            @click="basicStickyNotificationToggle"
                            >
                            Show Sticky Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                        </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Basic non sticky notification
                            const basicNonStickyNotification = ref<NotificationElement>();
                            const basicNonStickyNotificationToggle = () => {
                            // Show notification
                            basicNonStickyNotification.current?.showToast();
                            };
                        
                            // Basic sticky notification
                            const basicStickyNotification = ref<NotificationElement>();
                            const basicStickyNotificationToggle = () => {
                            // Show notification
                            basicStickyNotification.current?.showToast();
                            };
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Basic notifications are a simple yet effective way to inform
                  users about important updates or actions they need to take.
                  Whether you choose non-sticky or sticky notifications depends
                  on the urgency and user experience you want to provide.
                  Experiment with different styles and messages to create
                  notifications that enhance your application's usability.
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
                  Success Notification
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
                  Success notifications are a way to provide positive feedback
                  to users when they perform actions successfully. This section
                  demonstrates how to create and use success notifications.
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
                        <!-- BEGIN: Notification Content -->
                        <Notification refKey="successNotification" class="flex">
                            <Lucide icon="CheckCircle" class="text-success" />
                            <div class="ml-4 mr-4">
                            <div class="font-medium">Message Saved!</div>
                            <div class="mt-1 text-slate-500">
                                The message will be sent in 5 minutes.
                            </div>
                            </div>
                        </Notification>
                        <!-- END: Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button variant="primary" @click="successNotificationToggle">
                            Show Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                            <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <Notification refKey="successNotification" class="flex">
                                <Lucide icon="CheckCircle" class="text-success" />
                                <div class="ml-4 mr-4">
                                <div class="font-medium">Message Saved!</div>
                                <div class="mt-1 text-slate-500">
                                    The message will be sent in 5 minutes.
                                </div>
                                </div>
                            </Notification>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button variant="primary" @click="successNotificationToggle">
                                Show Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                            </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Success notification
                            const successNotification = ref<NotificationElement>();
                            const successNotificationToggle = () => {
                            // Show notification
                            successNotification.current?.showToast();
                            };
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Success notifications play a vital role in enhancing the user
                  experience by providing immediate feedback on successful
                  actions. They help users understand that their actions were
                  completed successfully, increasing their confidence in your
                  application. Consider using success notifications for actions
                  like saving data, completing tasks, or successful submissions.
                  Customize the message and style to align with your
                  application's branding and user expectations.
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
                  Notification with Actions
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
                  Notifications with actions allow you to provide users with
                  clear options to take after receiving a notification. This
                  section demonstrates how to create and use notifications with
                  actions.
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
                        <!-- BEGIN: Notification Content -->
                        <Notification refKey="notificationWithActions" class="flex">
                            <Lucide icon="HardDrive" />
                            <div class="ml-4 mr-4">
                            <div class="font-medium">Storage Removed!</div>
                            <div class="mt-1 text-slate-500">
                                The server will restart in 30 seconds, don't make
                                <br />
                                changes during the update process!
                            </div>
                            <div class="font-medium flex mt-1.5">
                                <a class="text-primary dark:text-slate-400" href="">
                                Restart Now
                                </a>
                                <a class="ml-3 text-slate-500" href=""> Cancel </a>
                            </div>
                            </div>
                        </Notification>
                        <!-- END: Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button variant="primary" @click="notificationWithActionsToggle">
                            Show Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <Notification refKey="notificationWithActions" class="flex">
                            <Lucide icon="HardDrive" />
                            <div class="ml-4 mr-4">
                                <div class="font-medium">Storage Removed!</div>
                                <div class="mt-1 text-slate-500">
                                The server will restart in 30 seconds, don't make
                                <br />
                                changes during the update process!
                                </div>
                                <div class="font-medium flex mt-1.5">
                                <a class="text-primary dark:text-slate-400" href="">
                                    Restart Now
                                </a>
                                <a class="ml-3 text-slate-500" href=""> Cancel </a>
                                </div>
                            </div>
                            </Notification>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button
                            variant="primary"
                            @click="notificationWithActionsToggle"
                            >
                            Show Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                        </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Notification with actions
                            const notificationWithActions = ref<NotificationElement>();
                            const notificationWithActionsToggle = () => {
                            // Show notification
                            notificationWithActions.current?.showToast();
                            };  
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Notifications with actions are a powerful way to engage users
                  and guide them on the next steps they can take. These
                  notifications are particularly useful for critical alerts or
                  situations where user interaction is required. By providing
                  clear and relevant action buttons, you can help users make
                  informed decisions and take appropriate actions. Customize the
                  message, icons, and actions to match your application's
                  requirements and user needs.
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
                  Notification with Avatar
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
                  Notifications with avatars allow you to personalize
                  notifications by including user avatars or profile pictures.
                  This section demonstrates how to create and use notifications
                  with avatars.
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
                        <!-- BEGIN: Notification Content -->
                        <Notification
                            refKey="notificationWithAvatar"
                            :options="{
                            close: false,
                            }"
                            class="flex"
                        >
                            <div
                            class="flex-none w-10 h-10 overflow-hidden rounded-full image-fit"
                            >
                            <img
                                alt="Midone Tailwind HTML Admin Template"
                                :src="users.fakeUsers()[0].photo"
                            />
                            </div>
                            <div class="ml-4 sm:mr-28">
                            <div class="font-medium">
                                {{ users.fakeUsers()[0].name }}
                            </div>
                            <div class="mt-1 text-slate-500">See you later! 😃😃😃</div>
                            </div>
                            <a
                            data-dismiss="notification"
                            class="absolute top-0 bottom-0 right-0 flex items-center px-6 font-medium border-l border-slate-200/60 dark:border-darkmode-400 text-primary dark:text-slate-400"
                            href="#"
                            >
                            Reply
                            </a>
                        </Notification>
                        <!-- END: Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button variant="primary" @click="notificationWithAvatarToggle">
                            Show Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <Notification
                            refKey="notificationWithAvatar"
                            :options="{
                                close: false,
                            }"
                            class="flex"
                            >
                            <div
                                class="flex-none w-10 h-10 overflow-hidden rounded-full image-fit"
                            >
                                <img
                                alt="Midone Tailwind HTML Admin Template"
                                :src="users.fakeUsers()[0].photo"
                                />
                            </div>
                            <div class="ml-4 sm:mr-28">
                                <div class="font-medium">
                                \{\{ users.fakeUsers()[0].name \}\}
                                </div>
                                <div class="mt-1 text-slate-500">See you later! 😃😃😃</div>
                            </div>
                            <a
                                data-dismiss="notification"
                                class="absolute top-0 bottom-0 right-0 flex items-center px-6 font-medium border-l border-slate-200/60 dark:border-darkmode-400 text-primary dark:text-slate-400"
                                href="#"
                            >
                                Reply
                            </a>
                            </Notification>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button variant="primary" @click="notificationWithAvatarToggle">
                            Show Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                        </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Notification with avatar
                            const notificationWithAvatar = ref<NotificationElement>();
                            const notificationWithAvatarToggle = () => {
                            // Show notification
                            notificationWithAvatar.current?.showToast();
                            };
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Notifications with avatars add a personal touch to your
                  notifications, making them more engaging and relatable to
                  users. You can use avatars to identify the sender or source of
                  the notification, creating a more user-friendly and
                  interactive experience. Customize the avatar, user
                  information, and message to match your application's context
                  and user interactions.
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
                  Notification with Split Buttons
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
                  Notifications with split buttons allow you to provide multiple
                  action options within a single notification. This section
                  demonstrates how to create and use notifications with split
                  buttons.
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
                        <!-- BEGIN: Notification Content -->
                        <Notification
                            refKey="notificationWithSplitButtons"
                            :options="{
                            close: false,
                            }"
                            class="flex"
                        >
                            <div class="sm:mr-40">
                            <div class="font-medium">Introducing new theme</div>
                            <div class="mt-1 text-slate-500">Release version 2.3.3</div>
                            </div>
                            <div
                            class="absolute top-0 bottom-0 right-0 flex flex-col border-l border-slate-200/60 dark:border-darkmode-400"
                            >
                            <a
                                class="flex items-center justify-center flex-1 px-6 font-medium border-b text-primary dark:text-slate-400 border-slate-200/60 dark:border-darkmode-400"
                                href="#"
                            >
                                View Details
                            </a>
                            <a
                                data-dismiss="notification"
                                class="flex items-center justify-center flex-1 px-6 font-medium text-slate-500"
                                href="#"
                            >
                                Dismiss
                            </a>
                            </div>
                        </Notification>
                        <!-- END: Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button
                            variant="primary"
                            @click="notificationWithSplitButtonsToggle"
                        >
                            Show Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <Notification
                            refKey="notificationWithSplitButtons"
                            :options="{
                                close: false,
                            }"
                            class="flex"
                            >
                            <div class="sm:mr-40">
                                <div class="font-medium">Introducing new theme</div>
                                <div class="mt-1 text-slate-500">Release version 2.3.3</div>
                            </div>
                            <div
                                class="absolute top-0 bottom-0 right-0 flex flex-col border-l border-slate-200/60 dark:border-darkmode-400"
                            >
                                <a
                                class="flex items-center justify-center flex-1 px-6 font-medium border-b text-primary dark:text-slate-400 border-slate-200/60 dark:border-darkmode-400"
                                href="#"
                                >
                                View Details
                                </a>
                                <a
                                data-dismiss="notification"
                                class="flex items-center justify-center flex-1 px-6 font-medium text-slate-500"
                                href="#"
                                >
                                Dismiss
                                </a>
                            </div>
                            </Notification>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button
                            variant="primary"
                            @click="notificationWithSplitButtonsToggle"
                            >
                            Show Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                        </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Notification with split buttons
                            const notificationWithSplitButtons = ref<NotificationElement>();
                            const notificationWithSplitButtonsToggle = () => {
                            // Show notification
                            notificationWithSplitButtons.current?.showToast();
                            };
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Notifications with split buttons enhance user interaction by
                  offering multiple actions within a single notification. This
                  feature is useful for providing users with choices or quick
                  access to relevant actions without cluttering the notification
                  interface. Customize the buttons and actions to suit your
                  application's needs and provide a seamless user experience.
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
                  Notification with Buttons Below
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
                  Notifications with buttons below allow you to include action
                  buttons directly beneath the notification content. This
                  section demonstrates how to create and use notifications with
                  buttons below.
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
                        <!-- BEGIN: Notification Content -->
                        <Notification
                            refKey="notificationWithButtonsBelow"
                            :options="{
                            close: false,
                            }"
                            class="flex"
                        >
                            <Lucide icon="FileText" />
                            <div class="ml-4 mr-5 sm:mr-20">
                            <div class="font-medium">
                                {{ users.fakeUsers()[0].name }}
                            </div>
                            <div class="mt-1 text-slate-500">Sent you new documents.</div>
                            <div class="mt-2.5">
                                <Button
                                variant="primary"
                                as="a"
                                class="px-2 py-1 mr-2"
                                href=""
                                >
                                Preview
                                </Button>
                                <Button
                                variant="outline-secondary"
                                as="a"
                                class="px-2 py-1"
                                href=""
                                >
                                Download
                                </Button>
                            </div>
                            </div>
                        </Notification>
                        <!-- END: Notification Content -->
                        <!-- BEGIN: Notification Toggle -->
                        <Button
                            variant="primary"
                            @click="notificationWithButtonsBelowToggle"
                        >
                            Show Notification
                        </Button>
                        <!-- END: Notification Toggle -->
                        </div>
                    </Preview.Panel>
                    <Preview.Panel type="source">
                        <Preview.Highlight>
                        {{`
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <Notification
                            refKey="notificationWithButtonsBelow"
                            :options="{
                                close: false,
                            }"
                            class="flex"
                            >
                            <Lucide icon="FileText" />
                            <div class="ml-4 mr-5 sm:mr-20">
                                <div class="font-medium">
                                \{\{ users.fakeUsers()[0].name \}\}
                                </div>
                                <div class="mt-1 text-slate-500">
                                Sent you new documents.
                                </div>
                                <div class="mt-2.5">
                                <Button
                                    variant="primary"
                                    as="a"
                                    class="px-2 py-1 mr-2"
                                    href=""
                                >
                                    Preview
                                </Button>
                                <Button
                                    variant="outline-secondary"
                                    as="a"
                                    class="px-2 py-1"
                                    href=""
                                >
                                    Download
                                </Button>
                                </div>
                            </div>
                            </Notification>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <Button
                            variant="primary"
                            @click="notificationWithButtonsBelowToggle"
                            >
                            Show Notification
                            </Button>
                            <!-- END: Notification Toggle -->
                        </div>
                        `}}
                        </Preview.Highlight>
                        <Preview.Highlight type="javascript" class="mt-5">
                        {{`
                            // Notification with buttons below
                            const notificationWithButtonsBelow = ref<NotificationElement>();
                            const notificationWithButtonsBelowToggle = () => {
                            // Show notification
                            notificationWithButtonsBelow.current?.showToast();
                            };
                        `}}
                        </Preview.Highlight>
                    </Preview.Panel>
                  </div>
                </div>
                <p class="leading-relaxed">
                  Notifications with buttons below enhance user engagement by
                  placing actionable buttons directly beneath the notification
                  message. This design allows users to quickly respond or take
                  specific actions related to the notification's content.
                  Customize the buttons and content to suit your application's
                  needs and provide a seamless user experience.
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
                  <div class="-mt-px">Dialog</div>
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
                        <Table.Td>`options`</Table.Td>
                        <Table.Td>`Options`</Table.Td>
                        <Table.Td>
                          An object containing options for configuring the
                          notification behavior. Explore all the available APIs
                          through the following helpful documentation links
                          <a
                            href="https://apvarun.github.io/toastify-js/"
                            target="blank"
                            class="ml-1 text-primary"
                          >
                            https://apvarun.github.io/toastify-js/
                          </a>
                          .
                        </Table.Td>
                      </Table.Tr>
                      <Table.Tr>
                        <Table.Td>`getRef`</Table.Td>
                        <Table.Td>
                          `(el: NotificationElement) =&gt; void`
                        </Table.Td>
                        <Table.Td>
                          A callback function to receive a reference to the
                          NotificationElement.
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
                <a class="block -mt-px truncate" href="">
                  Basic Notification
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Success Notification
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Notification with Actions
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Notification with Avatar
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] group-[.mode--light]:text-white/90 [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 [.group.mode--light_&.active]:text-white [.group.mode--light_&.active]:before:bg-white dark:[.group.mode--light_&.active]:before:bg-white/50 dark:group-[.mode--light]:text-slate-400 dark:text-slate-400',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Notification with Split Buttons
                </a>
              </li>
              <li
                :class="[
                  'relative px-5 py-[9.2px] [&.active]:text-primary [&.active]:font-medium [&.active]:before:bg-primary/70 dark:text-slate-400',
                    'before:content-[\'\'] before:absolute before:h-[60%] before:w-0.5 before:left-0 before:inset-y-0 before:my-auto before:-ml-px',
                ]"
              >
                <a class="block -mt-px truncate" href="">
                  Notification with Buttons Below
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
