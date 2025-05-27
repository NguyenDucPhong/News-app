<?php

namespace App\Http\Services\IServices;

interface IAuthService
{
    public  function Register(array $data);
    public  function Login(array $data);
}
