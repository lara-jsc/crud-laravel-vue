<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import EditEmployeeForm from './EditEmployeeForm.vue';
const props =defineProps({
    employee:Object
})
</script>

<template>
    <AppLayout title="Edit Employees">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Employees
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4">
                        <EditEmployeeForm :employee="employee"/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
