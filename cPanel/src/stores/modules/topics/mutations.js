export default {

    SET_TOPICS(state, payload) {
        state.topics = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    
    CREATE_TOPIC(state, chapter)
    {
        state.topics.data.unshift(chapter.chapter)
    },
    EDIT_TOPIC(state, payload) {
        state.chapter = payload;
    },

    DELETE_TOPIC(state, id) {
        let index = state.topics.data.findIndex(item => item.id === id)
        state.topics.data.splice(index, 1)
    },

    UPDATE_TOPIC(state, chapter)
    {
        let index = state.topics.data.findIndex(item => item.id === chapter.id);
        state.topics.data[index] = chapter;
    },
};