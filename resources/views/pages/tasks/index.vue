<template layout="default">
    <div class="container mx-auto">

        <div class="flex justify-between ">
                    <h1 class="text-3xl font-medium text-gray-700 mb-3 ml-6">List of Task</h1>
                    <Link href="/tasks/create" class="mr-6 px-5 py-3 transition-all ease-in duration-75 text-white bg-white dark:bg-blue-700 rounded-md group-hover:bg-opacity-0" >Add Task</Link>
        </div>
        <hr class=" mt-5 mb-4">
        

        <div class="grid gap-7 md:grid-cols-1 lg:grid-cols-3">
      <div class="md:col-span-3 lg:col-span-1" v-for="task of tasks" :key="task.id">
        <div  class="overflow-hidden rounded-lg shadow-md duration-300 hover:scale-105 hover:shadow-xl" :class="{'bg-green-800' : task.status === 'Completed', 'bg-blue-700': task.status === 'Pending', 'bg-orange-600': task.status === 'InProgress'}">
          <h1 class="mt-2 text-center text-2xl font-bold text-black">Title: {{ task.title }}</h1>
          <p class="my-4 text-center text-sm text-white">{{ task.description }}</p>
          <p class="my-4 text-center text-sm text-white">{{ task.due_date }}</p>
          <p class="my-4 text-center text-sm text-white">{{ task.status }}</p>
        </div>
        <div class="space-x-4 bg-blue-100 py-4 text-center">
          <Link :href="'/tasks/edit/' + task.id" as="button" class="inline-block rounded-md bg-green-600 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Edit</Link>
          <button @click="remove(task)" class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Delete</button>
        </div>
      </div>
    </div>


        <!-- <div class="grid gap-7 md:grid-cols-1 lg:grid-cols-3" >
                <div class="md:col-span-3 lg:col-span-1" v-for="task of tasks" :key="task.id">
                    <div class="bg-blue-600 overflow-hidden rounded-lg  shadow-md duration-300 hover:scale-105 hover:shadow-xl"  >
                                 <h1 class="mt-2 text-center text-2xl font-bold text-black">Title:  {{ task.title }}</h1>
                                <p class="my-4 text-center text-sm text-white"> {{ task.description }}</p>
                                <p class="my-4 text-center text-sm text-white"> {{ task.due_date }}</p>
                                <p class="my-4 text-center text-sm text-white"> {{ task.status }}</p>
                            </div>
                             <div class="space-x-4 bg-blue-100 py-4 text-center ">
                                 <Link :href="'/tasks/edit/' + task.id"  as="button" class="inline-block rounded-md bg-green-600 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Edit</Link>
                                <button @click="remove(task)" class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Delete</button>    
                      </div>
                 </div>
                    
                
        </div> -->

            <!-- <div class="mt-5 px-4 items-center justify-center space-y-6 sm:flex-row sm:space-x-6 sm:space-y-0">
                <div class="flex -mx-2 " >
                     <div class="w-1/2 px-4 py-9" v-for="task of  tasks " :key="task.id" >
                        <div class="bg-blue-600 overflow-hidden rounded-lg  shadow-md duration-300 hover:scale-105 hover:shadow-xl"  >
                             <h1 class="mt-2 text-center text-2xl font-bold text-black">Title:  {{ task.title }}</h1>
                            <p class="my-4 text-center text-sm text-white"> {{ task.description }}</p>
                            <p class="my-4 text-center text-sm text-white"> {{ task.due_date }}</p>
                            <p class="my-4 text-center text-sm text-white"> {{ task.status }}</p>
                        </div>
                         <div class="space-x-4 bg-gray-100 py-4 text-center">
                             <Link :href="'/tasks/edit/' + task.id"  as="button" class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Edit</Link>
                            <button @click="remove(task)" class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Delete</button>    
                  </div>
                    </div>
                </div>
             </div> -->

            <!-- <div class="flex h-screen flex-col items-center justify-center space-y-6 px-4 sm:flex-row sm:space-x-6 sm:space-y-0">
            <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl" v-for="task of  tasks " :key="task.id" >
              <h1 class="mt-2 text-center text-2xl font-bold text-gray-500"> {{ task.title }}</h1>
              <p class="my-4 text-center text-sm text-gray-500"> {{ task.description }}</p>
               <p class="my-4 text-center text-sm text-gray-500"> {{ task.due_date}}</p>
               <p class="my-4 text-center text-sm text-gray-500"> {{ task.status }}</p>
              
              <div class="space-x-4 bg-gray-100 py-4 text-center">
                <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
                <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
              </div>
            </div>
        </div> -->
    </div>
</template>
<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'

defineProps({
    tasks: Object,
    errors: null,
})

let form = useForm({
    title: '',
    description: '',
    due_date: '',
    status: '',
   

})
let selectedId = null;
function remove(task) {
    selectedId=task
    form.delete('/tasks/' + selectedId.id)
}


</script>