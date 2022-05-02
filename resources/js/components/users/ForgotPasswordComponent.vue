<template>
   <HeaderComponent layout="single" :title="'Quên Mật Khẩu'" />
  <!-- App Capsule -->
  <div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
      <div class="section mt-1">
        <h1>Quên Mật Khẩu</h1>
      </div>

      <div class="section mt-1 mb-5">
        <form @submit.prevent="handleSubmitForm" autocomplete="off" class="needs-validation">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Số Điện Thoại</label>
              <input
                type="phone"
                class="form-control"
                v-model="form.phone"
                placeholder="Số Điện Thoại"
                autocomplete="off"
              />
              <div class="invalid-feedback" v-bind:class="{'d-block':error.phone}">Vui lòng nhập số điện thoại.</div>
            </div>
          </div>


          <div class="form-links mt-2">
            <div>
              
            </div>
            <div>
              <router-link :to="{ name: 'users.login', params: {}}" class="text-muted">
                Đăng Nhập
              </router-link>
            </div>
          </div>

          <div class="form-button-group">
            <button type="submit" class="btn btn-warning btn-block btn-lg">
              Gửi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <LoadingElement v-if="isRunning"/>
  <NotificationElement 
      @notificationHide="this.notification.show = false" 
      v-if="notification.show" 
      :sub_title="notification.sub_title" 
      :type="notification.type"  
    />
  <!-- * App Capsule -->
</template>
 
<script>
import HeaderComponent from "./../includes/HeaderComponent.vue";
import LoadingElement from "../elements/LoadingElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";

export default {
  name: "Login",
  data() {
      return {
          form: {
              phone: '',
          },
          type: 'login',
          error: {
              phone: false,
          },
          notification : {
            show      : false,
            sub_title : 'Yêu cầu thành công',
            type      : 'success',
          }
      }
  },
  components: {
    HeaderComponent,
    LoadingElement,
    NotificationElement
  },
  methods: {
      handleSubmitForm() {
        let can_submit = true;
        this.error.phone = false;
        if( this.form.phone == '' ){ this.error.phone = true; can_submit = false }
        if(can_submit){
          this.isRunning = true;
          axios.post('/api/auth/forgot-pass',this.form)
          .then(result => {
              this.isRunning = false;
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
                  this.$router.push({path: '/login'});
                }, 1000);
              }
          })
        }
      },
  },
};
</script>