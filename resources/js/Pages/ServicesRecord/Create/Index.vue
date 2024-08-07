<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateServiceRecordForm from './CreateServiceRecordForm.vue';


const props = defineProps ({
    all_employees:Array,
    all_departments:Object
});

</script>

<template>
    <AppLayout title="Create ServiceRecord">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Service Record
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-3">
                        <CreateServiceRecordForm 
                        :all_employees="all_employees" 
                        :all_departments="all_departments"
                        />                    
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
