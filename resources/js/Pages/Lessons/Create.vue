<script>
export default {
        name: 'LessonsCreate',
    }
</script>
<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import LessonFrom from '@/Components/Lessons/Form.vue';

defineProps({
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    }
})

const form = useForm({
    name: '',
})

</script>

<template>
    <AppLayout title="Create Lesson">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Create Lessons</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <LessonFrom :form="form" :categories="categories" :levels="levels" @submit="form.post(route('lessons.store'))"></LessonFrom>
                        </div>
                    </div>
            </div>
        </div>
    </AppLayout>
</template>
