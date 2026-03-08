<template>
    <div id="ckfinder-widget"></div>
</template>

<script>
    export default {
        name: "File",
        mounted: function() {
            CKFinder.widget('ckfinder-widget', {
                width: '100%',
                height: 700
            });

        }
    }
</script>

<style scoped>

</style>