import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            loading: false,
            parents: [],
            parent: null,
            pagination: [],
            datatable: {
                export: false,
                import: false,
                addNew: false,
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
                        field: "father_name",
                        sort: true,
                    },/*
                    {
                        label: "EMAIL",
                        field: "client_email",
                        sort: true,
                    },*/
                    {
                        label: "MOBILE",
                        field: "father_mobile",
                        sort: false,
                    },
                    {
                        label: "Actions",
                        field: false,
                        sort: false,
                        actions: {
                            show: true,
                            edit: true,
                            delete: false,
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
