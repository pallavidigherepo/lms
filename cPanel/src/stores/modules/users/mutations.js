export default {
    SET_USERS(state, payload) {
        state.users = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_USER(state, user)
    {
        state.users.unshift(user)
    },
    EDIT_USER(state, payload) {
        state.user = payload;
    },

    DELETE_USER(state, id) {
        let index = state.users.data.findIndex(item => item.id === id)
        state.users.data.splice(index, 1)
    },

    UPDATE_USER(state, user)
    {
        let index = state.users.findIndex(item => item.id === user.id);
        state.users[index] = user;
    },

    SET_ROLE_LIST(state, payload) {
        state.roleList = payload;
    }

};
