<script setup>
import { Link } from '@inertiajs/vue3';
import {computed} from "vue";

const emit = defineEmits(['updatePerPage']);

defineProps({
    dataset: {
        type: Object,
        required: true,
    },
    showPerPageSelect: {
      type: Boolean,
      default: false,
    },
    perPage: {
      type: Number,
      default: 10,
    },
    preserveScroll: {
      type: Boolean,
      default: false,
    },
    only: {
      type: Array,
      default: () => [],
    },
});

const getClasses = (link) => {
  return !link.active
    ? 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
    : 'relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600';
};

</script>

<template>

    <div>

        <div v-if="dataset.meta.total > 0" class="flex items-center justify-between py-3">

            <div class=" sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div class="flex justify-start items-center space-x-3 ">
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ dataset.meta.from }}</span>
                        to
                        <span class="font-medium">{{ dataset.meta.to }}</span>
                        of
                        <span class="font-medium">{{ dataset.meta.total }}</span>
                        results
                    </p>

                  <p v-if="showPerPageSelect" class="text-sm flex items-center"> <!-- Added flex and items-center here -->
                    Show per page:
                    <select
                        @change="$emit('updatePerPage', $event.target.value)"
                        :value="perPage"
                        class="rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 ml-1"> <!-- Added ml-1 for a little margin -->
                      <option>5</option>
                      <option>10</option>
                      <option>25</option>
                      <option>50</option>
                    </select>
                  </p>
                </div>
                <div v-if="dataset.meta.links.length > 3">
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                        <Link
                            v-if="dataset.links.prev !== null"
                            :href="dataset.links.prev"
                            :preserve-scroll="preserveScroll"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                        >
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </Link>

                        <template v-for="(link, key) in dataset.meta.links">
                            <div v-if="key !== 0 && key !== dataset.meta.links.length - 1">
                                <div v-if="link.url === null" :key="key" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300" v-html="link.label" />
                                <Link
                                    v-else
                                    :key="`link-${key}`"
                                    :preserve-scroll="preserveScroll"
                                    :only="only"
                                    :class="getClasses(link)"
                                    :href="link.url"
                                    v-html="link.label"
                                />
                            </div>
                        </template>

                        <Link
                            v-if="dataset.links.next !== null"
                            :href="dataset.links.next"
                            :preserve-scroll="preserveScroll"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                        >
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </Link>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</template>
