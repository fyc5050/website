<template>
    <component
        :is="props.as ?? 'inertia-link'"
        role="menuitem"
        tabindex="-1"
        class="text-gray-300 group flex items-center px-4 py-2 text-sm"
    >
        <font-awesome-icon
            v-if="props.icon"
            :icon="props.icon"
            class="mr-3 h-5 w-5 text-gray-300 group-hover:text-gray-500"
        />

        <slot/>
    </component>
</template>

<script lang="ts" setup>
const props = defineProps<{
    icon?: string;
    as?: string;
}>();
</script>
