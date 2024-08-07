<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditDepartmentForm from './EditDepartmentForm.vue';

const props = defineProps({
    department:Object
})
console.log(props.department);
</script>

<template>
    <AppLayout title="Edit Departments">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Departments
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-3">
                        <EditDepartmentForm :department="department"/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
