<template>
  <HeaderComponent layout="main" title="Sản phẩm đang đảm nhận" search="1" @searchHeaderButtonCallBack="show.searchForm = true" />
  <ProductSearchForm v-show="show.searchForm" @clickSearch="handleSearch" @clickClose="show.searchForm = false"/>
  
  <LoadingElement v-if="isRunning"/>
  <div id="appCapsule">
    <div class="section mt-2" v-if="items">
      <ProductItemElement
        v-for="(item, index) in items"
        :item="item"
        :index="index"
        :key="index"
      ></ProductItemElement>
    </div>
    <div class="error-page" v-if="items && items.length ==0">
        <h1 class="title">Sản phẩm trống</h1>
        <div class="text mb-5">
            Chưa có sản phẩm đang bán hiện tại !
        </div>
    </div>
    <div class="section mb-2" v-if="items && next_page_url">
      <button type="button" @click="get_more_items()" class="btn btn-warning btn-block">Xem thêm</button>
    </div>
  </div>
  <!-- * App Capsule -->
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import ProductItemElement from "./includes/ProductItemElement.vue";
import ProductSearchForm from "./includes/ProductSearchForm.vue";
import LoadingElement from "../elements/LoadingElement.vue";
export default {
  data() {
    return {
      isRunning : false,
      items : null,
      nextPage : null,
      next_page_url : null,
      form_data: {},
      show : {
        searchForm: false
      }
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
    ProductItemElement,
    ProductSearchForm,
    LoadingElement
  },
  methods: {
    handleSearch(form_data){
      this.show.searchForm = false;
      this.form_data = form_data;
      this.form_data.page = this.nextPage - 1;
      this.get_items()
    },
    get_items() {
      this.isRunning = true;
      axios.get('/api/products',{ params: this.form_data })
      .then(result => {
          this.isRunning = false;
          this.items = result.data.data;
          this.nextPage = result.data.current_page + 1;
          this.next_page_url = result.data.next_page_url;
      })
    },
    get_more_items(){
      this.isRunning = true;
      this.form_data.page = this.nextPage;
      axios.get('/api/products/',{ params: this.form_data })
      .then(result => {
          this.isRunning = false;
          this.items = this.items.concat(result.data.data);
          this.nextPage = result.data.current_page + 1;
          this.next_page_url = result.data.next_page_url;
      })
    }
  },
  mounted()  {
    this.get_items()
  }
};
</script>

<style>
</style>