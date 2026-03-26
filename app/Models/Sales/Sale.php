<?php

namespace App\Models\Sales;

use App\Models\Cash\CashRegister;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'cash_register_id',
        'total',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cashRegister()
    {
        return $this->belongsTo(CashRegister::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
