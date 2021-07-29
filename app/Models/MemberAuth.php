<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;

class MemberAuth extends Authenticable
{
    protected $table='members';
    protected $fillable=['name','email','password','is_actived','profile_photo_path','school_id','role_id'];
    protected $guard='member';
    protected $hidden = ['password'];

    public function school_name()
    {
        return $this->hasOne(User::class,'id','school_id');
    }

}
