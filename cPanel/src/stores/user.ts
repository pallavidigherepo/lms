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
        roles_getter: (state): object  => state.roles
        
    },
    actions: {
        async role_list() {
                const response = await axiosClient.get('/users/role_list');
                this.roles = response.data;
            }
    },

})