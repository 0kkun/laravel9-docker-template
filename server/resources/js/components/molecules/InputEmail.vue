<template>
  <AppInput
    :value="email"
    label="Email :"
    type="email"
    :placeholder="`you@gmail.com`"
  />
</template>

<script setup lang="ts">
import AppInput from '@/components/atoms/AppInput.vue'

interface Props {
  email?: string
}

// デフォルト値
const props = withDefaults(defineProps<Props>(), {
  email: undefined
})
</script>