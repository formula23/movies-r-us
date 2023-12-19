<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    classes: {
        type: String,
        default: '',
    }
});
</script>

<template>
    <button :type="type" :class="classes" >
        <slot />
    </button>
</template>
