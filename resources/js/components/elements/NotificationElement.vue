<template>
  <div id="notification-15" class="notification-box" v-bind:class="{show:show.showNotification}">
    <div class="notification-dialog ios-style" v-bind:class="{
		 'bg-success' : type == 'success',
		 'bg-danger' : type == 'error',
	 }">
      <div class="notification-content">
        <div class="in">
          <h3 class="subtitle">{{ (type == 'success' ? 'Thành công' : 'Thất bại') }}</h3>
          <div class="text">{{ sub_title }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
	props: ["title","sub_title","type","show_header"],
  emits: ["notificationHide"],
  data() {
    return {
      show : {
        showNotification: true,
      }
    }
  },
  mounted() {

    //auto close notification after 3s
    setTimeout(() => {
      this.$emit('notificationHide', {});
    }, 3000);
  },
  unmounted() {
    //this.show.showNotification = true
  }
};
</script>

<style>
</style>