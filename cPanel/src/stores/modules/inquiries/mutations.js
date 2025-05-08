export default {
    SET_INQUIRIES(state, payload) {
        state.inquiries = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_INQUIRY(state, payload) {
        state.inquiries.data.unshift(payload.inquiry)
    },
    EDIT_INQUIRY(state, payload) {
        state.inquiry = payload;
    },

    DELETE_INQUIRY(state, id) {
        let index = state.inquiries.data.findIndex(item => item.id === id)
        state.inquiries.data.splice(index, 1)
    },

    UPDATE_INQUIRY(state, payload) {
        let index = state.inquiries.data.findIndex(item => item.id === payload.inquiry.id);
        state.inquiries.data[index] = payload.inquiry;
    },
};
