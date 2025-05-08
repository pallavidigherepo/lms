import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/inquiry_followups"+url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_INQUIRY_FOLLOWUPS', data);
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/inquiry_followups/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_INQUIRY_FOLLOWUP', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/inquiry_followups`, model)
                .then(({ data }) => {
                    //commit('CREATE_INQUIRY_FOLLOWUP', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/inquiry_followups/${id}`)
            .then((res) => {
                commit('DELETE_INQUIRY_FOLLOWUP', id);
                return res;
            });
    },
};
