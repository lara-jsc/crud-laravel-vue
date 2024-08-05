<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Dropdown from '@/Components/Dropdown.vue';

const submitForm =()=>{
    console.log('form submit')
    
    form.post(route('employees.store'), {
        preserveScroll: true,
    });
}

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone_number: '',
    hire_date: '',
    department:'',
    position: '',
    status: ''
})



</script>

<template> 
    <FormSection @submitted="submitForm()">
    
        <template #title>
            <div class="text-center pt-5 px-3">
                Create New Employee
            </div>            
        </template>

        <template #description>
            <div class="text-center py-0 px-3">
                This is where you can create Employee
            </div>
        </template> 
        <template #form class="">
           
            <div class="col-span-4">
                <InputLabel value="First Name" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.first_name" class="w-full" />
                <InputError :message="form.errors.first_name" />
            </div>
        
            <div class="col-span-8">
                <InputLabel value="Last Name" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.last_name" class="w-full" />
                <InputError :message="form.errors.last_name" />
            </div>
                 
            <!-- Phone Number field -->
            <div class="col-span-4">
                <InputLabel value="Phone Number" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.phone_number" class="w-full" />
                <InputError :message="form.errors.phone_number" />
            </div>

            <div class="col-span-4">
                <InputLabel value="Status" class="block mb-2 text-sm font-medium text-gray-900" />

                <select v-model="form.status" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Terminated">Terminated</option>
                </select>
                <InputError :message="form.errors.status" />
            </div>

            <!-- Hire Date -->  
            <div class="col-span-4">
                <InputLabel value="Hire Date" class="block mb-2 text-sm font-medium text-gray-900" />
                <input type="date" v-model="form.hire_date" class="w-full border-gray-300 rounded-md shadow-sm" />
                <InputError :message="form.errors.hire_date" />
            </div>
        
            <!-- Email field -->
            <div class="col-span-12">
                <InputLabel value="Email" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.email" class="w-full" />
                <InputError :message="form.errors.email" />
            </div>
        
            <!-- Position dropdown -->
            <div class="col-span-4">
                <InputLabel value="Position" class="block mb-2 text-sm font-medium text-gray-900" />
                <select v-model="form.position" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select a position</option>
                    <option value="Manager">Manager</option>
                    <option value="Developer">Developer</option>
                    <option value="Designer">Designer</option>
                    <!-- Add more options as needed -->
                </select>
                <InputError :message="form.errors.position" />
            </div>
        
            <!-- Department dropdown -->
            <div class="col-span-8">
                <InputLabel value="Department" class="block mb-2 text-sm font-medium text-gray-900" />
                <select v-model="form.department" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select a department</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Marketing">Marketing</option>
                    <!-- Add more options as needed -->
                </select>
                <InputError :message="form.errors.department" />
            </div>

        </template> 

        <template #actions>
            <ActionMessage class="mr-2" :on="form.recentlySuccessful">Employee was updated successfully</ActionMessage>
            <PrimaryButton>Create Employee</PrimaryButton>
        </template>
    </FormSection>

</template>