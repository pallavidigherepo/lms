import axios from "axios"
import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/fees" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_FEES', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/fees/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_FEE', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/fees`, model)
                .then(({ data }) => {
                    commit('CREATE_FEE', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/fees/${id}`)
            .then((res) => {
                commit('DELETE_FEE', id);
                return res;
            });
    },

    async pay({commit}, item) {
        console.log(item)
    }
};
