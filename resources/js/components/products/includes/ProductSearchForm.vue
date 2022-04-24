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
        <select class="form-control" v-model="formData.province_id" v-on:change="get_districts($event.target.value)">
          <option value="" selected>Tất cả tỉnh/thành phố</option>
          <option 
           v-for="province in provinces"
          :value="province.id"
          :key="province.id"
          >{{ province.name }}</option>
        </select>
      </div>
      <div class="form-group mb-1">
        <select class="form-control" v-model="formData.district_id" v-on:change="get_wards($event.target.value)">
          <option value="" selected>Tất cả quận/huyện</option>
          <option 
           v-for="district in districts"
          :value="district.id"
          :key="district.id"
          >{{ district.name }}</option>
        </select>
      </div>
      <div class="form-group mb-1">
        <select class="form-control" v-model="formData.ward_id">
          <option value="" selected>Tất cả xã/phường</option>
           <option 
           v-for="ward in wards"
          :value="ward.id"
          :key="ward.id"
          >{{ ward.name }}</option>
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
      axios.get('/api/get_provinces')
      .then(result => {
          this.provinces = result.data;
      });
    },
    get_districts(province_id){
      axios.get('/api/get_districts/'+province_id)
      .then(result => {
          this.districts = result.data;
      });
    },
    get_wards(ward_id){
      axios.get('/api/get_wards/'+ward_id)
      .then(result => {
          this.wards = result.data;
      });
    }
  },
  mounted()  {
    this.get_provinces()
  }
}
</script>

<style>

</style>