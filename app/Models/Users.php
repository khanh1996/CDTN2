<?php

namespace App\Models;
use App\Models\News_Researchs;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Users_Researchs(){
        return $this->hasMany(News_Researchs::class,'users_id');
    }
}
