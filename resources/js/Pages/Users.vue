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

<<<<<<< Updated upstream
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
=======
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
>>>>>>> Stashed changes
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
