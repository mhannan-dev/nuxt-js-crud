<template>
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <!-- Logo -->
       <a class="navbar-brand" href="#">
            <h1>Nuxt 3</h1>
        </a>
        
        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <NuxtLink class="nav-link" to="/">Home</NuxtLink>
          </li>
          <li class="nav-item">
            <NuxtLink class="nav-link" to="/about">About</NuxtLink>
          </li>
          <li class="nav-item">
            <NuxtLink class="nav-link" to="/posts">Blogs</NuxtLink>
          </li> 
          <li class="nav-item">
            <NuxtLink class="nav-link" to="/posts/create">Blog Create</NuxtLink>
          </li>
          <li class="nav-item">
            <NuxtLink class="nav-link" to="/contact">Contact</NuxtLink>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script setup>
</script>
<style lang="css" scoped></style>