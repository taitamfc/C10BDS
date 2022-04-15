<template>
  <HeaderComponent layout="main" :title="'Tài Khoản'" />
  <div id="appCapsule">
    <div class="section mt-2">
      <div class="profile-head">
        <div class="avatar">
          <img
            src="mobile/assets/img/sample/avatar/avatar1.jpg"
            alt="avatar"
            class="imaged w64 rounded"
          />
        </div>
        <div class="in">
          <h3 class="name">Nguyễn Văn A</h3>
          <h5 class="subtext">Nhân Viên Bán Hàng</h5>
        </div>
      </div>
    </div>

    <div class="section full mt-2">
      <div class="profile-stats ps-2 pe-2">
        <a href="#" class="item"> <strong>152</strong>sản phẩm đã bán </a>
        <a href="#" class="item"> <strong>52</strong>cộng tác viên </a>
        <a href="#" class="item"> <strong>2.300.000.000</strong>doanh thu </a>
      </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
      <ul class="listview image-listview text flush transparent pt-1">
        <li>
          <div class="item">
            <div class="in">
              <div>Tắt Thông Báo</div>
              <div class="form-check form-switch">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="SwitchCheckDefault1"
                />
                <label
                  class="form-check-label"
                  for="SwitchCheckDefault1"
                ></label>
              </div>
            </div>
          </div>
        </li>

        <li>
          <router-link
            :to="{ name: 'users.update', params: {} }"
            class="item"
          >
            <div class="in">
              <div>Cập Nhật Tài Khoản</div>
            </div>
          </router-link>
        </li>

        <li>
          <router-link
            :to="{ name: 'users.changepass', params: {} }"
            class="item"
          >
            <div class="in">
              <div>Đổi Mật Khẩu</div>
            </div>
          </router-link>
        </li>
        
        <li>
          <router-link
            :to="{ name: 'users.logout', params: {} }"
            class="item"
          >
            <div class="in">
              <div class="text-danger">Đăng Xuất</div>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
    <!-- * tab content -->
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
    FooterComponent
  },
};
</script>