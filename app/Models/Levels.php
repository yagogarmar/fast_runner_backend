<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Levels extends Model
{
    

    protected $fillable = [
        'name'
    ];


    // RELACIONES 🔀

    public function times(): HasMany
    {
        return $this->hasMany(Time::class);
    }

}
