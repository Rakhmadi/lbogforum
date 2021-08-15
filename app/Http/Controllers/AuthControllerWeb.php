<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthControllerWeb extends Controller
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
            'api_token'=>$rand,
            'token_expired'=>Carbon::now()->addHours(50),
           ]);
           session(['TOKEN' => $rand ]); 
           echo $user->first();
        }else{
            return redirect('/');
        }
    }

    public function Register(){
        $rand = bcrypt(Str::random(10));

        $val = Validator::make($r->all(),[
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255'
        ]);
        if (!$val->errors()) {
            User::create([
                'name'=>$r->name,
                'email'=>$r->email,
                'ip_'=>'',
                'role'=>'user',
                'api_token'=>$rand,
                'token_expired'=>Carbon::now()->addHours(50),
                'password'=>bcrypt($r->password),
            ]);
            
        }else{
            return redirect('/login')->with(['success' => 'Email/Password salah']);    
        }
    }
}
