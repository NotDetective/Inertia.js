<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    auth: String,
    users: Array,
})

</script>

<template>
    <div>
        <h1>Index</h1>
        <p>Hello {{ auth.user.username }}!</p>
    </div>

    <Link :href="route('logout')" method="post" as="button">Logout</Link>

    <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name" />
    </ul>

</template>
