<template>
    <div>
        <table class="min-w-full divide-y divide-gray-200 px-2">
            <thead class="bg-gray-50">
                <tr>
                    <th v-for="(header, index ) in headers" 
                        :key="`header-${index}`"
                        :class="header.class || 'text-left'"
                        scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                        {{ header.name }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 p-4">
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        headers: Array,
    }
}
</script>