<script setup>

import { Link, router, useForm } from '@inertiajs/vue3';

import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextArea from "@/Components/TextArea.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps({
    movie: Object,
});

const form = useForm({
    rating: 1,
    comment: '',
});

const submitReview = (review) => {

  form.post(route('movies.reviews.store', props.movie), {
    errorBag: 'createReview',
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
    },
  });
}

</script>

<template>

  <h2 class="text-2xl mb-2">Submit Review</h2>

  <div class="relative max-w-full bg-white rounded overflow-hidden shadow-lg mb-12">

  <div class="p-4">

      <form
          v-if="$page.props.auth.user"
          @submit.prevent="submitReview"
          class=" space-y-2">

        <div class="col-span-6 sm:col-span-4">
          <InputLabel for="rating" value="Rating" />
          <select
              v-model="form.rating"
              class="w-1/8 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            <option v-for="rating in 10" :key="rating" :value="rating">{{ rating }}</option>
          </select>
          <InputError :message="form.errors.rating" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
          <InputLabel for="comment" value="Review" />
          <TextArea
              id="comment"
              v-model="form.comment"
              v-on:focus="form.clearErrors('comment')"
              type="text"
              class="mt-1 block w-full h-32"
              required
          />
          <InputError :message="form.errors.comment" class="mt-2" />
        </div>

        <PrimaryButton
            :disabled="form.processing"
            class="justify-center mt-2"
        >
            Submit Review
        </PrimaryButton>

      </form>

      <Link v-else
          class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
          :href="route('login')">Login to Submit Review</Link>

    </div>

  </div>

</template>

<style scoped>

</style>
