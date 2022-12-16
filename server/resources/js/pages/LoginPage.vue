<template>
  <div>
    <div class="flex flex-col h-screen">
      <div class="bg-gray-100 flex-auto">
        <div class="flex justify-center mt-20">
          <div class="w-9/12 border bg-white">
            <div class="my-16 text-center">
              <h2 class="text-4xl font-bold">Login</h2>
              <div class="mt-12">
                <div class="mb-3">
                  <input
                    type="email"
                    placeholder="you@gmail.com"
                    name="email"
                    class="text-xl w-7/12 p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="email"
                  />
                </div>
                <div class="mb-5">
                  <input
                    type="password"
                    placeholder="パスワード"
                    name="password"
                    class="text-xl w-7/12 p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="password"
                  />
                </div>
                <button
                  type="submit"
                  class="mt-5 mb-3 text-xl w-4/12 bg-blue-800 text-white py-2 rounded hover:opacity-75"
                  v-on:click="loginProcess()"
                >
                  ログイン
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { login } from '../api/auth/login'

const email = ref('')
const password = ref('')
const router = useRouter()

const loginProcess = async() => {
  const requestBody = {
    email: email.value,
    password: password.value,
  }
  const result = await login(requestBody)
  if (result.status === 200) {
    router.push({ name: 'TopPage' })
  }
}
</script>

<style lang="scss" scoped>
.top-page-container {
  width: 100%;
  height: 100%;
  background: grey;
}
</style>