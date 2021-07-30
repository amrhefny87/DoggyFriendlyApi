<?php

namespace App\Models;

use App\Models\User;
use App\Models\LikeSitter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Controller\Auth;

class PostSitter extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'date' ,
        'name',
        'comments',
        'image',
        'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function likeSitters(){
        return $this->hasMany(LikeSitter::class);
    }
}
