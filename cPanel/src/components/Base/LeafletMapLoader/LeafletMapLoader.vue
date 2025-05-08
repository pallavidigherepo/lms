<script setup lang="ts">
import "@/assets/css/vendors/leaflet.css";
import {
  initializeMap,
  type MapConfig,
  type LeafletElement,
} from "./leaflet-map-loader";
import { type HTMLAttributes, ref, onMounted } from "vue";

export type Init = (
  callback: (
    mapConfig: MapConfig
  ) => ReturnType<typeof initializeMap> | undefined
) => void;

interface LeafletMapLoaderProps extends /* @vue-ignore */ HTMLAttributes {
  init: Init;
  darkMode?: boolean;
}

const props = defineProps<LeafletMapLoaderProps>();

const mapRef = ref<LeafletElement>();

onMounted(() => {
  props.init((mapConfig) => {
    if (mapRef.value) {
      return initializeMap(mapRef.value, mapConfig);
    }
  });
});
</script>

<template>
  <div
    :class="[
      'border rounded-lg overflow-hidden dark:border-darkmode-700',
      {
        '[&_.leaflet-tile-pane]:contrast-105 [&_.leaflet-tile-pane]:grayscale':
          !props.darkMode,
      },
      {
        '[&_.leaflet-tile-pane]:contrast-[.8] [&_.leaflet-tile-pane]:grayscale [&_.leaflet-tile-pane]:invert':
          props.darkMode,
      },
    ]"
  >
    <div ref="mapRef" class="w-full h-full"></div>
  </div>
</template>
