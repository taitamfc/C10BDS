<template>
  <div class="notification-dialog android-style mb-1 notification-item ">
    <div class="notification-header">
      <div class="in">
        <img
          src="mobile/assets/img/logo.png"
          alt="image"
          class="imaged w24 rounded"
        />
        <strong>Hệ Thống</strong>
        <span>{{ item.time_format }}</span>
      </div>
      <a href="javascript:;" class="close-button" @click="handleDelete(item.id)">
        <ion-icon
          name="trash"
          role="img"
          class="md hydrated"
          aria-label="close"
        ></ion-icon>
      </a>
    </div>
    <div class="notification-content">
      <div class="in">
        <h3 class="subtitle">{{ item.title }}</h3>
        <div class="text" v-html="item.content"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item"],
  emits: ["itemHandleDelete"],
  methods: {
    handleDelete(id){
      axios.delete('/api/notifications/'+id, {id:id})
      .then(result => {
          
      })
      this.$emit('itemHandleDelete', {})
    }
  }
};
</script>

<style>
</style>