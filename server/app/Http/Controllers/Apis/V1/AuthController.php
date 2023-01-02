<?php

namespace App\Http\Controllers\Apis\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    /**
     * ユーザー新規作成
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'data' => '',
            'status' => Response::HTTP_OK,
            'message' => 'ok',
        ], Response::HTTP_OK);
    }

    /**
     * ログインAPI - Bearer
     * SPAの認証にこのAPIトークンを使うべきではない。セキュリティ面で問題あり。モバイル用
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bearerLogin(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = User::whereEmail($request->email)->first();
            // 古いトークンを削除し、新しいトークンを生成する
            $user->tokens()->delete();
            $token = $user->createToken("login:user{$user->id}")->plainTextToken;

            return response()->json([
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ],
                'status' => Response::HTTP_OK,
                'message' => 'ok'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'data' => 'Unauthorized',
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => [
                    'password' => trans('auth.password')
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * ログインAPI - SPA用
     * 
     * @param  LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        // ログイン時の処理
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $response = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
            return response()->json([
                'data' => $response,
                'status' => Response::HTTP_OK,
                'message' => 'ok',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'data' => 'Unauthorized',
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => [
                    'password' => [trans('auth.password')],
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        if (!Auth::user()) {
            return response()->json([
                'data' => '',
                'status' => Response::HTTP_OK,
                'message' => trans('auth.already'),
            ]);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'data' => '',
            'status' => Response::HTTP_OK,
            'message' => trans('auth.logout'),
        ]);
    }
}
