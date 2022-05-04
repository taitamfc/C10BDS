<template>
  <!-- Modal Form -->
  <div class="modal fade modalbox" 
   v-bind:class="{ show: show_modal }"
   v-bind:style="{ 'display': (show_modal) ? 'block' : '' }"
   >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thêm mới khách hàng</h5>
          <a href="javascript:;" @click="handleCancel" data-bs-dismiss="modal">Hủy</a>
        </div>
        <div class="modal-body">
          <form class="needs-validation">
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Tên</label>
                <input type="text" v-model="form.name"  class="form-control" placeholder="Tên khách hàng" />
                <div class="invalid-feedback" v-bind:class="{'d-block':error.name}">Vui lòng nhập tên.</div>
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Số điện thoại</label>
                <input type="text" v-model="form.phone" class="form-control" placeholder="Số điện thoại" />
                <div class="invalid-feedback" v-bind:class="{'d-block':error.phone}">Vui lòng nhập số điện thoại.</div>
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
  <LoadingElement v-if="show.showLoading"></LoadingElement>
  <NotificationElement @notificationHide="this.show.notifiError = false" v-if="show.notifiError" :title="'Không Thành Công'" :sub_title="'Thêm khách hàng không thành công'" :type="'error'"  />
  <NotificationElement @notificationHide="this.show.notifiSuccess = false" v-if="show.notifiSuccess" :title="'Thành Công'" :sub_title="'Thêm khách hàng thành công'" :type="'success'"  />
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
        name: '',
        phone: '',
        address: '',
        note: ''
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
      }
    }
  },
  methods: {
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
          axios.post('/api/customers',this.form)
          .then(result => {
              this.show.showLoading = false;
              this.show.notifiSuccess = true;
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