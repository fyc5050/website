<template>
    <Container class="mt-16 px-4 sm:mt-24 sm:px-6 relative">
<!--        <div class="absolute bottom-0 right-0">-->
<!--        </div>-->

        <div class="text-center">
            <h1 class="text-4xl font-display font-bold tracking-tight text-white sm:text-5xl md:text-6xl">
                50/50
            </h1>

            <p class="mx-auto mt-3 font-display max-w-md text-base text-gray-500 sm:text-lg md:mt-5 md:max-w-3xl md:text-xl">
                A first year committee.
            </p>
        </div>

        <div class="flex mt-8">
            <div class="mx-auto">
                <Coinflip/>
            </div>
        </div>
    </Container>
</template>

<script lang="ts" setup>
import Container from "~/js/components/Container.vue";
import Coinflip from "~/js/components/home/Coinflip.vue";
</script>
