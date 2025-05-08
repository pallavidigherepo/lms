<script setup lang="ts">
import { Slideover } from "@/components/Base/Headless";
import Lucide from "@/components/Base/Lucide";
import { useThemeStore, themes, type Themes } from "@/stores/theme";
import {
  useColorSchemeStore,
  colorSchemes,
  type ColorSchemes,
} from "@/stores/color-scheme";
import { useDarkModeStore } from "@/stores/dark-mode";
import { ref } from "vue";

const themeSwitcherSlideover = ref(false);
const setThemeSwitcherSlideover = (value: boolean) => {
  themeSwitcherSlideover.value = value;
};

const themeStore = useThemeStore();
const switchTheme = (theme: Themes["name"]) => {
  useThemeStore().setTheme(theme);
};

const setDarkModeClass = () => {
  const el = document.querySelectorAll("html")[0];
  useDarkModeStore().darkMode
    ? el.classList.add("dark")
    : el.classList.remove("dark");
};
const darkModeStore = useDarkModeStore();
const switchDarkMode = (darkMode: boolean) => {
  useDarkModeStore().setDarkMode(darkMode);
  setDarkModeClass();
};
setDarkModeClass();

const setColorSchemeClass = () => {
  const el = document.querySelectorAll("html")[0];
  el.setAttribute("class", useColorSchemeStore().colorScheme);
  setDarkModeClass();
};
const colorSchemeStore = useColorSchemeStore();
const switchColorScheme = (colorScheme: ColorSchemes) => {
  useColorSchemeStore().setColorScheme(colorScheme);
  setColorSchemeClass();
};
setColorSchemeClass();

const imageAssets = import.meta.glob<{
  default: string;
}>("/src/assets/images/themes/*.{jpg,jpeg,png,svg}", { eager: true });
</script>

<template>
  <div>
    <Slideover
      :open="themeSwitcherSlideover"
      @close="
        () => {
          setThemeSwitcherSlideover(false);
        }
      "
    >
      <Slideover.Panel>
        <a
          href=""
          class="absolute inset-y-0 left-0 right-auto my-auto -ml-[60px] flex h-8 w-8 items-center justify-center rounded-full border border-white/90 bg-white/5 text-white/90 transition-all hover:rotate-180 hover:scale-105 hover:bg-white/10 focus:outline-none sm:-ml-[105px] sm:h-14 sm:w-14"
          @click="(event: MouseEvent) => {
            event.preventDefault();
            setThemeSwitcherSlideover(false);
          }"
        >
          <Lucide class="h-3 w-3 stroke-[1] sm:h-8 sm:w-8" icon="X" />
        </a>
        <Slideover.Description class="p-0">
          <div class="flex flex-col">
            <div class="px-8 pt-6 pb-8">
              <div class="text-base font-medium">Templates</div>
              <div class="mt-0.5 text-slate-500">Choose your templates</div>
              <div class="grid grid-cols-2 mt-5 gap-y-3.5 gap-x-5">
                <div v-for="(theme, themeKey) in themes" :key="themeKey">
                  <div
                    @click="() => switchTheme(theme.name)"
                    :class="[
                      'h-28 cursor-pointer bg-slate-50 box p-1',
                      {
                        'border-2 border-theme-1/60':
                          themeStore.theme == theme.name,
                      },
                    ]"
                  >
                    <div class="w-full h-full overflow-hidden rounded-md">
                      <template
                        v-if="
                          imageAssets[
                            `/src/assets/images/themes/${theme.name}.png`
                          ] !== undefined
                        "
                      >
                        <img
                          class="w-full h-full"
                          :src="
                            imageAssets[
                              `/src/assets/images/themes/${theme.name}.png`
                            ].default
                          "
                        />
                      </template>
                    </div>
                  </div>
                  <div class="mt-2.5 capitalize text-center text-xs">
                    {{ theme.name }}
                  </div>
                </div>
              </div>
            </div>
            <div class="border-b border-dashed"></div>
            <div class="px-8 pt-6 pb-8">
              <div class="text-base font-medium">Color Schemes</div>
              <div class="mt-0.5 text-slate-500">Choose your color schemes</div>
              <div
                class="grid grid-cols-2 sm:grid-cols-4 gap-x-4 gap-y-3.5 mt-5"
              >
                <div v-for="colorScheme in colorSchemes">
                  <div
                    @click="(event: MouseEvent) => {
                      event.preventDefault();
                      switchColorScheme(colorScheme)
                    }"
                    :class="[
                      'h-12 cursor-pointer bg-slate-50 box rounded-full p-1 border-slate-300/80',
                      {
                        'border-2 border-theme-1/60':
                          colorSchemeStore.value == colorScheme,
                      },
                    ]"
                  >
                    <div class="h-full overflow-hidden rounded-full">
                      <div class="flex items-center h-full gap-1 -mx-2">
                        <div
                          :class="[
                            'w-1/2 h-[140%] bg-theme-1 rotate-12',
                            colorScheme,
                          ]"
                        ></div>
                        <div
                          :class="[
                            'w-1/2 h-[140%] bg-theme-2 rotate-12',
                            colorScheme,
                          ]"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="border-b border-dashed"></div>
            <div class="px-8 pt-6 pb-8">
              <div class="text-base font-medium">Appearance</div>
              <div class="text-slate-500 mt-0.5">Choose your appearance</div>
              <div class="grid grid-cols-3 gap-4 mt-5">
                <div>
                  <div
                    @click="(event: MouseEvent) => {
                      event.preventDefault();
                      switchDarkMode(false)
                    }"
                    :class="[
                      'h-12 p-1 rounded-full cursor-pointer box',
                      '[&.active]:border-2 [&.active]:border-theme-1/60',
                      { active: !darkModeStore.value },
                    ]"
                  >
                    <div class="w-full h-full rounded-full bg-slate-200"></div>
                  </div>
                  <div class="mt-2.5 capitalize text-center text-xs">
                    Light Mode
                  </div>
                </div>
                <div>
                  <div
                    @click="(event: MouseEvent) => {
                      event.preventDefault();
                      switchDarkMode(true)
                    }"
                    :class="[
                      'h-12 p-1 rounded-full cursor-pointer box',
                      '[&.active]:border-2 [&.active]:border-theme-1/60',
                      { active: darkModeStore.value },
                    ]"
                  >
                    <div class="w-full h-full rounded-full bg-slate-900"></div>
                  </div>
                  <div class="mt-2.5 capitalize text-center text-xs">
                    Dark Mode
                  </div>
                </div>
              </div>
            </div>
          </div>
        </Slideover.Description>
      </Slideover.Panel>
    </Slideover>
    <div
      class="fixed bottom-0 right-0 z-50 flex items-center justify-center mb-5 mr-5 text-white rounded-full shadow-lg cursor-pointer h-14 w-14 bg-theme-1"
      @click="(event: MouseEvent) => {
        event.preventDefault();
        setThemeSwitcherSlideover(true);
    }"
    >
      <Lucide class="w-5 h-5 animate-spin" icon="Settings" />
    </div>
  </div>
</template>
