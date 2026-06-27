<?php

declare(strict_types=1);

namespace Tests;

use App\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    private PasswordValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new PasswordValidator();
    }

    public function testAcceptsCorrectFormData(): void
    {
        self::assertTrue($this->validator->isValid('Th15_15_5TR0n6', '1352', 'Mikolaj'));
    }

    public function testRejectsWrongPassword(): void
    {
        self::assertFalse($this->validator->isValid('wrong-password', '1352', 'Mikolaj'));
    }

    public function testRejectsWrongSecret(): void
    {
        self::assertFalse($this->validator->isValid('Th15_15_5TR0n6', '0000', 'Mikolaj'));
    }

    public function testRejectsEmptyFirstName(): void
    {
        self::assertFalse($this->validator->isValid('Th15_15_5TR0n6', '1352', ''));
        self::assertFalse($this->validator->isValid('Th15_15_5TR0n6', '1352', '   '));
    }
}
