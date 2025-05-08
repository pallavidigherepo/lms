import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            inquiries: [],
            inquiry: [],
            pagination: [],
            datatable: {
                export: true,
                import: true,
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
                        label: "CODE",
                        field: "unique_code",
                        sort: false,
                        isJson: false,
                    },
                    {
                        label: "STUDENT NAME",
                        field: "student_name",
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
                        label: "BATCH",
                        field: "batch",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "STATUS",
                        field: "inquiry_status",
                        sort: true,
                        isJson: false,
                    },
                    {
                        label: "CONTACT NUMBER",
                        field: "contact_mobile",
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
