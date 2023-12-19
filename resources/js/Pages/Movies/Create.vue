<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import FormSection from "@/Components/FormSection.vue";
import FormContainer from "@/Components/FormContainer.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Form from "@/Pages/Movies/Form.vue";


</script>

<template>

    <AppLayout title="Movies">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movies
            </h2>
        </template>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <Form />

            </div>

    </AppLayout>

</template>

<style scoped>

</style>
