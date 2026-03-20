<template>
    <div id="ckfinder-widget"></div>
</template>

<script setup>
import { onMounted } from 'vue';

onMounted(() => {
    CKFinder.widget('ckfinder-widget', {
        width: '100%',
        height: 700
    });
});
</script>

<style scoped>

</style>
