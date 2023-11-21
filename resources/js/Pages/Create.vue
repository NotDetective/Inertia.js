<script setup>
import {useForm} from "@inertiajs/vue3";

defineProps({
    error: Object,
})

let form = useForm({
    email: '',
    name: ''
});

const submit = () => {
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

</template>
