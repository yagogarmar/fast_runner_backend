<?php

namespace App\Observers;

use App\Models\Time;
use App\Services\RankingService;

class TiempoObserver
{
    /**
     * Handle the Time "created" event.
     */
    public function created(Time $time)
    {
        $this->recalcularRanking();
    }

    /**
     * Handle the Time "updated" event.
     */
    public function updated(Time $time): void
    {
        //
    }

    /**
     * Handle the Time "deleted" event.
     */
    public function deleted(Time $time): void
    {
        //
    }

    /**
     * Handle the Time "restored" event.
     */
    public function restored(Time $time): void
    {
        //
    }

    /**
     * Handle the Time "force deleted" event.
     */
    public function forceDeleted(Time $time): void
    {
        //
    }

    protected function recalcularRanking(){
        
        $rankingService = app(RankingService::class);
        $ranking = $rankingService->calcularRankingGlobal();
    }

}
