<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    service:Object
})

const submitForm =()=>{
    console.log('form submit')
    
    form.put(route('services.update', {service: props.service.id}), {
        preserveScroll: true,
    });
}

const form = useForm({
    service_type: props.service.service_type,
    service_date: props.service.service_date,
    duration: props.service.duration,
    result: props.service.result,
    description: props.service.description,
    notes: props.service.notes,
    employee_id: props.service.employee_id,
})

</script>

<template>
    <FormSection @submitted="submitForm()">
        <template #title>
                <div class="text-center pt-5 px-3">
                    Edit Service Record 
                </div>            
        </template>

        <template #description>
            <div class="text-center py-0 px-3">
                This is where you can edit Service Record
            </div>
        </template>
      
        <template #form class="">
            
            <div class="col-span-3">
                <InputLabel value="Service Type" class="block mb-2 text-sm font-medium text-gray-900" />
                <select v-model="form.service_type" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select service type</option>
                    <option value="Type 1">Type 1</option>
                    <option value="Type 2">Type 2</option>
                    <option value="Type 3">Type 3</option>
                </select>
                <InputError :message="form.errors.service_type" />
            </div>

            <div class="col-span-4">
                <InputLabel value="Service Date" class="block mb-2 text-sm font-medium text-gray-900" />
                <input type="date" v-model="form.service_date" class="w-full border-gray-300 rounded-md shadow-sm" />
                <InputError :message="form.errors.service_date" />
            </div>

            <div class="col-span-5">
                <InputLabel value="Duration" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.duration" class="w-full" />
                <InputError :message="form.errors.duration" />
            </div>

            <div class="col-span-12">
                <InputLabel value="Description" class="block mb-2 text-sm font-medium text-gray-900" />
                <textarea v-model="form.description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <InputError :message="form.errors.description" />
            </div>


            <div class="col-span-6">
                <InputLabel value="Notes" class="block mb-2 text-sm font-medium text-gray-900" />
                <textarea v-model="form.notes" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <InputError :message="form.errors.notes" />
            </div>

            <div class="col-span-6">
                <InputLabel value="Result" class="block mb-2 text-sm font-medium text-gray-900" />
                <select v-model="form.result" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select a result</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="In Progress">In Progress</option>
                </select>
                <InputError :message="form.errors.result" />
            </div> 
            
        </template> 

        <template #actions>
            <ActionMessage class="mr-2" :on="form.recentlySuccessful">Service Record was updated successfully</ActionMessage>
            <PrimaryButton>Edit Service</PrimaryButton>
        </template>
    </FormSection>
</template>