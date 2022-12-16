import { getRequest, postRequest, ApiResponse } from "../api-clients"

export type LoginRequest = {
  email: string,
  password: string,
}

/**
 * CSRF保護を初期化する
 */
const initCsrf = (): Promise<any> => {
  const apiUrl = 'sanctum/csrf-cookie'
  return getRequest<any, any>(apiUrl)
}

/**
 * ログイン
 * @param request
 * @returns ユーザー情報
 */
export const login = async(request: LoginRequest): Promise<ApiResponse<any>> => {
  try {
    await initCsrf()
    const apiUrl = 'api/v1/login'
    return await postRequest<any, LoginRequest>(apiUrl, request)
  } catch (e) {
    throw Error
  }
}

/**
 * ログアウト
 * @returns
 */
export const logout = async() => {
  try {
    const apiUrl = 'api/v1/logout'
    return await postRequest<any, any>(apiUrl)
  } catch (e) {
    throw Error
  }
}