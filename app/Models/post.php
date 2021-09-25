<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class post extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = [
        'id',
        'title',
        'title_slug',
        'image_article',
        'content',
        'category_id',
        'author_id'
    ];
    public $timestamps = true;

    public function category(){
        return $this->belongsTo('App\Models\category');
    }

    public function tag(){
        return $this->hasMany('App\Models\tag','articel_id');
    }

    public function author(){
        return $this->belongsTo('App\Models\User','author_id');
    }

    public function comment(){
        return $this->hasMany('App\Models\comment','article_id');
    }

    public function bookmarkCheck(){
        return $this->hasOne('App\Models\bookmarx','article_id');
    }

    public function react()
    {
        return $this->hasMany(react::class, 'articel_id');
    }
}
