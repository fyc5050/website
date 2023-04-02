<template>
    <button @click="flip" class="coinflip" ref="container">
        <img class="coinflip-face coinflip-face-tails" :src="tails"/>
        <img class="coinflip-face coinflip-face-heads" :src="heads"/>
    </button>
</template>

<script lang="ts" setup>
import { ref } from "vue";
import tails from '~/images/tails.png';
import heads from '~/images/heads.png';

const container = ref<HTMLButtonElement>();
const result = ref(false);

const flip = () => {
    result.value = Math.random() <= 0.5;

    container.value.classList.remove('coinflip-result-heads', 'coinflip-result-tails');

    setTimeout(() => {
        container.value.classList.add(result.value ? 'coinflip-result-heads' : 'coinflip-result-tails');
    }, 100);
};
</script>
