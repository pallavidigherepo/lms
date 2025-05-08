import Users from '@/views/Users/Index.vue';
import CreateUser from '../views/Users/Create.vue';
import EditUser from '../views/Users/Edit.vue';

const userRoutes = [
    {
        path: "/users",
        name: "Users",
        component: Users,
        meta: {
            parent: 'Users'
        },
        children: [{
                path: "/users/create",
                name: "CreateUser",
                component: CreateUser,
                meta: {
                    parent: 'Users'
                }
            },
            {
                path: "/users/:id/edit",
                name: "EditUser",
                component: EditUser,
                meta: {
                    parent: 'Users'
                },
            }
        ]
    }
];

export default userRoutes;
