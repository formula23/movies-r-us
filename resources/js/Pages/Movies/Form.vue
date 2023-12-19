<script setup>
import {defineProps, ref, watch} from "vue";
import {useForm, Link} from "@inertiajs/vue3";

import FormContainer from "@/Components/FormContainer.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Dropdown from "primevue/dropdown";
import TextArea from "@/Components/TextArea.vue";

const props = defineProps({
    movie: {
        type:Object,
        default: () => {
            return {
                title: '',
                description: '',
                genre: '',
                release_date: '',
            }
        }
    },
});

const form = useForm(props.movie);

const movie_genres = ref([
    { name: 'Action' },
    { name: 'Comedy' },
    { name: 'Drama' },
    { name: 'Horror' },
    { name: 'Romance' },
    { name: 'Thriller' },
]);
const saveMovie = () => {
    if (form.id) {
        form.put(route('movies.update', form.id), {
            errorBag: 'updateMovie',
            preserveScroll: true,
        });
    } else {
        form.post(route('movies.store'), {
            errorBag: 'createMovie',
            preserveScroll: true,
        });
    }
};

</script>

<template>

    <FormContainer @submitted="saveMovie">

        <template #form>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="title" value="Title" />
                    <TextInput
                        id="name"
                        v-model="form.title"
                        v-on:focus="form.clearErrors('title')"
                        type="text"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="form.errors.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="description" value="Description" />
                    <TextArea
                        id="name"
                        v-model="form.description"
                        v-on:focus="form.clearErrors('description')"
                        type="text"
                        class="mt-1 block w-full h-32"

                    />
                    <InputError :message="form.errors.description" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="genre" value="Genre" />
                    <Dropdown
                        v-model="form.genre"
                        :options="movie_genres"
                        v-on:focus="form.clearErrors('genre')"
                        optionLabel="name"
                        optionValue="name"
                        placeholder="Select a Genre"
                        class="w-full md:w-14rem border-2"

                    />
                    <InputError :message="form.errors.genre" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="release_date" value="Release Date" />
                    <TextInput
                        id="name"
                        v-model="form.release_date"
                        v-on:focus="form.clearErrors('release_date')"
                        type="date"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="form.errors.release_date" class="mt-2" />
                </div>

        </template>

        <template #actions>

            <Link
                :href="route('movies.index')"
                class="col-span-6 sm:col-span-4 mr-2">
                Cancel
            </Link>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>

        </template>

    </FormContainer>

</template>

<style scoped>

</style>
