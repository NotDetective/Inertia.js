<script setup>
import {ref, watch} from "vue";
import {Head} from "@inertiajs/inertia-vue3";
import {router} from '@inertiajs/vue3'
import Body from "@/Shared/table/Body.vue";
import Pagination from "@/Shared/Pagination.vue";
import SearchDropDown from "@/Shared/search/SearchDropDown.vue";
import throttle from "lodash.throttle";

const props = defineProps({
    tickets: {
        type: Object,
        required: true,
    },
    users: {
        type: Array,
        default: () => [],
    },
    projects: {
        type: Array,
        default: () => [],
    },
    filters: {
        type: Object,
        default: () => {
        },
    },
});

let search = ref(props.filters.search ?? ''),
    searchUser = ref(props.filters.searchUser ?? ''),
    selectedUser = ref(JSON.parse(props.filters.selectedUser ?? '[]')),
    searchProject = ref(props.filters.searchProject ?? ''),
    selectedProject = ref(JSON.parse(props.filters.selectedProject ?? '[]'));

watch([search, searchUser, selectedUser.value, searchProject, selectedProject.value], throttle(() => {
    router.get(route('tickets'), {
        search: search.value,
        searchUser: searchUser.value,
        selectedUser: JSON.stringify(selectedUser.value),
        searchProject: searchProject.value,
        selectedProject: JSON.stringify(selectedProject.value)
    }, {
        preserveState: true,
        preserveScroll: true,
    });
}, 500))
</script>

<template>

    <Head title="Demo - Tickets"/>
    <main class="h-screen flex flex-col">
        <section class="flex-1 mt-7">

            <Body
                :data="tickets.data"
            >
            <div class="w-full min-h-36 h-fit flex justify-evenly">

                <div class="w-[300px]">
                    <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
                    <div class="mt-2">
                        <input v-model="search"
                               name="search"
                               type="text"
                               placeholder="search..."
                               class="w-full p-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400"
                        >
                    </div>
                </div>

                <SearchDropDown
                    v-model="searchUser"
                    name="User"
                    :selectedData="selectedUser"
                    :showData="users"
                />

                <SearchDropDown
                    v-model="searchProject"
                    name="Project"
                    :selectedData="selectedProject"
                    :showData="projects"
                />

            </div>
            </Body>

        </section>
        <section class="mb-7">
            <Pagination :links="tickets.links"/>
        </section>
    </main>

</template>
