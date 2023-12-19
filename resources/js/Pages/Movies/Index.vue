<script setup>

import {onMounted, ref, watch } from "vue";
import {Head, Link, router, usePage} from "@inertiajs/vue3";

import debounce from 'lodash.debounce'

import AppLayout from "@/Layouts/AppLayout.vue";
import GenericButton from "@/Components/GenericButton.vue";
import Pagination from "@/Components/Pagination.vue";
import moment from "moment";
import TextInput from "@/Components/TextInput.vue";
import SortColumnLink from "@/Components/SortColumnLink.vue";

const page = usePage();
const props = defineProps({
    movies: Object,
    perPage: Number,
})

const queryParams = ref(new URLSearchParams(new URL(window.location).search));
const searchTerm = ref(queryParams.value.get('search') ?? '');
let perPage = ref(props.perPage);

const destroyMovie = (movie) => {
    if(confirm('Are you sure you want to delete this movie?')) {
        router.delete(route('movies.destroy', movie), {
            errorBag: 'destroyMovie',
            preserveScroll: true,
            onError: (error) => {
                console.log(error);
            },
        });
    }
}

const handlePerPageUpdate = (value) => {

    perPage = parseInt(value);

    router.get(route('movies.index'), {
        perPage: value,
    }, {
        only: ['movies'],
        preserveState: true,
        replace: false
    });

};

const sendSearch = debounce((value) => {

    router.get(route('movies.index'), {
        search: searchTerm.value ?? null,
    }, {
        only: ['movies'],
        preserveState: true,
        replace: true
    });

}, 300);

watch(searchTerm, () => {
  sendSearch();
});

onMounted(() => {


})

</script>

<template>

    <Head title="Movies" />

    <AppLayout title="Movies">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<!--{{ queryParams.get('sort') }}-->
                <div class="flex justify-between">

                  <div class="flex items-center w-1/2 sm:w-1/4 mb-4 space-x-2">
                    <TextInput
                        v-model="searchTerm"
                        placeholder="Search..."
                        class="w-full"/>

                    <Link
                        v-if="searchTerm"
                        :href="route('movies.index')"
                        class="text-sm">Reset</Link>
                  </div>

                  <Link
                        :href="route('movies.create')"
                        class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >
                        Create Movie
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700/50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="release_year"
                                        route_name="movies.index">Release Year</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="title"
                                        route_name="movies.index">Title</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="genre"
                                        route_name="movies.index">Genre</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="reviews_avg_rating"
                                        route_name="movies.index">Rating</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="reviews_count"
                                        route_name="movies.index">Reviews</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="release_date"
                                        route_name="movies.index">Release Date</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <SortColumnLink
                                        sort="user_name"
                                        route_name="movies.index">Created By</SortColumnLink>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="movie in movies.data"
                                :key="movie.id"
                                class="bg-white border-b border-gray-100  hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ movie.release_year }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <Link
                                        :href="route('movies.show', movie)"
                                        class="hover:underline"
                                    >{{ movie.title }}
                                    </Link>
                                </th>
                                <td class="px-6 py-4">
                                    {{  movie.genre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ movie.avg_rating }}
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                  <Link
                                    :href="route('movies.reviews.index', movie)">
                                    <span class="px-1 bg-indigo-400 text-xs text-white rounded ml-1 px-2 py-1 font-bold">{{ movie.review_count }}</span>
                                  </Link>
                                </td>
                                <td class="px-6 py-4">
                                    {{ moment(movie.release_date,).format("M/D/YYYY") }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ movie.user.name }}
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <template v-if="movie.user.id === $page.props.auth.user.id">

                                        <Link
                                            :href="route('movies.edit', movie)"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit</Link>

                                        <GenericButton
                                            @click="destroyMovie(movie)"
                                            type="button"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                        >
                                            Delete
                                        </GenericButton>


                                    </template>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <Pagination
                    @updatePerPage="handlePerPageUpdate"
                    :showPerPageSelect="true"
                    :perPage="perPage"
                    :dataset="movies"
                    class="mt-4 rounded-lg shadow-xl bg-white px-4 "
                />

            </div>
        </div>
    </AppLayout>

</template>

<style scoped>

</style>
