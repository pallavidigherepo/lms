import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/inquiry_followup_types" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_INQUIRY_FOLLOWUP_TYPES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/inquiry_followup_types/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_INQUIRY_FOLLOWUP_TYPE', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/inquiry_followup_types`, model)
                .then(({ data }) => {
                    commit('CREATE_INQUIRY_FOLLOWUP_TYPE', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/inquiry_followup_types/${id}`)
            .then((res) => {
                commit('DELETE_INQUIRY_FOLLOWUP_TYPE', id);
                return res;
            });
    },
};
