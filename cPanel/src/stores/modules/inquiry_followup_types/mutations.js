export default {
    SET_INQUIRY_FOLLOWUP_TYPES(state, payload) {
        state.inquiry_followup_types = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_INQUIRY_FOLLOWUP_TYPE(state, payload) {
        state.inquiry_followup_types.data.unshift(payload.inquiry_followup_type)
    },
    EDIT_INQUIRY_FOLLOWUP_TYPE(state, payload) {
        state.inquiry_followup_type = payload;
    },

    DELETE_INQUIRY_FOLLOWUP_TYPE(state, id) {
        let index = state.inquiry_followup_types.data.findIndex(item => item.id === id)
        state.inquiry_followup_types.data.splice(index, 1)
    },

    UPDATE_INQUIRY_FOLLOWUP_TYPE(state, payload) {
        let index = state.inquiry_followup_types.data.findIndex(item => item.id === payload.inquiry_followup_type.id);
        state.inquiry_followup_types.data[index] = payload.inquiry_followup_type;
    },
};
