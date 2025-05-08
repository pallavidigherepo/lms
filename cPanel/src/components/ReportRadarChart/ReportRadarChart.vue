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

const data = computed<ChartData>(() => {
  return {
    labels: [
      "Quality Metrics",
      "Resource Allocation",
      "Staffing Levels",
      "Patient Demographics",
      "Operational Efficiency",
      "Financial Performance",
    ],
    datasets: [
      {
        label: "My First Dataset",
        data: [65, 59, 90, 56, 55, 40],
        fill: true,
        borderWidth: 1,
        backgroundColor: getColor("primary", 0.2),
        borderColor: getColor("primary", 0.6),
        pointBackgroundColor: getColor("primary", 0.6),
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: getColor("primary", 0.6),
      },
      {
        label: "My Second Dataset",
        data: [28, 48, 40, 19, 27, 100],
        fill: true,
        borderWidth: 1,
        backgroundColor: getColor("info", 0.2),
        borderColor: getColor("info", 0.6),
        pointBackgroundColor: getColor("info", 0.6),
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: getColor("info", 0.6),
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
      r: {
        ticks: {
          stepSize: 40,
          color: darkMode.value
            ? getColor("slate.400")
            : getColor("slate.500", 0.9),
          backdropColor: "transparent",
        },
        pointLabels: {
          font: {
            size: 11,
          },
          color: darkMode.value
            ? getColor("slate.400")
            : getColor("slate.500", 0.9),
        },
        grid: {
          color: darkMode.value
            ? getColor("slate.700", 0.7)
            : getColor("slate.200", 0.7),
        },
      },
    },
  };
});
</script>

<template>
  <Chart
    type="radar"
    :width="props.width"
    :height="props.height"
    :data="data"
    :options="options"
  />
</template>
