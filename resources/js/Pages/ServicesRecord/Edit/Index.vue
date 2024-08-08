<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditServiceRecordForm from './EditServiceRecordForm.vue';

const props = defineProps({
    service:Object,
    all_employees:Array,
    all_departments:Array
})

// console.log(props.service);
console.log(props.all_employee); 
</script>

<template>
    <AppLayout title="Edit Service Record">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Service Record
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4">
                        <EditServiceRecordForm 
                        :service="service" 
                        :all_employees="all_employees"
                        :all_departments="all_departments"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
