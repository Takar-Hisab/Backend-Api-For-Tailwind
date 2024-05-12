<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        return response()->noContent();

//        $data = $request->validate([
//            'email' => ['required', 'email:rfc,dns'],
//            'password' => ['required']
//        ]);
//        if(Auth::attempt($data, (bool)$request->input('remember'))){
//            if($request->user()->type != 'vendor'){
//                $this->logout($request);
//                throw ValidationException::withMessages([
//                    'email' => "Auth User Not Vaid...",
//                ]);
//            }
////            Auth::guard('web')->login($request->user());
//            session()->regenerate((bool)$request->input('remember'));
//            return response()->noContent();
//        }
//
//        throw ValidationException::withMessages([
//            'email' => __('auth.failed'),
//        ]);
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
