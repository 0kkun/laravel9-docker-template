<template>
  <div class="bg-gray-100 h-screen">
    <TheHeader />
    <div>
      <slot name="basic"></slot>
    </div>
  </div>
</template>

<script setup lang="ts">
import TheHeader from '@/components/organisms/TheHeader.vue'
</script>