<template>
  <!-- Modal Form -->
  <div class="modal fade modalbox" 
   v-bind:class="{ show: show_modal }"
   v-bind:style="{ 'display': (show_modal) ? 'block' : '' }"
   >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thêm mới cập nhật</h5>
          <a href="javascript:;" @click="handleCancel" data-bs-dismiss="modal">Hủy</a>
        </div>
        <div class="modal-body">
          <form class="needs-validation">
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Ghi chú</label>
                <textarea v-model="form.content" class="form-control"></textarea>
                <div class="invalid-feedback" v-bind:class="{'d-block':error.content}">Vui lòng nhập ghi chú.</div>
              </div>
            </div>

            <div class="mt-2">
              <button type="button" class="btn btn-warning btn-block" @click="handleSubmit()">
                Thêm
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <LoadingElement v-if="isRunning"></LoadingElement>
  <NotificationElement 
      @notificationHide="this.notification.show = false" 
      v-if="notification.show" 
      :sub_title="notification.sub_title" 
      :type="notification.type"  
    />
  <!-- * Modal Form -->
</template>

<script>
import LoadingElement from "../../elements/LoadingElement.vue";
import NotificationElement from "../../elements/NotificationElement.vue";
export default {
  props: ["show_modal"],
  emits: ["modalCancel","modalConfirm"],
  components:{
    LoadingElement,
    NotificationElement
  },
  data() {
    return {
      form : {
        content: '',
        product_id: this.$route.params.id,
      },
      error : {
        content: false
      },
      show: {
        showConfirm: false,
        showLoading: false,
      },
      notification : {
        show      : false,
        sub_title : 'Yêu cầu thành công',
        type      : 'success',
      }
    }
  },
  methods: {
      handleCancel(){
          this.$emit('modalCancel', {})
      },
      handleSubmit(){
        let can_submit = true;
        this.error.content = false;
        if( this.form.content == '' ){ this.error.content = true; can_submit = false }

        if(can_submit){
          this.show.showLoading = true;
          axios.post('/api/product_logs',this.form)
          .then(result => {
              this.isRunning = false;
              if( result.data.status == 0 ){
                this.notification = {
                  show      : true,
                  sub_title : result.data.message,
                  type      : 'error',
                }
              }else{
                this.notification = {
                  show      : true,
                  sub_title : result.data.message,
                  type      : 'success',
                }
              }
              this.$emit('modalCancel', {})
              this.$emit('modalConfirm', {})
              
          })
        }
        
      }
  }
};
</script>

<style>
</style>