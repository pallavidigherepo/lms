import Students from '../views/Students/Index.vue';
import CreateStudent from '../views/Students/Create.vue';
import EditStudent from '../views/Students/Edit.vue';
import ShowStudent from '../views/Students/Show.vue';

const studentRoute = [
    {
        path: "/students",
        name: "Students",
        component: Students,
        meta: {
            parent: 'Students'
        },
        children: [{
                path: '/students/create',
                name: "CreateStudent",
                component: CreateStudent,
                meta: {
                    parent: 'Students'
                }
            },
            {
                path: '/students/:id/edit',
                name: "EditStudent",
                component: EditStudent,
                meta: {
                    parent: 'Students'
                }
            },
            {
                path: '/students/:id',
                name: "ShowStudent",
                component: ShowStudent,
                meta: {
                    parent: 'Students'
                }
            },
        ]
    },
];

export default studentRoute;
