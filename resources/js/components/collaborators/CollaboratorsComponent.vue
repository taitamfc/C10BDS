<template>
  <HeaderComponent layout="main" :title="'Danh Sách Khách Hàng'" :search="1" />
  <LoadingElement v-if="isRunning"/>
  <div id="appCapsule">
    <div class="section full mt-2 mb-2">
      <ul class="listview image-listview flush">
        <CollaboratorItemElement
        v-for="(item, index) in items"
        :item="item"
        :index="index"
        :key="index"
        v-bind:data-id="item.id"
      ></CollaboratorItemElement>
      </ul>
    </div>
    <div class="section mb-2" v-if="items && next_page_url">
      <button type="button" @click="get_more_items()" class="btn btn-warning btn-block">Xem thêm</button>
    </div>
    <div class="error-page" v-if="items && items.length ==0">
        <h1 class="title">Không có dữ liệu</h1>
        <div class="text mb-5">
            Danh sách khách hàng trống
        </div>
    </div>
    <div class="section mb-2" >
      <button type="button" class="btn btn-success btn-block" @click="this.show_modal = true">Thêm khách hàng</button>
    </div>
  </div>
  <CollaboratorModalForm 
    :show_modal="show_modal" 
    @modalCancel="this.show_modal = false"
    @modalConfirm="handleFormSubmit()"
    />
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import CollaboratorItemElement from "./includes/CollaboratorItemElement.vue";
import CollaboratorModalForm from "./includes/CollaboratorModalForm.vue";
import LoadingElement from "../elements/LoadingElement.vue";
export default {
  data() {
    return {
      show_modal: false,
      isRunning : false,
      items : null,
      nextPage : null,
      next_page_url : null,
      show : {
        searchForm: false
      }
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
    CollaboratorItemElement,
    LoadingElement,
    CollaboratorModalForm
  },
  methods: {
    handleFormSubmit(){

    },
    deleteItem(){
      this.get_items()
    },
    get_items() {
      this.isRunning = true;
      axios.get('/api/customers')
      .then(result => {
          this.isRunning = false;
          this.items = result.data.data;
          this.nextPage = result.data.current_page + 1;
          this.next_page_url = result.data.next_page_url;
      })
    },
    get_more_items(){
      this.isRunning = true;
      axios.get('/api/customers/?page='+this.nextPage)
      .then(result => {
          this.isRunning = false;
          this.items = this.items.concat(result.data.data);
          this.nextPage = result.data.current_page + 1;
          this.next_page_url = result.data.next_page_url;
      })
    }
  },
  mounted()  {
    this.get_items()
  }
};
</script>

<style>
</style>