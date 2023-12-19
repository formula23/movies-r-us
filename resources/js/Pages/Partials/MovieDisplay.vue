<script setup>

defineProps({
  movie: Object,
  displayDescription: {
    type:Boolean,
    default: false
  },
});

</script>

<template>
    <div class="relative max-w-full bg-white rounded overflow-hidden shadow-lg mb-12">
      <div class="p-4">
        <h2 class="font-bold text-xl mb-4">{{ movie.title }}</h2>

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="text-gray-700 font-medium">Studio: <span class="text-gray-600">{{ movie.studio }}</span></div>
          <div class="text-gray-700 font-medium">Genre: <span class="text-gray-600">{{ movie.genre }}</span></div>
          <div class="text-gray-700 font-medium">Runtime: <span class="text-gray-600">{{ movie.runtime }}</span></div>
        </div>

        <p v-if="displayDescription" class="text-gray-700 text-base">
          {{ movie.description }}
        </p>
      </div>

      <div class="absolute top-0 right-0 p-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Avg. Rating: {{ movie.avg_rating }} / 10</span>
      </div>
    </div>

</template>

<style scoped>

</style>
