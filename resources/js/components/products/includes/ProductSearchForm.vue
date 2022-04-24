<template>
  <div id="search" class="appHeader show" >
    <form class="search-form" style="padding:10px">
      <div class="form-group mb-1">
        <input type="text" class="form-control" v-model="formData.id" placeholder="Nhập mã sản phẩm" />
      </div>
      <div class="form-group mb-1">
        <input type="text" class="form-control" v-model="formData.name" placeholder="Nhập tên sản phẩm" />
      </div>
      <div class="form-group mb-1">
        <select class="form-control" v-model="formData.province_id">
          <option value="" selected>Tất cả tỉnh/thành phố</option>
          <option value="">Quảng Trị</option>
        </select>
      </div>
      <div class="form-group mb-1">
        <select class="form-control" v-model="formData.district_id">
          <option value="" selected>Tất cả quận/huyện</option>
          <option value="">Quảng Trị</option>
        </select>
      </div>
      <div class="form-group mb-1">
        <select class="form-control" v-model="formData.ward_id">
          <option value="" selected>Tất cả xã/phường</option>
          <option value="">Quảng Trị</option>
        </select>
      </div>
      <div class="form-group ">
        <button @click="this.$emit('clickClose', {})" type="button" class="btn btn-sm btn-dark float-start mb-1" >
          <ion-icon name="close"></ion-icon>
        </button>
        <button @click="this.$emit('clickSearch', formData)" type="button" class="btn btn-sm btn-warning float-end mb-1" >
          <ion-icon name="paper-plane-outline"></ion-icon>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
   emits: ["clickSearch","clickClose"],
   data() {
    return {
      provinces : null,
      districts : null,
      wards : null,
      formData : {
        id      : '',
        name      : '',
        province_id      : '',
        district_id      : '',
        ward_id      : '',
      }
    }
  },
  methods : {
    handleFormSubmit(){
      this.$emit('clickSearch', this.formData)
    },
    get_provinces(){

    },
    get_districts(province_id){

    },
    get_wards(district_id){

    }
  }
}
</script>

<style>

</style>