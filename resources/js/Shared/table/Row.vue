<script setup>
    defineProps({
        item: {
            type: Object,
            required: true,
        },
    })
</script>

<template>
    <tr>
        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ item.title }}</div>
                </div>
            </div>
        </td>

        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ item.user.name }}</div>
                    <div class="text-sm text-gray-500">{{ item.user.email }}</div>
                </div>
            </div>
        </td>

        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ item.project.name }}</div>
                    <div class="text-sm text-gray-500">{{ item.project.customer }}</div>
                </div>
            </div>
        </td>

        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="font-medium"
                            :class="{
                                'text-green-600': item.status === 'open',
                                'text-yellow-600': item.status === 'in progress',
                                'text-red-600': item.status === 'closed',
                            }"
                    >{{ item.status }}</div>
                </div>
            </div>
        </td>

        <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
            <Link href="#"
                  class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span>
            </Link>
        </td>
    </tr>
</template>
