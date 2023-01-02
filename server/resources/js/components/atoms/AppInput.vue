<template>
  <div>
    <label
      class="text-xl inline-block text-gray-800 mb-2 text-left w-full"
    >
      {{ label }}
    </label>
    <input
      class="w-full text-xl bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"
      :value="value"
      :type="type"
      :placeholder="placeholder"
      :disabled="disabled"
    />
  </div>
</template>

<script setup lang="ts">
interface Props {
  value?: string
  label?: string
  type?: "text" | "password" | "email" | "number"
  placeholder?: string
  disabled?: boolean
}

// デフォルト値
const props = withDefaults(defineProps<Props>(), {
  label: "",
  type: "text",
  placeholder: "",
  disabled: false,
})
</script>

<script lang="ts">
import { defineComponent } from "@vue/runtime-core";
export default defineComponent({
  inheritAttrs: false,
});
</script>