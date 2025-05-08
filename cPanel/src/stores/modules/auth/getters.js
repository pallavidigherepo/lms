export default {
    userId(state) {
        return state.userId;
    },
    token(state) {
        return state.token;
    },
    isAuthenticated(state) {
        return !!state.token;
    },
    isLoggedIn(state) {
        return state.isLoggedIn;
    },
    didAutoLogout(state) {
      return state.didAutoLogout;
    }
}
