<template>
    <div v-if="$page.props.flash.success || $page.props.flash.error"
        class="fixed bottom-4 right-4 flex items-center text-white rounded px-8 py-4 "
        :class="{
            'bg-green-500': $page.props.flash.success,
            'bg-red-500': $page.props.flash.error,
        }">
        <div v-if="$page.props.flash.success">
            {{ $page.props.flash.success}}
        </div>
        <div v-if="$page.props.flash.error">
            {{ $page.props.flash.error}}
        </div>
        <button class="ml-4" @click="hideFlashMessage">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
</template>
<script>
import Button from '../Jetstream/Button.vue'
export default {
    methods: {
        hideFlashMessage() {
            this.$page.props.flash.success = "";
            this.$page.props.flash.error = "";
        }
    },
       
    props: {
        
    }
}
</script>
