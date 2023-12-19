<script setup>

defineEmits(['submitted']);

</script>

<template>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="mt-5 md:mt-0 md:col-span-2">

            <form @submit.prevent="$emit('submitted')">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form" />
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <slot name="actions" />
                </div>
            </form>
        </div>

    </div>

</template>

<style scoped>

</style>
