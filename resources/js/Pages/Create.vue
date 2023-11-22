<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";

defineProps({
    error: Object,
})

let form = useForm({
    email: '',
    name: ''
});

let prepossessing = ref(false);

const submit = () => {
    prepossessing.value = true
    form.post(route('users.store'));
}
</script>

<template>

    <form @submit.prevent="submit" >
        <input type="text" name="name" placeholder="name"
               v-model="form.name"
        />
        <p v-if="error">{{ error.name }}</p>
        <input type="email" name="email" placeholder="Email"
               v-model="form.email"
        />
        <p v-if="error">{{ error.email }}</p>
        <button type="submit">add user</button>
    </form>

<<<<<<< Updated upstream
=======
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
                </div>

                <div>
                    <button
                        :disabled="prepossessing"
                        :class="{
                            'opacity-50 cursor-not-allowed' : prepossessing,
                        }"
                        type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add User</button>
                </div>
            </form>
        </div>
    </div>
>>>>>>> Stashed changes
</template>
