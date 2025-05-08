export default {
    SET_FEE_TYPES(state, payload) {
        state.fee_types = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_FEE_TYPE(state, payload) {
        state.fee_types.data.unshift(payload.fee_type)
    },
    EDIT_FEE_TYPE(state, payload) {
        state.fee_type = payload;
    },

    DELETE_FEE_TYPE(state, id) {
        let index = state.fee_types.data.findIndex(item => item.id === id)
        state.fee_types.data.splice(index, 1)
    },

    UPDATE_FEE_TYPE(state, payload) {
        let index = state.fee_types.data.findIndex(item => item.id === payload.fee_type.id);
        state.fee_types.data[index] = payload.fee_type;
    },
};
