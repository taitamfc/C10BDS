<template>
  <!-- item -->
      <div class="card cart-item mb-2">
        <div class="card-body">
          <div class="in">
            
            <div class="text">
              <h3 class="title">{{ item.name }}</h3>
              <p class="detail">{{ item.tinh_thanh_pho }}</p>
              <p class="detail">{{ item.address }}</p>
              <!-- <strong class="price">Niêm yết: 1,5 tỷ - 2,5 tỷ</strong> -->
            </div>
          </div>
          <div class="cart-item-footer">
           <strong class="price">Giá bán: {{ item.price }}</strong>
           <router-link :to="{ name: 'products.show', params: {id:item.id} }" class="btn btn-warning btn-sm" >Chi tiết</router-link>
          </div>
        </div>
      </div>
      <!-- * item -->
</template>

<script>
export default {
  props: ["item"],
}
</script>

<style>

</style>