import { createRouter, createWebHistory } from "vue-router";
import Layout from "@/themes";

import Dashboard from "@/views/Dashboard/Index.vue";
import Profile from "@/views/Auth/Profile.vue";
import Leave from "@/views/Leave/Leave.vue";
import LeaveRequest from "@/views/Leave/LeaveRequest.vue";
import LeaveBalance from "@/views/Leave/LeaveBalance.vue";

// @ts-ignore
import authRoutes from "@/router/auth.js";
// import masterRoutes from "./master";
// @ts-ignore
import subjectChapterTopicRoutes from "./subject_chapter_topic";
// @ts-ignore
import studentRoute from "./students";
// @ts-ignore
import parentRoutes from "./parents";
// @ts-ignore
import questionRoutes from "./questions";
// @ts-ignore
import questionnaireTemplateRoutes from "./questionnaire_template";
// @ts-ignore
import inquiryRoutes from "./inquiries";
// import feeRoutes from "./fees";
// @ts-ignore
import userRoutes from "./users";
// @ts-ignore
import roleRoutes from "./role";

const routes = [
  {
    path: "/",
    component: Layout,
    children: [
      {
        path: "/",
        name: "dashboard",
        component: Dashboard,
        meta: { 
          requiresAuth: true,
          // requiresVerification: true, 
        },
      },      
      
      // ...masterRoutes,
      ...subjectChapterTopicRoutes,
      ...studentRoute,
      ...parentRoutes,
      ...questionRoutes,
      ...questionnaireTemplateRoutes,
      ...inquiryRoutes,
      // ...feeRoutes,
      ...userRoutes,
      ...roleRoutes,
      
      // {
      //   path: "/profile",
      //   name: "Profile",
      //   component: Profile,
      //   meta: { 
      //     requiresAuth: true,
      //     // requiresVerification: true, 
      //   },
      // },
      // {
      //   path: "/leave",
      //   name: "Leave",
      //   component: Leave,
      //   meta: { 
      //     requiresAuth: true,
      //     // requiresVerification: true, 
      //   },
      // },
      // {
      //   path: "/leave_request",
      //   name: "Leave-Request",
      //   component: LeaveRequest,
      //   meta: { 
      //     requiresAuth: true,
      //     // requiresVerification: true, 
      //   },
      // },
      // {
      //   path: "/leave_balance",
      //   name: "Leave-Balance",
      //   component: LeaveBalance,
      //   meta: { 
      //     requiresAuth: true,
      //     // requiresVerification: true, 
      //   },
      // },
      // {
      //   path: "icon",
      //   name: "icon",
      //   component: () => import("@/pages/Icon.vue"),
      // },
      // {
      //   path: "loading-icon",
      //   name: "loading-icon",
      //   component: () => import("@/pages/LoadingIcon.vue"),
      // },
    ],
  },
  ...authRoutes,
  // {
  //   path: "/error-page",
  //   name: "error-page",
  //   component: () => import("../pages/ErrorPage.vue"),
  // },
  
];
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { left: 0, top: 0 };
},
});

router.beforeEach((to, from, next) => {
  let token = localStorage.getItem("TOKEN");
  let user = JSON.parse(localStorage.getItem("USER") ?? "{}");

  if (to.meta.requiresAuth && (token === 'undefined' || !token)) {
    next({ name: "Login" });
  } else if (token && to.meta.requiresVerification && user.email_verified_at === null) {
    next({ name: "VerifyError" })
  } else if (token && to.meta.isGuest) {
    next({ name: "Dashboard" })
  } else {
    next();
  }
});

export default router;