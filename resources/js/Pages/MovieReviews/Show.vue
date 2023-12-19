<script setup>

import MovieDisplay from "@/Pages/Partials/MovieDisplay.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
  movie: Object,
  review: Object
})


</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Movies
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <MovieDisplay
            :movie="movie"
        />

        <div class="max-w-lg mx-auto p-4 bg-white shadow-lg rounded-lg">

          <p class="text-gray-600 text-sm">
            {{ review.comment.length > 200 ? review.comment.substring(0, 200) + '...' : review.comment }}
          </p>
          <p class="text-gray-500 text-xs mt-2 text-right">- {{ review.user.name }}</p>

          <div class="flex justify-between items-center mb-2">
            <h3 class="text-lg font-semibold">{{ review.user.name }}</h3>
            <span class="text-sm text-gray-500">{{ review.created_at }}</span>
          </div>
          <p class="text-gray-700">{{ review.comment }}</p>
          <div class="mt-2">
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 rounded-full">Rating: {{ review.rating }} / 10</span>
          </div>
        </div>


      </div>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>
