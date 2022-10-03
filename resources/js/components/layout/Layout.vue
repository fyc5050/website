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
import Footer from "./Footer.vue";
import Header from "./Header.vue";
</script>
