<template>
  <button
    class="button-base inline-block focus-visible:ring text-white font-semibold text-center rounded-lg outline-none transition duration-100"
    :class="colorOptionClass"
    :type="type"
    :disabled="disabled"
  >
    {{ text }}
  </button>
</template>

<script setup lang="ts">
import { emit } from "process"
import { computed } from "vue"

interface Props {
  text: string
  type?: "button" | "submit" | "reset" | undefined,
  colorOption: 'primary' | 'completed' | 'canceled',
  disabled?: boolean
}

// デフォルト値
const props = withDefaults(defineProps<Props>(), {
  text: "ボタン",
  type: "button",
  colorOption: "primary",
  disabled: false,
})

// 特にデフォルト値を設定しない場合
// const props = defineProps<Props>()

const disabledClass = computed(() => {
  props.disabled ? "bg-gray-500" : ""
})

const colorOptionClass = computed(() => {
  return {
    'bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 ring-indigo-300': props.colorOption === 'primary',
    'bg-green-500 hover:bg-green-600 active:bg-green-700 ring-green-300': props.colorOption === 'completed',
    'bg-red-500 hover:bg-red-600 active:bg-red-700 ring-red-300': props.colorOption === 'canceled',
  }
})

// const handleClick = ({ target }: { target: HTMLInputElement }) => {
//   emit("input", target.value);
//   emit("update:value", target.value);
// };

// const handleClick = () => {
//   emit('childEmit')
// }
</script>

<style lang="scss" scoped>
.button-base {
  width: 100%;
}

</style>