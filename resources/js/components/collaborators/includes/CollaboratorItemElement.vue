<template>
  <li>
    <router-link :to="{ name: 'collaborators.show', params: {id:1} }" class="item" >
      <img
        src="/mobile/assets/img/sample/avatar/avatar3.jpg"
        alt="image"
        class="image"
      />
      <div class="in">
        <div>
          <header>Quảng Trị</header>
          Nguyễn Văn A
          <footer>0123456789</footer>
        </div>
      </div>
    </router-link>
  </li>
</template>

<script>
export default {};
</script>

<style>
</style>