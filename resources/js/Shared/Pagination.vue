<script setup>
const props = defineProps({
    links: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <div class="w-full mb-7 flex justify-center">
        <nav class="flex w-11/12 items-center justify-between border-t border-gray-200 px-4 sm:px-0">
            <div class="-mt-px flex w-0 flex-1">
                <Link :href="links[0].url ?? '#'"
                      as="button"
                      :disabled="links[0].url === null"
                      class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700 disabled:opacity-50">
                    Previous
                </Link>
            </div>
            <div class="hidden md:-mt-px md:flex">

                <Link :href="link.url ?? '#'"
                      v-for="(link, index) in links"
                      :key="link.label"
                      as="button"
                      :disabled="link.url === null"
                      class="inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium disabled:opacity-50"
                      :class="{
                        'border-indigo-500 text-indigo-60' : link.active,
                        'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : !link.active && link.url !== null,
                        'hidden' : index === 0 || index === links.length - 1,
                    }"
                >
                    {{ link.label }}
                </Link>
            </div>
            <div class="-mt-px flex w-0 flex-1 justify-end">
                <Link :href="links[ links.length - 1 ].url ?? '#'"
                      as="button"
                      :disabled="links[ links.length - 1 ].url === null"
                      class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700 disabled:opacity-50">
                    next
                </Link>
            </div>
        </nav>
    </div>
</template>

