import {defineStore} from "pinia";
import axiosClient from "@/axios"; 
import { useVuelidate } from "@vuelidate/core";
import { required, email, helpers, minLength, numeric } from "@vuelidate/validators";

export const useUserStore = defineStore("user", { 
    
    state: () => ({
        user: {
            id: null,
            name: "",
            email: "",
            alt_email: "",
            mobile: "",
            alt_mobile: "",
            address: "",
            alt_address: "",
            gender: "",
            qualification: "",
            avatar: null,
            role: "",
            designation: "",
            dob: "",
        },
        roles: {},
        //v$: useVuelidate(rules, user);
    }), 
    getters: {
        /**
         * Get all roles in system
         * @returns {object} all roles in system
         */
        rules: (state) => {
            return {
                name: {
                    required: helpers.withMessage("Please enter name of user.", required),
                },
                email: {
                    required: helpers.withMessage("Please enter email address.", required),
                    email: helpers.withMessage("Please enter valid email address", email),
                },
                alt_email: {
                    required: helpers.withMessage("Please enter alternate email address.", required),
                    email: helpers.withMessage("Please enter valid alternate email address", email),
                },
                mobile: {
                    required: helpers.withMessage("Please enter mobile number.", required),
                    minLength: helpers.withMessage("Please enter valid mobile number", minLength(10)),
                    numeric: helpers.withMessage("Please enter valid mobile number", numeric),
                },
                alt_mobile: {
                    required: helpers.withMessage("Please enter alternate mobile number.", required),
                    minLength: helpers.withMessage("Please enter valid alternate mobile number", minLength(10)),
                    numeric: helpers.withMessage("Please enter valid alternate mobile number", numeric),
                },
                designation: {
                    required: helpers.withMessage("Please select role of user.", required),
                },
                address: {
                    required: helpers.withMessage("Please enter address.", required),
                },
                dob: {
                    required: helpers.withMessage("Please enter date of birth.", required),
                },
                gender: {
                    required: helpers.withMessage("Please select gender.", required),
                },    
                qualification: {
                    required: helpers.withMessage("Please enter qualification.", required),
                },
            };
        },
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