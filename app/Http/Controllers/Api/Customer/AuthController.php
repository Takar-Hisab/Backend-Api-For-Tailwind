<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        
        if(Auth::attempt($data, (bool)$request->input('remember'))){
            if($request->user()->type != 'customer'){
                $this->logout($request);
                throw ValidationException::withMessages([
                    'email' => "Auth User Not Vaid...",
                ]);
            }

            $request->session()->regenerate();
            return response()->noContent();
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function register(Request $request)
    {
        return $request;
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->noContent();
    }
}
