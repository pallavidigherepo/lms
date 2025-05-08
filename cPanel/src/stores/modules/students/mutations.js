export default {
    SET_STUDENTS(state, payload) {
        state.students = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    CREATE_STUDENT(state, student) {
        state.students.data.unshift(student.student)
    },
    EDIT_STUDENT(state, payload) {
        state.student = payload;
    },

    DELETE_STUDENT(state, id) {
        let index = state.students.data.findIndex(item => item.id === id)
        state.students.data.splice(index, 1)
    },

    UPDATE_STUDENT(state, student) {
        let index = state.students.data.findIndex(item => item.id === student.id);
        state.students.data[index] = student;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    COURSES(state, courses) {
        state.courses = courses;
    },
    VIEW_STUDENT(state, student) {
        state.student = student;
    }
};