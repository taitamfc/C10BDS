<template>
  <HeaderComponent layout="main" :title="'Trang Chủ'" :notification="1" />
  <div id="appCapsule">

    <div class="wide-block pt-2 pb-2">
        <form class="search-form" v-on:submit.prevent="handleSearchHome()">
            <div class="form-group searchbox">
                <input type="text"  class="form-control" v-model="searchTxt" placeholder="Nhập mã sản phẩm để tìm">
                <i class="input-icon">
                    <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                </i>
            </div>
        </form>
    </div>

    <div class="section full" v-if="hot_products && hot_products.length">
      <div class="section-title pb-0">SẢN PHẨM HOT</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false,autoplay:true,rewind:true}" >
          <SplideSlide v-for="hot_product of hot_products" :key="hot_product.id">
            <ProductItemElement :item="hot_product" ></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full" v-if="future_products && future_products.length">
      <div class="section-title pb-0">SẢN PHẨM SẮP MỞ BÁN</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false}" >
          <SplideSlide v-for="future_product of future_products" :key="future_product.id">
            <ProductItemElement :item="future_product"></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full" v-if="block_products && block_products.length">
      <div class="section-title pb-0">SẢN PHẨM BLOCK</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false}" >
          <SplideSlide v-for="block_product of block_products" :key="block_product.id">
            <ProductItemElement :item="block_product"></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full" v-if="regular_products && regular_products.length">
      <div class="section-title pb-0">SẢN PHẨM THƯỜNG</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false}" >
          <SplideSlide v-for="regular_product of regular_products" :key="regular_product.id">
            <ProductItemElement :item="regular_product"></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full" v-if="delivery_products && delivery_products.length">
      <div class="section-title pb-0">SẢN PHẨM KÝ GỬI</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false,autoplay:true}" >
           <SplideSlide v-for="delivery_product of delivery_products" :key="delivery_product.id">
            <ProductItemElement :item="delivery_product"></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

  </div>
  <LoadingElement v-if="isRunning" />
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "./includes/HeaderComponent.vue";
import FooterComponent from "./includes/FooterComponent.vue";
import ProductItemElement from "./products/includes/ProductItemElement.vue";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import LoadingElement from "./elements/LoadingElement.vue";

import '@splidejs/vue-splide/css';
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    ProductItemElement,
    Splide,
    SplideSlide,
    LoadingElement
  },
  data() {
    return {
      current_user : {},
      hot_products:null,
      future_products:null,
      block_products:null,
      delivery_products:null,
      regular_products:null,
      isRunning:true,
      searchTxt:''
    }
  },
  methods:{
    handleSearchHome(){
      this.$router.push({ name: 'products.search' ,params: { s: this.searchTxt }})
      return false;
    },
    get_hot_products(){
      axios.get('/api/products?product_type=hot_products')
      .then(result => {
          this.isRunning = false;
          this.hot_products = result.data.data;

          this.get_future_products();
      })
    },
    get_future_products(){
      axios.get('/api/products?product_type=future_products')
      .then(result => {
          this.isRunning = false;
          this.future_products = result.data.data;
          this.get_block_products();
      })
    },
    get_block_products(){
      axios.get('/api/products?product_type=block_products')
      .then(result => {
          this.isRunning = false;
          this.block_products = result.data.data;
          this.get_delivery_products();
      })
    },
    get_delivery_products(){
      axios.get('/api/products?product_type=delivery_products')
      .then(result => {
          this.isRunning = false;
          this.delivery_products = result.data.data;
          this.get_regular_products();
      })
    },
    get_regular_products(){
      axios.get('/api/products?product_type=regular_products')
      .then(result => {
          this.isRunning = false;
          this.regular_products = result.data.data;
      })
    }
  },
  mounted() {
    this.current_user = this.$store.getters.CURRENT_USER;
    if (this.$store.getters.CURRENT_USER) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.getters.CURRENT_USER.token}`;
    }
    this.get_hot_products();
    
  }
};
</script>