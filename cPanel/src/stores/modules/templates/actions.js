import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the questions present in database
    async list({ commit }, { url = null } = {}) {
        url = "/templates" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_TEMPLATES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/templates/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_TEMPLATE', model);
                    return true;
                });
        } else {
            response = await axiosClient
                .post(`/templates`, model)
                .then(({ data }) => {
                    commit('CREATE_TEMPLATE', data);
                    return true;
                });
        }
    },

    async show({ commit }, id) {
        let response;

        response = await axiosClient
            .get(`/templates/${id}`)
            .then(({ data }) => {
                commit('VIEW_TEMPLATE', data.data);
                return data;
            });
    },

    // This action is used to delete permission from serve.
    async delete(context, id) {
        const response = await axiosClient.delete(`/templates/${id}`);
        if (response.status != 200) {
            const error = new Error('Failed to delete question')
            throw error;
        }
        context.commit('DELETE_TEMPLATE', id);
    },

};
