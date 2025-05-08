import actions from './actions.js';
import getters from './getters';
import mutations from './mutations';
export default {
    namespaced: true,
    state() {
        return {
            generated_questions: [],
            generated_question: null,
            languages: [],
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
                        isJson: false,
                    },
                    {
                        label: "NAME",
                        field: "name",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "TEMPLATE",
                        field: "template",
                        sort: false,
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
                        label: "SUBJECT",
                        field: "subject",
                        sort: false,
                        isJson: false,
                    },
                    {
                        label: "ACTIONS",
                        field: false,
                        sort: false,
                        actions: {
                            show: true,
                            edit: false,
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
