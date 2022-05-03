<template>
  <li>
    <router-link :to="{ name: 'collaborators.show', params: {id:item.id} }" class="item" v-if="layout == 'main'">
      <div class="in">
        <div>
          <header>{{ item.address }}</header>
          {{ item.name }}
          <footer> {{ item.phone }}</footer>
        </div>
      </div>
    </router-link>

    <div class="item" v-if="layout == 'product'">
      <div class="in">
        <div>
          <header>{{ item.address }}</header>
          {{ item.name }}
          <footer> {{ item.phone }}</footer>
        </div>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: ["item","layout"],
  emits: ["itemHandleDelete"],
};
</script>

<style>
</style>