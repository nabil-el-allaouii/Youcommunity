<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Events extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
