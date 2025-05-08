import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/standards" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_STANDARDS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/standards/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_STANDARD', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/standards`, model)
                .then(({ data }) => {
                    commit('CREATE_STANDARD', data);
                    return data;
                });
        }
    },

    // This action is used to delete batch from server.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/standards/${id}`)
            .then((res) => {
                commit('DELETE_STANDARD', id);
                return res;
            });
    },

};
