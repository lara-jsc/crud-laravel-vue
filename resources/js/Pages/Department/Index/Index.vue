<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link , useForm, router } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Pagination from '@/Components/Pagination.vue';

const form = useForm({});

const props = defineProps ({
    all_departments: {
        type: Object,
        default: () => ({
            data: [],
            links: {},
        })
    }
});

const paginationData = ref(props.all_departments);
// console.log(props.all_departments);

const deletePost = (id) => {
    if (confirm('Are you sure you want to delete this department?')) {
        form.delete(route('department.delete', id), {
            preserveScroll: true,
            onSuccess: () => {
                console.log('Department deleted successfully');
            },
            onError: () => {
                console.error('Failed to delete department');
            }
        });
    }
};


let search =ref(""), pageNumber =ref(1);

let serviceUrl =computed(() => {
    let url = new URL(route("department"));
    url.searchParams.append("page", pageNumber.value);

    if(search.value){
        url.searchParams.append("search", search.value);
    }

    return url;
}) 

watch( () => serviceUrl.value,
    (updatedServiceUrl) => {
        router.visit(updatedServiceUrl, {
            preserveScroll:true ,
            preserveState:true,
            replace:true
        });
    }
)
</script>

<template>
    <AppLayout title="Department">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Department
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="relative mt-1">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input 
                            v-model="search"
                            type="text" 
                            autocomplete="off"
                            id="search" 
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Search employees data"    
                        />
                     </div>
                    <div class="px-0 py-4">
                        <Link :href="route('department.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Create
                        </Link>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                 <!-- loop here -->
                                <tr v-for="department in all_departments.data" :key="department.id" class="bg-white border-b dark:bg-white-800 dark:border-white-700">
                                    <td class="px-6 py-4">
                                        {{ department.id }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ department.name }}
                                    </td> 
                  

                                    <td class="px-6 py-4">
                                        <Link :href="route('department.edit', {department: department.id})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">
                                            Edit
                                        </Link>
                                    </td>
                            
                                    <td class="px-6 py-4">
                                        <button @click="deletePost(department.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline mr-2">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <Pagination :pagination="paginationData"/>
            </div>
        </div>
    </AppLayout>
</template>
