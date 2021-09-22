<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmarx extends Model
{
    use HasFactory;
    protected $table = 'save_article';
    protected $fillable = [
        'id',
        'article_id',
        'user_id'
    ];


    public function post()
    {
        return $this->hasMany('App\Models\post', 'id', 'article_id')->select(['id', 'title']);;
    }

}
