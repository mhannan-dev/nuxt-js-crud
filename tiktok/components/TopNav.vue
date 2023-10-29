<template>
  <nav class="bg-emerald-400 p-4">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo on the left side -->
      <div class="text-white text-2xl font-bold">
        <!-- <img src="~/public/logo.png" class="w-12" alt="Default Logo" /> -->
        <h1>Tailwind CSS</h1>
      </div>
      <!-- Navigation items on the right side -->
      <div class="space-x-4">
        <a
          href="#"
          class="text-white font-bold relative group my-4 hover:text-slate-900"
        >
          <span class="mr-2">Home</span>
          <div
            class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"
          ></div>
        </a>
        <a
          href="#"
          class="text-white font-bold relative group my-4 hover:text-slate-900"
        >
          <span class="mr-2">About</span>
          <div
            class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"
          ></div>
        </a>
        <a
          href="#"
          class="text-white font-bold relative group my-4 hover:text-slate-900"
        >
          <span class="mr-2">Services</span>
          <div
            class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"
          ></div>
        </a>
        <a
          href="#"
          class="text-white font-bold relative group my-4 hover:text-slate-900"
        >
          <span class="mr-2">Contact</span>
          <div
            class="absolute w-full h-1 bottom-0 left-0 transform scale-x-0 transition-transform group-hover:scale-x-100"
          ></div>
        </a>
      </div>
    </div>
  </nav>
  

  <!-- Two-column section with a gap -->
<div class="container mx-auto p-6 mt-6">
  <div class="flex flex-wrap items-center">
    <!-- Left Column with Image -->
    <div class="w-full md:w-1/2 md:pr-4 transition-transform transform hover:scale-105">
      <img src="~/public/about.jpg" alt="Your Image" class="w-full" />
    </div>
    <!-- Right Column with Heading and Paragraph -->
    <div class="w-full md:w-1/2 mt-4 md:mt-0 md:pl-4">
      <h2 class="text-2xl font-bold text-gray-800 relative group">
        About me
        <span class="absolute bottom-0 left-0 w-16 h-1 bg-emerald-400 transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
      </h2>
      <p class="text-gray-800 text-lg mt-4 tracking-[.1em] leading-loose">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, alias. Explicabo doloribus, minus repudiandae blanditiis, animi, id nostrum ipsa non magnam sapiente fugiat ut et consequatur veniam ad! Molestiae, architecto?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, alias. Explicabo doloribus, minus repudiandae blanditiis, animi, id nostrum ipsa non magnam sapiente fugiat ut et consequatur veniam ad! Molestiae, architecto?
      </p>
    </div>
  </div>
</div>


</template>
<script setup>
const route = useRoute();
const router = useRouter();
let showMenu = ref(false);
console.log(route);
</script>
