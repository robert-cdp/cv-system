<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'customer_contact';

    protected $fillable = [
        'customer_id',
        'type',
        'value',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}