<template>
  <HeaderComponent layout="single" title="Thông tin sản phẩm"  />

  <!-- App Capsule -->
  <div id="appCapsule" v-if="item">
    <!-- carousel full -->
    <div class="carousel-full" v-if="item.product_images">
      <Splide :options="{perPage: 1,arrows:true,pagination:false,height:200,autoHeight:true}" >
        <SplideSlide v-for="image of item.product_images" :key="image.id">
          <a href="javascript:;" @click.prevent="downloadItem(image.image_url)">
          <img :src="image.image_url" style="height:200px;width:100%;"/>
          </a>
        </SplideSlide>
      </Splide>

    </div>
    <!-- * carousel full -->

    <div class="section full">
      <div class="wide-block pt-2 pb-2 product-detail-header">
        <h1 class="title">[#{{ item.sku }}] - {{ item.name }}</h1>
        <div class="text">{{ item.address }} {{ item.tinh_thanh_pho }}</div>
        <div class="text text-badge">
          <span class="badge badge-primary mr-1">Mã: {{ item.sku }} </span> 
          <span class="badge badge-warning">Loại: {{  item.product_type_label }} </span> 
          <span class="badge badge-danger" v-if="item.product_hot">Sản phẩm HOT </span> 
          <span class="badge badge-info" v-if="item.product_open">Sắp mở bán </span>
        </div>

        <div class="row mt-2">
          
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Giá Bán</label>
                  <p class="form-control-static">{{ item.price }}</p>
              </div>
            </div>
          </div>  
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Hoa Hồng</label>
                  <p class="form-control-static">{{ item.price_commission }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-if="item.product_type == 'Consignment'">
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Giá Ký Gửi</label>
                <p class="form-control-static"> {{ item.price_deposit }} </p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Giá Chênh</label>
                <p class="form-control-static"> {{ item.price_diff }} </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row" v-if="item.product_type == 'Consignment'">
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Hạn Ký Gửi</label>
                <p class="form-control-static"> {{ item.product_end_date }} </p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label">Người Nhận Ký Gửi</label>
                <p class="form-control-static"> {{ item.user_contact }} </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row" v-if="item.product_type == 'Block' && item.product_blocks">
          <div class="col-12">
            <table class="table table-bordered">
                <tr>
                  <th>Mã lô</th>
                  <th>Diện tích</th>
                  <th>Giá</th>
                  <th>Đơn vị</th>
                </tr>
                <tr v-for="(product_block,index) of item.product_blocks" v-bind:key="index">
                  <td>{{ product_block.id }}</td>
                  <td>{{ product_block.area }}</td>
                  <td>{{ product_block.price }}</td>
                  <td>{{ product_block.unit }}</td>
                </tr>
            </table>
          </div>
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
            <a class="nav-link" href="javascript:;" :class="{ active: tab == 'customer' }"  @click="changeTab('customer')">
              Khách Hàng
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
                <p class="form-control-static">{{ item.area }} m</p>
              </div>
            </div>
             <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Rộng</label>
                <p class="form-control-static">{{ item.facade }} m</p>
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
                <p class="form-control-static">{{ item.stress_width }} m</p>
              </div>
            </div>
            <div class="form-group">
              <div class="input-wrapper">
                <label class="form-label" for="name5">Vị trí</label>
                <div class="embed-responsive embed-responsive-16by9 overflow-hidden frame-100" v-html="item.google_map"></div>
              </div>
            </div>
           
          </div>
          
        </div>
        <!-- * feed -->


        <!--  histories -->
        <div class="tab-pane fade" :class="{ active: tab == 'customer' , show: tab == 'customer' }">
          <div class="section mb-2">
            <ul class="listview image-listview flush" v-if="item.product_customers.length">
              <CollaboratorItemElement
                v-for="(product_customer, index) in item.product_customers"
                :item="product_customer"
                :index="index"
                :key="index"
                v-bind:data-id="product_customer.id"
                :layout="'product'"
              ></CollaboratorItemElement>
            </ul>
          </div>
          <div class="section mb-2">
            <a href="javascript:;" class="btn btn-success btn-block" @click="show_CustomerModal = true">Thêm khách hàng</a>
          </div>
        </div>
        <!-- * histories -->
        <!--  histories -->
        <div class="tab-pane fade" :class="{ active: tab == 'history' , show: tab == 'history' }">
          <div class="section mb-2">
            <div class="timeline timed" v-if="item.product_logs.length">

              <div class="item" v-for="(product_log, index) in item.product_logs" :key="index">
                <span class="time">{{ product_log.time_format }}</span>
                <div class="dot"></div>
                <div class="content">
                  <div class="text">{{ product_log.content }}</div>
                </div>
              </div>
            </div>
          </div>

          <div class="section mb-2">
            <a href="javascript:;" class="btn btn-success btn-block" @click="show_LogModal = true">Thêm ghi chú</a>
          </div>

        </div>
        <!-- * histories -->
      </div>
    </div>
    <!-- * tab content -->
  </div>
  <!-- * App Capsule -->
  <LoadingElement v-if="isRunning" />
  <ProductCustomerModalForm 
   :show_modal="show_CustomerModal" 
   @modalCancel="this.show_CustomerModal = false"
   @modalConfirm="handleCustomerModalFormSubmit()"
  />
  <ProductLogModalForm 
   :show_modal="show_LogModal"
   @modalCancel="this.show_LogModal = false"
   @modalConfirm="handleLogModalFormSubmit()"
  />
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import LoadingElement from "../elements/LoadingElement.vue";
import ProductCustomerModalForm from "./includes/ProductCustomerModalForm.vue";
import ProductLogModalForm from "./includes/ProductLogModalForm.vue";
import CollaboratorItemElement from "../collaborators/includes/CollaboratorItemElement.vue";
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
  components: {
    HeaderComponent,
    FooterComponent,
    LoadingElement,
    Splide,
    SplideSlide,
    ProductCustomerModalForm,
    ProductLogModalForm,
    CollaboratorItemElement
  },
  data() {
    return {
      show_CustomerModal:false,
      show_LogModal:false,
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
      window.scrollTo(0, 1000);
    },
    get_item(id) {
      this.isRunning = true;
      axios.get('/api/products/'+id)
      .then(result => {
          this.isRunning = false;
          this.item = result.data;
      })
    },
    handleLogModalFormSubmit(){
      this.get_item(this.$route.params.id);
      this.changeTab('history');
    },
    handleCustomerModalFormSubmit(){
      this.get_item(this.$route.params.id);
      this.changeTab('customer');
    },
    async downloadItem(url) {
      const response = await axios.get(url, { responseType: "blob" });
      const blob = new Blob([response.data], { type: "image/jpeg" });
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = url;
      link.click();
      URL.revokeObjectURL(link.href);
    }
  },
  mounted()  {
    this.get_item(this.$route.params.id)
  }
};
</script>

<style>
</style>