<?php

namespace App\Traits\Tramite;

use Illuminate\Support\Facades\Crypt;

trait EncryptsTramiteFields
{
    protected static function bootEncryptsTramiteFields()
    {
        static::saving(function ($tramite) {
            self::encryptFields($tramite);
        });
    }

    protected static function encryptFields($tramite): void
    {
        foreach (self::encryptedFields() as $field) {
            $value = $tramite->{$field};

            if (empty($value)) {
                continue;
            }

            if (self::isEncrypted($value)) {
                continue;
            }

            $tramite->{$field} = Crypt::encryptString($value);
        }
    }

    protected static function encryptedFields(): array
    {
        return [
            'email',
            'password',
            'field_additional_1',
            'field_additional_2',
        ];
    }

    protected static function isEncrypted(string $value): bool
    {
        return str_starts_with($value, 'eyJpdiI6');
    }


    public function getEmailDecryptedAttribute(): ?string
    {
        return $this->decryptField($this->email);
    }

    public function getPasswordDecryptedAttribute(): ?string
    {
        return $this->decryptField($this->password);
    }

    protected function decryptField(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        if (!str_starts_with($value, 'eyJpdiI6')) {
            return $value;
        }

        try {
            $decrypted = Crypt::decryptString($value);
        } catch (\Throwable) {
            try {
                $decrypted = Crypt::decrypt($value);
            } catch (\Throwable) {
                return $value; 
            }
        }

        if (is_string($decrypted) && str_starts_with($decrypted, 's:')) {
            try {
                $decrypted = unserialize($decrypted);
            } catch (\Throwable) {
                return $value;
            }
        }

        return $decrypted;
    }

}
