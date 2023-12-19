<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";

import Pagination from "@/Components/Pagination.vue";
import moment from "moment";

const props = defineProps({
    movies: Object
});


</script>

<template>
    <Head title="Welcome" />

    <AppLayout>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <div class="container mx-auto px-4 py-8">
              <!-- Loop through each movie -->
              <div v-for="movie in movies.data" :key="movie.id" class="relative max-w-full rounded bg-white overflow-hidden shadow-lg p-4 mb-4">
                  <h2 class="font-bold text-xl mb-2">{{ movie.title }}</h2>

                  <p class="text-gray-700 text-base mb-4">
                    {{ movie.description }}
                  </p>

                  <div class="absolute top-0 right-0 p-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Rating: {{ movie.avg_rating }} / 10</span>
                  </div>

                  <div class="mb-4 border-t pt-3">
                      <h3 class="font-bold text-normal">Reviews <span class="px-1 bg-green-500 text-xs rounded ml-1 text-white">{{ movie.review_count }}</span>
                        <Link
                            class="text-sm ml-2 font-normal text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out"
                            :href="route('movies.reviews.index', [movie])">Read More</Link>
                      </h3>

                      <div class="grid grid-cols-1 gap-4">

                        <ul class="">

                          <li v-for="(review, index) in movie.reviews.slice(0, 3)" :key="index" class="mb-2">
                            <div class="mt-2 mb-2 flex justify-start space-x-4">
                              <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 rounded-full">Rating: {{ review.rating }} / 10</span>
                              <div class="text-gray-500 text-xs text-right">{{ moment(review.created_at).format('MMM Do, YYYY') }}</div>
                            </div>
                            <p class="text-gray-600 text-sm">
                              {{ review.comment.length > 200 ? review.comment.substring(0, 200) + '...' : review.comment }}
                            </p>
                            <p class="text-gray-500 text-xs mt-2 text-right">- {{ review.user.name }}</p>
                          </li>
                        </ul>

                      </div>

                    <Link v-if="$page.props.auth.user"
                        class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                        :href="route('movies.reviews.index', [movie])">Submit Review</Link>

                    <Link v-else
                        class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                        :href="route('login')">Login to Submit Review</Link>

                  </div>

                </div>

              <Pagination
                  :dataset="movies"
                  class="mt-4 rounded-lg shadow-xl bg-white px-4 "
              />

          </div>

        </div>
      </div>

    </AppLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
