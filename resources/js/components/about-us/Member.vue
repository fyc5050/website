<template>
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 md:gap-8">
        <img class="md:col-span-3 bg-white rounded-md w-full h-auto" :src="props.image"/>

        <div class="md:col-span-3" :class="props.reverseLayout && 'md:-order-1'">
            <div class="flex justify-between flex-col md:flex-row">
                <h4 class="text-white font-bold text-2xl">
                    {{ props.name }}
                </h4>

                <div class="space-x-4 mt-2 mb-1 md:mb-0 md:mt-0">
                    <span class="bg-primary-500 bg-opacity-30 text-xs text-primary-500 py-2 px-3 rounded-full">
                        {{ props.function }}
                    </span>

                    <span class="bg-yellow-500 bg-opacity-30 text-xs text-yellow-500 py-2 px-3 rounded-full">
                        <font-awesome-icon icon="fas fa-beer-mug" class="w-4 h-4 text-yellow-500 mr-2"/>
                        {{ props.desCount }}
                    </span>
                </div>
            </div>

            <p class="text-gray-300 mt-4">
                <slot name="text"/>
            </p>
        </div>
    </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
    name: string;
    desCount: number;
    function: string;
    reverseLayout: boolean;
    image: string;
}>();
</script>
