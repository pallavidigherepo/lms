import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            standards: [],
            standard: [],
            standardList: [],
            pagination: [],
            datatable: {
                export: false,
                import: false,
                addNew: false,
                defaultColumn: "id",
                defaultOrder: "asc",
                defaultPage: 1,
                defaultSearch: "",
                defaultPerPage: 10,
                columns: [
                    {
                        label: "ID",
                        field: "id",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "NAME",
                        field: "name",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "SECTION",
                        field: "standard_section_names",
                        sort: false,
                        isJson: false,
                    },
                    {
                        label: "ACTIONS",
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
