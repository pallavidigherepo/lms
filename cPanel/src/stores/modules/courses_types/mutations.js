export default {
    SET_COURSES_TYPES(state, payload) {
        state.coursesTypes = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_COURSES_TYPE(state, coursesType) {
        state.coursesTypes.data.unshift(coursesType.coursesType)
    },
    EDIT_COURSES_TYPE(state, payload) {
        state.coursesType = payload;
    },

    DELETE_COURSES_TYPE(state, id) {
        let index = state.coursesTypes.data.findIndex(item => item.id === id)
        state.coursesTypes.data.splice(index, 1)
    },

    UPDATE_COURSES_TYPE(state, courseType) {
        let index = state.coursesTypes.data.findIndex(item => item.id === courseType.coursesType.id);
        state.coursesTypes.data[index] = courseType.coursesType;
    },

    LIST_COURSES_TYPE(state, payload) {
        state.courseTypeList = payload;
    }
};