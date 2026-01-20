<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Customer\FormatsCustomerName;
use App\Traits\Customer\HasCustomerRelations;
use App\Traits\Customer\HasCustomerScopes;
use App\Traits\Customer\HasCustomerStats;

class Customer extends Model
{
    use FormatsCustomerName,
        HasCustomerScopes,
        HasCustomerRelations,
        HasCustomerStats;

    protected $table = 'customers';

    protected $fillable = [
        'dpi',
        'nit',
        'full_name',
        'birthday',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];
}