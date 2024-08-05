<template>
    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-black">1</span> of <span class="font-semibold text-gray-900 dark:text-black">{{pagination.total}}</span></span>
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
 
            <template v-for="link in pagination.links" :key="link.label">
   
                <Link 
                  preserve-scroll
                  :href="link.url ?? ''" 
                  v-html="link.label" 
                  class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                />
              </template>
        </ul>
    </nav>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps ({
    pagination:Object

})

</script>