// import axios, { AxiosInstance, AxiosResponse, AxiosRequestConfig } from 'axios';
import axios, { AxiosInstance, AxiosRequestConfig, AxiosResponse, AxiosError } from "axios";

export type ApiResponse<T> = {
  data?: T
  status: number
  message?: string
}

export const apiClient: AxiosInstance = axios.create({
  headers: {
    "Content-type": "application/json",
    "Accept": "application/json",
  },
  // APIのベースURL
  baseURL: 'http://localhost:80',
  // XSRF-TOKENをリクエスト時に送信
  withCredentials: true,
});

// NOTE: For Bearer
// const httpBearer = axios.create({
//   headers: {
//     Authorization: `Bearer ${token}`,
//   },
//   baseURL: 'http://localhost:80', // APIのベースURL
// })

/**
 * T : レスポンスの型
 * U : リクエストの型
 * @param apiUrl 
 * @param params 
 * @returns 
 */
export const getRequest = async<T, U>(apiUrl: string, params?: U): Promise<ApiResponse<T>> => {
  const response = await apiClient.get<ApiResponse<T>>(apiUrl)
    .then((res: AxiosResponse<ApiResponse<T>>) => {
      console.log(res)
      // サーバー側のエラーはここでthrowさせる
      handleErrors(res)
      return res.data
    })
    .catch((e: AxiosError<{ error: string }>) => {
      console.error(e.message)
      return {
        status: 500,
        message: e.message,
      }
    })
  return response
}

/**
 * T : レスポンスの型
 * U : リクエストの型
 * @param apiUrl 
 * @param params 
 * @returns 
 */
export const postRequest = async<T, U>(apiUrl: string, params?: U): Promise<ApiResponse<T>> => {
  const response = await apiClient.post<ApiResponse<T>>(apiUrl, params)
    .then((res: AxiosResponse<ApiResponse<T>>) => {
      console.log(res)
      // サーバー側のエラーはここでthrowさせる
      handleErrors(res)
      return res.data
    })
    .catch((e: AxiosError<{ error: string }>) => {
      console.log(e.message)
      return {
        status: 400,
        message: e.message,
      }
    })
  return response
}

// エラー処理
const handleErrors = (response: AxiosResponse): AxiosResponse | Error => {
  if (response.status === 200) return response

  switch (response.status) {
    case 400: throw Error('INVALID_TOKEN')
    case 401: throw Error('UNAUTHORIZED')
    case 404: throw Error('NOT_FOUND')
    case 500: throw Error('INTERNAL_SERVER_ERROR')
    case 502: throw Error('BAD_GATEWAY')
    default:  throw Error('UNHANDLED_ERROR')
  } 
}
