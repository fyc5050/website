<template>
    <div class="text-center uppercase">
        <h1 class="text-primary-500 text-lg font-semibold uppercase">
            Zeurmeister Of The Week
        </h1>
        <p class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-100 sm:text-4xl">
            {{ props.zeurMeister.name }}
        </p>
    </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
    zeurMeister: ZeurMeisterResource;
}>();
</script>
