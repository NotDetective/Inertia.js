<script setup>
import {useForm, Link, router} from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
})

let form = useForm({
    email: props.user.email,
    name: props.user.name
});

const submit = () => {
    form.patch(route('users.update', props.user.id));
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

</template>
