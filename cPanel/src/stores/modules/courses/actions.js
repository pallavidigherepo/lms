import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses present in database
    async list({ commit }, { url = null } = {}) {
        url = "/courses" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_COURSES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/courses/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_COURSE', model);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/courses`, model)
                .then(({ data }) => {
                    commit('CREATE_COURSE', data);
                    return data;
                });
        }
    },
    

    // This action is used to delete permission from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/courses/${id}`)
            .then((res) => {
                commit('DELETE_COURSE', id);
                return res;
            });
    },
};