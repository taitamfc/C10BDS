<template>
  <HeaderComponent layout="main" :title="'Trang Chủ'" :notification="1" />
  <div id="appCapsule">
    <div class="header-large-title">
      <h4 class="subtitle">Xin chào, {{ current_user.name }}</h4>
    </div>

    <div class="listview-title mt-2">Liên Kết Nhanh</div>

    <ul class="listview image-listview flush transparent">
      <li>
        <router-link :to="{ name: 'products.index', params: {} }" class="item">
          <div class="icon-box bg-warning">
            <ion-icon
              name="apps-outline"
              role="img"
              class="md hydrated"
              aria-label="albums outline"
            ></ion-icon>
          </div>
          <div class="in">Sản Phẩm Đang Đảm Nhận</div>
        </router-link>
      </li>
      <li>
        <router-link
          :to="{ name: 'collaborators.index', params: {} }"
          class="item"
        >
          <div class="icon-box bg-warning">
            <ion-icon
              name="people-outline"
              role="img"
              class="md hydrated"
              aria-label="chevron back outline"
            ></ion-icon>
          </div>
          <div class="in">Danh Sách Cộng Tác Viên</div>
        </router-link>
      </li>
      <li>
        <router-link :to="{ name: 'products.index', params: {} }" class="item">
          <div class="icon-box bg-warning">
            <ion-icon
              name="layers-outline"
              role="img"
              class="md hydrated"
              aria-label="albums outline"
            ></ion-icon>
          </div>
          <div class="in">Sản Phẩm Đã Bán</div>
        </router-link>
      </li>
      <li>
        <router-link
          :to="{ name: 'notifications.index', params: {} }"
          class="item"
        >
          <div class="icon-box bg-warning">
            <ion-icon
              name="notifications-outline"
              role="img"
              class="md hydrated"
              aria-label="albums outline"
            ></ion-icon>
          </div>
          <div class="in">Thông Báo Của Hệ Thống</div>
        </router-link>
      </li>
      <li>
        <router-link :to="{ name: 'users.index', params: {} }" class="item">
          <div class="icon-box bg-warning">
            <ion-icon
              name="settings-outline"
              role="img"
              class="md hydrated"
              aria-label="albums outline"
            ></ion-icon>
          </div>
          <div class="in">Cài Đặt Tài Khoản</div>
        </router-link>
      </li>
    </ul>

    <!-- app footer -->
    <div class="appFooter">
      <img
        src="mobile/assets/img/logo.png"
        alt="icon"
        class="footer-logo mb-2"
        style="height: 50px"
      />
      <div class="footer-title">Công ty cổ phần bất động sản QUANG GROUP</div>

      <div>
        Copyright © Quanggroup <span class="yearNow">2022</span>. All Rights
        Reserved.
      </div>

      <div class="mt-2">
        <a href="#" class="btn btn-icon btn-sm btn-facebook">
          <ion-icon
            name="logo-facebook"
            role="img"
            class="md hydrated"
            aria-label="logo facebook"
          ></ion-icon>
        </a>
        <a href="#" class="btn btn-icon btn-sm btn-twitter">
          <ion-icon
            name="logo-twitter"
            role="img"
            class="md hydrated"
            aria-label="logo twitter"
          ></ion-icon>
        </a>

        <a href="#" class="btn btn-icon btn-sm btn-instagram">
          <ion-icon
            name="logo-instagram"
            role="img"
            class="md hydrated"
            aria-label="logo instagram"
          ></ion-icon>
        </a>
      </div>
    </div>
    <!-- * app footer -->
  </div>
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "./includes/HeaderComponent.vue";
import FooterComponent from "./includes/FooterComponent.vue";
export default {
  components: {
    HeaderComponent,
    FooterComponent,
  },
  data() {
    return {
      current_user : {}
    }
  },
  mounted() {
    this.current_user = this.$store.getters.CURRENT_USER;
    if (this.$store.getters.CURRENT_USER) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.getters.CURRENT_USER.token}`;
    }
  }
};
</script>