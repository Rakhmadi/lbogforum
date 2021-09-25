<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['id','comment_content','user_id','article_id'];

    public function post(){
        return $table->belongsTo('App\Models\post','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id');
    }
}
