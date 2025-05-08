<script lang="ts">
export default {
  inheritAttrs: false,
};

export interface MenuProps
  extends /* @vue-ignore */ ExtractProps<typeof HeadlessMenu> {
  as?: string | object;
}
</script>

<script setup lang="ts">
import _ from "lodash";
import { twMerge } from "tailwind-merge";
import { Menu as HeadlessMenu } from "@headlessui/vue";
import { useAttrs, computed } from "vue";

const { as } = withDefaults(defineProps<MenuProps>(), {
  as: "div",
});

const attrs = useAttrs();
const computedClass = computed(() =>
  twMerge(["relative", typeof attrs.class === "string" && attrs.class])
);
</script>

<template>
  <HeadlessMenu :as="as" :class="computedClass" v-bind="_.omit(attrs, 'class')">
    <slot></slot>
  </HeadlessMenu>
</template>
