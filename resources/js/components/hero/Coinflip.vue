<template>
    <button @click="flip" class="animate-hover">
        <img
            :src="current === 'heads' ? headsUrl : tailsUrl"
            :alt="current === 'heads' ? 'Heads' : 'Tails'"
        />
    </button>
</template>

<script lang="ts" setup>
import { ref } from "vue";
import headsUrl from "../../../images/heads.png";
import tailsUrl from "../../../images/tails.png";

type CoinSide = 'heads' | 'tails';

const FLIP_TIME = 4000;
const FLIPS = 8;

const isFlipping = ref(false);
const result = ref<CoinSide | null>(null);
const current = ref<CoinSide>('heads');

const flip = () => {
    if (isFlipping.value) return;

    isFlipping.value = true;
    result.value = Math.random() < 0.5 ? 'heads' : 'tails';

    const interval = setInterval(() => {
        current.value = current.value === 'heads' ? 'tails' : 'heads';
    }, FLIP_TIME / FLIPS);

    setTimeout(() => {
        isFlipping.value = false;
        current.value = result.value!;

        clearInterval(interval);
    }, FLIP_TIME);
};
</script>
