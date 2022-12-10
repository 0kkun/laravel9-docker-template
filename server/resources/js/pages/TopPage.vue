<template>
	<div>
		<h1>トップページです</h1>
		<h1 class="text-red-400 text-4xl">tailwindテスト</h1>
		<h1>This is from Vue</h1>
		<div class="vue-content">Hello World from Vue.</div>
		<div>Count:{{ count }}</div>
		<button @click="count++">Add Count</button>
	</div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const count = ref(0)
</script>

<style lang="scss" scoped>
.vue-content {
	width: 100%;
	height: 100%;
	background: grey;
}
</style>
