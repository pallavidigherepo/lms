<script lang="ts">
export default {
  inheritAttrs: false,
};

export interface ButtonProps extends /* @vue-ignore */ ButtonHTMLAttributes {
  as?: string | object;
}
</script>

<script setup lang="ts">
import _ from "lodash";
import { twMerge } from "tailwind-merge";
import { computed, type ButtonHTMLAttributes, useAttrs, inject } from "vue";
import { type ProvideTab } from "./Tab/Provider.vue";
import { type ProvideList } from "./List.vue";

const { as } = withDefaults(defineProps<ButtonProps>(), {
  as: "a",
});

const attrs = useAttrs();

const tab = inject<ProvideTab>("tab");
const list = inject<ProvideList>("list");

const computedClass = computed(() =>
  twMerge([
    "cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400",
    tab?.selected.value && "text-slate-700 dark:text-white",

    // Default
    list?.variant == "tabs" &&
      "block border-transparent rounded-t-md dark:border-transparent",
    list?.variant == "tabs" &&
      tab?.selected.value &&
      "bg-white border-slate-200 border-b-transparent font-medium dark:bg-transparent dark:border-t-darkmode-400 dark:border-b-darkmode-600 dark:border-x-darkmode-400",
    list?.variant == "tabs" &&
      !tab?.selected.value &&
      "hover:bg-slate-100 dark:hover:bg-darkmode-400 dark:hover:border-transparent",

    // Pills
    list?.variant == "pills" && "rounded-md border-0",
    list?.variant == "pills" &&
      tab?.selected.value &&
      "bg-primary text-white font-medium",

    // Boxed tabs
    list?.variant == "boxed-tabs" &&
      "rounded-md py-1.5 dark:border-transparent",
    list?.variant == "boxed-tabs" &&
      tab?.selected.value &&
      "text-slate-700 border shadow-sm font-medium border-slate-200 bg-white dark:text-slate-300 dark:bg-darkmode-400 dark:border-darkmode-400",

    // Link tabs
    list?.variant == "link-tabs" &&
      "border-b-2 border-transparent dark:border-transparent",
    list?.variant == "link-tabs" &&
      tab?.selected.value &&
      "border-b-primary font-medium dark:border-b-primary",

    typeof attrs.class === "string" && attrs.class,
  ])
);
</script>

<template>
  <component :is="as" :class="computedClass" v-bind="_.omit(attrs, 'class')">
    <slot></slot>
  </component>
</template>
