<template>
    <Layout>
        <div class="space-y-20">
            <Hero/>

            <DesCounts :counts="props.desCounts" v-if="props.desCounts.length > 0"/>

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
import DesCounts from "~/js/components/home/DesCounts.vue";

const props = defineProps<{
    zeurMeister?: ZeurMeisterResource;
    desCounts: DesCountResource[];
}>();
</script>
