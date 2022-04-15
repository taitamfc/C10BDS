<template>
    <div class="modal fade dialogbox show" id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                </div>
                <div class="modal-body">
                    {{ sub_title }}
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <button type="button" @click="handleCancel()" class="btn btn-text-danger" >
                            {{ cancel_button }}
                        </button>
                        <button type="button" @click="handleConfirm()" class="btn btn-text-warning">
                            {{ confirm_button }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
</template>

<script>
export default {
    props: ["title","sub_title","cancel_button","confirm_button"],
    emits: ["modalCancel","modalConfirm"],
    data() {
        return {
            modalShow: false
        }
    },
    methods: {
        handleCancel(){
            this.$emit('modalCancel', {})
        },
        handleConfirm(){
            this.$emit('modalConfirm', {})
        }
    }
}
</script>

<style>

</style>