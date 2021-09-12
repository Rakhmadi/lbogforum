<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $table = 'tag';

    protected $fillable = [
        
    ];

    public function post(){
        return $table->belongsToMany('App/Models/post','id');
    }
}
