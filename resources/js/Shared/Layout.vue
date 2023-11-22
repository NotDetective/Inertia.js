<script setup>
    import NavItem from "@/Shared/NavItem.vue";
    import {router} from "@inertiajs/vue3";

    defineProps({
        auth: Object,
    })
//     commit
</script>

<template>
    <div class="h-screen">
        <header class="bg-gray-600 w-screen h-28 flex items-center justify-between p-5 text-white">

            <div class="flex items-center">
                <div class="w-20 h-22">
                    <img class="rounded-full" src="images/smily-logo-placeholder.png" alt="">
                </div>
                <div class="ml-3">
                    <h1 class="text-3xl">Simple Inertia Demo site</h1>
                    <p>Hello {{ auth.user.username }}!</p>
                </div>
            </div>

            <nav class="flex gap-4">
                <NavItem
                    :active="route().current() === 'index'"
                    href="/"
                >Home</NavItem>
                <NavItem
                    :active="route().current() === 'users'"
                    href="/users"
                >Users</NavItem>
                <NavItem
                    href="/logout"
                    method="post"
                    as="button"
                >Logout</NavItem>
            </nav>
        </header>

        <main class="mt-4 flex justify-center h-5/6">
            <section class="w-11/12 h-full">
                <slot/>
            </section>
        </main>
    </div>
</template>
