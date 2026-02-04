<?php

namespace App\Traits;

use App\Models\Stock\Stock;

trait HasStock
{
    /* ================= RELACIONES ================= */

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function availableStocks()
    {
        return $this->stocks()->where('status', 'available');
    }

    /* ================= ATTRIBUTES ================= */

    public function getAvailableStockCountAttribute()
    {
        return $this->availableStocks()->count();
    }

    public function getStockPercentageAttribute()
    {
        $total = $this->stocks()->count();

        if ($total === 0) {
            return 0;
        }

        return round(($this->available_stock_count / $total) * 100);
    }

    public function getStockStatusAttribute()
    {
        $available = $this->available_stock_count;
        $min = $this->min_stock ?? 5;

        if ($available === 0) {
            return [
                'label' => 'Sin stock',
                'class' => 'bg-danger',
                'icon'  => 'bi-x-circle',
            ];
        }

        if ($available < $min) {
            return [
                'label' => 'Stock bajo',
                'class' => 'bg-warning',
                'icon'  => 'bi-exclamation-triangle',
            ];
        }

        return [
            'label' => 'Stock suficiente',
            'class' => 'bg-success',
            'icon'  => 'bi-check-circle',
        ];
    }
}