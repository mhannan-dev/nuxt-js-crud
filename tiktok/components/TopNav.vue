<template>
  <div
    id="TopNav"
    class="fixed bg-white z-30 items-center w-full border-b h-[61px]"
  >
    <div class="flex items-center justify-between w-full px-6 mx-auto">
      <!-- Logo  -->
      <div :class="route.fullPath === '/' ? 'w-[80%]' : 'lg:w-[20%] w-[70%]'">
        <NuxtLink to="/">
          <img width="115" src="~/assets/images/tiktok-logo.png" />
        </NuxtLink>
      </div>
      <!-- Search bar -->
      <div
        class="md:flex items-center bg-[#F1F1F2] p-1 rounded-full max-w-[380px] w-full"
      >
        <input
          type="text"
          class="w-full pl-3 my-2 bg-transparent placeholder-[#838383] text-[-15px] focus:outline-none"
          id=""
          placeholder="Search accounts"
        />
        <div class="px-3">
          <Icon name="ri:search-line" color="#A1A2A7" size="27" />
        </div>
      </div>

      <div class="flex items-center justify-end gap-3">
        <button
          class="flex items-center border rounded-sm px-3 py-[6px] hover:bg-gray-100"
        >
          <Icon name="mdi:plus" color="#0000000" size="22" />
          <span class="px-2 font-medium text-[15px]">Upload</span>
        </button>
        <!-- Login -->
        <div v-if="false" class="flex items-center">
          <button
            class="flex items-center text-white border rounded-md px-3 py-[6px] bg-[#F02C56]"
          >
            <span class="mx-4 font-medium text-[15px]">Login</span>
          </button>
          <Icon name="mdi:dots-vertical" color="#161724" size="25" />
        </div>
        <div class="flex items-center">
          <Icon
            class="ml-1 mr-4"
            name="carbon:send-alt"
            color="#161724"
            size="30"
          />
          <Icon
            class="mr-5"
            name="bx:message-detail"
            color="#161724"
            size="27"
          />
          <div class="relative">
            <button class="mt-1" @click="showMenu = !showMenu">
              <img
                width="33"
                src="https://picsum.photos/id/83/300/320"
                alt="Image"
                class="rounded-full"
              />
            </button>

            <div
              v-if="showMenu"
              id="PopupMenu"
              class="absolute bg-white rounded-lg py-1.5 w-[200px] shadow-xl border top-[43px] -right-2"
            >
              <NuxtLink
                
                @click="showMenu = false"
                class="flex items-center justify-start py-3 px-2 hover:bg-gray-100 cursor-pointer"
              >
                <Icon name="ph:user" size="20" />
                <span class="pl-2 font-semibold text-sm">Profile</span>
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const route = useRoute();
const router = useRouter();
let showMenu = ref(false)
console.log(route);
</script>
