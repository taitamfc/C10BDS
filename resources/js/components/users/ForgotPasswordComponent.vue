<template>
   <HeaderComponent layout="single" :title="'Quên Mật Khẩu'" />
  <!-- App Capsule -->
  <div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
      <div class="section mt-1">
        <h1>Quên Mật Khẩu</h1>
      </div>

      <div class="section mt-1 mb-5">
        <form @submit.prevent="authenticate" autocomplete="off">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Số Điện Thoại</label>
              <input
                type="email"
                class="form-control"
                v-model="form.email"
                placeholder="Số Điện Thoại"
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
              email: '',
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