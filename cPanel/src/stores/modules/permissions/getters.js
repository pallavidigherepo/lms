export default {
    permissions(state) {
        return state.permissions;
    },

    permission(state) {
        return state.permission;
    },

    getCount(state) {
        return state.permission_count;
    },

    getModuleWise(state) {
        return state.module_wise_permissions;
    },

    datatable(state) {
        return state.datatable;
    },
    meta(state) {
        return state.pagination;
    }
}