export default {
    SET_STANDARDS(state, payload) {
        state.standards = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_STANDARD(state, payload) {
        state.standards.data.unshift(payload.standard)
    },
    EDIT_STANDARD(state, payload) {
        state.standard = payload.standard;
    },

    DELETE_STANDARD(state, id) {
        let index = state.standards.data.findIndex(item => item.id === id)
        state.standards.data.splice(index, 1)
    },

    UPDATE_STANDARD(state, payload) {
        let index = state.standards.data.findIndex(item => item.id === payload.standard.id);
        state.standards.data[index] = payload.standard;
    },
};
