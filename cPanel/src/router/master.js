// import PermissionIndex from '@/views/Permissions/Index.vue';
// import CoursesTypes from '@/views/CoursesTypes/Index.vue';
// import Courses from '@/views/Courses/Index.vue';

// import SettingIndex from '@/views/Settings/Index.vue';
// import Batches from '@/views/Batches/Index.vue';
// import Standards from '@/views/Standards/Index.vue';
// import Boards from '@/views/Boards/Index.vue';
// import Attendance from '@/views/Attendance/Index.vue';

const masterRoutes = [
    {
        path: "/permissions",
        name: "Permissions",
        component: PermissionIndex,
        meta: { 
            requiresAuth: true,
            // requiresVerification: true, 
          },
    },
    {
        path: '/boards',
        name: "Boards",
        component: Boards,
        meta: {
            parent: 'Boards',
            requiresAuth: true,
            // requiresVerification: true, 
        },
    },
    {
        path: '/standards',
        name: "Standards",
        component: Standards,
        meta: {
            parent: 'Standards',
            requiresAuth: true,
            // requiresVerification: true,               
        },
    },
    {
        path: '/courses_types',
        name: "Course-Types",
        component: CoursesTypes,
        meta: {
            parent: 'CourseTypes',
            requiresAuth: true,
            // requiresVerification: true, 
        },
    },
    {
        path: '/courses',
        name: "Courses",
        component: Courses,
        meta: {
            parent: 'Courses',
            requiresAuth: true,
            // requiresVerification: true, 
        },
    },
    {
        path: '/settings',
        name: "Settings",
        component: SettingIndex,
        meta: { 
            requiresAuth: true,
            // requiresVerification: true, 
          },
    },
    {
        path: '/batches',
        name: "Batches",
        component: Batches,
        meta: { 
            requiresAuth: true,
            // requiresVerification: true, 
          },
    },
    {
        path: '/attendance',
        name: "Attendance",
        component: Attendance,
        meta: { 
            requiresAuth: true,
            // requiresVerification: true, 
          },
    },
];

export default masterRoutes;
