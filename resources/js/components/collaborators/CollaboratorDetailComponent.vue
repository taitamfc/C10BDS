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
      <a href="javascript:;" @click="handleButtonSubmit()" class="btn btn-danger btn-block">Xóa Khỏi Danh Sách</a>
    </div>
  </div>
  <!-- * App Capsule -->
  <ConfirmElement 
    v-if="show.showConfirm" 
    :title="'Xác Nhận'" 
    :sub_title="'Xác nhận xóa khỏi danh sách'" 
    :cancel_button="'Hủy'" 
    :confirm_button="'Đồng Ý'" 
    @modalCancel="this.show.showConfirm = false"
    @modalConfirm="handleFormSubmit()"
    />
    <NotificationElement @notificationHide="this.show.notifiError = false" v-if="show.notifiError" :title="'Không Thành Công'" :sub_title="'Xóa không thành công'" :type="'error'"  />
    <NotificationElement @notificationHide="this.show.notifiSuccess = false" v-if="show.notifiSuccess" :title="'Thành Công'" :sub_title="'Xóa thành công'" :type="'success'"  />
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import ConfirmElement from "../elements/ConfirmElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    ConfirmElement,
    NotificationElement
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
    handleButtonSubmit(){
       this.show.showConfirm = true;
     },
     handleFormSubmit(){
       this.show.showConfirm = false;
       this.show.showLoading = true;
       axios.delete('/api/customers/'+this.$route.params.id)
       .then(result => {
          console.log(result)
          this.show.showLoading = false;
          this.show.notifiSuccess = true;
          setTimeout(() => {
            this.$router.push({ name: 'collaborators.index' })
          }, 1000);
      })
     }
  },
  mounted()  {
    this.get_item(this.$route.params.id);
    
  }
};
</script>