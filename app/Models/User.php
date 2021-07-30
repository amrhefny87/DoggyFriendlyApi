<?php

namespace App\Models;

use App\Models\PostDog;
use App\Models\PostSitter;
use App\Models\LikeDog;
use App\Models\LikeSitter;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Controller\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'direction',
        'image',
        'pet_name',
        'about_us',
        'phone',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function postDogs(){
        return $this->hasMany(PostDog::class);
    }

    public function postSitters(){
        return $this->hasMany(PostSitter::class);
    }

    public function likeDogs(){
        return $this->hasMany(LikeDog::class);
    }

    public function likeSitters(){
        return $this->hasMany(LikeSitter::class);
    }
}
