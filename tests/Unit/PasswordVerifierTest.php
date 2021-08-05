<?php

declare(strict_types=1);

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use TDD\PasswordValidator;
use TDD\Rules\EmptyRule;
use TDD\Rules\MinLength;
use TDD\Rules\MustHaveLowercaseRule;
use TDD\Rules\MustHaveNumberRule;
use TDD\Rules\MustHaveUppercaseRule;

class PasswordVerifierTest extends TestCase
{
    private const SHORT_PASSWORD = 'abcdefg';

    private const VALID_PASSWORD = 'abcd2fGh';

    private const PASSWORD_MISSING_UPPERCASE = 'abcdefghi';

    private const PASSWORD_MISSING_LOWERCASE = 'ABCDEFGH';

    private const PASSWORD_MISSING_NUMBER = 'ABCDeFGH';

    private const PASSWORD_WITH_AT_LEAST_3_RULES = 'Ab1';

    private const EMPTY_PASSWORD = '';

    private PasswordValidator $passwordVerifier;

    public function setUp(): void
    {
        $this->passwordVerifier = new PasswordValidator();
    }

    public function test_password_should_throw_exception_when_password_is_shorter_than_8_characters(): void
    {
        $result = $this->passwordVerifier->verify(self::SHORT_PASSWORD);
        self::assertContains(MinLength::class, $result['fails']);
    }


    public function test_password_should_not_throw_any_exception_when_password_is_valid(): void
    {
        $result = $this->passwordVerifier->verify(self::VALID_PASSWORD);
        $this->assertTrue($result['passes']);
    }

    public function test_password_should_throw_exception_when_password_is_empty(): void
    {
        $result = $this->passwordVerifier->verify(self::EMPTY_PASSWORD);
        self::assertContains(EmptyRule::class, $result['fails']);
    }

    public function test_password_should_throw_exception_when_password_doesnt_have_uppercase_letter(): void
    {
        $result = $this->passwordVerifier->verify(self::PASSWORD_MISSING_UPPERCASE);
        self::assertContains(MustHaveUppercaseRule::class, $result['fails']);
    }

    public function test_password_should_throw_exception_when_password_doesnt_have_lowercase_letter(): void
    {
        $result = $this->passwordVerifier->verify(self::PASSWORD_MISSING_LOWERCASE);
        self::assertContains(MustHaveLowercaseRule::class, $result['fails']);

    }

    public function test_password_should_throw_exception_when_password_doesnt_have_number(): void
    {
        $result = $this->passwordVerifier->verify(self::PASSWORD_MISSING_NUMBER);
        self::assertContains(MustHaveNumberRule::class, $result['fails']);
    }

    public function test_password_should_return_true_when_at_least_3_rules_passes(): void
    {
        $result = $this->passwordVerifier->verify(self::PASSWORD_WITH_AT_LEAST_3_RULES);
        self::assertTrue($result['passes']);
    }
}
