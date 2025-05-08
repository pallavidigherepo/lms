import Questions from '../views/Questions/Index.vue';
import CreateQuestion from '../views/Questions/Create.vue';
import EditQuestion from '../views/Questions/Edit.vue';
import ShowQuestion from '../views/Questions/Show.vue';

const questionRoutes = [
    {
        path: "/questions",
        name: "Questions",
        component: Questions,
        meta: {
            parent: 'Questions'
        },
        children: [{
                path: '/questions/create',
                name: "CreateQuestion",
                component: CreateQuestion,
                meta: {
                    requiresAuth: true,
                    parent: 'Questions'
                }
            },
            {
                path: '/questions/:id/edit',
                name: "EditQuestion",
                component: EditQuestion,
                meta: {
                    parent: 'Questions'
                }
            },
            {
                path: '/questions/:id',
                name: "ShowQuestion",
                component: ShowQuestion,
                meta: {
                    parent: 'Questions'
                }
            },
        ]
    },
];

export default questionRoutes;
