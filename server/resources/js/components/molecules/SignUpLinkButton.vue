<template>
  <AppButton
    text="Sign Up"
    type="submit"
    colorOption="primary"
    @click.stop="moveSignUpPage()"
  />
</template>

<script setup lang="ts">
import AppButton from '@/components/atoms/AppButton.vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const moveSignUpPage = () => {
  router.push({ name: 'SignUpPage' })
}
</script>