export default {
    SET_FEES(state, payload) {
        state.fees = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_FEE(state, payload) {
        state.fees.data.unshift(payload.fee)
    },
    EDIT_FEE(state, payload) {
        state.fee = payload;
    },

    DELETE_FEE(state, id) {
        let index = state.fees.data.findIndex(item => item.id === id)
        state.fees.data.splice(index, 1)
    },

    UPDATE_FEE(state, payload) {
        let index = state.fees.data.findIndex(item => item.id === payload.fee.id);
        state.fees.data[index] = payload.fee;
    },
};
