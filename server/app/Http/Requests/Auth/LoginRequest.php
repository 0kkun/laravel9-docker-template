<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'min:6'],
        ];
    }

    /**
     * APIのエラーレスポンスなのでjsonで返すようオーバーライド
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'status' => Response::HTTP_UNAUTHORIZED,
            'message' => $validator->errors()->toArray(),
        ], Response::HTTP_UNAUTHORIZED);

        throw new HttpResponseException($res);
    }
}
