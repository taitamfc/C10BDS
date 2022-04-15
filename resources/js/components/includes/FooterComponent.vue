<template>
  <!-- App Bottom Menu -->
  <div class="appBottomMenu">
    <router-link :to="{ name: 'home', params: {} }" class="item" active-class="active">
      <div class="col">
        <ion-icon name="home-outline"></ion-icon>
      </div>
    </router-link>

    <router-link :to="{ name: 'products.index', params: {} }" class="item" active-class="active">
      <div class="col">
        <ion-icon name="apps-outline"></ion-icon>
      </div>
    </router-link>
     <router-link :to="{ name: 'collaborators.index', params: {} }" class="item" active-class="active">
      <div class="col">
        <ion-icon name="people-outline"></ion-icon>
      </div>
    </router-link>
    <router-link :to="{ name: 'notifications.index', params: {} }" class="item" active-class="active">
      <div class="col">
        <ion-icon name="notifications-outline"></ion-icon>
      </div>
    </router-link>
    <router-link :to="{ name: 'users.index', params: {} }" class="item" active-class="active">
      <div class="col">
        <ion-icon name="settings-outline"></ion-icon>
      </div>
    </router-link>
  </div>
  <!-- * App Bottom Menu -->
</template>

<script>
export default {};
</script>

<style>
</style>