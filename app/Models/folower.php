<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folower extends Model
{
    use HasFactory;
    protected $table = 'folowing_';

    public function folowing(){
        return $this->hasMany('App\Models\User','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','id');
    }
    public function usering(){
        return $this->belongsTo('App\Models\User','id');
    }

}
