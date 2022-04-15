<template>
  <HeaderComponent layout="single" :title="'Thành Viên Dự Án'" />
  <div id="appCapsule">
    <div class="section mt-2">
      <div class="profile-head">
        <div class="avatar">
          <img
            src="/mobile/assets/img/sample/avatar/avatar1.jpg"
            alt="avatar"
            class="imaged w64 rounded"
          />
        </div>
        <div class="in">
          <h3 class="name">Julian Gruber</h3>
          <h5 class="subtext">Cộng Tác Viên</h5>
        </div>
      </div>
    </div>


    <div class="section mt-2 mb-2">
      <div class="form-group  ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Tên</label>
          <p class="form-control-static">Nguyễn Văn A</p>
        </div>
      </div>
      <div class="form-group ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Số Điện Thoại</label>
          <p class="form-control-static">0123456789</p>
        </div>
      </div>
      <div class="form-group ">
        <div class="input-wrapper">
          <label class="form-label" for="name5">Địa Chỉ</label>
          <p class="form-control-static">Nguyễn Văn A</p>
        </div>
      </div>
    </div>

    <div class="section mb-2">
      <a href="#" class="btn btn-danger btn-block">Xóa Khỏi Dự Án</a>
    </div>
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
    FooterComponent,
  },
};
</script>