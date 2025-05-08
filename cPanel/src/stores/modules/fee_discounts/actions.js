import axios from "axios"
import axiosClient from "@/axios";

export default {
    // This action is used to fetch all the courses types present in database
    async list({ commit }, { url = null } = {}) {
        url = "/fee_discounts" + url;
        return await axiosClient.get(url)
            .then(({ data }) => {
                commit('SET_FEE_DISCOUNTS', data);
                commit('SET_PAGINATION_LINKS', data.meta.links)
                return data;
            });
    },

    async save({ commit }, model) {
        let response;

        if (model.id) {
            response = await axiosClient
                .put(`/fee_discounts/${model.id}`, model)
                .then(({ data }) => {
                    commit('UPDATE_FEE_DISCOUNT', data);
                    return data;
                });
        } else {
            response = await axiosClient
                .post(`/fee_discounts`, model)
                .then(({ data }) => {
                    commit('CREATE_FEE_DISCOUNT', data);
                    return data;
                });
        }
    },

    // This action is used to delete coursesType from serve.
    async delete({ commit }, id) {
        return await axiosClient
            .delete(`/fee_discounts/${id}`)
            .then((res) => {
                commit('DELETE_FEE_DISCOUNT', id);
                return res;
            });
    },
};
