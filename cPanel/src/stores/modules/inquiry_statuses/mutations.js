export default {
    SET_INQUIRY_STATUSES(state, payload) {
        state.inquiry_statuses = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_INQUIRY_STATUS(state, payload) {
        console.log(payload)
        state.inquiry_statuses.data.unshift(payload.inquiry_status)
    },

    EDIT_INQUIRY_STATUS(state, payload) {
        state.inquiry_status = payload.inquiry_status;
    },

    DELETE_INQUIRY_STATUS(state, id) {
        let index = state.inquiry_statuses.data.findIndex(item => item.id === id)
        state.inquiry_statuses.data.splice(index, 1)
    },

    UPDATE_INQUIRY_STATUS(state, payload) {
        let index = state.inquiry_statuses.data.findIndex(item => item.id === payload.inquiry_status.id);
        state.inquiry_statuses.data[index] = payload.inquiry_status;
    },
};
