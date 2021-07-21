<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Controller\Auth;

class PostDog extends Model
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
}
