<template>
  <div id="search" class="appHeader show" >
    <form class="search-form" style="padding:10px">
      <div class="form-group mb-1">
        <input type="text" class="form-control" v-model="formData.name" placeholder="Nhập tên hoặc số điện thoại" />
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
      formData : {
        name      : '',
      }
    }
  },
  methods : {
    handleFormSubmit(){
      this.$emit('clickSearch', this.formData)
    }
  }
}
</script>

<style>

</style>