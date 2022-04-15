<template>
  <ul class="listview image-listview flush transparent pt-1">
    <li>
      <router-link :to="{ name: 'products.index', params: {} }" class="item">
        <div class="icon-box bg-primary">
          <ion-icon
            name="image-outline"
            role="img"
            class="md hydrated"
            aria-label="image outline"
          ></ion-icon>
        </div>
        <div class="in">
          <div>Sản phẩm đang đảm nhận</div>
          <span class="badge badge-danger">1</span>
        </div>
      </router-link>
    </li>
    <li>
      <router-link :to="{ name: 'home', params: {} }" class="item">
        <div class="icon-box bg-secondary">
          <ion-icon
            name="people-outline"
            role="img"
            class="md hydrated"
            aria-label="videocam outline"
          ></ion-icon>
        </div>
        <div class="in">
          <div>Danh sách cộng tác viên</div>
          <span class="text-muted">Chưa có</span>
        </div>
      </router-link>
    </li>
    <li>
      <router-link :to="{ name: 'home', params: {} }" class="item">
        <div class="icon-box bg-danger">
          <ion-icon
            name="musical-notes-outline"
            role="img"
            class="md hydrated"
            aria-label="musical notes outline"
          ></ion-icon>
        </div>
        <div class="in">
          <div>Dự án đã bán</div>
          <span class="badge badge-danger">1</span>
        </div>
      </router-link>
    </li>
  </ul>
</template>

<script>
export default {};
</script>

<style>
</style>