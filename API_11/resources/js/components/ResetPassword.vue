<template>
    <form class="container" @submit.prevent="handleSubmit">
        <div class="my-3">
            <input v-model="userValue.email" type="email" class="form-control" placeholder="Your Email" />
        </div>
        <div class="my-3">
            <input v-model="userValue.password" type="password" class="form-control" placeholder="New Password" />
        </div>
        <div class="my-3">
            <input v-model="userValue.password_confirmation" type="password" class="form-control"
                placeholder="Confirm Password" />
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</template>

<script setup>
import axios from 'axios';
import { reactive } from 'vue';
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const userValue = reactive({
    email: "",
    password: "",
    password_confirmation: ""
});


const handleSubmit = async () => {
    try {
        const response = await axios.post('/reset_password', {
            email: userValue.email,
            password: userValue.password,
            password_confirmation: userValue.password_confirmation,
            token: route.params.token
        });
        console.log(response);
        router.push('/');
    } catch (error) {
        console.log(error);
    }
}


</script>