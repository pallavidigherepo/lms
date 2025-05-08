import Parents from '../views/Parents/Index.vue';
import CreateParent from '../views/Parents/Create.vue';
import EditParent from '../views/Parents/Edit.vue';

const parentRoutes = [{
    path: "/parents",
    name: "Parents",
    component: Parents,
    meta: {
        parent: 'Parents'
    },
    children: [{
        path: "/parents/create",
        name: "CreateParent",
        component: CreateParent,
        meta: {
            parent: 'Parents'
        }
    },
        {
            path: "/parents/:id/edit",
            name: "EditParent",
            component: EditParent,
            meta: {
                parent: 'Parents'
            },
        }
    ]
}];

export default parentRoutes
