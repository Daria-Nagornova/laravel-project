<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request): JsonResponse
    {
        $user = $request->user();

        return response()->json($user, 200);
    }
}
