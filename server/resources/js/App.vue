<template>
  <Defaultlayout>
    <template v-slot:basic>
      <router-view />
    </template>
  </Defaultlayout>
</template>

<script setup lang="ts">
import Defaultlayout from '@/layouts/Defaultlayout.vue';
</script>