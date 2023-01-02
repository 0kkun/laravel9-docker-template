<template>
  <div class="bg-white lg:pb-12">
    <TheHeader />
    <div class="flex flex-col h-screen bg-gray-100">
      <div class="flex justify-center mt-20">
        <div class="w-9/12 border bg-white max-w-screen-md grid sm:grid-cols-1 gap-4 mx-auto rounded">
          <div class="p-12 text-center">
            <div class="mb-5">
              <InputEmail
                :email="email"
              />
            </div>
            <div class="mb-5">
              <InputPassword
                :password="password"
              />
            </div>
            <div v-if="errorMessages != null" class="text-xl text-red-500 py-2">
              <p v-if="errorMessages?.email !== undefined">{{ errorMessages.email[0] }}</p>
              <p v-if="errorMessages?.password !== undefined">{{ errorMessages.password[0] }}</p>
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
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import TheHeader from '@/components/organisms/TheHeader.vue'
import LoginButton from '@/components/molecules/LoginButton.vue'
import { login } from '../../api/auth'
import { useRouter } from 'vue-router'
import InputEmail from '@/components/molecules/InputEmail.vue'
import InputPassword from '@/components/molecules/InputPassword.vue'

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
