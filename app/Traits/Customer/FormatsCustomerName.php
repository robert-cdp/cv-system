<?php

namespace App\Traits\Customer;

use Illuminate\Support\Str;

trait FormatsCustomerName
{
    protected static function bootFormatsCustomerName()
    {
        static::creating(function ($customer) {
            $customer->full_name = self::formatName($customer->full_name);
        });

        static::updating(function ($customer) {
            if ($customer->isDirty('full_name')) {
                $customer->full_name = self::formatName($customer->full_name);
            }
        });
    }

    protected static function formatName(string $name): string
    {
        return collect(explode(' ', strtolower(trim($name))))
            ->filter()
            ->map(fn ($word) => Str::ucfirst($word))
            ->implode(' ');
    }
}