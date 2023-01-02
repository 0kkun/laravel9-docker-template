import { postRequest } from '../api-clients'

type RegisterRequest = {
  name: string
  email: string
  password: string
}

type RegisterResponse = {
  data: string
  status: number
  message: [] | string
}

/**
 * ユーザー登録
 * @returns
 */
export const register = async (request: RegisterRequest) => {
  try {
    const apiUrl = 'api/v1/register'
    return await postRequest<RegisterResponse, RegisterRequest>(apiUrl, request)
  } catch (e) {
    throw Error
  }
}
