<script setup>
import {ref, watch} from "vue";
import {Link, router} from '@inertiajs/vue3'
import Pagination from "@/Shared/pagination.vue";
import throttle from "lodash.throttle";

const props = defineProps({
    users: Object,
    filters: Object,
})

let search = ref(props.filters.search ?? '');

watch(search, throttle((value) => {
    router.get(route('users'), {search: value}, {
        preserveState: true,
        preserveScroll: true,
    });
}, 500))
</script>

<template>
    <main class="h-screen flex flex-col">
        <section class="flex-1 mt-7">

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none w-1/4">
                        <div>
                            <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
                            <div class="mt-2">
                                <input v-model="search"
                                       name="search"
                                       type="text"
                                       placeholder="search..." class="block mb-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <Link :href="route('users.create')" as="button"
                              class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add user
                        </Link>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Status
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr
                                    v-for="user in users.data"
                                    :key="user.id"

                                >
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="h-11 w-11 flex-shrink-0">
                                                <img class="h-11 w-11 rounded-full"
                                                     :src="`https://i.pravatar.cc/150?u=${user.id}` " alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ user.name }}</div>
                                                <div class="text-sm text-gray-500">{{ user.email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <Link :href="route('users.edit', user.id)"
                                              class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span>
                                        </Link>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-7">
            <Pagination :links="users.links"/>
        </section>
    </main>
</template>
