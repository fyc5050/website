<template>
    <Layout>
        <Container class="my-10">
            <div class="rounded-xl bg-gray-800 p-5" v-if="quote">
                <div class="text-2xl italic text-white text-center py-4">
                    &ldquo;{{ quote.content }}&rdquo;
                </div>

                <div class="space-y-3 space-x-2">
                    <button
                        @click="attempt(name)"
                        v-for="name in names"
                        class="px-3 py-2 rounded-full text-gray-200 transition"
                        :class="{'bg-gray-600 hover:bg-gray-500': selectedAnswer === null || selectedAnswer !== name || wasCorrect === null, 'bg-green-500': (selectedAnswer === name && wasCorrect) || (selectedAnswer !== null && quote.said_by === name), 'bg-red-500': selectedAnswer === name && wasCorrect === false}"
                    >
                        {{ name }}
                    </button>
                </div>
            </div>
        </Container>
    </Layout>
</template>

<script lang="ts" setup>
import Layout from "../components/layout/Layout.vue";
import Container from "../components/Container.vue";
import { computed, onMounted, ref } from "vue";

const props = defineProps<{
    quotes: QuoteResource[],
}>();

const quote = ref<QuoteResource | null>(null);

const randomQuote = () => {
    const quotePool = quote.value === null
        ? props.quotes
        : props.quotes;

    return quotePool[Math.floor(Math.random() * quotePool.length)];
};

onMounted(() => quote.value = randomQuote());

const names = computed(() => {
    const names = [];

    for (const quote of props.quotes) {
        if (names.includes(quote.said_by)) continue;

        names.push(quote.said_by);
    }

    return names.sort((a, b) => a.localeCompare(b));
});

const wasCorrect = ref<boolean | null>(null);
const selectedAnswer = ref<string | null>(null);

const attempt = (name: string) => {
    if (selectedAnswer.value !== null) return;

    wasCorrect.value = quote.value.said_by === name;
    selectedAnswer.value = name;

    setTimeout(() => {
        quote.value = randomQuote();

        wasCorrect.value = null;
        selectedAnswer.value = null;
    }, 2000);
};
</script>
