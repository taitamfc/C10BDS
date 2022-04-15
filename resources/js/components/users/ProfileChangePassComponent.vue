<template>
  <HeaderComponent layout="single" :title="'Thay Đổi Mật Khẩu'" />
  <div id="appCapsule">
    <div class="section full">
      <div class="wide-block pb-2">
        <form autocomplete="off">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Mật Khẩu Hiện Tại</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="formData.current_password"
              />
              <i class="clear-input">
                <ion-icon
                  name="close-circle"
                  
                  class="md hydrated"
                  
                ></ion-icon>
              </i>
            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Mật Khẩu Mới</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="formData.new_password"
              />
              <i class="clear-input">
                <ion-icon name="close-circle" class="md hydrated"></ion-icon>
              </i>
            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Nhập Lại Mật Khẩu Mới</label>
              <input
                type="text"
                class="form-control form-control-sm"
                v-model="formData.new_password_confirm"
              />
              <i class="clear-input">
                <ion-icon name="close-circle" class="md hydrated"></ion-icon>
              </i>
            </div>
          </div>



          <div class="mt-1">
            <button type="button" class="btn btn-warning btn-lg btn-block" @click="handleButtonSubmit()">Cập Nhật</button>
          </div>
        </form>
      </div>
      <div class="content-footer mt-05">
        * This form is only html based. Not included any mail script.
      </div>
    </div>
  </div>
  <!-- * App Capsule -->
  <ConfirmElement 
    v-if="show.showConfirm" 
    :title="'Xác Nhận'" 
    :sub_title="'Xác nhận đổi mật khẩu tài khoản'" 
    :cancel_button="'Hủy'" 
    :confirm_button="'Đồng Ý'" 
    @modalCancel="this.show.showConfirm = false"
    @modalConfirm="handleFormSubmit()"
    />
    <LoadingElement v-if="show.showLoading" />
    <NotificationElement @notificationHide="this.show.notifiError = false" v-if="show.notifiError" :title="'Không Thành Công'" :sub_title="'Cập nhật không thành công'" :type="'error'"  />
    <NotificationElement @notificationHide="this.show.notifiSuccess = false" v-if="show.notifiSuccess" :title="'Thành Công'" :sub_title="'Cập nhật thành công'" :type="'success'"  />
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import ConfirmElement from "../elements/ConfirmElement.vue";
import LoadingElement from "../elements/LoadingElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";
export default {
  data() {
    return {
      formData : {
        current_password      : '123',
        new_password          : '',
        new_password_confirm  : '',
      },
      show : {
        showConfirm: false,
        showLoading: false,
        notifiError: false,
        notifiSuccess: false
      }
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
    ConfirmElement,
    LoadingElement,
    NotificationElement
  },
  methods: {
     handleButtonSubmit(){
       this.show.showConfirm = true;
     },
     handleFormSubmit(){
       this.show.showConfirm = false;
       this.show.showLoading = true;
       setTimeout(() => {
         this.show.showLoading = false;
         this.show.notifiSuccess = true;
       }, 1000);
       
       
       console.log(this.formData)
       //alert('handleFormSubmit');
     }
  }
};
</script>