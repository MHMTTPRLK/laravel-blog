<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public  function login()
    {
        return view('back.auth.login');
    }
    public  function login_post(Request $request)
    {


        $password=$request->password;
        $email=$request->email;
        $sorgu=Auth::attempt(['email'=>$email, 'password'=>$password]);
        if($sorgu)
        {
            toastSuccess('Tekraradan Hoşgeldiniz',Auth::user()->name);
            $data=Auth::user()->name;
            $request->session()->put('userData',$data);
           // print_r($request->session()->get('userData'));

            //$kadi=Auth::user()->name;
          // $_SESSION['adim']=$kadi;
            return  redirect()->route('admin.dashboard');

        }
        return  redirect()->route('admin.login')->withErrors('Email Adresi veya Şifre Hatalı');

    }
    public function  logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
