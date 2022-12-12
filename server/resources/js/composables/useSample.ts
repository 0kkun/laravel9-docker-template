import { ref } from "vue"
import { fetchSample } from "../api/SampleRepository"

// export const useSample = (
// ) => {
//   const samples = ref([])
//   const getSamples = async () => {
//     const response = await fetchSample()
//     samples.value = response.data

//     return {
//       samples,
//       getSamples
//     }
//   }
// }