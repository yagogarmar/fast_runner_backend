<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'precio',
        'img',
    ];


    // RELACIONES 🔀

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'inventory');
    }

}
