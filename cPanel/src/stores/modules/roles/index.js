import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            loading: false,
            roles: [],
            role: null,
            pagination: [],
            datatable: {
                export: false,
                import: false,
                addNew: true,
                defaultColumn: "id",
                defaultOrder: "asc",
                defaultPage: 1,
                defaultSearch: "",
                defaultPerPage: 10,
                columns: [{
                        label: "ID",
                        field: "id",
                        sort: true,
                    },
                    {
                        label: "NAME",
                        field: "name",
                        sort: true,
                        type: "text",
                    },
                    {
                        label: "PERMISSIONS",
                        field: "role_out_of_permission",
                        sort: false,
                        type: "text",
                    },
                    {
                        label: "ACTION",
                        field: false,
                        sort: false,
                        type: "actions",
                        actions: {
                            show: false,
                            edit: true,
                            delete: true,
                        }
                    }
                ]
            }
        }
    },
    actions,
    mutations,
    getters,
};