<script setup>

import Row from "@/Shared/table/Row.vue";

defineProps({
    data: {
        type: Array,
        required: true,
    },
});

</script>

<template>

    <div class="px-4 sm:px-6 lg:px-8 w-full">
        <div class="sm:flex sm:items-center w-full">
            <slot/>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    <table
                        v-if="data.length > 0"
                        class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                Title
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Assigned to
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Project
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Status
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody
                            v-if="data.length > 0"
                            class="divide-y divide-gray-200 bg-white">

                        <Row
                            v-for="item in data"
                            :key="item.id"
                            :item="item"
                        />

                        </tbody>

                        <tbody v-else class="flex justify-center items-center">
                            <tr class="text-gray-500">No tickets found.</tr>
                        </tbody>

                    </table>

                    <!--                            <div v-else class="flex justify-center items-center">-->
                    <!--                                <p class="text-gray-500">No users found.</p>-->
                    <!--                            </div>-->
                </div>
            </div>
        </div>
    </div>

</template>
