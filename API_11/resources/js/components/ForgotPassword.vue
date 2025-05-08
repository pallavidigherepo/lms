<template>
    <form class="container" @submit.prevent="handleSubmit">
        <div class="my-5">
            <input v-model="email" type="email" class="form-control" placeholder="Enter Email" />
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const email = ref("");

const handleSubmit = async () => {
    try {
        const response = await axios.post('/forgot_password', { email: email.value });
        console.log(response);
    } catch (error) {
        console.log(error);
    }
}

</script>