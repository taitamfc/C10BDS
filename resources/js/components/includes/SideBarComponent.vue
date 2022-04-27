<template>
  <div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="sidebarPanel"
    style="visibility: hidden"
    aria-modal="true"
    role="dialog"
  >
    <div class="offcanvas-body">
      <!-- profile box -->
      <div class="profileBox">
        <div class="image-wrapper">
          <img
            src="mobile/assets/img/logo.png"
            alt="image"
            class="imaged rounded"
          />
        </div>
        <div class="in">
          <strong>Saleman</strong>
          <div class="text-muted">
            <ion-icon
              name="location"
              role="img"
              class="md hydrated"
              aria-label="location"
            ></ion-icon>
            Nhân Viên
          </div>
        </div>
        <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
          <ion-icon
            name="close"
            role="img"
            class="md hydrated"
            aria-label="close"
          ></ion-icon>
        </a>
      </div>
      <!-- * profile box -->

      <ul class="listview flush transparent no-line image-listview mt-2">
        <li>
          <router-link :to="{ name: 'home', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Trang Chủ</div>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Sản Phẩm Hot</div>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Sản Phẩm Block</div>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Sản Phẩm Ký Gửi</div>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Chuẩn Bị Mở Bán</div>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
            <div class="icon-box bg-primary">
              <ion-icon
                name="home-outline"
                role="img"
                class="md hydrated"
                aria-label="home outline"
              ></ion-icon>
            </div>
            <div class="in">Khách Hàng</div>
          </router-link>
        </li>

        <li>
          <div class="item">
            <div class="icon-box bg-primary">
              <ion-icon
                name="moon-outline"
                role="img"
                class="md hydrated"
                aria-label="moon outline"
              ></ion-icon>
            </div>
            <div class="in">
              <div>Tắt Thông Báo</div>
              <div class="form-check form-switch">
                <input
                  class="form-check-input dark-mode-switch"
                  type="checkbox"
                  id="darkmodesidebar"
                />
                <label class="form-check-label" for="darkmodesidebar"></label>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- sidebar buttons -->
    <div class="sidebar-buttons">
      <a href="#" class="button">
        <ion-icon
          name="person-outline"
          role="img"
          class="md hydrated"
          aria-label="person outline"
        ></ion-icon>
      </a>
      <a href="#" class="button">
        <ion-icon
          name="archive-outline"
          role="img"
          class="md hydrated"
          aria-label="archive outline"
        ></ion-icon>
      </a>
      <a href="#" class="button">
        <ion-icon
          name="settings-outline"
          role="img"
          class="md hydrated"
          aria-label="settings outline"
        ></ion-icon>
      </a>
      <a href="#" class="button">
        <ion-icon
          name="log-out-outline"
          role="img"
          class="md hydrated"
          aria-label="log out outline"
        ></ion-icon>
      </a>
    </div>
    <!-- * sidebar buttons -->
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>