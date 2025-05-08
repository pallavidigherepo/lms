<script lang="ts">
export default {
  inheritAttrs: false,
};

export interface LinkProps extends /* @vue-ignore */ LiHTMLAttributes {
  as?: string | object;
  active?: boolean;
}
</script>

<script setup lang="ts">
import _ from "lodash";
import { twMerge } from "tailwind-merge";
import { computed, type LiHTMLAttributes, useAttrs } from "vue";
import Button from "../Button";

const { as, active } = withDefaults(defineProps<LinkProps>(), {
  as: "a",
  active: false,
});

const attrs = useAttrs();

const computedClass = computed(() =>
  twMerge([
    "min-w-0 sm:min-w-[40px] font-normal flex items-center justify-center text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 h-full",
    active && "rounded-[0.5rem] bg-white font-medium dark:bg-darkmode-400",
    !active && "shadow-none border-transparent",
    typeof attrs.class === "string" && attrs.class,
  ])
);
</script>

<template>
  <li class="flex-1 sm:flex-initial">
    <Button :as="as" :class="computedClass" v-bind="_.omit(attrs, 'class')">
      <slot></slot>
    </Button>
  </li>
</template>
