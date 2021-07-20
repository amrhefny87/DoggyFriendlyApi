<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
