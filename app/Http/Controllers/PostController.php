<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function post($order){
        $data = post::with(['tag','category','author'])
        ->withCount('comment')
        ->orderBy('created_at',$order)->simplePaginate(10);
        return response()->json($data, 200);
    }
    public function allPost(Request $r){
        if ($r->order == 'desc') {
            return $this->post('desc');
        }else if($r->order == 'asc'){
            return $this->post('asc');
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
            'category'=>'required'
        ]);
        if (!$val->fails()) {
            $user = User::where('api_token',sesion('TOKEN'))->first();
            post::create([
                'title'=>$r->title,
                'title_slug'=>Str::slug($r->title),
                'content'=>$r->content,
                'category_id'=>$r->category,
                'author_id'=> $user->id
            ]);
        } else {
            # code...
        }  
    }


}
