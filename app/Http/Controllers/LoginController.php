<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        try {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return response()->json(['status' => true, 'message' => "Login success! Redirecting to dashnboard..."]);
            } else {
                throw new Exception('Invalid user credentials.');
            }
        } catch (Throwable $e) {
            return response()->json(['status' => false, 'message'=> $e->getMessage()]);
        }

       
    }
}
