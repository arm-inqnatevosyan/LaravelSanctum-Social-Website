<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;

class Contact extends Model
{
    //
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
