<template>
  <HeaderComponent layout="main" :title="'Trang Chủ'" :notification="1" />
  <div id="appCapsule">

    <div class="section full">
      <div class="section-title pb-0">SẢN PHẨM HOT</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false,autoplay:true}" >
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full">
      <div class="section-title pb-0">SẢN PHẨM SẮP MỞ BÁN</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false}" >
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full">
      <div class="section-title pb-0">SẢN PHẨM BLOCK</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false}" >
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

     <div class="section full">
      <div class="section-title pb-0">SẢN PHẨM KÝ GỬI</div>
      <div class="splice-wrapp ">
        <Splide :options="{perPage: 2,padding:5,trimSpace:true,arrows:false,pagination:false,autoplay:true}" >
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
          <SplideSlide>
            <ProductItemElement></ProductItemElement>
          </SplideSlide>
        </Splide>
      </div>
    </div>

  </div>
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "./includes/HeaderComponent.vue";
import FooterComponent from "./includes/FooterComponent.vue";
import ProductItemElement from "./products/includes/ProductItemElement.vue";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    ProductItemElement,
    Splide,
    SplideSlide,
  },
  data() {
    return {
      current_user : {}
    }
  },
  mounted() {
    this.current_user = this.$store.getters.CURRENT_USER;
    if (this.$store.getters.CURRENT_USER) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.getters.CURRENT_USER.token}`;
    }
  }
};
</script>