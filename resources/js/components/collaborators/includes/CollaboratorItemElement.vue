<template>
  <li>
    <router-link :to="{ name: 'collaborators.show', params: {id:1} }" class="item" >
      <div class="in">
        <div>
          <header>{{ item.address }}</header>
          {{ item.name }}
          <footer> {{ item.phone }}</footer>
        </div>
      </div>
    </router-link>
  </li>
</template>

<script>
export default {
  props: ["item"],
  emits: ["itemHandleDelete"],
};
</script>

<style>
</style>