import Subjects from '../views/Subjects/Index.vue';
import CreateSubject from '../views/Subjects/Create.vue';
import EditSubject from '../views/Subjects/Edit.vue';
import ShowSubject from '../views/Subjects/Show.vue';

import Chapters from '../views/Chapters/Index.vue';
import CreateChapter from '../views/Chapters/Create.vue';
import EditChapter from '../views/Chapters/Edit.vue';
import ShowChapter from '../views/Chapters/Show.vue';

import Topics from '../views/Topics/Index.vue';
import CreateTopic from '../views/Topics/Create.vue';
import EditTopic from '../views/Topics/Edit.vue';
import ShowTopic from '../views/Topics/Show.vue';

const subjectChapterTopicRoutes = [
    {
        path: '/subjects',
        name: "Subjects",
        component: Subjects,
        meta: {
            parent: 'Subjects',
            requiresAuth: true,
        },
        children: [{
                path: '/subjects/create',
                name: "CreateSubject",
                component: CreateSubject,
                meta: {
                    parent: 'Subjects'
                }
            },
            {
                path: '/subjects/:id/edit',
                name: "EditSubject",
                component: EditSubject,
                meta: {
                    parent: 'Subjects'
                }
            },
            {
                path: '/subjects/:id',
                name: "ShowSubject",
                component: ShowSubject,
                meta: {
                    parent: 'Subjects'
                }
            },
        ]
    },
    {
        path: '/chapters',
        name: "Chapters",
        component: Chapters,
        meta: {
            parent: 'Subjects'
        },
        children: [{
                path: '/chapters/create',
                name: "CreateChapter",
                component: CreateChapter,
                meta: {
                    parent: 'Subjects'
                }
            },
            {
                path: '/chapters/:id/edit',
                name: "EditChapter",
                component: EditChapter,
                meta: {
                    parent: 'Subjects'
                }
            },
            {
                path: '/chapters/:id',
                name: "ShowChapter",
                component: ShowChapter,
                meta: {
                    parent: 'Subjects'
                }
            },
        ]
    },
    // {
    //     path: '/topics',
    //     name: "Topics",
    //     component: Topics,
    //     meta: {
    //         parent: 'Subjects'
    //     },
    //     children: [{
    //             path: '/topics/create',
    //             name: "CreateTopic",
    //             component: CreateTopic,
    //             meta: {
    //                 parent: 'Subjects'
    //             }
    //         },
    //         {
    //             path: '/topics/:id/edit',
    //             name: "EditTopic",
    //             component: EditTopic,
    //             meta: {
    //                 parent: 'Subjects'
    //             }
    //         },
    //         {
    //             path: '/topics/:id',
    //             name: "ShowTopic",
    //             component: ShowTopic,
    //             meta: {
    //                 parent: 'Subjects'
    //             }
    //         },
    //     ]
    // },
];

export default subjectChapterTopicRoutes;
