<template>
    <Layout>
        <div class="space-y-20">
            <Hero/>

            <ZeurMeister
                v-if="props.zeurMeister"
                :zeur-meister="props.zeurMeister"
            />
        </div>
    </Layout>
</template>

<script lang="ts" setup>
import Layout from "~/js/components/layout/Layout.vue";
import Hero from "~/js/components/home/Hero.vue";
import ZeurMeister from "~/js/components/home/ZeurMeister.vue";

const props = defineProps<{
    zeurMeister?: ZeurMeisterResource;
}>();
</script>
