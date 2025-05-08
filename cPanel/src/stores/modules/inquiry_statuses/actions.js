import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/inquiry_statuses" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_INQUIRY_STATUSES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/inquiry_statuses/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_INQUIRY_STATUS', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/inquiry_statuses`, model)
                .then(({ data }) => {
                    commit('CREATE_INQUIRY_STATUS', data);
                    return data;
                });
        }
    },

    // This action is used to delete inquiry status from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/inquiry_statuses/${id}`)
            .then((res) => {
                commit('DELETE_INQUIRY_STATUS', id);
                return res;
            });
    },
};


