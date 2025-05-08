export default {
    SET_SUBJECTS(state, payload) {
        state.subjects = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    
    CREATE_SUBJECT(state, subject)
    {
        state.subjects.data.unshift(subject.subject)
    },
    EDIT_SUBJECT(state, payload) {
        state.subject = payload;
    },

    DELETE_SUBJECT(state, id) {
        let index = state.subjects.data.findIndex(item => item.id === id)
        state.subjects.data.splice(index, 1)
    },

    UPDATE_SUBJECT(state, subject)
    {
        let index = state.subjects.data.findIndex(item => item.id === subject.id);
        state.subjects.data[index] = subject;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    COURSES(state, courses) {
        state.courses = courses;
    },
    VIEW_SUBJECT(state, subject) {
        state.subject = subject;
    }
};