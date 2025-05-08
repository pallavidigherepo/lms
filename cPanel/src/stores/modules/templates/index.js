import actions from './actions.js';
import getters from './getters';
import mutations from './mutations';
export default {
    namespaced: true,
    state() {
        return {
            templates: [],
            template: null,
            languages: [],
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
                        label: "STANDARD",
                        field: "standard",
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
                        label: "TOTAL MARKS",
                        field: "total_marks",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "DURATION",
                        field: "duration",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "HAS SECTION",
                        field: "has_section",
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
