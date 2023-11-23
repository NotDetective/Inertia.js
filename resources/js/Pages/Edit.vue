<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {Head} from "@inertiajs/inertia-vue3";

const props = defineProps({
    user: Object,
    errors: Object,
})

let prepossessing = ref(false);

let form = useForm({
    email: props.user.email,
    name: props.user.name
});

const submit = () => {
    form.patch(route('users.update', props.user.id), {
        onSuccess: () => {
            prepossessing.value = false;
        },
        onStart: () => {
            prepossessing.value = true;
        },
        onError: () => {
            prepossessing.value = false;
        }
    });
}

const destroy = () => {
    if (confirm('Are you sure you want to delete this user?')) {
        //action confirmed
        form.delete(route('users.destroy', props.user.id) );
    }
}
</script>

<template>
    <Head title="Demo - Edit" />

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit users</h2>
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
                    <button type="submit"
                            :disabled="prepossessing"
                            :class="{ 'opacity-50 cursor-not-allowed': prepossessing }"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Edit User
                    </button>
                </div>
            </form>

            <!--

            this is a option for delete button

            <Link
                :href="route('users.destroy', user.id)"
                as="button"
                method="destroy"
                class="flex w-1/4 mt-2 justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            >
                Delete User
            </Link>
             -->

            <!-- this option is making use of the a function -->
            <button
                @click="destroy"
                type="button"
                class="flex w-1/3 mt-2 justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            >
                Delete User
            </button>

        </div>
    </div>
</template>
