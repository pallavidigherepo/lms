import axiosClient from "@/axios";
import store from "@/stores";
import axios from "axios";

export default {
    async login({ commit, dispatch }, user) {
        //return await axios.get("/sanctum/csrf-cookie", { baseURL: `${import.meta.env.VITE_API_BASE_URL}`}).then (() => {
            //return authClient.post("/login", payload);
            return axiosClient.post('/login', user)
                .then(({ data }) => {
                    if (!data.error) {
                        commit('setUser', data.user);
                        commit('setToken', data.token);
                        commit('setLaravel', data.user_permissions);
                    }
                    return data;
                })
                .catch((e) => {
                    console.log(e)
                    throw new Error('The provided credentials are not correct.');
                })
        //});

    },

    forgot_password({ commit }, user) {
        return axiosClient
          .post("/forgot_password", user)
          .then(({ data }) => {
            return data;
          })
          .catch((e) => {
            throw new Error("Provided email address does not exists.");
          });
      },
      reset_password({ commit }, payload) {
        return axiosClient
          .post("/reset_password", payload)
          .then(({ data }) => {
            return data;
          })
          .catch((e) => {
            throw new Error("Provided email address does not exists.");
          });
      },
    logout({ commit }) {
        return axiosClient.post('/logout')
            .then(response => {
                commit('logout')
                window.Laravel = "";
                return response;
            })
    },
    profile({ commit }) {
        return axiosClient.get('/profile')
            .then(({ data }) => {
                commit('userProfile', data)
            })
            .catch((e) => {})
    },
    save({ commit }, payload) {
        return axiosClient.put('/profile/' + payload.id, payload)
            .then(({ data }) => {
                commit('userProfile', data);
            })
            .catch((e) => {})

    }
}
