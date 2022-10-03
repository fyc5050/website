<template>
    <p v-if="quote" class="text-center text-base text-white">
        <span class="italic">&ldquo;{{ quote.content }}&rdquo;</span> - {{ quote.said_by }}
    </p>
</template>

<script lang="ts" setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, onBeforeUnmount, onMounted, ref } from "vue";

const ROTATE_TIME_MS = 10000;

type Quote = {
    content: string;
    said_by: string;
};

const quotes = computed<Quote[]>(() => {
    return usePage().props.value.quotes as unknown as Quote[];
});

const pickRandomQuote = () => quotes.value[Math.floor(Math.random() * quotes.value.length)];

const quote = ref<Quote>(pickRandomQuote());

let interval;

onMounted(() => {
    interval = setInterval(() => {
        quote.value = pickRandomQuote();
    }, ROTATE_TIME_MS);
});

onBeforeUnmount(() => clearInterval(interval));
</script>
