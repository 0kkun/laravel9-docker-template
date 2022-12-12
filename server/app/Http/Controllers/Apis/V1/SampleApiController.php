<?php

namespace App\Http\Controllers\Apis\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleApiController extends Controller
{
    public function index(Request $request) {
        try {
            $result = [
                'id' => 'dsfafae',
            ];
        } catch(\Exception $e) {
            $result = $e;
        }
        return response()->json([
            'data' => $result,
            'status' => 'ok',
            'code' => 200,
        ], 200);
    }
}
