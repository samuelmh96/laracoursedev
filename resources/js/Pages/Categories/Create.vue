<script>
export default {
        name: 'CategoriesCreate',
    }
</script>
<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryFrom from '@/Components/Categories/Form.vue';

const form = useForm({
    name: '',
})

</script>

<template>
    <AppLayout title="Create Category">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Create Categories</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <CategoryFrom :form="form" @submit="form.post(route('categories.store'))"></CategoryFrom>
                        </div>
                    </div>
            </div>
        </div>
    </AppLayout>
</template>
