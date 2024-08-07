<script setup>
import FormSection from '@/Components/FormSection.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';


const props = defineProps({
    department:Object
})

const form = useForm({
    name: props.department.name,
})

const submitForm =()=>{
    console.log('form submit')
    
    form.put(route('department.update', {department: props.department.id}), {
        preserveScroll: true,
    });
}
</script>


<template>
    <FormSection @submitted="submitForm()">
        <template #title>
            <div class="text-center pt-5 px-3">
                Update department
            </div>           
        </template>

        <template #description>
            <div class="text-center py-0 px-3">
                This is where you can update Department
            </div>
        </template> 
        <template #form class="">
            <div class="col-span-4">
                <InputLabel value="Department Name" class="block mb-2 text-sm font-medium text-gray-900" />
                <TextInput v-model="form.name" class="w-full" />
                <InputError :message="form.errors.name" />
            </div>
        
        </template> 

        <template #actions>
            <ActionMessage class="mr-2" :on="form.recentlySuccessful">Department was updated successfully</ActionMessage>
            <PrimaryButton>Update Department</PrimaryButton>
        </template>
    </FormSection>
</template>