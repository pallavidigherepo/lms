export default {
    SET_FEE_CATEGORIES(state, payload) {
        state.fee_categories = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_FEE_CATEGORY(state, payload) {
        state.fee_categories.data.unshift(payload.fee_category)
    },
    EDIT_FEE_CATEGORY(state, payload) {
        state.fee_category = payload;
    },

    DELETE_FEE_CATEGORY(state, id) {
        let index = state.fee_categories.data.findIndex(item => item.id === id)
        state.fee_categories.data.splice(index, 1)
    },

    UPDATE_FEE_CATEGORY(state, payload) {
        let index = state.fee_categories.data.findIndex(item => item.id === payload.fee_category.id);
        state.fee_categories.data[index] = payload.fee_category;
    },
};
