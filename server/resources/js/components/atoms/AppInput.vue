<template>
  <div>
    <label
      class="text-xl inline-block text-gray-800 mb-2 text-left w-full"
    >
      {{ label }}
    </label>
    <input
      class="w-full text-xl bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"
      :value="modelValue"
      @input="onInput($event)"
      :type="type"
      :placeholder="placeholder"
      :disabled="disabled"
    />
  </div>
</template>

<script setup lang="ts">
interface Props {
  modelValue: string
  label?: string
  type?: "text" | "password" | "email" | "number"
  placeholder?: string
  disabled?: boolean
}

// デフォルト値
const props = withDefaults(defineProps<Props>(), {
  modelValue: "",
  label: "",
  type: "text",
  placeholder: "",
  disabled: false,
})

const emit = defineEmits(['update:modelValue'])

const onInput = ($event: Event) => {
  if ($event.target instanceof HTMLInputElement) {
    const value = $event.target.value;
    emit('update:modelValue', value);
  }
}
</script>