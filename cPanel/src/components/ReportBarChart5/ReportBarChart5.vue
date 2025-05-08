<script setup lang="ts">
import { computed } from "vue";
import { type ChartData, type ChartOptions } from "chart.js/auto";
import { useColorSchemeStore } from "@/stores/color-scheme";
import { useDarkModeStore } from "@/stores/dark-mode";
import Chart from "@/components/Base/Chart";
import { getColor } from "@/utils/colors";
import _ from "lodash";

const props = defineProps<{
  width?: number;
  height?: number;
}>();

const colorScheme = computed(() => useColorSchemeStore().colorScheme);
const darkMode = computed(() => useDarkModeStore().darkMode);

const data = computed<ChartData>(() => {
  return {
    labels: Array.from({ length: 15 }, (_, index) => index + 15),
    datasets: [
      {
        categoryPercentage: 0.4,
        barPercentage: 0.8,
        borderRadius: 2,
        data: Array.from({ length: 15 }, (index) => _.random(1, 1000)),
        borderWidth: 1,
        borderColor: colorScheme.value ? getColor("primary", 0.7) : "",
        backgroundColor: colorScheme.value ? getColor("primary", 0.35) : "",
      },
      {
        categoryPercentage: 0.4,
        barPercentage: 0.8,
        borderRadius: 2,
        data: Array.from({ length: 15 }, (index) => _.random(1, 1000)),
        borderWidth: 1,
        borderColor: colorScheme.value ? getColor("success", 0.7) : "",
        backgroundColor: colorScheme.value ? getColor("success", 0.35) : "",
      },
    ],
  };
});

const options = computed<ChartOptions>(() => {
  return {
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      },
    },
    scales: {
      x: {
        ticks: {
          color: getColor("slate.500", 0.7),
        },
        grid: {
          display: false,
        },
        border: {
          display: false,
        },
      },
      y: {
        ticks: {
          autoSkipPadding: 15,
          color: getColor("slate.500", 0.9),
          beginAtZero: true,
        },
        grid: {
          color: darkMode.value
            ? getColor("slate.400", 0.1)
            : getColor("slate.200", 0.7),
        },
        border: {
          display: false,
        },
      },
    },
  };
});
</script>

<template>
  <Chart
    type="bar"
    :width="props.width"
    :height="props.height"
    :data="data"
    :options="options"
  />
</template>
