import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the permissions present in database
    async list({ commit }, { url = null } = {}) {
        url = "/permissions" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_PERMISSIONS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/permissions/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_PERMISSION', model);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/permissions`, model)
                .then(({ data }) => {
                    commit('CREATE_PERMISSION', data);
                    return data;
                });
        }
    },

    // This action is used to delete permission from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/permissions/${id}`)
            .then((res) => {
                commit('DELETE_PERMISSION', id);
                return res;
            });
    },


    async permissionCount(context) {
        const response = await axios.get('/api/v1/permissions');

        if (response.status != 200) {
            const error = new Error('Failed to fetch permissions')
            throw error;
        }

        context.commit('FETCH_PERMISSIONS_COUNT', response.data.length);
    },


    async modules({ commit }) {
        return await axiosClient.get('/permissions/modules')
            .then(({ data }) => {
                commit('FETCH_PERMISSIONS_MODULE_WISE', data);
                return data;
            });
    },
};