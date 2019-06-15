<?php

namespace App\Models;
use App\Models\Users;
use App\Models\Researchs;
use Illuminate\Database\Eloquent\Model;

class News_Researchs extends Model
{
    protected $table = 'users_researchs';
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(Users::class,'users_id');
    }
    public function researchs(){
        return $this->belongsTo(Researchs::class,'researchs_id');
    }
}
