<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function EmailHandler(Request $r){
        $user = Socialite::driver('google')->stateless()->user();
        $f['id'] = $user->getId();
        $f['nickname'] = $user->getNickname();
        $f['name'] = $user->getName();
        $f['email'] = $user->getEmail();
        $f['avatar'] = $user->getAvatar();
        $usr = User::where('google_id',$user->getId())->where('email',$user->getEmail())->first();
        if ($usr) {
            Auth::login($usr);
            return redirect('/');
        }else {
            return view();
        }
    }
    public function Login(Request $r){
        $rand = bcrypt(Str::random(10));
        $user = User::where('email',$r->email);
        if ($user->exists() && Hash::check($r->password, $user->first()->password)) {
           $user->update([
            'ip_'=>$r->ip(),
            'api_token'=>$rand,
            'token_expired'=>Carbon::now()->addHours(50),
           ]);
  
           return response()->json([
               "msg"=>"success",
               "token"=>$rand,
           ], 200);
        }else{
            return response()->json([
                "msg"=>"error"
            ], 400);
        }
    }
    public function RegisterWeb(Request $r){
        

    }
    public function Register(Request $r){
        $rand = bcrypt(Str::random(10));

        $val = Validator::make($r->all(),[
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255'
        ]);
        if ($val->fails()) {

            return response()->json($val->errors(), 400);

        }else{
            User::create([
                'name'=>$r->name,
                'email'=>$r->email,
                'role'=>'user',
                'api_'=> '',
                'api_token'=>$rand,
                'token_expired'=>Carbon::now()->addHours(100),
                'password'=>bcrypt($r->password),
            ]);
            return response()->json([
                'msg'=>'succes',
                'token'=>$rand
            ], 200,);
        }   
    }
}
