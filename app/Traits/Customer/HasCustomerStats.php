<?php

namespace App\Traits\Customer;

trait HasCustomerStats
{
    public function completedTramitesCount(): int
    {
        return $this->services()
            ->where('service_type', 'tramite')
            ->whereHas('tramite', fn ($q) =>
                $q->where('status', 'completo')
            )
            ->count();
    }

    public function pendingTramitesCount(): int
    {
        return $this->services()
            ->where('service_type', 'tramite')
            ->whereHas('tramite', fn ($q) =>
                $q->where('status', 'pendiente')
            )
            ->count();
    }
}