<template>
  <div>
    <h1>トップページです</h1>
    <h1 class="text-red-400 text-4xl">tailwindテスト</h1>
    <h1>This is from Vue</h1>
    <div class="top-page-container">Hello World from Vue.</div>
    <div>Count:{{ count }}</div>
    <button
      class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2"
      @click="count++"
    >
      Add Count
    </button>
    <img :src="'/images/no-image.png'" />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
const count = ref(0)
</script>

<style lang="scss" scoped>
.top-page-container {
  width: 100%;
  height: 100%;
  background: grey;
}
</style>
