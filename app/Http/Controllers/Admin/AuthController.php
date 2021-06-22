<?php

namespace LaraDev\Http\Controllers\Admin;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaraDev\Http\Controllers\Controller;
use LaraDev\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.index');
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if (in_array('',$request->only('email','password'))){
            $json['message'] = $this->message->error("Ops...Informe todos os dados para efeturar login")->render();
            return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json['message'] = $this->message->error("Ops... Informe um email válido para efetuar o login")->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)){
            $json['message'] = $this->message->error("Ops.... Usuario ou senha invalidos")->render();
            return response()->json($json);
        }

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
