<?php

namespace App\Models;
use App\Models\Users;

//use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = ['id'];

    public function teacher(){
        return $this->belongsTo(Users::class,'users_id');
    }

}
