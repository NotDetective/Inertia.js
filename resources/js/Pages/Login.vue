<script setup>
import {useForm} from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: ''
});


const submit = () => {
    form.post(route('login.store'));
}

</script>

<template>

    <div>
        <h1>Login</h1>
    </div>

    <form @submit.prevent="submit" >
        <input type="email" name="email" placeholder="Email"
            v-model="form.email"
        />
        <input type="password" name="password" placeholder="Password"
            v-model="form.password"
        />
        <button type="submit">Login</button>
    </form>

</template>
