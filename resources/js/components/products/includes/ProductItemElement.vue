<template>
  <div v-bind:class="cl">
    <div class="card product-card" style="margin:3px">
        <div class="card-body" 
            v-bind:data-product_type="item.product_type"
            v-bind:data-product_hot="item.product_hot"
            v-bind:data-product_open="item.product_open"
            v-bind:data-product_id="item.id"
            v-bind:data-product_unit="item.unit"
            >
            <router-link :to="{ name: 'products.show', params: {id:item.id} }" >    
              <span v-if="item.product_type == 'Block'" class="product-badge badge badge-success"><ion-icon name="storefront-outline" class="fs17"></ion-icon></span>
              <span v-if="item.product_type == 'Consignment'" class="product-badge badge badge-info"><ion-icon name="rocket-outlin" class="fs17"></ion-icon></span>
              <span v-if="item.product_hot == true" class="product-badge badge badge-danger"><ion-icon name="ribbon-outline" class="fs17"></ion-icon></span>
              <span v-if="item.product_open == true" class="product-badge badge badge-dark"><ion-icon name="alarm-outline" class="fs17"></ion-icon></span>
              <span v-if="true" class="product-badge product-badge-price badge badge-warning">{{ item.price }}</span>
              
              <Splide :options="{perPage: 1,padding:0,trimSpace:false,arrows:false,pagination:false,interval:3000,autoplay:true,rewind:true}" >
                <SplideSlide v-for="(product_image,index) of item.product_images" :key="index">
                  <img v-bind:src="product_image.image_url" class="image" alt="product image">
                </SplideSlide>
              </Splide>
            
              <p class="text text-dark pb-0 mt-1">{{ item.name }}</p>
            </router-link>
        </div>
    </div>
  </div>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
  props: ["item","cl"],
  components: {
    Splide,
    SplideSlide
  },
}
</script>

<style>

</style>