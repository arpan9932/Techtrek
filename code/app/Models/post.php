<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class post extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
    public function user(){
        return 
        $this->belongsTo(User::class);
    }
    public function comments(){
        return
        $this->hasMany(comment::class);
    }
}
