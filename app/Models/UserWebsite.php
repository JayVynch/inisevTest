<?php

namespace App\Models;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserWebsite extends Pivot
{

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function website()
    {
        return $this->belongsToMany(website::class);
    }
}
