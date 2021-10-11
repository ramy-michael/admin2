<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function register()
    {

      return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('home');
    }

    public function login()
    {

      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
      $this->validate($request, [
        'username' => 'required|string',
        'password' => 'required|string',
]);
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
          $msg='تم تسجيل الدخول ';
          // return redirect('/')->with('errors', $errors);
            return redirect()->intended('/minor')
            ->with(array('success'=>$msg));

        }
         $errors[]='يرجى ادخال اسم المستخدم او كلمه المرور بطريقه صحيحه';
        return redirect('/')->with('errors', $errors);
    }

    public function logout() {
      Auth::logout();

      return redirect('/');
    }

    public function home()
    {
      return view('home');
    }
}
