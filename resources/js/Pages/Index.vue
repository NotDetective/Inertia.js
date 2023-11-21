<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    auth: String
})

</script>

<template>
    <div>
        <h1>Index</h1>
        <p>Hello {{ auth.user.username }}!</p>
    </div>

    <Link :href="route('logout')" method="post" as="button">Logout</Link>
</template>
