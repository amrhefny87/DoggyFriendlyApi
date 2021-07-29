<?php

namespace App\Models;

use App\Models\PostSitter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeSitter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function postSitters(){
        return $this->belongsTo(PostSitter::class);
    }
}
