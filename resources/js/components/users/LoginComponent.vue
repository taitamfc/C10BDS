<template>
  <!-- App Capsule -->
  <div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
      <div class="section mt-1">
        <h1>Đăng Nhập</h1>
        <h4>Vui lòng đăng nhập vào hệ thống</h4>
      </div>
      <div class="section">
        <img
          src="/mobile/assets/img/logo.png"
          alt="image"
          class="form-image"
        />
      </div>
      <div class="section mt-1 mb-5">
        <form @submit.prevent="authenticate" autocomplete="off">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <input
                type="text"
                class="form-control"
                v-model="form.phone"
                placeholder="Số Điện Thoại"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Mật Khẩu</label>
              <input
                type="password"
                class="form-control"
                v-model="form.password"
                placeholder="Mật Khẩu"
                autocomplete="off"
              />
            </div>
          </div>

          <div class="form-links mt-2">
            <div>
              
            </div>
            <div>
              <router-link :to="{ name: 'users.forgot-password', params: {}}" class="text-muted">
                Quên mật khẩu ?
              </router-link>
            </div>
          </div>

          <div class="form-button-group">
            <button type="submit" class="btn btn-warning btn-block btn-lg">
              Đăng Nhập
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
import { login } from '../../helpers/auth';
import LoadingElement from "../elements/LoadingElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";
export default {
  name: "Login",
  data() {
      return {
          isRunning:false,
          form: {
              phone: '',
              password: '',
          },
          type: 'login',
          error: null,
          notification : {
            show      : false,
            sub_title : 'Cập nhật thành công',
            type      : 'success',
          }
      }
  },
  components: {
    LoadingElement,
    NotificationElement
  },
  methods: {
      authenticate() {
          this.$store.dispatch("LOGIN");
          this.isRunning = true;
          login(this.$data.form)
          .then(res => {
              this.isRunning = false
              this.$store.commit("LOGIN_SUCCESS", res);
              this.$router.push({path: '/'});
          })
          .catch(err => {
              this.isRunning = false
              this.notification = {
                show      : true,
                sub_title : 'Đăng nhập thất bại',
                type      : 'error',
              }
          })
      },
  },
};
</script>