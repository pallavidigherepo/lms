import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/inquiries" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_INQUIRIES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/inquiries/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_INQUIRY', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/inquiries`, model)
                .then(({ data }) => {
                    commit('CREATE_INQUIRY', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/inquiries/${id}`)
            .then((res) => {
                commit('DELETE_INQUIRY', id);
                return res;
            });
    },
};
