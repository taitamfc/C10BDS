<template>
  <HeaderComponent layout="single" :title="'Thông Tin Khách Hàng'" />
  <div id="appCapsule">


    <div class="section mt-2 mb-2" v-if="item">
      <div class="form-group  ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Tên</label>
          <p class="form-control-static">{{ item.name }}</p>
        </div>
      </div>
      <div class="form-group ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Số Điện Thoại</label>
          <p class="form-control-static">{{ item.phone }}</p>
        </div>
      </div>
      <div class="form-group ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Địa Chỉ</label>
          <p class="form-control-static">{{ item.address }}</p>
        </div>
      </div>
    </div>

    <div class="section mb-2" v-if="item">
      <a v-bind:href="'tel:'+item.phone" class="btn btn-success btn-block mb-1">Gọi Khách</a>
      <a href="#" class="btn btn-danger btn-block">Xóa Khỏi Danh Sách</a>
    </div>
  </div>
  <!-- * App Capsule -->
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
  },
  data() {
    return {
      isRunning : false,
      item : null,
      show : {
        showConfirm: false,
        showLoading: false,
        notifiError: false,
        notifiSuccess: false
      }
    }
  },
  methods: {
    get_item(id) {
      this.isRunning = true;
      axios.get('/api/customers/'+id)
      .then(result => {
          this.isRunning = false;
          this.item = result.data;
      })
    },
  },
  mounted()  {
    this.get_item(this.$route.params.id)
  }
};
</script>