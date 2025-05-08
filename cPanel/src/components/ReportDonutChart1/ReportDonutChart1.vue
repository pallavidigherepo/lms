<script setup lang="ts">
import { computed } from "vue";
import { type ChartData, type ChartOptions } from "chart.js/auto";
import { useColorSchemeStore } from "@/stores/color-scheme";
import { useDarkModeStore } from "@/stores/dark-mode";
import Chart from "@/components/Base/Chart";
import { getColor } from "@/utils/colors";

const props = defineProps<{
  width?: number;
  height?: number;
}>();

const colorScheme = computed(() => useColorSchemeStore().colorScheme);
const darkMode = computed(() => useDarkModeStore().darkMode);

const chartData = [30, 20, 40];
const chartColors = () => [
  getColor("success", 0.75),
  getColor("danger", 0.75),
  getColor("theme.2", 0.75),
];
const data = computed<ChartData>(() => {
  return {
    labels: ["Yellow", "Dark"],
    datasets: [
      {
        data: chartData,
        backgroundColor: colorScheme.value ? chartColors() : "",
        hoverBackgroundColor: colorScheme.value ? chartColors() : "",
        borderWidth: 2,
        borderColor: darkMode.value
          ? getColor("darkmode.700")
          : getColor("white"),
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
    cutout: "89%",
  };
});
</script>

<template>
  <Chart
    type="doughnut"
    :width="props.width"
    :height="props.height"
    :data="data"
    :options="options"
  />
</template>
