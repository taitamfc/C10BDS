<template>
  <HeaderComponent layout="single" :title="'Thay Đổi Mật Khẩu'" />
  <div id="appCapsule">
    <div class="section full">
      <div class="wide-block pb-2">
        <form autocomplete="off" class="needs-validation">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Mật Khẩu Hiện Tại</label>
              <input type="password" class="form-control form-control-sm" v-model="formData.current_password" />
              <div class="invalid-feedback" v-bind:class="{'d-block':error.current_password}">Vui lòng nhập mật khẩu hiện tại.</div>
            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Mật Khẩu Mới</label>
              <input type="password" class="form-control form-control-sm" v-model="formData.new_password" />
              <div class="invalid-feedback" v-bind:class="{'d-block':error.new_password}">Vui lòng nhập mật khẩu.</div>

            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Nhập Lại Mật Khẩu Mới</label>
              <input type="password" class="form-control form-control-sm" v-model="formData.new_password_confirm" />
              <div class="invalid-feedback" v-bind:class="{'d-block':error.new_password_confirm}">Vui lòng nhập mật khẩu mới.</div>
              <div class="invalid-feedback" v-bind:class="{'d-block':error.new_password_compare}">Xác nhận mật khẩu không khớp.</div>
            </div>
          </div>



          <div class="mt-1">
            <button type="button" class="btn btn-warning btn-lg btn-block" @click="handleButtonSubmit()">Cập Nhật</button>
          </div>
        </form>
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
    <NotificationElement 
      @notificationHide="this.notification.show = false" 
      v-if="notification.show" 
      :sub_title="notification.sub_title" 
      :type="notification.type"  
    />
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
        current_password      : '',
        new_password          : '',
        new_password_confirm  : '',
      },
      error : {
        current_password      : false,
        new_password          : false,
        new_password_confirm  : false,
        new_password_compare  : false,
      },
      show : {
        showConfirm: false,
        showLoading: false
      },
      notification : {
        show      : false,
        sub_title : 'Cập nhật thành công',
        type      : 'success',
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
        let can_submit = true;
        this.error.current_password = false;
        this.error.new_password = false;
        this.error.new_password_confirm = false;
        this.error.new_password_compare = false;
        if( this.formData.current_password == '' ){ this.error.current_password = true; can_submit = false }
        if( this.formData.new_password == '' ){ this.error.new_password = true; can_submit = false  }
        if( this.formData.new_password_confirm == '' ){ this.error.new_password_confirm = true; can_submit = false  }
        if(this.formData.new_password_confirm && this.formData.new_password_confirm != this.formData.new_password){
          this.error.new_password_compare = true; can_submit = false
        }
        if(can_submit){
          this.show.showConfirm = true;
        }

       
     },
     handleFormSubmit(){
       this.show.showConfirm = false;
       this.show.showLoading = true;
       axios.post('/api/auth/change-pass',this.formData)
      .then(result => {
          this.show.showLoading = false;
          if( result.data.status == 0 ){
            this.notification = {
              show      : true,
              sub_title : result.data.message,
              type      : 'error',
            }
          }else{
            this.notification = {
              show      : true,
              sub_title : result.data.message,
              type      : 'success',
            }
            setTimeout(() => {
              this.$router.push({path: '/profile'});
            }, 1000);
          }
      })
     }
  },
  mounted() {
    
  }
};
</script>