import {defineStore} from "pinia";
import axiosClient from "@/axios"; 

export const useUserStore = defineStore("user", {  
    state: () => ({
        user: {},
        roles: {},
    }), 
    getters: {
        /**
         * Get all roles in system
         * @returns {object} all roles in system
         */
        //roles_getter: (state): object  => state.roles
        
    },
    actions: {
        async role_list() {
                const response = await axiosClient.get('/users/role_list');
                this.roles = response.data;
            },
        
        async list() {
                const response = await axiosClient.get('/users');
                this.user = response.data;
            },
            
        async store(data: any) {
                const response = await axiosClient.post(`/users`, data);
                this.user = response.data;
            },
        
        async edit(id: any) {
                const response = await axiosClient.get(`/users/${id}/edit`);
                this.user = response.data;
            },
        
        async update(id: any, data: any) {
                const response = await axiosClient.put(`/users/${id}`, data);
                this.user = response.data;
            },
        
        async delete(id: any) {
                const response = await axiosClient.delete(`/users/${id}`);
                this.user = response.data;
            },
        
        async show(id: any) {
                const response = await axiosClient.get(`/users/${id}`);
                this.user = response.data;
            },
    },

})