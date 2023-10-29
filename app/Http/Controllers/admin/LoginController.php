<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * manage and validate request.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $req)
    {
        if (auth()->guard('admin')->attempt(['userName' => $req->input('userName'), 'password'=> $req->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Log the current user out.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout (Request $request) {        session()->flush();
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }
   
}
