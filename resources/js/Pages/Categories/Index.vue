<script>
export default {
    name: 'CategoriesIndex',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'

defineProps({
    categories: {
        type: Object,
        required: true,
    }
})
const deleteCategory = id => {
    if (confirm('Are you sure want to delete this category?')) {
        Inertia.delete(route('categories.destroy', id))
    }
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Categories</h1>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create categories')">
                       <Link :href="route('categories.create')"
                       class="inline-block px-4 py-2 font-bold text-white transition-transform transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">
                        CREATE CATEGORY
                        </Link>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
                            <tbody>
                              <tr v-for="(category, index) in categories.data" :key="index" class="transition hover:bg-gray-50">
                                <td class="px-3 py-3 border-b">{{ category.name }}</td>
                                <td class="px-3 py-3 text-right border-b">
                                  <Link :href="route('categories.edit', category.id)"  v-if="$page.props.user.permissions.includes('update categories')" class="py-2 px-4 text-blue-500 hover:text-blue-700">Edit</Link>
                                  <Link @click="deleteCategory(category.id)" v-if="$page.props.user.permissions.includes('delete categories')" class="py-2 px-4 text-red-500 hover:text-red-700">Delete</Link>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between mt-2">
                    <Link v-if="categories.current_page > 1" :href="categories.prev_page_url"
                      class="inline-block px-4 py-2 font-bold transition-transform transform hover:scale-105">
                      PREV
                    </Link>
                    <div v-else></div>
                    <Link v-if="categories.current_page < categories.last_page" :href="categories.next_page_url"
                      class="inline-block px-4 py-2 font-bold transition-transform transform hover:scale-105">
                      NEXT
                    </Link>
                    <div v-else></div>
                  </div>
            </div>
        </div>
    </AppLayout>
</template>
