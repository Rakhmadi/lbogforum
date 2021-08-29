<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\folower;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function post($r,$order){
        $user = User::where('api_token',$r->token)->first()->id;
        $data = post::with(['tag','category','author']);
        $data = $data->withCount(['bookmarkCheck'=>function ($query) use ($user){
            $query->where('user_id' , $user);
        }]);
        $folow = folower::where('user_id',$user)->leftJoin('users','users.id','=','folower_id')->get(['folower_id']);
        if($r->friendpost == 'true'){
            foreach ($folow as $key => $c) {
                $data = $data->orWhere('author_id',$c['folower_id']); 
            }
        }
        $data = $data->withCount('comment');
        $data = $data->withCount('react');
        $data = $data->orderBy('created_at',$order)->simplePaginate(10);
        if (count($folow) == 0 && $r->friendpost == 'true') {
            return response()->json([], 200);
        }else{
            return response()->json($data, 200);

        }
    }
    public function allPost(Request $r){
        if ($r->order == 'desc') {
            return $this->post($r,'desc');
        }else if($r->order == 'asc'){
            return $this->post($r,'asc');
        }else{
            return response()->json([
                'msg'=>'Order is not valid',
            ], 400);
        }
    }

    public function singlePost($slug){
        return post::with(['tag','category','author','comment.user'])->where('title_slug','=',$slug)->first();
        // return post::with(['tag','category','author'])->where(function ($query) {
        //     $query->where('content', 'like', '')
        //           ->orWhere('d', 'like', '');
        // })->get();
    }
 
    public function searchPost($serch){
        
    }

    public function cretatePost(Request $r){
        $val = Validator::make($r->all(),[
            'title'=>'required|max:255',
            'content'=>'required',
            'category'=>'required',
            'image_article'=>'require'
        ]);
        if (!$val->fails()) {
            $user = User::where('api_token',sesion('TOKEN'))->first();
            post::create([
                'title'=>$r->title,
                'title_slug'=>Str::slug($r->title),
                'content'=>$r->content,
                'author_id'=> $user->id
            ]);
        } else {
            return response()->json($data, 200, $headers);
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
