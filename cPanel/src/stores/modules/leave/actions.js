import axiosClient from "@/axios";

export default {
    async fetchLeaveTypes({ commit }) {
        const response = await axiosClient.get('/leave-types');
        commit('setLeaveTypes', response.data);
    },

    async fetchLeaveStatuses({ commit }) {
        const response = await axiosClient.get('/leave-statuses');
        commit('setLeaveStatuses', response.data);
    },

    async applyLeave({ dispatch }, leaveData) {
        await axiosClient.post('/leaves', leaveData);
        dispatch('fetchLeaveBalances');
    },

    async fetchLeaveRequests({ commit }) {
        const response = await axiosClient.get('/leaves/requests');
        commit('setLeaveRequests', response.data);
    },

    async approveLeave({ dispatch }, leaveId) {
        await axiosClient.post(`/leaves/${leaveId}/approve`);
        dispatch('fetchLeaveRequests');
    },

    async rejectLeave({ dispatch }, leaveId) {
        await axiosClient.post(`/leaves/${leaveId}/reject`);
        dispatch('fetchLeaveRequests');
    },

    async fetchLeaveBalances({ commit }) {
        const response = await axiosClient.get('/leaves/balance');
        commit('setLeaveBalances', response.data);
    },
};
