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
        //TODO: FRONT END EKLENINCE LOGIN FORM A GIDILECEK
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
        //TODO: FRONT END EKLENINCE REGISTER FORM A GIDILECEK
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

    public function showProfile(){

        $user = Auth::user();

        //TODO: FRONT END EKLENINCE $user ILE BIRLIKTE PROFILIM SAYFASINA GIDILECEK

    }

    public function updateProfile(){
        $user = Auth::user();

        //TODO: FRONT END EKLENINCE $user ILE BIRLIKTE PROFILI GUNCELLE SAYFASINA GIDILECEK
    }

    public function saveUpdatedProfile(Request $request){

        $user = Auth::user();

        $validator = Validator::make($request->post(), [
            "fullname"  => "required",
        ], [
            "required"  => ":Attribute alanı doldurulmalıdır.",
            "min"       => ":Attribute, 8 karakterden fazla olmalıdır",
            "max"       => ":Attribute, 20 karakteri geçmemelidir.",
            "same"      => "Şifreler birbirleri ile uyuşmuyor!",
            "unique"    => ":Attribute daha önceden alınmış!"
        ], [
            "fullname"  => "Ad Soyad",
            "username"  => "Kullanıcı adı",
            "email"     => "E-mail",
            "password"  => "Şifre",
            "password2" => "Tekrar Şifre",
        ]);

        if($user->email != $request->email){
            $validator->setRules([
                "email"       => "required | email | unique:users,email",

            ]);
        }
        if($user->username != $request->username){
            $validator->setRules([
                "username"    => "required | max:20 | unique:users,username"
            ]);
        }
        if(isset($request->old_password) or isset($request->password) or isset($request->re_password)){
            $validator->setRules([
                "old_password" => "required | min:8 | max:20",
                "password"     => "required | min:8 | max:20 | same:re_password",
                "password2"    => "required | same:password",
            ]);
        }

        if (!$validator->fails()){

            if(isset($request->password)){

                if($user->password == md5($request->old_password)){
                    $dbUser = User::find($user->id);
                    $dbUser->password = md5($request->password);
                    $dbUser->save();
                }
                else{
                    //TODO: ESKI SIFRE YANLIS, ALERT VER VE PROFIL GUNCELLEME SAYFASINA DON
                }
            }

            $dbUser = User::find($user->id);
            $dbUser->username = $request->username;
            $dbUser->fullname = $request->fullname;
            $dbUser->email    = $request->email;

            if($dbUser->save()){

                //TODO: ALERT VER ISLEM BASARILI

            }else{

                //TODO: ALERT VER ISLEM BASARISIZ

            }

            //TODO: PROFILIM SAYFASINA GIT

        }else{
            return Redirect::back()->withErrors($validator);
        }



    }





}
