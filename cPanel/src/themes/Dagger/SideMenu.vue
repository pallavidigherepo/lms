<script setup lang="ts">
import "@/assets/css/vendors/simplebar.css";
import "@/assets/css/themes/dagger.css";
import { useRoute, useRouter } from "vue-router";
import Lucide from "@/components/Base/Lucide";
import Breadcrumb from "@/components/Base/Breadcrumb";
import { Menu } from "@/components/Base/Headless";
import { useMenuStore } from "@/stores/menu";
import { useCompactMenuStore } from "@/stores/compact-menu";
import {
  type ProvideForceActiveMenu,
  forceActiveMenu,
  type Route,
  type FormattedMenu,
  nestedMenu,
  linkTo,
  enter,
  leave,
} from "./side-menu";
import { watch, reactive, ref, computed, onMounted, provide } from "vue";
import users from "@/fakers/users";
import SimpleBar from "simplebar";
import QuickSearch from "@/components/QuickSearch";
import SwitchAccount from "@/components/SwitchAccount";
import NotificationsPanel from "@/components/NotificationsPanel";
import ActivitiesPanel from "@/components/ActivitiesPanel";

const compactMenu = useCompactMenuStore();
const setCompactMenu = (val: boolean) => {
  compactMenu.setCompactMenu(val);
};
const quickSearch = ref(false);
const setQuickSearch = (value: boolean) => {
  quickSearch.value = value;
};

const switchAccount = ref(false);
const setSwitchAccount = (value: boolean) => {
  switchAccount.value = value;
};

const notificationsPanel = ref(false);
const setNotificationsPanel = (value: boolean) => {
  notificationsPanel.value = value;
};

const activitiesPanel = ref(false);
const setActivitiesPanel = (value: boolean) => {
  activitiesPanel.value = value;
};

const compactMenuOnHover = ref(false);
const activeMobileMenu = ref(false);
const route: Route = useRoute();
const router = useRouter();
let formattedMenu = reactive<Array<FormattedMenu | string>>([]);
const setFormattedMenu = (
  computedFormattedMenu: Array<FormattedMenu | string>
) => {
  Object.assign(formattedMenu, computedFormattedMenu);
};
const menuStore = useMenuStore();
const menu = computed(() => nestedMenu(menuStore.value, route));

provide<ProvideForceActiveMenu>("forceActiveMenu", (pageName: string) => {
  forceActiveMenu(route, pageName);
  setFormattedMenu(menu.value);
});

const scrollableRef = ref<HTMLDivElement>();

const toggleCompactMenu = (event: MouseEvent) => {
  event.preventDefault();
  setCompactMenu(!compactMenu.value);
};

const compactLayout = () => {
  if (window.innerWidth <= 1600) {
    setCompactMenu(true);
  }
};

const requestFullscreen = () => {
  const el = document.documentElement;
  if (el.requestFullscreen) {
    el.requestFullscreen();
  }
};

watch(menu, () => {
  setFormattedMenu(menu.value);
});

watch(
  computed(() => route.path),
  () => {
    delete route.forceActiveMenu;
  }
);

onMounted(() => {
  if (scrollableRef.value) {
    new SimpleBar(scrollableRef.value);
  }

  setFormattedMenu(menu.value);

  compactLayout();

  window.onresize = () => {
    compactLayout();
  };
});
</script>

<template>
  <div
    :class="[
      'dagger',
      'before:content-[\'\'] before:bg-gradient-to-b before:from-slate-100 before:to-slate-50 before:fixed before:inset-0 dark:before:from-darkmode-800 dark:before:to-darkmode-900',
    ]"
  >
    <div
      :class="[
        'fixed top-0 left-0 z-50 h-screen side-menu group',
        { 'side-menu--collapsed': compactMenu.value },
        { 'side-menu--on-hover': compactMenuOnHover },
      ]"
    >
      <div
        class="fixed top-0 inset-x-0 z-10 h-[65px] box border-x-0 border-t-0 rounded-none flex"
      >
        <div
          :class="[
            'bg-white flex-none flex items-center z-10 px-5 h-full xl:w-[275px] overflow-hidden relative duration-300 group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000001f] dark:bg-darkmode-600',
            'before:content-[\'\'] before:hidden before:xl:block before:absolute before:right-0 before:border-r before:border-dashed before:border-slate-300/70 before:h-4/6 before:group-[.side-menu--collapsed.side-menu--on-hover]:xl:border-solid before:group-[.side-menu--collapsed.side-menu--on-hover]:xl:h-full',
          ]"
          @mouseover="
            (event) => {
              event.preventDefault();
              compactMenuOnHover = true;
            }
          "
          @mouseleave="
            (event) => {
              event.preventDefault();
              compactMenuOnHover = false;
            }
          "
        >
          <a
            href=""
            class="hidden xl:flex items-center transition-[margin] group-[.side-menu--collapsed]:xl:ml-2 group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-0"
          >
            <div
              class="flex items-center justify-center w-[34px] rounded-lg h-[34px] bg-gradient-to-r from-theme-1 to-theme-2 transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:xl:-rotate-180"
            >
              <div
                class="w-[16px] h-[16px] relative -rotate-45 [&_div]:bg-white"
              >
                <div
                  class="absolute w-[21%] left-0 inset-y-0 my-auto rounded-full opacity-50 h-[75%]"
                ></div>
                <div
                  class="absolute w-[21%] inset-0 m-auto h-[120%] rounded-full"
                ></div>
                <div
                  class="absolute w-[21%] right-0 inset-y-0 my-auto rounded-full opacity-50 h-[75%]"
                ></div>
              </div>
            </div>
            <div
              class="ml-3.5 group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0 transition-opacity font-medium"
            >
              DAGGER
            </div>
          </a>
          <a
            href=""
            @click="toggleCompactMenu"
            class="hidden group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:rotate-180 group-[.side-menu--collapsed]:xl:opacity-0 transition-[opacity,transform] 3xl:flex items-center justify-center w-[20px] h-[20px] ml-auto border rounded-full border-slate-600/40 hover:bg-slate-600/5"
          >
            <Lucide icon="ArrowLeft" class="w-3.5 h-3.5 stroke-[1.3]" />
          </a>
          <div class="flex items-center gap-1 xl:hidden">
            <a
              href=""
              @click="
                (event) => {
                  event.preventDefault();
                  activeMobileMenu = true;
                }
              "
              class="p-2 rounded-full hover:bg-slate-100"
            >
              <Lucide icon="AlignJustify" class="w-[18px] h-[18px]" />
            </a>
            <a
              href=""
              class="p-2 rounded-full hover:bg-slate-100"
              @click="
                (event) => {
                  event.preventDefault();
                  quickSearch = true;
                }
              "
            >
              <Lucide icon="Search" class="w-[18px] h-[18px]" />
            </a>
          </div>
        </div>
        <div
          class="absolute transition-[padding] duration-100 xl:pl-[275px] group-[.side-menu--collapsed]:xl:pl-[91px] h-full inset-x-0"
        >
          <div class="flex items-center w-full h-full px-5">
            <!-- BEGIN: Breadcrumb -->
            <Breadcrumb class="flex-1 hidden xl:block">
              <Breadcrumb.Link class="dark:before:bg-chevron-white" to="/"
                >App</Breadcrumb.Link
              >
              <Breadcrumb.Link class="dark:before:bg-chevron-white" to="/"
                >Dashboards</Breadcrumb.Link
              >
              <Breadcrumb.Link
                class="dark:before:bg-chevron-white"
                to="/"
                :active="true"
              >
                Analytics
              </Breadcrumb.Link>
            </Breadcrumb>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div
              class="relative justify-center flex-1 hidden xl:flex"
              @click="
                (event) => {
                  event.preventDefault();
                  quickSearch = true;
                }
              "
            >
              <div
                className="bg-slate-50 border w-[350px] flex items-center py-2 px-3.5 rounded-[0.5rem] text-slate-400 cursor-pointer hover:bg-slate-100 transition-colors dark:bg-darkmode-800"
              >
                <Lucide icon="Search" class="w-[18px] h-[18px]" />
                <div class="ml-2.5 mr-auto">Quick search...</div>
                <div>⌘K</div>
              </div>
            </div>
            <QuickSearch
              :quickSearch="quickSearch"
              :setQuickSearch="setQuickSearch"
            />
            <!-- END: Search -->
            <!-- BEGIN: Notification & User Menu -->
            <div class="flex items-center flex-1">
              <div class="flex items-center gap-1 ml-auto">
                <a
                  href=""
                  className="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-darkmode-400"
                  @click="
                    (e) => {
                      e.preventDefault();
                      activitiesPanel = true;
                    }
                  "
                >
                  <Lucide icon="LayoutGrid" class="w-[18px] h-[18px]" />
                </a>
                <a
                  href=""
                  className="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-darkmode-400"
                  @click="
                    (e) => {
                      e.preventDefault();
                      requestFullscreen();
                    }
                  "
                >
                  <Lucide icon="Expand" class="w-[18px] h-[18px]" />
                </a>
                <a
                  href=""
                  className="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-darkmode-400"
                  @click="
                    (e) => {
                      e.preventDefault();
                      notificationsPanel = true;
                    }
                  "
                >
                  <Lucide icon="Bell" class="w-[18px] h-[18px]" />
                </a>
              </div>
              <Menu class="ml-5">
                <Menu.Button
                  class="overflow-hidden rounded-full w-[36px] h-[36px] border-[3px] border-slate-200/70 image-fit"
                >
                  <img
                    alt="Tailwise - Admin Dashboard Template"
                    :src="users.fakeUsers()[0].photo"
                  />
                </Menu.Button>
                <Menu.Items class="w-56 mt-1">
                  <Menu.Item
                    @click="
                      () => {
                        switchAccount = true;
                      }
                    "
                  >
                    <Lucide icon="ToggleLeft" class="w-4 h-4 mr-2" />
                    Switch Account
                  </Menu.Item>
                  <Menu.Divider />
                  <Menu.Item
                    @click="
                      () => {
                        router.push({
                          name: 'settings',
                          query: { page: 'connected-services' },
                        });
                      }
                    "
                  >
                    <Lucide icon="Settings" class="w-4 h-4 mr-2" />
                    Connected Services
                  </Menu.Item>
                  <Menu.Item
                    @click="
                      () => {
                        router.push({
                          name: 'settings',
                          query: { page: 'email-settings' },
                        });
                      }
                    "
                  >
                    <Lucide icon="Inbox" class="w-4 h-4 mr-2" />
                    Email Settings
                  </Menu.Item>
                  <Menu.Item
                    @click="
                      () => {
                        router.push({
                          name: 'settings',
                          query: { page: 'security' },
                        });
                      }
                    "
                  >
                    <Lucide icon="Lock" class="w-4 h-4 mr-2" />
                    Reset Password
                  </Menu.Item>
                  <Menu.Divider />
                  <Menu.Item
                    @click="
                      () => {
                        router.push({
                          name: 'settings',
                        });
                      }
                    "
                  >
                    <Lucide icon="Users" class="w-4 h-4 mr-2" />
                    Profile Info
                  </Menu.Item>
                  <Menu.Item
                    @click="
                      () => {
                        router.push({
                          name: 'settings',
                          query: { page: 'security' },
                        });
                      }
                    "
                  >
                    <Lucide icon="Power" class="w-4 h-4 mr-2" />
                    Logout
                  </Menu.Item>
                </Menu.Items>
              </Menu>
            </div>
            <ActivitiesPanel
              :activitiesPanel="activitiesPanel"
              :setActivitiesPanel="setActivitiesPanel"
            />
            <NotificationsPanel
              :notificationsPanel="notificationsPanel"
              :setNotificationsPanel="setNotificationsPanel"
            />
            <SwitchAccount
              :switchAccount="switchAccount"
              :setSwitchAccount="setSwitchAccount"
            />
            <!-- END: Notification & User Menu -->
          </div>
        </div>
      </div>
      <div
        class="absolute inset-y-0 xl:top-[65px] z-10 xl:z-0"
        @mouseover="
          (event) => {
            event.preventDefault();
            compactMenuOnHover = true;
          }
        "
        @mouseleave="
          (event) => {
            event.preventDefault();
            compactMenuOnHover = false;
          }
        "
      >
        <div
          :class="[
            'box xl:ml-0 border-y-0 border-l-0 rounded-none w-[275px] duration-300 transition-[width,margin] group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] relative overflow-hidden h-full flex flex-col',
            'after:content-[\'\'] after:fixed after:inset-0 after:bg-black/80 after:z-[-1] after:xl:hidden',
            { 'ml-0 after:block': activeMobileMenu },
            { '-ml-[275px] after:hidden': !activeMobileMenu },
          ]"
        >
          <div
            :class="[
              'fixed ml-[275px] w-10 h-10 items-center justify-center xl:hidden',
              { flex: activeMobileMenu },
              { hidden: !activeMobileMenu },
            ]"
          >
            <a
              href=""
              @click="
                (event) => {
                  event.preventDefault();
                  activeMobileMenu = false;
                }
              "
              class="mt-5 ml-5"
            >
              <Lucide icon="X" class="w-8 h-8 text-white" />
            </a>
          </div>
          <div
            ref="scrollableRef"
            :class="[
              'w-full h-full z-20 px-5 overflow-y-auto overflow-x-hidden pb-3 [-webkit-mask-image:-webkit-linear-gradient(top,rgba(0,0,0,0),black_30px)] [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent',
              '[&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/30',
            ]"
          >
            <ul class="scrollable">
              <!-- BEGIN: First Child -->
              <template v-for="(menu, menuKey) in formattedMenu">
                <li
                  v-if="typeof menu === 'string'"
                  class="side-menu__divider"
                  :key="'divider-' + menuKey"
                >
                  {{ menu }}
                </li>
                <li v-else :key="menuKey">
                  <a
                    href=""
                    :class="[
                      'side-menu__link',
                      { 'side-menu__link--active': menu.active },
                      {
                        'side-menu__link--active-dropdown': menu.activeDropdown,
                      },
                    ]"
                    @click="(event: MouseEvent) => {
                    event.preventDefault();
                    linkTo(menu, router);
                    setFormattedMenu([...formattedMenu]);
                  }"
                  >
                    <Lucide :icon="menu.icon" class="side-menu__link__icon" />
                    <div class="side-menu__link__title">{{ menu.title }}</div>
                    <div v-if="menu.badge" class="side-menu__link__badge">
                      {{ menu.badge }}
                    </div>
                    <Lucide
                      v-if="menu.subMenu"
                      icon="ChevronDown"
                      class="side-menu__link__chevron"
                    />
                  </a>
                  <!-- BEGIN: Second Child -->
                  <Transition @enter="enter" @leave="leave">
                    <ul v-if="menu.subMenu && menu.activeDropdown">
                      <li
                        v-for="(subMenu, subMenuKey) in menu.subMenu"
                        :key="subMenuKey"
                      >
                        <a
                          href=""
                          :class="[
                            'side-menu__link',
                            { 'side-menu__link--active': subMenu.active },
                            {
                              'side-menu__link--active-dropdown':
                                subMenu.activeDropdown,
                            },
                          ]"
                          @click="(event: MouseEvent) => {
                          event.preventDefault();
                          linkTo(subMenu, router);
                          setFormattedMenu([...formattedMenu]);
                        }"
                        >
                          <Lucide
                            :icon="subMenu.icon"
                            class="side-menu__link__icon"
                          />
                          <div class="side-menu__link__title">
                            {{ subMenu.title }}
                          </div>
                          <div
                            v-if="subMenu.badge"
                            class="side-menu__link__badge"
                          >
                            {{ subMenu.badge }}
                          </div>
                          <Lucide
                            v-if="subMenu.subMenu"
                            icon="ChevronDown"
                            class="side-menu__link__chevron"
                          />
                        </a>
                        <!-- BEGIN: Third Child -->
                        <Transition @enter="enter" @leave="leave">
                          <ul v-if="subMenu.subMenu && subMenu.activeDropdown">
                            <li
                              v-for="(
                                lastSubMenu, lastSubMenuKey
                              ) in subMenu.subMenu"
                              :key="lastSubMenuKey"
                            >
                              <a
                                href=""
                                :class="[
                                  'side-menu__link',
                                  {
                                    'side-menu__link--active':
                                      lastSubMenu.active,
                                  },
                                  {
                                    'side-menu__link--active-dropdown':
                                      lastSubMenu.activeDropdown,
                                  },
                                ]"
                                @click="(event: MouseEvent) => {
                                event.preventDefault();
                                linkTo(lastSubMenu, router);
                                setFormattedMenu([...formattedMenu]);
                              }"
                              >
                                <Lucide
                                  :icon="lastSubMenu.icon"
                                  class="side-menu__link__icon"
                                />
                                <div class="side-menu__link__title">
                                  {{ lastSubMenu.title }}
                                </div>
                                <div
                                  v-if="lastSubMenu.badge"
                                  class="side-menu__link__badge"
                                >
                                  {{ lastSubMenu.badge }}
                                </div>
                              </a>
                            </li>
                          </ul>
                        </Transition>
                        <!-- END: Third Child -->
                      </li>
                    </ul>
                  </Transition>
                  <!-- END: Second Child -->
                </li>
              </template>
              <!-- END: First Child -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div
      :class="[
        'transition-[margin,width] duration-100 px-5 mt-[65px] pt-[31px] pb-16 relative z-10',
        { 'xl:ml-[275px]': !compactMenu.value },
        { 'xl:ml-[91px]': compactMenu.value },
      ]"
    >
      <div class="container">
        <RouterView />
      </div>
    </div>
  </div>
</template>
