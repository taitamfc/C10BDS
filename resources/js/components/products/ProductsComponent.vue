<template>
  <HeaderComponent layout="main" title="Sản phẩm đang đảm nhận" search="1" @searchHeaderButtonCallBack="show.searchForm = true" />

  <div id="search" class="appHeader show" v-if="show.searchForm">
    <form class="search-form" style="padding:10px">
      <div class="form-group mb-1">
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" />
      </div>
      <div class="form-group mb-1">
        <select class="form-control">
          <option>Quảng Trị</option>
        </select>
      </div>
      <div class="form-group ">
        <button @click="show.searchForm = false" type="button" class="btn btn-sm btn-dark float-start mb-1" >
          <ion-icon name="close"></ion-icon>
        </button>
        <button type="button" class="btn btn-sm btn-warning float-end mb-1" >
          <ion-icon name="paper-plane-outline"></ion-icon>
        </button>
      </div>
    </form>
  </div>

  <div id="appCapsule">
    <div class="section mt-2">
      <ProductItemElement />
      <ProductItemElement />
      <ProductItemElement />
    </div>


    <div class="section mb-2">
      <a href="#" class="btn btn-warning btn-block">Xem thêm</a>
    </div>
  </div>
  <!-- * App Capsule -->
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import ProductItemElement from "./includes/ProductItemElement.vue";
export default {
  data() {
    return {
      show : {
        searchForm: false
      }
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
    ProductItemElement
  },
};
</script>

<style>
</style>