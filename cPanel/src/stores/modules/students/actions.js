import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the students present in database
    async list({ commit }, { url = null } = {}) {
        url = "/students" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_STUDENTS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/students/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_STUDENT', model);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/students`, model)
                .then(({ data }) => {
                    commit('CREATE_STUDENT', data);
                    return data;
                });
        }
    },

    async show({ commit }, id) {
        let response;

        response = await axiosClient
            .get(`/students/${id}`)
            .then(({ data }) => {
                //console.log(data)
                commit('VIEW_STUDENT', data);
                return data;
            });
    },

    // This action is used to delete permission from serve.
    async delete(context, id) {
        const response = await axiosClient.delete(`/students/${id}`);
        if (response.status !== 200) {
            throw new Error('Failed to delete student');
        }
        context.commit('DELETE_STUDENT', id);
    },

};
