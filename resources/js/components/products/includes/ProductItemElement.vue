<template>
  <div v-bind:class="cl">
    <div class="card product-card" style="margin:3px">
        <div class="card-body">
            <img src="https://quanggroup.vn/wp-content/uploads/2021/11/vi-tri-vincom-shophouse-quang-tri-655x400.jpg" class="image" alt="product image">
            <p class="text text-dark pb-0 mt-1">Bán đất biển Ocean Dune ngay trung tâm thành phố</p>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item","cl"],
}
</script>

<style>

</style>