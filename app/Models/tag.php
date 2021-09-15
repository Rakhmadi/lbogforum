<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $table = 'tag';

    protected $fillable = [
        "tag_name",
        "articel_id",
        "user_id"
    ];

    public function post(){
        return $table->belongsToMany('App/Models/post','id');
    }
}
