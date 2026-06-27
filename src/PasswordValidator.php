<?php

declare(strict_types=1);

namespace App;

final class PasswordValidator
{
    private const EXPECTED_PASSWORD = 'Th15_15_5TR0n6';
    private const EXPECTED_SECRET = '1352';

    public function isValid(string $password, string $secret, string $firstName): bool
    {
        return hash_equals(self::EXPECTED_PASSWORD, $password)
            && hash_equals(self::EXPECTED_SECRET, $secret)
            && trim($firstName) !== '';
    }
}
