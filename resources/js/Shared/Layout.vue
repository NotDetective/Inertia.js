<script setup>
import NavItem from "@/Shared/NavItem.vue";

defineProps({
    auth: Object,
})

let greeting = [
    'Hello',
    'Hi',
    'Hey',
    'Howdy',
    'Hola',
    'Bonjour',
    'Ciao',
    ][Math.floor(Math.random() * 7)
];

</script>

<template>
    <div class="h-screen">
        <header class="bg-gray-600 w-screen h-28 flex items-center justify-between p-5 text-white">

            <div class="flex items-center">
                <div class="w-20 h-20">
                    <Link :href="route('index')">
                        <!--
                        i am using route('index') so that i always use the full path
                        this is done so that if you refresh on any page you will still see the logo
                        Maybe there is a better way to do this
                         -->
                        <img class="rounded-full" :src="`${route('index')}/images/smily-logo-placeholder.png`" alt="website logo">
                    </Link>
                </div>
                <div class="ml-3">
                    <h1 class="text-3xl">Simple Inertia Demo site</h1>
                    <!-- greeting only change on page refresh this is done to show that the page doest refresh much -->
                    <p>{{ greeting }}, {{ auth.user.username }}!</p>
                </div>
            </div>

            <nav class="flex gap-4">

                <!--
                NavItem is just a Link
                Link is a component that is provided by inertia
                this way if you want to go to a other page
                you dont have to refresh the page
                -->
                <NavItem
                    :active="route().current() === 'index'"
                    href="/"
                >
                    Home
                </NavItem>
                <NavItem
                    :active="route().current() === 'users'"
                    href="/users"
                >
                    Users
                </NavItem>
                <NavItem
                    href="/logout"
                    method="post"
                    as="button"
                >
                    Logout
                </NavItem>
            </nav>
        </header>

        <main class="mt-4 flex justify-center h-5/6">
            <section class="w-11/12 h-full">
                <slot/>
            </section>
        </main>
    </div>
</template>
