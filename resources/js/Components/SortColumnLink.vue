<script setup>

import {Link} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import {mdiSort} from "@mdi/js";

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
      class="flex justify-start space-x-2"
      :href="route(props.route_name, {
        sort: sort,
        direction: direction,
    })">
    <div class=""><slot /></div>
    <svg-icon
        class=""
        type="mdi"
        :path="mdiSort"
        :size="14"></svg-icon>
  </Link>

</template>

<style scoped>

</style>
