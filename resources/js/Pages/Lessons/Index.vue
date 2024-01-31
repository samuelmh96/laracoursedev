<script>
export default {
    name: 'LessonsIndex',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

defineProps({
    lessons: {
        type: Object,
        required: true,
    }
})
const deleteLesson = id => {
    if (confirm('Are you sure want to delete this lesson?')) {
        Inertia.delete(route('lessons.destroy', id))
    }
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Lessons</h1>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create lessons')">
                       <Link :href="route('lessons.create')"
                       class="inline-block px-4 py-2 font-bold text-white transition-transform transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">
                        CREATE LESSON
                        </Link>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
                            <tbody>
                              <tr v-for="(lesson, index) in lessons.data" :key="index" class="transition hover:bg-gray-50">
                                <td class="px-3 py-3 border-b">{{ lesson.name }}</td>
                                <td class="px-3 py-3 text-right border-b">
                                  <Link :href="route('lessons.edit', lesson.id)"  v-if="$page.props.user.permissions.includes('update lessons')" class="px-4 py-2 text-blue-500 hover:text-blue-700">Edit</Link>
                                  <Link @click="deleteLesson(lesson.id)" v-if="$page.props.user.permissions.includes('delete lessons')" class="px-4 py-2 text-red-500 hover:text-red-700">Delete</Link>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between mt-2">
                    <Link v-if="lessons.current_page > 1" :href="lessons.prev_page_url"
                      class="inline-block px-4 py-2 font-bold transition-transform transform hover:scale-105">
                      PREV
                    </Link>
                    <div v-else></div>
                    <Link v-if="lessons.current_page < lessons.last_page" :href="lessons.next_page_url"
                      class="inline-block px-4 py-2 font-bold transition-transform transform hover:scale-105">
                      NEXT
                    </Link>
                    <div v-else></div>
                  </div>
            </div>
        </div>
    </AppLayout>
</template>
