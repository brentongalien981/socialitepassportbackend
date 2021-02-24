<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyAuthUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'oauth_provided_user_id', 'oauth_provided_user_id');
    }
}
