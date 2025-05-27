<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\IServices\IAuthService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected IAuthService $authService;
    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->authService->register($validated);

            return ResponseHelper::success( null,'user registered successfully');
        }catch (\Exception $exception){
            return ResponseHelper::error($exception->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $validated = $request->validated();
            $result =  $this->authService->login($validated);

            if(!$result->getStatusCode()){
                return ResponseHelper::BadRequest($result['message']);
            }
            return ResponseHelper::success($result['data'],$result['message']);

        }catch (\Exception $exception){
            return ResponseHelper::serverError($exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Signed out successfully']);
    }
}
