export default {
    SET_QUESTIONS(state, payload) {
        state.questions = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    CREATE_QUESTION(state, question) {
        state.questions.data.unshift(question.question)
    },
    EDIT_QUESTION(state, payload) {
        state.question = payload;
    },

    DELETE_QUESTION(state, id) {
        let index = state.questions.data.findIndex(item => item.id === id)
        state.questions.data.splice(index, 1)
    },

    UPDATE_QUESTION(state, question) {
        let index = state.questions.data.findIndex(item => item.id === question.id);
        state.questions.data[index] = question;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    COURSES(state, courses) {
        state.courses = courses;
    },
    VIEW_QUESTION(state, question) {
        state.question = question;
    }
};