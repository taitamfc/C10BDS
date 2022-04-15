<template>
  <!-- item -->
      <div class="card cart-item mb-2">
        <div class="card-body">
          <div class="in">
            
            <div class="text">
              <h3 class="title">CĂN HỘ SƠN TRÀ OCEAN VIEW ĐÀ NẴNG</h3>
              <p class="detail">Quận Sơn Trà, Đà Nẵng </p>
              <p class="detail">Quận Sơn Trà, Đà Nẵng </p>
              <!-- <strong class="price">Niêm yết: 1,5 tỷ - 2,5 tỷ</strong> -->
            </div>
          </div>
          <div class="cart-item-footer">
           <strong class="price">Giá bán: 1,5 tỷ - 2,5 tỷ</strong>
           <router-link :to="{ name: 'products.show', params: {id:1} }" class="btn btn-warning btn-sm" >Chi tiết</router-link>
          </div>
        </div>
      </div>
      <!-- * item -->
</template>

<script>
export default {

}
</script>

<style>

</style>