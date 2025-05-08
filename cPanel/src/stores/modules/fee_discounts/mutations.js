export default {
    SET_FEE_DISCOUNTS(state, payload) {
        state.fee_discounts = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_FEE_DISCOUNT(state, payload) {
        state.fee_discounts.data.unshift(payload.fee_discount)
    },
    EDIT_FEE_DISCOUNT(state, payload) {
        state.fee_discount = payload;
    },

    DELETE_FEE_DISCOUNT(state, id) {
        let index = state.fee_discounts.data.findIndex(item => item.id === id)
        state.fee_discounts.data.splice(index, 1)
    },

    UPDATE_FEE_DISCOUNT(state, payload) {
        let index = state.fee_discounts.data.findIndex(item => item.id === payload.fee_discount.id);
        state.fee_discounts.data[index] = payload.fee_discount;
    },
};
