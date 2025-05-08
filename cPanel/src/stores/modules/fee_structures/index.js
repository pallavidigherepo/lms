import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            fee_structures: [],
            fee_structure: [],
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
                columns: [
                    {
                        label: "ID",
                        field: "id",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "FEE CATEGORY",
                        field: "fee_category",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "BATCH",
                        field: "batch",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "STANDARD",
                        field: "standard",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "AMOUNT",
                        field: "amount",
                        sort: true,
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
