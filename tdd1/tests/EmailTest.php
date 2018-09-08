<?php
/**
 * Created by PhpStorm.
 * User: julius
 * Date: 9/7/2018
 * Time: 6:41 PM
 */

declare(strict_types=1);

use TDD\JhaEmail;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress(): void {
        $this->assertInstanceOf(
            JhaEmail::class,
            JhaEmail::fromString('julius@mail.com'));
    }

    public function testCannotBeCreatedFromInvalidEmail(): void {
        $this->expectException(InvalidArgumentException::class);
        JhaEmail::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void {
        $this->assertEquals(
            'julius@mail.com',
            JhaEmail::fromString('julius@mail.com')
        );
    }
}