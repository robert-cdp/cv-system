<?php

namespace App\Models\Customer;

use App\Models\Service\Service;
use App\Models\Tramite\Tramite;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    protected $table = 'customer_services';

    protected $fillable = [
        'customer_id',
        'service_id',
        'service_type',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tramite()
    {
        return $this->hasOne(Tramite::class, 'customer_service_id');
    }

    /**
     * (Opcional) Relación con la tabla de hostings (si tienes ese modelo).
     */
    // public function hosting()
    // {
    //     return $this->hasOne(CustomerHosting::class, 'customer_service_id');
    // }
}
