<script setup>
import {Head} from '@inertiajs/inertia-vue3'
import { router } from '@inertiajs/vue3'
</script>

<template>

    <Head title="Demo - Index"/>

    <div class="bg-gray-100 p-4">
        <h1 class="text-2xl font-bold mb-4">Laravel, Vue 3 and Inertia Demo Pages</h1>

        <p class="mb-4">This is a demo site to test how to use Laravel, Vue 3 and Inertia together.</p>

        <p class="mb-4">The site is a simple user management system. It has the following pages:</p>

        <ul class="list-disc list-inside">
            <li>
                <Link :href="route('index')" class="text-blue-500 hover:underline">Home</Link>
            </li>
            <li>
                <Link :href="route('users')" class="text-blue-500 hover:underline">Users</Link>
            </li>
            <li>
                <Link :href="route('users.create')" class="text-blue-500 hover:underline">Users/Create</Link>
            </li>
            <li>
                <Link :href="route('users.edit', 11)" class="text-blue-500 hover:underline">Users/Edit</Link>
            </li>
            <li>
                <Link :href="route('logout')" method="post" as="button" class="text-blue-500 hover:underline">Login</Link>
            </li>
        </ul>

        <p class="mb-4">The site uses the following tools:</p>

        <ul class="list-disc list-inside">
            <li>
                <a href="https://laravel.com/docs/10.x" target="_blank" class="text-blue-500 hover:underline">Laravel 10</a>
            </li>
            <li>
                <a href="https://vuejs.org/" target="_blank" class="text-blue-500 hover:underline">Vue 3</a>
            </li>
            <li>
                <a href="https://inertiajs.com/" target="_blank" class="text-blue-500 hover:underline">Inertia</a>
            </li>
            <li>
                <a href="https://tailwindcss.com/" target="_blank" class="text-blue-500 hover:underline">Tailwind CSS</a>
            </li>
            <li>
                <a href="https://github.com/tighten/ziggy" target="_blank" class="text-blue-500 hover:underline">Ziggy</a>
            </li>
            <li>
                <a href="https://lodash.com/" target="_blank" class="text-blue-500 hover:underline">Lodash</a>
            </li>
            <li>
                <a href="https://github.com/barryvdh/laravel-debugbar" target="_blank" class="text-blue-500 hover:underline">Laravel Debugbar</a>
            </li>
            <li>
                <a href="https://spatie.be/docs/laravel-medialibrary/v10/introduction" target="_blank" class="text-blue-500 hover:underline">Spatie medialibrary</a>
            </li>
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
            <li>File uploads</li>
        </ul>

    </div>
</template>

