<template layout="default">
    <div class="w-[600px] shadow p-4 mx-auto mt-5 bg-blue-400">
        <form @submit.prevent="submit">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Task</h5>
            <hr>
            <div class="w-full  px-3 mb-3 mt-3">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="title">
                    Title
                </label>
                <input v-model="form.title"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="name" type="text">
                <div class="text-sm text-red-500 italic" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>

            <div class="w-full  px-3 mb-3">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="description">
                    Description
                </label>
                <input v-model="form.description"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="description" type="text">
                <div class="text-sm text-red-500 italic" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>

            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="due_date">
                    Due_date
                </label>
                <input v-model="form.due_date"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="due_date" type="date">
                <div class="text-sm text-red-500 italic" v-if="form.errors.due_date">{{ form.errors.due_date }}</div>
            </div>

            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="status">
                    Status
                </label>
                <select id="status" name="status" v-model="form.status"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    <option value="" selected disabled>Select a status</option>
                    <option value="Pending">
                        Pending
                    </option>
                    <option value="InProgress">
                        In Progress
                    </option>

                    <option value="Completed">
                        Completed
                    </option>
                </select>
                <div class="text-sm text-red-500 italic" v-if="form.errors.status">{{ form.errors.status }}</div>
            </div>
            <div class="w-full px-3">
                <button class="btn-primary " type="submit">
                    Edit Task
                </button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let props = defineProps({
    task: Object
})

let form = useForm({
    title: props.task.title,
    description: props.task.description,
    due_date: props.task.due_date,
    status: props.task.status,

})

const submit = () => {
    form.put('/tasks/'+props.task.id)
}
</script>