<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\folower;
use App\Models\bookmarx;
use App\Models\tag;
use App\Models\react;

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
 
    public function createPost(Request $r){
        $val = Validator::make($r->all(),[
            'title'=>'required|max:255',
            'content'=>'required',
            'image_article'=>'required'
        ]);
        if (!$val->fails()) {
            $user = User::where('api_token',$r->token)->first();
            $imageName = time().'_'.Str::random(5).'.'.$r->image_article->extension();

            $file = $r->image_article->move(public_path('images'),$imageName);

            post::create([
                'title'=>$r->title,
                'title_slug'=>Str::slug($r->title),
                'image_article'=>$imageName,
                'content'=>$r->content,
                'author_id'=> $user->id
            ]);
            return response()->json([
                'msg'=>'Success'
            ], 200);
        } else {
            return response()->json($val->errors(), 400);
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
    public function userPost(Request $r){
        $x = User::where('api_token',$r->token);
        $data = post::where('author_id',$x->first()->id)->get();
        return response()->json($data, 200);
    }
    public function savePost( Request $r,$id){
        $user = User::where('api_token',$r->token)->first()->id;
        $post = bookmarx::where('article_id',$id)->where('user_id',$user)->exists();
        if (!$post) {
            bookmarx::create([
                'article_id'=>$id,
                'user_id'=>$user
            ]);
            return response()->json([
                "msg"=>"Success"
            ], 200);
        }else{
            return response()->json([
                "msg"=>"Success"
            ], 200);
        }
    }
    public function unsavePost( Request $r,$id){
        $user = User::where('api_token',$r->token)->first()->id;
        $post = bookmarx::where('article_id',$id)->where('user_id',$user)->exists();
        if ($post) {
            bookmarx::where('article_id',$id)->where('user_id',$user)->delete();
            return response()->json([
                "msg"=>"Success"
            ], 200);
        }else{
            return response()->json([
                "msg"=>"Success"
            ], 200);
        }
    }
    public function searchPost(Request $r,$text){
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
            $data = $data->where('title','like',"%{$text}%")
            ->orWhere('content','like',"%{$text}%");
            $data = $data->orWhereHas('tag',function($query) use ($text){
                $query->where('tag_name','like',"%{$text}%");
            });
            $data = $data->orderBy('created_at',$r->order)->simplePaginate(10);
            if (count($folow) == 0 && $r->friendpost == 'true') {
                return response()->json([], 200);
            }else{
                return response()->json($data, 200);
            }
    }
    public function likePost(){

    }
    public function unLikePost(){

    }
    public function createTag(Request $r){
        $user = User::where('api_token',$r->token)->first()->id;
        tag::create([
            'tag_name'=>$r->tag_name,
            'articel_id'=>$r->articel_id,
            'user_id'=>$user
        ]);
        $da = tag::orderBy('created_at','desc')->first();
        return response()->json([
            "tag"=>$da,
            "msg"=>"success"
        ], 200);
    }
    public function deleteTag(Request $r,$id,$articel_id){
        $user = User::where('api_token',$r->token)->first()->id;
        $y =tag::where('id',$id)->where('articel_id',$articel_id)->where('user_id',$user)->delete();
        return response()->json([
            "msg"=>$y
        ], 200);
    }
    public function allTag($id_article){
        $tg = tag::where('articel_id',$id_article)->get();
        return response()->json([
            "tag"=>$tg,
            "msg"=>"success"
        ], 200);
    }
}
