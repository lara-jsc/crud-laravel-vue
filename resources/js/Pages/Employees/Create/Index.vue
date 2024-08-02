<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import CreateEmployeeForm from './CreateEmployeeForm.vue';

</script>

<template>
    <AppLayout title="Create Employees">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Employees
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-3">
                        <CreateEmployeeForm></CreateEmployeeForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
