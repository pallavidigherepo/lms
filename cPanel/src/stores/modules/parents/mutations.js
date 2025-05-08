export default {
    SET_PARENTS(state, payload) {
        state.parents = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    EDIT_PARENT(state, payload) {
        state.parent = payload;
    },

    DELETE_PARENT(state, id) {
        let index = state.parents.data.findIndex(item => item.id === id)
        state.parents.data.splice(index, 1)
    },

    UPDATE_PARENT(state, payload)
    {
        let index = state.parents.findIndex(item => item.id === payload.id);
        state.parents[index] = payload;
    },
};
