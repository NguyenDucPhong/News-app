<?php

namespace App\Http\Services;

use App\Http\Helpers\ResponseHelper;
use App\Http\Services\IServices\IAuthService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthService implements IAuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function Login(array $data)
    {
        $user = User::where('email',$data['email'])->first();
        if(!$user || !Hash::check($data['password'],$user->password)){
            return ResponseHelper::BadRequest( 'Email or password is incorrect');
        }

        $token = $user->createToken('api-token')->accessToken;

        return ResponseHelper::success($token, "Login Successful");
    }

    public function Register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
