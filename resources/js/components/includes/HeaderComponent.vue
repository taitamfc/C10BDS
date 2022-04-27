<template>
  <!-- HEADER -->
  <div class="appHeader no-border transparent position-absolute" v-if="layout == 'login'">
    <div class="left">
      <a
        @click="$router.go(-1)"
        href="javascript:;"
        class="headerButton goBack"
      >
        <ion-icon name="chevron-back-outline"></ion-icon>
      </a>
    </div>
    <div class="pageTitle"></div>
    <!-- <div class="right">
      <a href="page-login.html" class="headerButton"> Login </a>
    </div> -->
  </div>

  <div class="appHeader bg-warning text-light" v-if="layout == 'single'">
    <div class="left">
      <a
        @click="$router.go(-1)"
        href="javascript:;"
        class="headerButton goBack"
      >
        <ion-icon name="chevron-back-outline"></ion-icon>
      </a>
    </div>
    <div class="pageTitle">{{ title }}</div>
    <div class="right">
      <a @click="this.$emit('searchHeaderButtonCallBack', {})" href="javascript:;" class="headerButton toggle-searchbox" v-if="search == 1">
        <ion-icon name="search-outline"></ion-icon>
      </a>
    </div>
  </div>

  <div class="appHeader bg-warning text-light" v-if="layout == 'main'" v-bind:class="{scrolled:scrolled}">
    <div class="left">
      <a href="#" class="headerButton" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
            <ion-icon name="menu-outline" role="img" class="md hydrated" aria-label="menu outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">{{ title }}</div>
    <div class="right">
      <a @click="this.$emit('searchHeaderButtonCallBack', {})" href="javascript:;" class="headerButton toggle-searchbox" v-if="search == 1">
        <ion-icon name="search-outline"></ion-icon>
      </a>
      <router-link :to="{ name: 'notifications.index', params: {} }" class="headerButton" v-if="notification == 1">
          <ion-icon name="notifications-outline" role="img" class="md hydrated" aria-label="call outline"></ion-icon>
          <span class="badge badge-danger">
            {{ this.$store.getters.NOTIFICATIONS.total }}
          </span>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props: ["layout","title","search","notification","scrolled"],
};
</script>

<style>
</style>