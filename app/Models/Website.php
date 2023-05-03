<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class,'user_website');
    }
}
