<template>
  <HeaderComponent layout="main" :title="'Tài Khoản'" />
  <div id="appCapsule" v-if="current_user">
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
          <h3 class="name">{{ current_user.name }}</h3>
          <h5 class="subtext">{{ current_user.user_group.name }}</h5>
        </div>
      </div>
    </div>

    <div class="section full mt-2">
      <div class="profile-stats ps-2 pe-2">
        <a href="#" class="item"> <strong>{{ current_user.total_sold }}</strong>sản phẩm đã bán </a>
        <a href="#" class="item"> <strong>{{ current_user.total_customer }}</strong>khách hàng </a>
      </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
      <ul class="listview image-listview text flush transparent pt-1">
        <li>
          <div class="item">
            <div class="in">
              <div>Tắt Thông Báo</div>
              <div class="form-check form-switch" >
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="SwitchCheckDefault1"
                  value="1"
                  v-bind:checked="current_user.receiveNotification"
                  v-on:change="handleTurnOffNotification($event.target)"
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
            :to="{ name: 'users.changepass', params: {} }"
            class="item"
          >
            <div class="in">
              <div>Đổi Mật Khẩu</div>
            </div>
          </router-link>
        </li>
        
        <li>
          <a class="item" href="javascript:;" @click="show.showConfirm = true">
            <div class="in">
              <div class="text-danger">Đăng Xuất</div>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <!-- * tab content -->
  </div>
  <!-- * App Capsule -->
  <ConfirmElement 
    v-if="show.showConfirm" 
    :title="'Xác Nhận'" 
    :sub_title="'Xác nhận đăng xuất'" 
    :cancel_button="'Hủy'" 
    :confirm_button="'Đồng Ý'" 
    @modalCancel="this.show.showConfirm = false"
    @modalConfirm="handleFormSubmit()"
    />
  <FooterComponent layout="main" />
</template>
 
<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import ConfirmElement from "../elements/ConfirmElement.vue";
import LoadingElement from "../elements/LoadingElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";
export default {
  data() {
    return {
      current_user : null,
      show : {
        showConfirm: false,
        showLoading: false,
        notifiError: false,
        notifiSuccess: false
      }
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
    ConfirmElement,
    LoadingElement,
  },
  methods: {
    handleFormSubmit(){
      this.show.showConfirm = false;
      this.show.showLoading = true;
       axios.post('/api/auth/logout')
      .then(result => {
          this.show.showLoading = false;
          this.show.notifiSuccess = true;
          this.$router.push({path: '/login'});
      })
    },
    handleTurnOffNotification(value){
      axios.post('/api/auth/changeNotification',{'status':value.checked})
      .then(result => {
          this.show.showLoading = false;
          this.show.notifiSuccess = true;
      })
    },
    getItem(){
        axios.get('/api/auth/profile')
        .then(result => {
            this.current_user = result.data;
        })
        .catch(err => {
            
        })
    }
  },
  mounted()  {
    if (this.$store.getters.CURRENT_USER) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.$store.getters.CURRENT_USER.token}`;
    }
    this.getItem()
  }
};
</script>