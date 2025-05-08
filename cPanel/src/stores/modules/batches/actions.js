import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/batches" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_BATCHES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/batches/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_BATCH', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/batches`, model)
                .then(({ data }) => {
                    commit('CREATE_BATCH', data);
                    return data;
                });
        }
    },

    // This action is used to delete batch from server.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/batches/${id}`)
            .then((res) => {
                commit('DELETE_BATCH', id);
                return res;
            });
    },

};
