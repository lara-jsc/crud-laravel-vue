<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateDepartmentForm from './CreateDepartmentForm.vue';

</script>

<template>
    <AppLayout title="Create Departments">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Department
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-3">
                        <CreateDepartmentForm/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
