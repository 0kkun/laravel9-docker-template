<template>
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto bg-white">
    <header class="flex justify-between items-center py-4 md:py-8">
      <!-- logo - start -->
      <a
        href="#"
        class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5"
        aria-label="logo"
        @click.prevent.stop="moveTopPage()"
      >
        <AppIcon />
        Sample
      </a>
      <!-- logo - end -->

      <!-- nav - start -->
      <nav class="hidden lg:flex gap-12">
        <a
          href="#"
          class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100"
          @click.prevent.stop="moveTopPage()"
        >
          Home
        </a>
        <a href="#" class="inline-flex items-center text-indigo-500 text-lg font-semibold gap-1">
          Features
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
        <a
          href="#"
          class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100"
          >Pricing</a
        >
        <a
          href="#"
          class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100"
          >About</a
        >
      </nav>
      <!-- nav - end -->

      <!-- buttons - start -->
      <div class="hidden lg:flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5 -ml-8">
        <a
          href="#"
          class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3"
          @click.prevent.stop="moveLoginPage()"
        >
          Sign in
        </a>
        <SignUpLinkButton />
      </div>

      <button
        type="button"
        class="inline-flex items-center lg:hidden bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold rounded-lg gap-2 px-2.5 py-2"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          />
        </svg>
        Menu
      </button>
      <!-- buttons - end -->
    </header>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router'
import AppIcon from '@/components/atoms/AppIcon.vue'
import SignUpLinkButton from '../molecules/SignUpLinkButton.vue'

const router = useRouter()

const moveLoginPage = () => {
  router.push({ name: 'LoginPage' })
}

const moveTopPage = () => {
  router.push({ name: 'TopPage' })
}
</script>

<style lang="scss" scoped></style>
