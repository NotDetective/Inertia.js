<script setup>
    defineProps({
        active: Boolean,
    })
</script>

<template>

    <Link
        class="px-3 py-1 rounded-md text-md"
        :class="{
            'bg-gray-500' : active,
            'bg-gray-700 hover:bg-gray-500' : !active,
        }"
    >
        <slot/>
    </Link>

</template>
