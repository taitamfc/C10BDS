<template>
  <!-- Modal Form -->
  <div class="modal fade modalbox" 
   v-bind:class="{ show: show_modal }"
   v-bind:style="{ 'display': (show_modal) ? 'block' : '' }"
   >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thêm khách hàng</h5>
          <a href="javascript:;" @click="handleCancel" data-bs-dismiss="modal">Hủy</a>
        </div>
        <div class="modal-body">
          <form class="needs-validation">
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Số điện thoại</label>
                <input type="text" v-on:change="handlePhoneChange($event.target.value)"  v-model="form.phone" class="form-control" placeholder="Số điện thoại" />
                <div class="invalid-feedback" v-bind:class="{'d-block':error.phone}">Vui lòng nhập số điện thoại.</div>
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Tên</label>
                <input type="text" v-model="form.name"  class="form-control" placeholder="Tên khách hàng" />
                <div class="invalid-feedback" v-bind:class="{'d-block':error.name}">Vui lòng nhập tên.</div>
              </div>
            </div>
            
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Địa chỉ</label>
                <input type="text" v-model="form.address"  class="form-control" placeholder="Địa chỉ" />
                <div class="invalid-feedback" v-bind:class="{'d-block':error.phone}">Vui lòng nhập địa chỉ.</div>
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Ghi chú</label>
                <textarea v-model="form.note" class="form-control"></textarea>
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
  <NotificationElement 
      @notificationHide="this.notification.show = false" 
      v-if="notification.show" 
      :sub_title="notification.sub_title" 
      :type="notification.type"  
    />
  <LoadingElement v-if="show.showLoading"></LoadingElement>
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
        customer_id: '',
        name: '',
        phone: '',
        address: '',
        note: '',
        product_id: this.$route.params.id,
      },
      error : {
        name: false,
        phone: false,
        address: false,
      },
      show: {
        showConfirm: false,
        showLoading: false,
        notifiError: false,
        notifiSuccess: false
      },
      notification : {
        show      : false,
        sub_title : 'Yêu cầu thành công',
        type      : 'success',
      }
    }
  },
  methods: {
      handlePhoneChange(value){
        this.show.showLoading = true;
        axios.get('/api/customers/'+value+'/edit')
        .then(result => {
            this.show.showLoading = false;
           if( result.data ){
             this.form.customer_id = result.data.id
             this.form.name = result.data.name
             this.form.address = result.data.address
           }else{
             this.form.customer_id = '';
             this.form.name = '';
             this.form.address = '';
           }
            
        })
      },
      handleCancel(){
          this.$emit('modalCancel', {})
      },
      handleSubmit(){
        let can_submit = true;
        this.error.name = false;
        this.error.phone = false;
        this.error.address = false;
        if( this.form.name == '' ){ this.error.name = true; can_submit = false }
        if( this.form.phone == '' ){ this.error.phone = true; can_submit = false  }
        if( this.form.address == '' ){ this.error.address = true; can_submit = false  }

        if(can_submit){
          this.show.showLoading = true;
          axios.post('/api/product_customers',this.form)
          .then(result => {
              this.show.showLoading = false;
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