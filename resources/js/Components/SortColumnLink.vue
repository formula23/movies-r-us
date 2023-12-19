<script setup>

import {Link} from "@inertiajs/vue3";
import {computed, ref} from "vue";

const props = defineProps({
  route_name: String,
  sort: String,
});

const queryParams = ref(new URLSearchParams(new URL(window.location).search));

const direction = computed(() => {
  return (queryParams.value.get('sort') == props.sort && queryParams.value.get('direction') == 'desc') ? 'asc' : 'desc';
});

</script>

<template>

  <Link
      :href="route(props.route_name, {
        sort: sort,
        direction: direction,
    })"><slot /></Link>

</template>

<style scoped>

</style>
