<template>
    <footer class="bg-primary">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <a
                    v-for="item in navigationItems"
                    :href="item.href"
                    class="text-white hover:text-gray-300 transition"
                >
                    <span class="sr-only">{{ item.name }}</span>
                    <font-awesome-icon :icon="item.icon" class="h-6 w-6"/>
                </a>
            </div>

            <div class="mt-8 md:order-1 md:mt-0">
                <RandomQuote/>
            </div>
        </div>
    </footer>
</template>

<script lang="ts" setup>
import RandomQuote from "~/js/components/layout/RandomQuote.vue";

const navigationItems = [
    {
        name: 'Instagram',
        href: 'https://www.instagram.com/fyc5050/',
        icon: 'fab fa-instagram',
    },
    {
        name: 'Twitter',
        href: 'https://twitter.com',
        icon: 'fab fa-twitter',
    },
];
</script>
