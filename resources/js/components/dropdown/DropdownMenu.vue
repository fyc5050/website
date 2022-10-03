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
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu"
                tabindex="-1"
            >
                <slot/>
            </div>
        </transition>
    </div>
</template>

<script lang="ts" setup>
import { defineProps, ref } from "vue";

const props = defineProps<{
    startOpen?: boolean;
}>();

const open = ref(props.startOpen ?? false);
const toggle = () => open.value = !open.value;
</script>
