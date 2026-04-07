<?php

namespace App\Models\Cash;

use App\Models\Sales\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CashRegister extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'opening_amount',
        'closing_amount',
        'opened_at',
        'closed_at',
    ];

    protected $guarded = ['opened_at'];

    protected $casts = [
        'opened_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movements()
    {
        return $this->hasMany(CashMovement::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Logica
    public function totalSales()
    {
        return $this->sales->sum('total');
    }

    public function totalIncome()
    {
        return $this->movements->where('type', 'income')->sum('amount');
    }

    public function totalExpense()
    {
        return $this->movements->where('type', 'expense')->sum('amount');
    }

    // Scopes Necesarios

    public function scopeOfUser($query, $userId = null)
    {
        return $query->where('user_id', $userId ?? Auth::id());
    }

    public function scopeOpen($query)
    {
        return $query->whereNull('closed_at');
    }

    public function scopeCurrentOpen($query)
    {
        return $query->where('user_id', Auth::id())->whereNull('closed_at');
    }
}
