export default {
    SET_INQUIRY_FOLLOWUPS(state, payload) {
        state.inquiry_followups = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_INQUIRY_FOLLOWUP(state, payload) {
        state.inquiry_followups.data.unshift(payload.inquiryFollowup)
    },
    EDIT_INQUIRY_FOLLOWUP(state, payload) {
        state.inquiry_followup = payload;
    },

    DELETE_INQUIRY_FOLLOWUP(state, id) {
        let index = state.inquiry_followups.data.findIndex(item => item.id === id)
        state.inquiry_followups.data.splice(index, 1)
    },

    UPDATE_INQUIRY_FOLLOWUP(state, payload) {
        let index = state.inquiry_followups.data.findIndex(item => item.id === payload.inquiryFollowup.id);
        state.inquiry_followups.data[index] = payload.inquiryFollowup;
    },
};
