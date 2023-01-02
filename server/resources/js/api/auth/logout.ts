import { postRequest } from '../api-clients'

// TODO: ログアウトレスポンス定義する
// export type LogoutResponse = {

// }

/**
 * ログアウト
 * @returns
 */
export const logout = async () => {
  try {
    const apiUrl = 'api/v1/logout'
    return await postRequest<null, null>(apiUrl)
  } catch (e) {
    throw Error
  }
}
