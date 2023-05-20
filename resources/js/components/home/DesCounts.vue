<template>
    <Container class="flex justify-center space-x-4">
        <div v-for="count in props.counts">
            <p class="text-gray-300 text-center">
                {{ count.name }} &middot; <span class="text-gray-300 font-bold">{{ count.des_count }}</span>
            </p>

            <font-awesome-icon icon="fas fa-beer-mug" class="w-14 h-14 mt-3 text-yellow-500"/>
        </div>
    </Container>
</template>

<script lang="ts" setup>
import Container from "../Container.vue";

const props = defineProps<{
    counts: DesCountResource[];
}>();
</script>
