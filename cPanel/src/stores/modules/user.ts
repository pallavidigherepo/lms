import {defineStore} from "pinia";
import axiosClient from "@/axios"; 
import { useVuelidate } from "@vuelidate/core";
import { required, email, helpers, minLength, numeric } from "@vuelidate/validators";

// outside defineStore
const imageType = helpers.withMessage(
  "Only JPEG, PNG or JPG allowed.",
  (value: File) => {
    if (!value || !(value instanceof File)) return false;
    return ['image/jpeg', 'image/png', 'image/jpg'].includes(value.type);
  }
);

const imageFileSize = (maxSizeInMB: number) =>
  helpers.withMessage(
    `Image size should not exceed ${maxSizeInMB} MB.`,
    (value: File) => {
      if (!value || !(value instanceof File)) return false;
      return value.size <= maxSizeInMB * 1024 * 1024;
    }
  );

const imageDimensions = (expectedWidth: number, expectedHeight: number) =>
  helpers.withAsync(async (value: File) => {
    if (!value || !(value instanceof File)) return false;

    return new Promise((resolve) => {
      const reader = new FileReader();
      reader.onload = (e: any) => {
        const img = new Image();
        img.onload = () => {
          const valid =
            Math.abs(img.width - expectedWidth) <= 5 &&
            Math.abs(img.height - expectedHeight) <= 5;
          resolve(valid);
        };
        img.onerror = () => resolve(false);
        img.src = e.target.result;
      };
      reader.readAsDataURL(value);
    });
  }, "Image dimensions should be 725 x 285 pixels.");

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
            date_of_joining: "",
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
                role: {
                    required: helpers.withMessage("Please select role of user.", required),
                },
                address: {
                    required: helpers.withMessage("Please enter address.", required),
                },
                dob: {
                    required: helpers.withMessage("Please enter date of birth.", required),
                },
                date_of_joining: {
                    required: helpers.withMessage("Please enter date of joining.", required),
                },
                avatar: {
                    required: helpers.withMessage("Please enter avatar image URL.", required),   
                    imageType: imageType,
                    //imageFileSize: imageFileSize(2), // 2 MB                 
                    //imageDimensions: imageDimensions(725, 285), // 725 x 285 pixels
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
                // Reset user state after storing
                this.user = {
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
                    date_of_joining: "",  
                };
                if (response.status === 201 || response.status === 200) {
                    // Optionally, you can show a success message or perform other actions
                    console.log("User created successfully");
                } else {
                    // Handle error if needed
                    console.error("Failed to create user", response);
                }
                // Optionally, you can return the response if needed
                return response;
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