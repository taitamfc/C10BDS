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
                v-model="form.text"
                placeholder="Số Điện Thoại"
                autocomplete="off"
              />
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
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
              <i class="clear-input">
                <ion-icon name="close-circle"></ion-icon>
              </i>
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
  <!-- * App Capsule -->
</template>
 
<script>
import HeaderComponent from "./../includes/HeaderComponent.vue";
import { login } from '../../helpers/auth';

export default {
  name: "Login",
  data() {
      return {
          form: {
              phone: '',
              password: '',
          },
          type: 'login',
          error: null,
      }
  },
  components: {
    HeaderComponent,
  },
  methods: {
      authenticate() {
          this.$store.dispatch("LOGIN");

          login(this.$data.form)
          .then(res => {
              this.$store.commit("LOGIN_SUCCESS", res);
              this.$router.push({path: '/'});
          })
          .catch(err => {
              this.$store.commit("LOGIN_FAILED", {err})
              this.showAlert(this.authError, 'error');
          })
      },
  },
};
</script>