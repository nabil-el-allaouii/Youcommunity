<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'categorie',
        'lieu',
        'max_participants',
        'date_heure'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function participants(){
        return $this->belongsToMany(User::class , 'rspvs')->withTimestamps();
    }
}
