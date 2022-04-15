<template>
  <HeaderComponent layout="main" :title="'Thông Báo Hệ Thống'" />
  <div id="appCapsule">
    <div class="section  mt-1 mb-1">
      <NotificationItemElement />
      <NotificationItemElement />
      <NotificationItemElement />
      <NotificationItemElement />
    </div>
    <div class="section mb-1"><a href="#" class="btn btn-warning btn-block">Xem thêm</a></div>
  </div>

  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import NotificationItemElement from "./includes/NotificationItemElement.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    NotificationItemElement
  },
};
</script>

<style>
</style>