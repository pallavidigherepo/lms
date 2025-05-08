<script setup lang="ts">
import { onMounted, computed, ref, provide } from "vue";
import { type ChartData, type ChartOptions } from "chart.js/auto";
import { useColorSchemeStore } from "@/stores/color-scheme";
import Chart, { type ChartElement } from "@/components/Base/Chart";
import { getColor } from "@/utils/colors";

const props = defineProps<{
  width?: number;
  height?: number;
}>();

const colorScheme = computed(() => useColorSchemeStore().colorScheme);
const reportBarChartRef = ref<ChartElement>();

provide("bind[reportBarChartRef]", (el: ChartElement) => {
  reportBarChartRef.value = el;
});

// Fake visitor data
const reportBarChartData = new Array(25).fill(0).map((data, key) => {
  if (key % 3 == 0 || key % 5 == 0) {
    return Math.ceil(Math.random() * (0 - 20) + 20);
  } else {
    return Math.ceil(Math.random() * (0 - 7) + 7);
  }
});

// Fake visitor bar color
const reportBarChartColor = computed(() => {
  return reportBarChartData.map((data) => {
    if (data >= 8 && data <= 14) {
      return colorScheme.value ? getColor("primary", 0.3) : "";
    } else if (data >= 15) {
      return colorScheme.value ? getColor("primary", 0.3) : "";
    }

    return colorScheme.value ? getColor("primary", 0.3) : "";
  });
});

const data = computed<ChartData>(() => {
  return {
    labels: reportBarChartData,
    datasets: [
      {
        categoryPercentage: 0.8,
        barPercentage: 1,
        borderRadius: 1.5,
        data: reportBarChartData,
        borderWidth: 1,
        borderColor: colorScheme.value ? getColor("primary", 0.7) : "",
        backgroundColor: colorScheme.value ? getColor("primary", 0.3) : "",
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
          display: false,
        },
        grid: {
          display: false,
        },
      },
      y: {
        ticks: {
          display: false,
          beginAtZero: true,
        },
        grid: {
          display: false,
        },
        border: {
          display: false,
        },
      },
    },
  };
});

onMounted(() => {
  setInterval(() => {
    if (reportBarChartRef.value) {
      const chartInstance = reportBarChartRef.value.instance;
      const chartConfig = chartInstance.config;

      // Swap visitor data
      const newData = chartConfig.data.datasets[0].data[0];
      chartConfig.data.datasets[0].data.shift();
      chartConfig.data.datasets[0].data.push(newData);
      chartInstance.update();

      // Swap visitor bar color
      if (Array.isArray(chartConfig.data.datasets[0].backgroundColor)) {
        const newColor = chartConfig.data.datasets[0].backgroundColor[0];
        chartConfig.data.datasets[0].backgroundColor.shift();
        chartConfig.data.datasets[0].backgroundColor.push(newColor);
      }
      chartInstance.update();
    }
  }, 1500);
});
</script>

<template>
  <Chart
    type="bar"
    :width="props.width"
    :height="props.height"
    :data="data"
    :options="options"
    ref-key="reportBarChartRef"
  />
</template>
