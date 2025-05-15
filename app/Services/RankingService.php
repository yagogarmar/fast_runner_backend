<?php

namespace App\Services;

use App\Models\User;
use App\Models\GlobalRanking;
use App\Models\Level;
use App\Models\Time;

use Illuminate\Support\Facades\Log;


class RankingService
{
    public function calcularRankingGlobal()
    {
        $niveles = Level::all();
        $usuarios = User::with('times')->get();

        $ranking = [];

        foreach($usuarios as $usuario){
            $zScores = [];

            foreach($niveles as $nivel){
                $tiemposDelNivel = Time::where('level_id', $nivel->id)->pluck('time');
                
                $media = $tiemposDelNivel->avg();
                $desviacion = $this->desviacionEstandar($tiemposDelNivel);
                
                if ($desviacion == 0 || $tiemposDelNivel->count() < 2) {
                    continue;
                }

                $tiempoUsuario = $usuario->times->firstWhere('level_id', $nivel->id);
                if (!$tiempoUsuario) {
                    continue;
                }

                
                $z = ($tiempoUsuario->time - $media) / $desviacion;
                $zScores[] = $z;
            }

            if (count($zScores) === 0) {
                continue;
            }

            $mediaZScore = array_sum($zScores) / count($zScores);

            $ranking[] = [
                'user_id' => $usuario->id,
                'nombre' => $usuario->username,
                'media_zscore' => $mediaZScore,
            ];
        }

        usort($ranking, fn($a, $b) => $a['media_zscore'] <=> $b['media_zscore']);

        GlobalRanking::truncate(); 

        foreach ($ranking as $index => $entry) {
            GlobalRanking::create([
                'user_id' => $entry['user_id'],
                'media_zscore' => $entry['media_zscore'],
                'posicion' => $index + 1,
        ]);
}

    }

    private function desviacionEstandar($valores)
    {
        if ($valores->count() < 2) {
            return 0;
        }

        $media = $valores->avg();
        $sumaCuadrados = $valores->reduce(function ($carry, $val) use ($media) {
            return $carry + pow($val - $media, 2);
        }, 0);

        return sqrt($sumaCuadrados / ($valores->count() - 1));
    }
}