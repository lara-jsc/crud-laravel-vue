<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps ({
    all_employees:Array,
    all_departments:Object 
});

// console.log(props.all_employees);
// console.log(props.all_departments);

const submitForm =()=>{
    console.log('form submit')
    
    form.post(route('services.store'), {
        preserveScroll: true,
    });
}

const form = useForm({
    date_from: '',
    date_to: '',
    description: '',
    notes: '',
    employee_id: '',
    position: '',
    department_id:'',

})



</script>

<template> 
    <FormSection @submitted="submitForm()">
        <template #title>
                <div class="text-center pt-5 px-3">
                    Create Service Record 
                </div>            
        </template>

        <template #description>
            <div class="text-center py-0 px-3">
                This is where you can create Service Record
            </div>
        </template>
      
        <template #form class="">
            <div class="col-span-4">
                <InputLabel for="employee" value="Employee" class="block mb-2 text-sm font-medium text-gray-900" />
                <select id="employee" v-model="form.employee_id" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select employee</option>
                    <option v-for="employee in all_employees" :key="employee.id" :value="employee.id">
                        {{ employee.first_name + ' ' + employee.last_name }}
                    </option>
                </select>
                <InputError :message="form.errors.employee_id" />
            </div>
              <div class="col-span-4">
                <InputLabel value="Position" class="block mb-2 text-sm font-medium text-gray-900" />
                <select v-model="form.position" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select a position</option>
                    <option value="Manager">Manager</option>
                    <option value="Developer">Developer</option>
                    <option value="Designer">Designer</option>
                </select>
                <InputError :message="form.errors.position" />
            </div>
        
            <div class="col-span-4">
                <InputLabel for="department" value="Department" class="block mb-2 text-sm font-medium text-gray-900" />
                <select id="department" v-model="form.department_id" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="" disabled>Select employee</option>
                    <option v-for="department in all_departments" :key="department.id" :value="department.id">
                        {{ department.name }}
                    </option>
                </select>
                <InputError :message="form.errors.department_id" />
            </div>
           
            <div class="col-span-5">
                <InputLabel value="Service Date" class="block mb-2 text-sm font-medium text-gray-900" />
                <input type="date" v-model="form.date_from" class="w-full border-gray-300 rounded-md shadow-sm" />
                <InputError :message="form.errors.date_from" />
            </div>

            <div class="col-span-7">
                <InputLabel value="Service Date" class="block mb-2 text-sm font-medium text-gray-900" />
                <input type="date" v-model="form.date_to" class="w-full border-gray-300 rounded-md shadow-sm" />
                <InputError :message="form.errors.date_to" />
            </div>

            <div class="col-span-12">
                <InputLabel value="Description" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></TextInput>
                <InputError :message="form.errors.description" />
            </div>

            <div class="col-span-12">
                <InputLabel value="Notes" class="block mb-2 text-sm font-medium text-gray-900" />
                <textarea v-model="form.notes" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
                <InputError :message="form.errors.notes" />
            </div>
        </template> 

        <template #actions>
            <ActionMessage class="mr-2" :on="form.recentlySuccessful">Service Record was created successfully</ActionMessage>
            <PrimaryButton>Create Service</PrimaryButton>
        </template>
    </FormSection>

</template>