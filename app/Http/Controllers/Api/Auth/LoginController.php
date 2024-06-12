<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Attempt to authenticate the user
        if (!Auth::guard('api')->attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid phone number or password',
            ], 200);
        }

        // Get the authenticated user
        $user = Auth::guard('api')->user();

        // Generate JWT token for the authenticated user
        $token = JWTAuth::fromUser($user);

        // Return a response with the token
        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully',
            'token' => $token,
        ]);
    }

    public function logout()
    {
        try {
            $token = JWTAuth::getToken(); 
    
            JWTAuth::parseToken()->invalidate();
    
            return response()->json([
                'status' => 'success', 
                'message' => 'User logged out successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed', 
                'message' => 'Unable to logout: ' . $e->getMessage()
            ], 500);
        }
    }
}
