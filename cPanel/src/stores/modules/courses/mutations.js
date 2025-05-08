export default {
    SET_COURSES(state, payload) {
        state.courses = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    
    CREATE_COURSE(state, course)
    {
        state.courses.data.unshift(course.course)
    },
    EDIT_COURSE(state, payload) {
        state.course = payload;
    },

    DELETE_COURSE(state, id) {
        let index = state.courses.data.findIndex(item => item.id === id)
        state.courses.data.splice(index, 1)
    },

    UPDATE_COURSE(state, course)
    {
        let index = state.courses.data.findIndex(item => item.id === course.id);
        state.courses.data[index] = course;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    COURSE_TYPES(state, courseTypes) {
        state.courseTypes = courseTypes;
    }
};