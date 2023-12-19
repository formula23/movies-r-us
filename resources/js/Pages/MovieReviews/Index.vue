<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import {onMounted} from "vue";
import moment from "moment/moment.js";
import GenericButton from "@/Components/GenericButton.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    movie: Object,
    reviews: Object
});

onMounted(() => {
    // console.log(props.movie)
    // console.log(props.reviews)
})

</script>

<template>

  <Head title="Movie Reviews" />

  <AppLayout title="Movie Reviews">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Movie Reviews
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-end">

          <Link
              :href="route('movies.index')"
              class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
          >
            Back
          </Link>
        </div>

        <div class="relative max-w-full rounded bg-white overflow-hidden shadow-lg p-4 mb-4">
          <h2 class="font-bold text-xl mb-2">{{ movie.title }}</h2>

          <p class="text-gray-700 text-base mb-4">
            {{ movie.description }}
          </p>

          <div class="absolute top-0 right-0 p-4">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Avg. Rating: {{ movie.avg_rating }} / 10</span>
          </div>

        </div>

        <h2 class="text-2xl mb-2">Reviews ({{ reviews.meta.total }})</h2>

        <div class="">

          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="relative overflow-x-auto rounded-lg">
              <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700/50">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Comment
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Rating
                  </th>
                  <th scope="col" class="px-6 py-3">
                    By
                  </th>
                </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="review in reviews.data"
                        :key="review.id"
                        class="bg-white border-b border-gray-100  hover:bg-gray-50/50 dark:bg-zinc-700 dark:hover:bg-zinc-700/50 dark:border-zinc-600">

                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 break-words overflow-hidden max-w-xs dark:text-white">
                        {{ review.comment }}
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ review.rating }} / 10
                      </th>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ review.user.name }}
                      </th>
                    </tr>
                </tbody>
              </table>
            </div>

          </div>

          <Pagination
              :dataset="reviews"
              class="mt-4 rounded-lg shadow-xl bg-white px-4 "
          />

        </div>

      </div>
    </div>


  </AppLayout>


</template>

<style scoped>

</style>
