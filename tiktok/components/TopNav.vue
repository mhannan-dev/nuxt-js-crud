<template>
  <nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo on the left side -->
      <div class="text-white text-2xl font-bold">
        <img src="~/public/logo.png" class="w-12" alt="Default Logo" />
      </div>
      <!-- Navigation items on the right side -->
      <div class="space-x-4">
        <a href="#" class="text-white font-bold relative group my-4 hover:text-golden">
          <span class="mr-2">Home</span>
          <div class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"></div>
        </a>
        <a href="#" class="text-white font-bold relative group my-4 hover:text-golden">
          <span class="mr-2">About</span>
          <div class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"></div>
        </a>
        <a href="#" class="text-white font-bold relative group my-4 hover:text-golden">
          <span class="mr-2">Services</span>
          <div class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"></div>
        </a>
        <a href="#" class="text-white font-bold relative group my-4 hover:text-golden">
          <span class="mr-2">Contact</span>
          <div class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"></div>
        </a>
      </div>
    </div>
  </nav>
</template>


<script setup>
const route = useRoute();
const router = useRouter();
let showMenu = ref(false);
console.log(route);
</script>
