import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the subjects present in database
    async list({ commit }, { url = null } = {}) {
        url = "/subjects" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_SUBJECTS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async create({ commit }, subject) {
        return await axiosClient.post('/subjects', subject)
            .then(({ data }) => {
                if (data.success) {
                    commit('CREATE_SUBJECT', data);
                    //return true;
                } else {
                    const error = new Error(data.message)
                    throw error;
                }
            });
    },

    // After model submits the form, permission information must be updated in database.
    async update({ commit }, subject) {
        return await axiosClient.put(`/subjects/${subject.id}`, subject)
            .then(({ data }) => {
                if (data.success) {
                    commit('UPDATE_SUBJECT', subject);
                    //return ;
                } else {
                    const error = new Error(data.message)
                    throw error;
                }
            });
    },

    // This action is used to delete item from serve.
    async delete(context, id) {
        const response = await axiosClient.delete(`/subjects/${id}`);
        if (response.status != 200) {
            const error = new Error('Failed to delete subject.')
            throw error;
        }
        context.commit('DELETE_SUBJECT', id);
    },

};