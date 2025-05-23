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

const getBackground = () => {
  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");
  const gradient = ctx?.createLinearGradient(0, 0, 0, 210);
  gradient?.addColorStop(0, getColor("primary", 0.3));
  gradient?.addColorStop(1, darkMode.value ? "#28344e00" : "#ffffff01");
  return gradient;
};

const data = computed<ChartData>(() => {
  const data = [
    [
      0, -1, 4, -2, -8, -9, 5, 15, 20, 25, 30, 35, 65, 59, 64, 58, 63, 68, 73,
      67, 97, 96, 126, 131, 136, 166, 196, 190, 220, 214, 189, 183, 213, 188,
      163, 138, 139, 114, 89, 119, 120, 150, 180, 155, 185, 215, 209, 203, 233,
      263, 257, 262, 256, 250, 255, 249, 254, 259, 264, 269, 274, 304, 334, 339,
      333, 327, 321, 351, 345, 375, 380, 385, 379, 384, 389,
    ],
    [
      0, 30, 29, 23, 17, 47, 52, 82, 76, 106, 136, 135, 140, 145, 175, 180, 185,
      179, 209, 214, 244, 238, 232, 237, 242, 272, 302, 277, 278, 253, 247, 277,
      271, 246, 247, 241, 242, 217, 211, 186, 216, 217, 192, 167, 168, 162, 137,
      167, 142, 117, 147, 177, 171, 176, 175, 174, 179, 178, 183, 213, 218, 223,
      253, 258, 263, 257, 251, 250, 244, 274, 279, 284, 314, 319, 324,
    ],
  ];

  return {
    labels: data[0],
    datasets: [
      {
        data: data[0],
        borderWidth: 1.3,
        borderColor: colorScheme.value ? getColor("primary", 0.7) : "",
        pointRadius: 0,
        tension: 0.3,
        backgroundColor: getBackground(),
        fill: true,
      },
      {
        data: data[1],
        borderWidth: 1.2,
        borderColor: colorScheme.value ? getColor("slate.500", 0.5) : "",
        pointRadius: 0,
        tension: 0.3,
        borderDash: [3, 2],
        backgroundColor: "transparent",
        fill: true,
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
          autoSkipPadding: 15,
          color: getColor("slate.400", 0.8),
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
          autoSkipPadding: 20,
          color: getColor("slate.400", 0.8),
        },
        grid: {
          color: getColor("slate.400", 0.1),
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
    type="line"
    :width="props.width"
    :height="props.height"
    :data="data"
    :options="options"
  />
</template>
