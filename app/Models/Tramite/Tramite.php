<?php

namespace App\Models\Tramite;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\CustomerService;
use App\Traits\Tramite\EncryptsTramiteFields;

class Tramite extends Model
{
    use EncryptsTramiteFields;

    protected $table = 'customer_tramites';

    protected $fillable = [
        'customer_service_id',
        'email',
        'password',
        'field_additional_1',
        'field_additional_2',
        'status',
        'comment',
    ];

    public function customerService()
    {
        return $this->belongsTo(CustomerService::class, 'customer_service_id');
    }
}
