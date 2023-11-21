<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    auth: Object,
})

</script>

<template>
    <div>
        <h1>Index</h1>
        <p>Hello {{ auth.user.username }}!</p>
    </div>

    <Link :href="route('logout')" method="post" as="button">Logout</Link>

    <Link href="/users">users</Link>
</template>
np
