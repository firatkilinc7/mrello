<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UseropController extends Controller
{
    public function loginForm(){

    }

    public function doLogin(Request $request){

        $validate = $request->validate([
            "email"    => "required | email",
            "password" => "required | min:8 | max:25",
        ],[
            "required" => ":Attribute alanı doldurulmalıdır.",
            "min"      => "Şifre, en az 8 karakter olmalıdır.",
            "max"      => "Şifre en fazla 25 karakter olmalıdır",
        ],[
            "email"    => "E-Posta",
            "password" => "Şifre",
        ]);

        if($validate){
            $user = User::where([
                        "email"    => $request->email,
                        "password" => md5($request->password),
                    ])->first();
            if($user){
                //TODO: GIRIS BASARILI ALERT
                Auth::login($user);
                return redirect()->route();
            }else{
                //TODO: GIRIS BASARISIZ ALERT
                return redirect()->route("loginForm");
            }
        }else{
            return Redirect::back();
        }
    }

    public function registerForm(){

    }

    public function doRegister(Request $request){

        $validate = $request->validate([
            "fullname"  => "required",
            "username"  => "required | max:20 | unique:users,username",
            "email"     => "required | email | unique:users,email",
            "password"  => "required | min:8 | max:20 | same:password2",
            "password2" => "required | same:password",
        ], [
            "required" => ":Attribute alanı doldurulmalıdır.",
            "min"      => ":Attribute, 8 karakterden fazla olmalıdır",
            "max"      => ":Attribute, 20 karakteri geçmemelidir.",
            "same"     => "Şifreler birbirleri ile uyuşmuyor!",
            "unique"   => ":Attribute daha önceden alınmış!"
        ], [
            "fullname"  => "Ad Soyad",
            "username"  => "Kullanıcı adı",
            "email"     => "E-mail",
            "password"  => "Şifre",
            "password2" => "Tekrar Şifre",
        ]);

        if ($validate){
            $newUser = new User([
                "fullname" => $request->fullname,
                "username" => $request->username,
                "email"    => $request->email,
                "password" => md5($request->password),
            ]);
            if($newUser->save()){
                //TODO: KAYIT BASARILI ALERT EKLENECEK
                return redirect()->route("loginForm");
            }else{
                //TODO: KAYIT SIRASINDA HATA ALERT EKLENECEK
                return redirect()->route("registerForm");
            }

        }else{
            return Redirect::back();
        }

    }

    public function logout(){

        Auth::logout();
        return redirect()->route();
    }

}
