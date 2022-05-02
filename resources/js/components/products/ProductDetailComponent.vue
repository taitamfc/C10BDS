<template>
  <HeaderComponent layout="single" title="Thông tin sản phẩm"  />

  <!-- App Capsule -->
  <div id="appCapsule" v-if="item">
    <!-- carousel full -->
    <div class="carousel-full" v-if="item.product_images">
      <Splide :options="{perPage: 1,arrows:true,pagination:false,height:200,autoHeight:true}" >
        <SplideSlide v-for="image of item.product_images" :key="image.id">
          <img :src="image.image_url" style="height:200px;width:100%;"/>
        </SplideSlide>
      </Splide>

    </div>
    <!-- * carousel full -->

    <div class="section full">
      <div class="wide-block pt-2 pb-2 product-detail-header">
        <h1 class="title">{{ item.name }}</h1>
        <div class="text">{{ item.address }} {{ item.tinh_thanh_pho }}</div>
        <div class="text-center">
          <!-- price -->
          <div class="price">
            <div class="current-price form-control mt-2">Giá: {{ item.price }}</div>
          </div>
          <!-- * price -->
        </div>
      </div>
    </div>

    <div class="section full">
      <div class="section-title">Chi tiết sản phẩm</div>
      <div class="wide-block pt-2 pb-2" v-html="item.description">
      </div>
    </div>

    <div class="section full">
      <div class="wide-block transparent p-0">
        <ul class="nav nav-tabs lined" role="tablist">
          <li class="nav-item">
            <a class="nav-link" href="javascript:;" :class="{ active: tab == 'info' }"  @click="changeTab('info')">
              Thông Tin
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:;" :class="{ active: tab == 'custommer' }"  @click="changeTab('custommer')">
              Thành Viên
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:;" :class="{ active: tab == 'history' }"  @click="changeTab('history')">
              Cập Nhật
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
      <div class="tab-content">
        <!-- feed -->
        <div class="tab-pane fade" :class="{ active: tab == 'info' , show: tab == 'info' }" >
          <div class="section mb-2 pt-2">
            
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Dài</label>
                <p class="form-control-static">{{ item.area }} m2</p>
              </div>
            </div>
             <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Rộng</label>
                <p class="form-control-static">{{ item.facade }} m2</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Giấy tờ pháp lý</label>
                <p class="form-control-static">{{ item.juridical }}</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Hướng nhà</label>
                <p class="form-control-static">{{ item.houseDirection }}</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Đường vào</label>
                <p class="form-control-static">{{ item.stress_width }} m2</p>
              </div>
            </div>
           
          </div>
          
        </div>
        <!-- * feed -->


        <!--  histories -->
        <div class="tab-pane fade" :class="{ active: tab == 'custommer' , show: tab == 'custommer' }">
          <ul class="listview image-listview flush">
            
          </ul>
        </div>
        <!-- * histories -->
        <!--  histories -->
        <div class="tab-pane fade" :class="{ active: tab == 'history' , show: tab == 'history' }">
          <div class="timeline timed">

            <div class="item" v-for="(product_log, index) in item.product_logs" :key="index">
              <span class="time">{{ product_log.time_format }}</span>
              <div class="dot"></div>
              <div class="content">
                <div class="text">{{ product_log.content }}</div>
              </div>
            </div>
          </div>

          <div class="section mb-2" v-if="item.status == 'selling'">
            <a href="#" class="btn btn-success btn-block" @click="handleButtonSubmit()">Xác Nhận Đã Bán</a>
          </div>

        </div>
        <!-- * histories -->
      </div>
    </div>
    <!-- * tab content -->
  </div>
  <!-- * App Capsule -->
  <ConfirmElement 
    v-if="show.showConfirm" 
    :title="'Xác Nhận'" 
    :sub_title="'Xác nhận đã bán'" 
    :cancel_button="'Hủy'" 
    :confirm_button="'Đồng Ý'" 
    @modalCancel="this.show.showConfirm = false"
    @modalConfirm="handleProductSold(this.$route.params.id)"
    />
  <LoadingElement v-if="show.showLoading" />
  <NotificationElement @notificationHide="this.show.notifiError = false" v-if="show.notifiError" :title="'Không Thành Công'" :sub_title="'Cập nhật không thành công'" :type="'error'"  />
  <NotificationElement @notificationHide="this.show.notifiSuccess = false" v-if="show.notifiSuccess" :title="'Thành Công'" :sub_title="'Cập nhật thành công'" :type="'success'"  />
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import CollaboratorItemElement from "../collaborators/includes/CollaboratorItemElement.vue";
import ConfirmElement from "../elements/ConfirmElement.vue";
import LoadingElement from "../elements/LoadingElement.vue";
import NotificationElement from "../elements/NotificationElement.vue";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    CollaboratorItemElement,
    ConfirmElement,
    NotificationElement,
    LoadingElement,
    Splide,
    SplideSlide,
  },
  data() {
    return {
      tab: 'info',
      isRunning : false,
      item : null,
      show : {
        showConfirm: false,
        showLoading: false,
        notifiError: false,
        notifiSuccess: false
      }
    }
  },
  methods: {
    changeTab(tab){
      this.tab = tab;
    },
    get_item(id) {
      this.isRunning = true;
      axios.get('/api/products/'+id)
      .then(result => {
          this.isRunning = false;
          this.item = result.data;
      })
    },
    handleButtonSubmit(){
       this.show.showConfirm = true;
    },
    handleProductSold(id){
      this.show.showConfirm = false;
      this.show.showLoading = true;

      axios.put('/api/products/'+id,{
        'status':'sold',
        'sold_by_user_id':this.$store.getters.CURRENT_USER.id
      })
      .then(result => {
          this.show.showLoading = false;
          this.show.notifiSuccess = true;
          this.item.status = 'sold';
      })
    }
  },
  mounted()  {
    this.get_item(this.$route.params.id)
  }
};
</script>

<style>
</style>