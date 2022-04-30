<template>
  <HeaderComponent layout="main" :title="'Danh Sách Khách Hàng'" :search="1" />
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
  </div>
  <FooterComponent layout="main" />
</template>

<script>
import HeaderComponent from "../includes/HeaderComponent.vue";
import FooterComponent from "../includes/FooterComponent.vue";
import CollaboratorItemElement from "./includes/CollaboratorItemElement.vue";
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
    CollaboratorItemElement,
    LoadingElement
  },
  methods: {
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