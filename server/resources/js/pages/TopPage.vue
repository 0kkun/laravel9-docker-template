<template>
  <div class="bg-white lg:pb-12">
    <TheHeader />
    <h1>トップページです</h1>
    <h1 class="text-red-400 text-4xl">tailwindテスト</h1>
    <h1>This is from Vue</h1>
    <div class="top-page-container">Hello World from Vue.</div>
    <div>Count:{{ count }}</div>
    <button class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2" @click="count++">Add Count</button>

    <img :src="'/images/no-image.png'" />

    <div>
      <button class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2" @click="logoutProcess">
        ログアウト
      </button>
    </div>
    <button class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2" @click="moveLoginPage()">
      ログイン
    </button>
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

const moveLoginPage = () => {
  router.push({ name: 'LoginPage' })
}

// onMounted(async() => {

// })

// onBeforeMount(async() => {

// })
</script>

<style lang="scss" scoped>
.top-page-container {
  width: 100%;
  height: 100%;
  background: grey;
}
</style>
