export default {
    SET_GENERATED_QUESTIONS(state, payload) {
        state.generated_questions = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    CREATE_GENERATED_QUESTION(state, generated_question) {
        state.generated_questions.data.unshift(generated_question)
    },

    EDIT_QUESTION(state, payload) {
        state.question = payload;
    },

    DELETE_GENERATED_QUESTION(state, id) {
        let index = state.generated_questions.data.findIndex(item => item.id === id)
        state.generated_questions.data.splice(index, 1)
    },

    UPDATE_GENERATED_QUESTION(state, question) {
        let index = state.generated_questions.data.findIndex(item => item.id === question.id);
        state.generated_questions.data[index] = question;
    },
    VIEW_GENERATED_QUESTION_PAPER(state, payload) {
        state.generated_question = payload;
    }
};
