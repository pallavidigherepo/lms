import Roles from '../views/Roles/Index.vue';
import CreateRole from '../views/Roles/Create.vue';
import EditRole from '../views/Roles/Edit.vue';

const roleRoutes = [
    {
        path: "/roles",
        name: "Roles",
        component: Roles,
        meta: {
            parent: 'Roles',
            requiresAuth: true,
            
        },
        children: [{
                path: "/roles/create",
                name: "CreateRole",
                component: CreateRole,
                meta: {
                    parent: 'Roles'
                }
            },
            {
                path: "/roles/:id/edit",
                name: "EditRole",
                component: EditRole,
                meta: {
                    parent: 'Roles'
                },
            }
        ]
    },
  ];

  export default roleRoutes;
