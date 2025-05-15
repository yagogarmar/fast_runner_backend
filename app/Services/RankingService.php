<?php

namespace App\Services;

use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Log;

class RankingService
{
    public function calcularRankingGlobal()
    {
        Log::alert('CALCULANDO RANKING');
        
        return '$ranking';
        
    }
}
