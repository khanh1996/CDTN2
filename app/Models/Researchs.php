<?php

namespace App\Models;

use App\Models\Users;
use App\Models\News_Researchs;
use Illuminate\Database\Eloquent\Model;

class Researchs extends Model
{
    protected $table = 'researchs';
    protected $guarded = ['id'];

    public function teacher(){
        return $this->belongsTo(Users::class,'users_id');
    }
    public function Researchs_Users(){
        return $this->hasMany(News_Researchs::class,'researchs_id');
    }
}
