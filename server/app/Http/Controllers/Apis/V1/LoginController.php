<?php

namespace App\Http\Controllers\Apis\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Auth\AuthManager;

class LoginController extends Controller
{
    /**
     * ログインAPI - Bearer
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bearerLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = User::whereEmail($request->email)->first();
            // 古いトークンを削除し、新しいトークンを生成する
            $user->tokens()->delete();
            $token = $user->createToken("login:user{$user->id}")->plainTextToken;

            return response()->json([
                'data' => ['token' => $token],
                'status' => Response::HTTP_OK,
                'message' => 'ok'
            ]);
        }
        return response()->json([
            'data' => '',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'User Not Found.',
        ]);
    }

    /**
     * ログインAPI - SPA
     * 
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        // ログイン時の処理
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'data' => Auth::user(),
                'status' => Response::HTTP_OK,
                'message' => 'ok',
            ]);
        } else {
            return response()->json([
                'data' => Auth::user(),
                'status' => Response::HTTP_NON_AUTHORITATIVE_INFORMATION,
                'message' => 'ok',
            ]);
        }
        return response()->json([
            'data' => '',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'User Not Found.'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'data' => '',
            'status' => Response::HTTP_OK,
            'message' => 'ok'
        ]);
    }
}
