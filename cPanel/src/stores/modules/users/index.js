import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            loading: false,
            users: [],
            user: null,
            roleList: [],
            pagination: [],
            datatable: {
                export: false,
                import: false,
                addNew: true,
                defaultColumn: "id",
                defaultOrder: "desc",
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
                    },
                    {
                        label: "EMAIL",
                        field: "email",
                        sort: true,
                    },
                    {
                        label: "MOBILE",
                        field: "mobile",
                        sort: false,
                    },
                    {
                        label: "ROLE",
                        field: "designation",
                        sort: true,
                    },
                    {
                        label: "Actions",
                        field: false,
                        sort: false,
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
