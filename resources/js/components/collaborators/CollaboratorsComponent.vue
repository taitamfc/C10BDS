<template>
  <HeaderComponent layout="main" :title="'Danh Sách Cộng Tác Viên'" :search="1" />
  <div id="appCapsule">
    <div class="section full mt-2 mb-2">
      <ul class="listview image-listview flush">
        <CollaboratorItemElement/>
        <CollaboratorItemElement/>
        <CollaboratorItemElement/>
        <CollaboratorItemElement/>
        <CollaboratorItemElement/>
        <CollaboratorItemElement/>
      </ul>
    </div>
    <div class="section mb-2"><a href="#" class="btn btn-warning btn-block">Xem thêm</a></div>
  </div>
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import CollaboratorItemElement from "./includes/CollaboratorItemElement.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    CollaboratorItemElement
  },
};
</script>

<style>
</style>