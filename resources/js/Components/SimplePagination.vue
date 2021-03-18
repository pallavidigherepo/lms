<template>
    <div class=" flex items-center justify-between">
        <button-with-href :href="prevUrl" 
                        :disable="!prevUrl" 
                        :class="{'opacity-50': !prevUrl}">
            Previous
        </button-with-href>
        <button-with-href :href="nextUrl" 
                        :disable="!nextUrl" 
                        :class="{'opacity-50': !nextUrl}">
            Next
        </button-with-href>
    </div>
</template>

<script>

import ButtonWithHref from '@/Components/ButtonWithHref'
export default {
        components: {
            ButtonWithHref
        },
       
        props: {
            prevUrl: {},
            nextUrl: {},
        },
}
</script>
