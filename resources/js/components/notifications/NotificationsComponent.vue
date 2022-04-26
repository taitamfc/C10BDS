<template>
  <HeaderComponent layout="main" :title="'Thông Báo Hệ Thống'" />
  <LoadingElement v-if="isRunning"/>
  <div id="appCapsule">
    <div class="section  mt-1 mb-1">
      <NotificationItemElement
        v-for="(item, index) in items"
        :item="item"
        :index="index"
        :key="index"
        v-bind:data-id="item.id"
        @itemHandleDelete="deleteItem()"
      ></NotificationItemElement>
    </div>
    <div class="section mb-2" v-if="items && next_page_url">
      <button type="button" @click="get_more_items()" class="btn btn-warning btn-block">Xem thêm</button>
    </div>

    <div class="error-page" v-if="items && items.length ==0">
        <h1 class="title">Thông báo trống</h1>
        <div class="text mb-5">
            Chưa có thông báo mới !
        </div>
    </div>
  </div>

  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import NotificationItemElement from "./includes/NotificationItemElement.vue";
import LoadingElement from "../elements/LoadingElement.vue";
export default {
  data() {
    return {
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
    NotificationItemElement,
    LoadingElement
  },
  methods: {
    deleteItem(){
      this.get_items()
    },
    get_items() {
      this.isRunning = true;
      axios.get('/api/notifications')
      .then(result => {
          this.isRunning = false;
          this.items = result.data.data;
          this.nextPage = result.data.current_page + 1;
          this.next_page_url = result.data.next_page_url;
      })
    },
    get_more_items(){
      this.isRunning = true;
      axios.get('/api/notifications/?page='+this.nextPage)
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