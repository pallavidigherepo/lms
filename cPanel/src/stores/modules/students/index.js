import actions from './actions.js';
import getters from './getters';
import mutations from './mutations';
export default {
    namespaced: true,
    state() {
        return {
            students: [],
            question: null,
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
                columns: [{
                        label: "ID",
                        field: "id",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "AVATAR",
                        field: "avatar",
                        sort: false,
                        isJson: false,
                        isImage: true,
                        alt: "name"
                    },
                    {
                        label: "ENROLL NO",
                        field: "enrollment_number",
                        sort: false,
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
                        label: "FEE TYPE",
                        field: "student_fee_type",
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
