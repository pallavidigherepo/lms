export default {
    logout: (state) => {
        state.user.token = null;
        state.user.data = {};
        localStorage.removeItem("TOKEN");
        localStorage.removeItem("USER");
    },

    setUser: (state, user) => {
        state.user.data = user;
        localStorage.setItem('USER', JSON.stringify(user));
    },
    setToken: (state, token) => {
        state.user.token = token;
        localStorage.setItem('TOKEN', token);
    },
    userProfile: (state, user) => {
        state.profile = user;
    },
    setLaravel: (state, payload) => {
        window.Laravel = {
            user_permissions: payload
        }
    }
};
