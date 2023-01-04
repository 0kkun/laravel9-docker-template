<template>
  <div class="top-page-container">
    <h1>トップページです</h1>
    <img :src="'/images/no-image.png'" />
    <div>
      <button class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2" @click="logoutProcess">
        ログアウト
      </button>
    </div>
    <div></div>

    <div>
      <button class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2" @click="fetchSamples()">
        サンプル取得
      </button>
      <ul>
        <li>{{ samples }}</li>
      </ul>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { fetchSample } from '../api/SampleRepository'
import { logout } from '../api/auth/login'
import { useRouter } from 'vue-router'
import TheHeader from '@/components/organisms/TheHeader.vue'
import DefaultLayout from '../layouts/Defaultlayout.vue'

const count = ref(0)
const samples = ref()
const router = useRouter()

const logoutProcess = async () => {
  const result = await logout()
  router.push({ name: 'LoginPage' })
}

const fetchSamples = async () => {
  const res = await fetchSample()
  samples.value = res
}
</script>

<style lang="scss" scoped>
.top-page-container {
  width: 100%;
  height: 100%;
}
</style>
