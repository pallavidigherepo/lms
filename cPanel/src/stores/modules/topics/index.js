import actions from './actions.js';
import getters from './getters';
import mutations from './mutations';
export default {
    namespaced: true,
    state() {
        return {
            topics: [],
            topic: null,
            pagination: [],
            datatable: {
                export: true,
                import: true,
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
                    // {
                    //     label: "SUBJECT",
                    //     field: "subject",
                    //     sort: true,
                    //     isJson: false,
                    // },
                    {
                        label: "CHAPTER",
                        field: "chapter",
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
                        label: "ICON",
                        field: "icon",
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