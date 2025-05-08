import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            fees: [],
            fee: [],
            pagination: [],
            datatable: {
                export: true,
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
                        label: "STUDENT",
                        field: "name",
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
                        label: "EXPIRY DATE",
                        field: "expiry_date",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "ACTIONS",
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
