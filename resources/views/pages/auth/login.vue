<template layout="default">
    <div class="mt-5 bg-white flex mx-auto justify-center items-center">

        <div class="py-20 px-40 bg-blue-400 rounded-2xl  ">
            <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Login Account</h1>
            </div>
            <form class="space-y-4" @submit.prevent="submit">
                <div class="mx-auto max-w-lg">
                    <div class="py-2">
                        <span class="px-1 text-m text-white">Name:</span>
                        <input placeholder="" type="text" v-model="form.name"
                            class="text-md block px-3 py-2  rounded-lg w-full
                          bg-white border-2 border-blue-300 placeholder-gray-600 shadow-md focus:bg-white focus:border-blue-600 focus:outline-none">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                    <div class="py-2">
                        <span class="px-1 text-m text-white">Password:</span>
                        <div class="relative">
                            <input placeholder="" type="password" v-model="form.password"
                                class="text-md block px-3 py-3  rounded-lg w-full bg-white border-2 border-blue-300 placeholder-gray-600 shadow-md focus:bg-white focus:border-blue-600 focus:outline-none">
                            <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}
                            </div>
                        </div>
                    </div>
                    <button class="mt-3 text-lg font-semibold
                          bg-blue-900 w-full text-white rounded-lg
                          px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-700">
                        Login
                    </button>
                    <p class="w-80 mt-3 text-center text-lg font-semibold text-gray-700 tracking-wide cursor-pointer">
                        Don't have an account? <a href="/register" class="text-white text-lg">Register</a></p>
                </div>
            </form>

        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    name: '',
    password: ''
})

let props = defineProps({
    users: Array,
    title: String,
})

const submit = () => {
    form.post('/login')
}
</script>