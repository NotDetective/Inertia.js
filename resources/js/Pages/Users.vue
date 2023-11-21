<script setup>
import {ref, watch} from "vue";
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    users: Object,
})

let search = ref('');

watch(search, (value) => {
    router.get('/users', { search: value }, {
        preserveState: true,
        preserveScroll: true,
    });
})
</script>

<template>

    <div>
        <h1>Users</h1>
    </div>

    <input type="text" v-model="search" placeholder="search for user">

    <Link :href="route('users.create')" as="button">Create User</Link>

    <ul>
        <Link
            :href="route('users.edit', user.id)"
            v-for="user in users.data"
            :key="user.id"
        >
            <li v-text="user.name" />
        </Link>
    </ul>

    <ul class="pagination">
        <Link
            v-for="link in users.links"
            :href="link.url ?? '#'"
            :key="link.id"
            :class="{
                active: link.active,
            }"
            as="button"
            :disabled="link.active || link.url === null"
        >{{ link.label }}</Link>
    </ul>
</template>

<style>
    .pagination {
        font-size: large;
        color: white;
        display: flex;
        list-style: none;
    }
    .pagination button{
        background-color: #4a5568;
        border: none;
        border-radius: 5px;
        padding: 0.5rem;
        margin-left: 0.6rem;
        color: white;
    }
    button:disabled{
        background-color: #29313d;
        color: red;
    }
</style>
