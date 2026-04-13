
<template>
    <div class="container">
        <div class="notice-line"
                v-for="(not, index) in notice"
                :key="index"
        >
            <b>{{not.text}}</b>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const notice = ref([]);

const loadNotice = async () => {
    try {
        const response = await axios.get('/api/notices');
        notice.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadNotice();
});
</script>

<style scoped>
.notice-line {
    background: #fff;
    border: 1px solid #3e3e3e;
    padding: 7px;
    margin-top: 20px;
    margin-bottom: 20px;
    -webkit-box-shadow: 5px 5px 14px -1px rgba(0,0,0,0.6);
    -moz-box-shadow: 5px 5px 14px -1px rgba(0,0,0,0.6);
    box-shadow: 5px 5px 14px -1px rgba(0,0,0,0.6);
}
</style>
