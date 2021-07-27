<?php

namespace App\Models;

use App\Models\PostDog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function postDogs(){
        return $this->belongsTo(PostDog::class);
    }
}
