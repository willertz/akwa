
<template>
    <div class="container">
        <div class="notice-line"
                v-for="not in notice"
        >
            <b>{{not.text}}</b>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };
    export default {
        name: "Index.vue",
        data: function() {
          return {
              notice: []
          }
        },
        methods: {
            loadNotice: function() {
                var self = this;
                var data = axios.post('/api', {
                        apiMethod: 'loadNotice',
                    },
                ).then(response => self.notice = response.data)
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        },
        mounted: function() {
            this.loadNotice()
        }
    }
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