<template>
  <AppInput
    :value="password"
    label="Password :"
    type="password"
  />
</template>

<script setup lang="ts">
import AppInput from '@/components/atoms/AppInput.vue'

interface Props {
  password?: string
}

// デフォルト値
const props = withDefaults(defineProps<Props>(), {
  password: undefined
})
</script>