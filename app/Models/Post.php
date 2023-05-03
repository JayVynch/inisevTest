<?php

namespace App\Models;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function subscribers()
    {
        return $this->website();
    }
}
