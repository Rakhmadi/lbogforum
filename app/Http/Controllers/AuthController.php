<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\folower;
use App\Models\post;

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
               "user"=> $user->first()
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
    public function loginWithGoogle(Request $r){
           $rand = bcrypt(Str::random(10));
           $user = User::where('google_id',$r->google_id);
           if ($user->exists()) {
            $user->update([
                'ip_'=>$r->ip(),
                'api_token'=>$rand,
                'token_expired'=>Carbon::now()->addHours(24),
            ]);
            return response()->json([
                "msg"=>"success",
                "token"=>$rand,
            ], 200);
            }else{
                $EmailExists = User::where('email',$r->email)->exists();
                if (!$EmailExists) {
                    $u = User::create([
                        "name"=>$r->name,
                        "email"=>$r->email,
                        "avatar"=>$r->avatar,
                        "google_id"=>$r->google_id,
                        "password"=>$rand,
                        "role"=>'user',
                        'api_token'=>$rand,
                        'token_expired'=>Carbon::now()->addHours(24),
                    ]);
                    return response()->json([
                        "msg"=>"success",
                        "token"=>$rand,
                    ], 200);
                }else{
                    return response()->json([
                        'msg'=>'input Error'
                    ], 400);
                }
           }
    }
    public function logout(Request $r){
        $rand = bcrypt(Str::random(10));
        $user = User::where('api_token',$r->token);
        if ($user->exists()) {
            $user->first()->update([
                'ip'=>'',
                'api_token'=>$rand,
                'token_expired'=>Carbon::now()->addHours(100),
            ]);
            return response()->json([
                'msg'=>'success'
            ], 200);
        }else{
            return response()->json([
                'msg'=>'Unauthorized'
            ], 401);
        }
    }
    public function infoUsr(Request $r,$idUser){
        $x = User::where('api_token',$r->token);
        if ($x->exists()) {
            $r = folower::where('user_id',$x->first()->id)->where('folower_id',$x->first()->id)->exists();
            return response()->json([
                "folowed" => $r,
                "user"=>User::where('id',$x->first()->id)->first(),
                "pengikut"=>folower::where('folower_id',$x->first()->id)->leftJoin('users','users.id','=','user_id')->get(["name","email","avatar"]),
                "mengikuti"=>folower::where('user_id',$x->first()->id)->leftJoin('users','users.id','=','folower_id')->get(["name","email","avatar"])
            ], 200);
        }else{
            return response()->json([
                'msg'=>'Unauthorized'
            ], 401);
        }
    }
    public function infoOtherUser(Request $r,$idUser){
        $x = User::where('api_token',$r->token);
        if ($x->exists()) {
            $r = folower::where('user_id',$x->first()->id)->where('folower_id',$idUser)->exists();
            return response()->json([
                "folowed" => $r,
                "user"=>User::where('id',$idUser)->first(),
                "pengikut"=>folower::where('folower_id',$idUser)->leftJoin('users','users.id','=','user_id')->get(["name","email","avatar"]),
                "mengikuti"=>folower::where('user_id',$idUser)->leftJoin('users','users.id','=','folower_id')->get(["name","email","avatar"])
            ], 200);
        }else{
            return response()->json([
                'msg'=>'Unauthorized'
            ], 401);
        }
    }
    public function unfolow(Request $r,$folowingID){
        $user = User::where('api_token',$r->token)->first()->id;
        $f = folower::where('folower_id',$folowingID)->where('user_id',$user);
        if ($f->exists()) {
            $f->first()->delete();
            return response()->json([
                'msg'=>'success'
            ], 200);
        }else{
            return response()->json([
                'msg'=>'user not found'
            ], 404);
        }
    }
    public function friendPost($r){
        $x = User::where('api_token',$r->token);
        $folow = folower::where('user_id',$x->first()->id)->leftJoin('users','users.id','=','folower_id')->get(['folower_id']);
        $post = post::query();
        foreach ($folow as $key => $c) {
            $post = $post->orWhere('author_id',$c['folower_id']); 
        }
        return $post->get();
    }
}
