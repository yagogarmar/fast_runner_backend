<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = [
        'level_id', 
        'user_id', 
        'parent_id', 
        'content'
    ];

    // RELACIONES 🔀

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies'); // Relación recursiva
    }

    
}
