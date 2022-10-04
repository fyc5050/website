<template>
    <div class="relative inline-block text-left">
        <div>
            <slot name="toggle" :toggle="toggle"/>
        </div>

        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-if="open"
                class="absolute z-10 mt-2 w-56 rounded-md bg-gray-800 focus:outline-none"
                :class="alignClass"
                role="menu"
                tabindex="-1"
            >
                <slot/>
            </div>
        </transition>
    </div>
</template>

<script lang="ts" setup>
import { computed, defineProps, ref } from "vue";

export type DropdownMenuAlign = 'left' | 'right';

const props = defineProps<{
    startOpen?: boolean;
    menuAlign?: DropdownMenuAlign;
}>();

const alignClass = computed(() => {
    const align = props.menuAlign ?? 'left';

    return align === 'left' ? 'left-0 origin-top-left' : 'right-0 origin-top-right';
});

const open = ref(props.startOpen ?? false);
const toggle = () => open.value = !open.value;
</script>
