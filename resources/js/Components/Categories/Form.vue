
import { mergeProps } from 'vue';

import FormSectionVue from 'vendor/laravel/jetstream/stubs/inertia/resources/js/Components/FormSection.vue';

import FormSectionVue from '../FormSection.vue';

import FormSectionVue from '../FormSection.vue';
<script>
export default {
        name: 'CategoriesForm',
    }
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    }
})

defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Category' : 'Create New Category' }}
        </template>

        <template #description>
            {{ updating ? 'Update The Selected Category' : 'Create a New Category From Scratch' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2"/>
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create'}}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
