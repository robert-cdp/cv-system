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
        $lowercaseWords = ['de', 'del', 'la', 'las', 'los', 'y'];

        $name = preg_replace('/[^\p{L}\s]/u', '', $name);
        $name = preg_replace('/\s+/', ' ', trim($name));

        return collect(explode(' ', $name))
            ->map(function ($word) use ($lowercaseWords) {
                $wordLower = mb_strtolower($word, 'UTF-8');

                if (in_array($wordLower, $lowercaseWords)) {
                    return $wordLower;
                }

                return mb_strtoupper(mb_substr($wordLower, 0, 1, 'UTF-8'), 'UTF-8')
                    . mb_substr($wordLower, 1, null, 'UTF-8');
            })
            ->implode(' ');
    }
}
