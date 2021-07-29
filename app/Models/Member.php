<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model {
    use HasFactory;
    use Notifiable;

    protected $table='members';
    protected $fillable=['name','email','password','is_actived','profile_photo_path','school_id','role_id'];

    protected $hidden = ['password'];


    public function school_name()
    {
        return $this->hasOne(User::class,'id','school_id');
    }





}
