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
          <form>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Tên</label>
                <input type="text" name="name"  class="form-control" placeholder="Tên khách hàng" />
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Số điện thoại</label>
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" />
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ" />
              </div>
            </div>
            <div class="form-group basic">
              <div class="input-wrapper">
                <label class="form-label" >Ghi chú</label>
                <textarea name="note" class="form-control"></textarea>
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
  <!-- * Modal Form -->
</template>

<script>
export default {
  props: ["show_modal"],
  emits: ["modalCancel","modalConfirm"],
  methods: {
      handleCancel(){
          this.$emit('modalCancel', {})
      },
      handleSubmit(){
          
      }
  }
};
</script>

<style>
</style>