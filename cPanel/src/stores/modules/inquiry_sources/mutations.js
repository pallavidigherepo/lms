export default {
    SET_INQUIRY_SOURCES(state, payload) {
        state.inquiry_sources = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_INQUIRY_SOURCE(state, payload) {
        state.inquiry_sources.data.unshift(payload.inquiry_source)
    },
    EDIT_INQUIRY_SOURCE(state, payload) {
        state.inquiry_source = payload;
    },

    DELETE_INQUIRY_SOURCE(state, id) {
        let index = state.inquiry_sources.data.findIndex(item => item.id === id)
        state.inquiry_sources.data.splice(index, 1)
    },

    UPDATE_INQUIRY_SOURCE(state, payload) {
        let index = state.inquiry_sources.data.findIndex(item => item.id === payload.inquiry_source.id);
        state.inquiry_sources.data[index] = payload.inquiry_source;
    },

};
