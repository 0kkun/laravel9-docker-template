<template>
  <AppButton
    text="Login"
    type="submit"
    colorOption="primary"
    @click.stop="$emit('clickHandler')"
  />
</template>

<script setup lang="ts">
import AppButton from '@/components/atoms/AppButton.vue'
</script>