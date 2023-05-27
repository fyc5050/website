<template>
    <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
        <img class="md:col-span-3 bg-white rounded-md w-full h-auto" :src="props.image"/>

        <div class="md:col-span-3" :class="props.reverseLayout && 'md:-order-1'">
            <div>
                <h4 class="text-white font-bold text-2xl flex">
                    {{ props.name }}

                    <span class="ml-4 bg-primary-500 bg-opacity-30 text-xs text-primary-500 py-2 px-3 rounded-full">
                        {{ props.function }}
                    </span>

                    <span class="ml-4 bg-yellow-500 bg-opacity-30 text-xs text-yellow-500 py-2 px-3 rounded-full">
                        <font-awesome-icon icon="fas fa-beer-mug" class="w-4 h-4 text-yellow-500 mr-2"/>
                        {{ props.desCount }}
                    </span>
                </h4>

                <p class="text-gray-300 mt-4">
                    <slot name="text"/>
                </p>
            </div>
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
