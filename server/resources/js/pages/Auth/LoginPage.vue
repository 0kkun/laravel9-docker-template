<template>
  <div class="flex flex-col">
    <div class="flex justify-center mt-20">
      <div class="w-9/12 border bg-white max-w-screen-md grid sm:grid-cols-1 gap-4 mx-auto rounded">
        <div class="p-12 text-center">
          <div class="mb-5">
            <AppInput
              v-model="email"
              label="Email :"
              type="email"
              :placeholder="`you@gmail.com`"
            />
            <div
              class="text-xl text-red-500 py-2"
              v-if="errorMessages?.email !== undefined"
            >
              {{ errorMessages.email[0] }}
            </div>
          </div>
          <div class="mb-5">
            <AppInput
              v-model="password"
              label="Password :"
              type="password"
            />
            <div
              class="text-xl text-red-500 py-2"
              v-if="errorMessages?.password !== undefined"
            >
              {{ errorMessages.password[0] }}
            </div>
          </div>
          <div class="mt-5 mb-3 w-4/12 inline-block">
            <LoginButton
              @clickHandler="loginProcess()"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import LoginButton from '@/components/molecules/LoginButton.vue'
import { login } from '../../api/auth'
import { useRouter } from 'vue-router'
import AppInput from '@/components/atoms/AppInput.vue'

const router = useRouter()
const email = ref('')
const password = ref('')
const errorMessages = ref()

const loginProcess = async () => {
  const requestBody = {
    email: email.value,
    password: password.value,
  }
  const result = await login(requestBody)
  if (result.status === 200) {
    errorMessages.value = null
    router.push({ name: 'TopPage' })
  } else {
    errorMessages.value = result.message
  }
}
</script>

<style lang="scss" scoped>
</style>
