<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    user: Object,
})

let prepossessing = ref(false);

let form = useForm({
    email: props.user.email,
    name: props.user.name
});

const submit = () => {
    prepossessing.value = true
    form.patch(route('users.update', props.user.id));
}

const destroy = () => {
    alert('Are you sure you want to delete this user?')
    form.delete(route('users.destroy', props.user.id));
}
</script>

<template>

    <form @submit.prevent="submit" >
        <input type="text" name="name" placeholder="name"
               v-model="form.name"
        />
        <input type="email" name="email" placeholder="Email"
               v-model="form.email"
        />
        <button type="submit">add user</button>
    </form>

    <Link :href="route('users.destroy', props.user.id)" method="delete" as="button">Delete</Link>

<<<<<<< Updated upstream
=======
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

            <button
                @click="destroy"
                class="mt-2 rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            >
                Delete
            </button>
        </div>
    </div>
>>>>>>> Stashed changes
</template>
