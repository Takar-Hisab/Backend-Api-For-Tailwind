<?php

namespace App\Observers;

use App\Models\BusinessCategory;

class BusinessCategoryObserver
{
    /**
     * Handle the BusinessCategory "created" event.
     */
    public function created(BusinessCategory $businessCategory): void
    {
        //
    }

    /**
     * Handle the BusinessCategory "updated" event.
     */
    public function updated(BusinessCategory $businessCategory): void
    {
        //
    }

    /**
     * Handle the BusinessCategory "deleted" event.
     */
    public function deleted(BusinessCategory $businessCategory): void
    {
        //
    }

    /**
     * Handle the BusinessCategory "restored" event.
     */
    public function restored(BusinessCategory $businessCategory): void
    {
        //
    }

    /**
     * Handle the BusinessCategory "force deleted" event.
     */
    public function forceDeleted(BusinessCategory $businessCategory): void
    {
        //
    }
}
