import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            user: {
                data: {},
                token: localStorage.getItem("TOKEN"),
                user: localStorage.getItem("USER"),
            },
            profile: {}
        }
    },
    actions,
    mutations,
    getters,
};
