export default {
    SET_CHAPTERS(state, payload) {
        state.chapters = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    
    CREATE_CHAPTER(state, chapter)
    {
        state.chapters.data.unshift(chapter.chapter)
    },
    EDIT_CHAPTER(state, payload) {
        state.chapter = payload;
    },

    DELETE_CHAPTER(state, id) {
        let index = state.chapters.data.findIndex(item => item.id === id)
        state.chapters.data.splice(index, 1)
    },

    UPDATE_CHAPTER(state, chapter)
    {
        let index = state.chapters.data.findIndex(item => item.id === chapter.id);
        state.chapters.data[index] = chapter;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    SUBJECTS(state, subjects) {
        state.subjects = subjects;
    }
};