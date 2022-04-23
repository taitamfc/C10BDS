<template>
    <router-view></router-view>
</template>
 
<script>
    export default {
        name: 'App',
        methods: {
            get_notifications(){
                axios.get('/api/notifications')
                .then(res => {
                   this.$store.commit("GET_NOTIFICATIONS", res.data);
                })
            }
        },
        created(){
            setInterval(() => {
                this.get_notifications();
            }, 3000);
        },
        mounted() {
            this.get_notifications();
        }
    }
</script>