<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'avatar',
        'google_id',
        'token_expired',
        'api_token',
        'password',
        'ip_',
        "desc",
        "website"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
        'token_expired',
        'google_id',
        'ip_'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function author(){
        return $this->belongsTo('App\Models\post');
    }

    public function folowers(){
        return $this->hasMany('App\Models\folower','user_id');
    }
    public function folowing(){
        return $this->hasMany('App\Models\folower','folower_id');
    }
}
