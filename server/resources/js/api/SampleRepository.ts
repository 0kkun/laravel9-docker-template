import { getRequest, ApiResponse } from "./api-clients"

export type Sample = {
  id: string
}

export type SampleRepository = {
  fetchSample: () => Promise<ApiResponse<Sample>>
}

export const fetchSample = async (): Promise<ApiResponse<Sample>> => {
  try {
    const apiUrl = 'api/v1/samples'
    return await getRequest<Sample, null>(apiUrl)
  } catch (e) {
    throw Error
  }
}