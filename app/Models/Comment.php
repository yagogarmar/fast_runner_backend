<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{

    protected $with = ['user','replies'];

    protected $appends = ['time_string'];

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
        return $this->hasMany(Comment::class, 'parent_id')->with('replies'); 
    }

    // APPEND
    public function getTimeStringAttribute()
    {
        if (!$this->created_at) {
            return null;
        }
    
        $creado = $this->created_at;
        $ahora = now();
    
        if ($creado->diffInSeconds($ahora) < 60) {
            return "Hace " . intval($creado->diffInSeconds($ahora))  . " segundos";
        }
    
        if ($creado->diffInMinutes($ahora) < 60) {
            return "Hace " . intval($creado->diffInMinutes($ahora)) . " minutos";
        }
    
        if ($creado->diffInHours($ahora) < 24) {
            return "Hace " . intval($creado->diffInHours($ahora)) . " horas";
        }
    
        if ($creado->diffInDays($ahora) < 30) {
            return "Hace " .intval($creado->diffInDays($ahora))  . " días";
        }
    
        if ($creado->diffInMonths($ahora) < 12) {
            return "Hace " . intval($creado->diffInMonths($ahora)) . " meses";
        }
    
        return "Hace " . intval($creado->diffInYears($ahora)) . " años";
    }
}
