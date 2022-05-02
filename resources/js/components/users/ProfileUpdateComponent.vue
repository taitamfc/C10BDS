<template>
  <HeaderComponent layout="single" :title="'Cập Nhật Tài Khoản'" />
  <div id="appCapsule">
    <div class="section full">
      <div class="wide-block pb-2">
        <LoadingElement v-if="!current_user"/>
        <form v-if="current_user">
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Họ Và Tên</label>
              <input
                type="text"
                class="form-control form-control-sm"
                disabled
                v-model="current_user.name"
              />
              <i class="clear-input">
                <ion-icon
                  name="close-circle"
                  role="img"
                  class="md hydrated"
                  aria-label="close circle"
                ></ion-icon>
              </i>
            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Số Điện Thoại</label>
              <input
                type="email"
                class="form-control form-control-sm"
                v-model="current_user.email"
              />
              <i class="clear-input">
                <ion-icon
                  name="close-circle"
                  role="img"
                  class="md hydrated"
                  aria-label="close circle"
                ></ion-icon>
              </i>
            </div>
          </div>

          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Địa Chỉ</label>
              <textarea
                id="address5"
                rows="4"
                class="form-control form-control-sm"
                placeholder="Message"
              ></textarea>
              <i class="clear-input">
                <ion-icon
                  name="close-circle"
                  role="img"
                  class="md hydrated"
                  aria-label="close circle"
                ></ion-icon>
              </i>
            </div>
          </div>

          <div class="mt-1">
            <button type="submit" class="btn btn-warning btn-lg btn-block">
              Cập Nhật
            </button>
          </div>
        </form>
      </div>
      <div class="content-footer mt-05 d-none">
        * This form is only html based. Not included any mail script.
      </div>
    </div>
  </div>
  <!-- * App Capsule -->
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import LoadingElement from "../elements/LoadingElement.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    LoadingElement
  },
  data() {
    return {
      current_user : null
    }
  },
  methods: {
    getItem(){
        axios.get('/api/auth/profile')
        .then(result => {
            this.current_user = result.data;
        })
        .catch(err => {
            
        })
    }
  },
  mounted() {
    this.getItem();
  }
};
</script>