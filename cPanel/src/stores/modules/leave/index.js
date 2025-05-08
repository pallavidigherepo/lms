import getters from "./getters.js"
import actions from "./actions.js"
import mutations from "./mutations.js"

export default {
    namespaced: true,
    state() {
        return {
            leaveTypes: [],
            leaveStatuses: [],
            leaveRequests: [],
            leaveBalances: [],
        }
    },
    actions,
    mutations,
    getters,
};
