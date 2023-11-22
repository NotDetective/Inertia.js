<script setup>
import {Head} from '@inertiajs/inertia-vue3'
</script>

<template>

    <Head title="Demo - Index" />

    <div class="bg-gray-100 p-4">
        <h1 class="text-2xl font-bold mb-4">Laravel, Vue 3 and Inertia Demo Pages</h1>

        <p class="mb-4">This is a demo site to test how to use Laravel, Vue 3 and Inertia together.</p>

        <p class="mb-4">The site is a simple user management system. It has the following pages:</p>

        <ul class="list-disc list-inside">
            <li>Home</li>
            <li>Users</li>
            <li>Users/Create</li>
            <li>Users/Edit</li>
        </ul>

        <p class="mb-4">The site uses the following packages:</p>

        <ul class="list-disc list-inside">
            <li>Laravel 1</li>
            <li>Vue 3</li>
            <li>Inertia</li>
            <li>Tailwind CSS</li>
            <li>Ziggy</li>
            <li>Lodash</li>
        </ul>

        <p class="mb-4">The site uses the following features:</p>

        <ul class="list-disc list-inside">
            <li>Authentication</li>
            <li>Authorization</li>
            <li>CRUD</li>
            <li>Search</li>
            <li>Pagination</li>
            <li>Throttling</li>
            <li>Form validation</li>
            <li>Form error messages</li>
        </ul>

    </div>
</template>

