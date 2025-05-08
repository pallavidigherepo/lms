export default {
    SET_PERMISSIONS(state, payload) {
        state.permissions = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_PERMISSION(state, payload)
    {
        state.permissions.data.unshift(payload.permission)
    },

    UPDATE_PERMISSION(state, permission)
    {
        let index = state.permissions.data.findIndex(item => item.id === permission.id);        
        state.permissions.data[index] = permission;
    },

    DELETE_PERMISSION(state, id) {
        let index = state.permissions.data.findIndex(item => item.id === id)
        state.permissions.data.splice(index, 1)
    },

    FETCH_PERMISSIONS_COUNT(state, count) {
        state.permission_count = count;
    },

    FETCH_PERMISSIONS_MODULE_WISE(state, payload) {
        state.module_wise_permissions = payload;
    }
};