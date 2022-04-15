<template>
  <HeaderComponent layout="single" :title="'Đổi Mật Khẩu'" />
  <div id="appCapsule">
    <div class="section full">
      <div class="wide-block pb-2">
        <form>
          <div class="form-group boxed">
            <div class="input-wrapper">
              <label class="form-label">Họ Và Tên</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="name5"
                placeholder="Name"
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
                id="email5"
                placeholder="Email"
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
          <div class="form-group boxed">
				 <div class="input-wrapper">
            <label for="formFileSm" class="form-label"
              >Ảnh Đại Diện</label
            >
            <input
              class="form-control form-control-sm"
              id="formFileSm"
              type="file"
            />
          	</div>
          </div>

          <div class="mt-1">
            <button type="submit" class="btn btn-warning btn-lg btn-block">
              Cập Nhật
            </button>
          </div>
        </form>
      </div>
      <div class="content-footer mt-05">
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
import UserTabHomeComponent from "./includes/UserTabHomeComponent.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    UserTabHomeComponent,
  },
};
</script>