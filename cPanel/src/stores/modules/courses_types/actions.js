import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/courses_types" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_COURSES_TYPES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/courses_types/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_COURSES_TYPE', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/courses_types`, model)
                .then(({ data }) => {
                    commit('CREATE_COURSES_TYPE', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/courses_types/${id}`)
            .then((res) => {
                commit('DELETE_COURSES_TYPE', id);
                return res;
            });
    },

    // This action is used to get list of all the course categories
    /*async list(context) {
        //api/v1/courses_type/list
        const resposnse = await axios.get('/api/v1/courses_type/list');
        if (resposnse.status !== 200) {
            const error = new Error('Failed to get list of cours types')
            throw error;
        }
        context.commit('LIST_COURSES_TYPE', resposnse.data);
    }*/
};