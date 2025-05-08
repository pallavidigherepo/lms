import actions from './actions.js';
import getters from './getters';
import mutations from './mutations';
export default {
    namespaced: true,
    state() {
        return {
            subjects: [],
            subject: null,
            languages: [],
            courses: [],
            pagination: [],
            datatable: {
                export: false,
                import: false,
                addNew: true,
                defaultColumn: "id",
                defaultOrder: "desc",
                defaultPage: 1,
                defaultSearch: "",
                defaultPerPage: 20,
                columns: [{
                        label: "ID",
                        field: "id",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "LABEL",
                        field: "label",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "BOARD",
                        field: "board",
                        sort: false,
                        isJson: false,
                    },
                    {
                        label: "STANDARD",
                        field: "standard",
                        sort: false,
                        isJson: false,
                    },
                    {
                        label: "ACTIONS",
                        field: false,
                        sort: false,
                        actions: {
                            show: true,
                            edit: true,
                            delete: true,
                        }
                    }
                ]
            }
        }
    },
    actions,
    getters,
    mutations
};