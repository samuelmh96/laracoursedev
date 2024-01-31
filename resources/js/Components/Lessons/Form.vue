<script>
export default {
        name: 'LessonsForm',
    }
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import CollectionSelector from '../Common/CollectionSelector.vue'

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
    categories: {
        type: Object,
        required: true,
    },
    levels: {
        type: Object,
        required: true,
    }
})

defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Lesson' : 'Create New Lesson' }}
        </template>

        <template #description>
            {{ updating ? 'Update The Selected Lesson' : 'Create a New Lesson From Scratch' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" class="mt-2" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2"/>
                <InputLabel for="description" value="Description" class="mt-2"/>
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.description" class="mt-2"/>
                <InputLabel for="content_uri" value="Content URI" class="mt-2"/>
                <TextInput id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.content_uri" class="mt-2"/>
                <InputLabel for="pdf_uri" value="PDF" class="mt-2"/>
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2"/>
                <InputLabel for="level_id" value="Level" class="mt-2"/>
                <select name="level_id" id="level_id" class="mt-1">
                    <option v-for="level in levels" :value="level.id" :key="level.id">{{ level.name }}</option>
                </select>
                <InputError :message="$page.props.errors.level_id" class="mt-2"/>
                <CollectionSelector :collection="categories"></CollectionSelector>
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create'}}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
