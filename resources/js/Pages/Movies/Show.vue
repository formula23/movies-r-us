<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";

import {onMounted} from "vue";

const props = defineProps({
    movie: Object,
})

onMounted(() => {
    console.log(props.movie)
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



            </div>
        </div>
    </AppLayout>

</template>

<style scoped>

</style>
