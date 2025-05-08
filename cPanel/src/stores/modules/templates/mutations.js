export default {
    SET_TEMPLATES(state, payload) {
        state.templates = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },
    CREATE_TEMPLATE(state, template) {
        state.templates.data.unshift(template.template)
    },
    EDIT_TEMPLATE(state, payload) {
        state.template = payload;
    },

    DELETE_TEMPLATE(state, id) {
        let index = state.templates.data.findIndex(item => item.id === id)
        state.templates.data.splice(index, 1)
    },

    UPDATE_TEMPLATE(state, template) {
        let index = state.templates.data.findIndex(item => item.id === template.id);
        state.templates.data[index] = template;
    },
    LANGUAGES(state, languages) {
        state.languages = languages;
    },
    COURSES(state, courses) {
        state.courses = courses;
    },
    VIEW_TEMPLATE(state, template) {
        state.template = template;
    }
};
