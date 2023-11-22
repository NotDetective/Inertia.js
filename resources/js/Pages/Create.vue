<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {Head} from "@inertiajs/inertia-vue3";

defineProps({
    errors: Object,
})

let form = useForm({
    email: '',
    name: ''
});

let prepossessing = ref(false);

const submit = () => {
    form.post(route('users.store'));
}
</script>

<template>
    <Head title="Demo - Create" />

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add users</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" @submit.prevent="submit">

                <div>
                    <div class="flex items-center justify-between">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">name</label>
                    </div>
                    <div class="mt-2">
                        <input
                            v-model="form.name"
                            id="name"
                            name="name"
                            type="text"
                            autocomplete="current-name"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-2 text-sm text-red-600" v-if="errors.name" v-text="errors.name"></p>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input
                            v-model="form.email"
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-2 text-sm text-red-600" v-if="errors.email" v-text="errors.email"></p>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add User</button>
                </div>
            </form>
        </div>
    </div>
</template>
