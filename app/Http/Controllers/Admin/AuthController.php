<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function auth(Request $request)
    {
        //Добавить админа через new Admin
        $admin = (new Admin([
            'password' => 'asdfasdf',
        ]))->save();
        $a=1;
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password')])){
            return redirect('admin.index');
        } else {
            return 'Авторизация не прошла';
        }
//        dd($request->input('login'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
