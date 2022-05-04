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
            if( this.$store.getters.CURRENT_USER ){
                setInterval(() => {
                    this.get_notifications();
                }, 5000);
            }
        },
        mounted() {
            if( this.$store.getters.CURRENT_USER ){
                this.get_notifications();
            }
            
        }
    }
</script>