<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/8/2018
 * Time: 2:53 PM
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class NinjaStackTest extends TestCase
{
    public function testPushAndPop(): void {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'red ninja');
        $this->assertSame('red ninja', $stack[(count($stack) - 1)]);
        $this->assertSame(1, count($stack));

        $this->assertSame('red ninja', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
}