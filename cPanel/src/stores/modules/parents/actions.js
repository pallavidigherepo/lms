import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the users present in database
    async list({ commit }, { url = null } = {}) {
        url = "/parents"+url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_PARENTS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/parents/${model.id}`, model)
                .then(({ data }) => {
                    //commit('UPDATE_USER', model);
                    return true;
                });
        } else {
            response = await axiosClient
                .post(`/parents`, model)
                .then(({ data }) => {
                    //console.log(data)
                    //commit('CREATE_USER', data.user);
                    return true;
                });
        }
    },

    // This action is used to delete client from server.
    async delete({commit}, id) {
        const response = await axiosClient.delete(`/parents/${id}`);
        if (response.status !== 200) {
            throw new Error('Failed to delete parent');
        }
        commit('DELETE_PARENT', id);
    },
};
