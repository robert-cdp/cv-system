<?php

namespace App\Traits\Customer;

trait HasCustomerScopes
{
    public function scopeDPI($query, string $dpi)
    {
        return $query->where('dpi', $dpi);
    }
}
