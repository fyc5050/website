<template>
    <div class="flex flex-col min-h-screen bg-black">
        <main class="flex-1">
            <Header/>

            <slot/>
        </main>

        <Footer/>
    </div>
</template>

<script lang="ts" setup>
import Footer from "~/js/components/layout/Footer.vue";
import Header from "~/js/components/layout/Header.vue";
</script>
