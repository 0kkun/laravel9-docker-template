// import axios, { AxiosInstance, AxiosResponse, AxiosRequestConfig } from 'axios';
import axios, { AxiosInstance, AxiosRequestConfig, AxiosResponse, AxiosError } from "axios";

export type ApiResponse<T> = {
  data?: T
  status: string
  code: number,
  message?: string
}

export const apiClient: AxiosInstance = axios.create({
  headers: {
    "Content-type": "application/json",
  },
});

export const getRequest = async<T>(apiUrl: string, params?: object): Promise<ApiResponse<T>> => {
  const response = await apiClient.get<ApiResponse<T>>(apiUrl)
    .then((res: AxiosResponse<ApiResponse<T>>) => {
      console.info('Response : ', res.data)
      return res.data
    })
    .catch((e: AxiosError<{ error: string }>) => {
      console.log(e.message)
      return {
        status: 'error',
        code: 500,
        message: e.message
      }
    })
  return response
}

  // const options: AxiosRequestConfig = {
  //   url: `${apiUrl}`,
  //   method: "GET",
  // };
  // let response: AxiosResponse<string>

  // axios(options)
  //   .then((res: AxiosResponse<string>) => {
  //     response = res
  //   })
  //   .catch((e: AxiosError<{ error: string }>) => {
  //     console.log(e.message)
  //   })

  // return apiClient.get(apiUrl, params)
  // .then(() => { handleErrors })
  // .then(res => { console.log(res) }) as Promise<Response>

// エラー処理
// const handleErrors = (response: Response): Response | Error => {
//   if (response.status === 'ok') return response

//   switch (response.code) {
//     case 400: throw Error('INVALID_TOKEN')
//     case 401: throw Error('UNAUTHORIZED')
//     case 500: throw Error('INTERNAL_SERVER_ERROR')
//     case 502: throw Error('BAD_GATEWAY')
//     case 404: throw Error('NOT_FOUND')
//     default:  throw Error('UNHANDLED_ERROR')
//   } 
// }

// export interface RequestArgs {
//   url: string;
//   options: AxiosRequestConfig;
// }

// export const createRequestFunction = function (axiosArgs: RequestArgs, globalAxios: AxiosInstance, BASE_PATH: string, configuration?: Configuration) {
//   return <T = unknown, R = AxiosResponse<T>>(axios: AxiosInstance = globalAxios, basePath: string = BASE_PATH) => {
//       const axiosRequestArgs = {...axiosArgs.options, url: (configuration?.basePath || basePath) + axiosArgs.url};
//       return axios.request<T, R>(axiosRequestArgs)
//   }
// }