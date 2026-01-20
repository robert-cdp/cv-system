<?php

namespace App\Traits\Customer;

use App\Models\Customer\Contact;
use App\Models\Customer\CustomerService;

trait HasCustomerRelations
{
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function services()
    {
        return $this->hasMany(CustomerService::class)->latest('created_at');
    }
}
