<?php

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/24/2018
 * Time: 4:09 PM
 */

namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase
{
    public function setUp() {
        $this->Receipt = new Receipt();
    }


    public function tearDown() {
        unset($this->Receipt);
    }

    /**
     * @dataProvider provideSubtotal
     * @param array $items
     * @param int $expected
     */
    public function testSubtotal($items, $expected) {
        $coupon = null;
        $output = $this->Receipt->subtotal($items, $coupon);
        $this->assertEquals(
            $expected,
            $output,
            "When summing the total with out coupon, should equal {$expected}"
        );
    }

    public function provideSubtotal() {
        return [
            "ints totaling 16" => [[1, 2, 5, 8], 16],
            "negative int" => [[-1, 2, 5, 8], 14],
            "3 ints totaling 11" => [[1, 2, 8], 11],
        ];
    }

    public function testSubtotalAndCoupon() {
        $input = [0, 2, 5, 8];
        $coupon = 0.20;
        $output = $this->Receipt->subtotal($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            "When summing the total with coupon, should equal 12"
        );
    }

    public function testSubtotalException() {
        $input = [0, 2, 5, 8];
        $coupon = 1.20;
        $this->expectException('BadMethodCallException');
        $this->Receipt->subtotal($input, $coupon);
    }
    
    // this is a mock
    public function testPostTaxTotal() {
        $items = [1, 2, 5, 8];
        $tax = 0.20;
        $coupon = null;
        
        // Setup the Mock
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax', 'subtotal'])
            ->getMock();
        
        // Invoke the total method
        $Receipt->expects($this->once())
            ->method('subtotal')
            ->with($items, $coupon)
            ->will($this->returnValue(16.00));
        // Invoke the tax method
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(16.00, $tax)
            ->will($this->returnValue(3.20));
        
        // This method invokes the prior 2 methods in the actual class
        $result = $Receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
        $this->assertEquals(19.20, $result);
    }

    public function testTax() {
        $amount = 10;
        $tax = 0.2;
        $output = $this->Receipt->tax($amount, $tax);
        $this->assertEquals(2, $output, 'should equal 12 when testing tax');
    }

    /**
     * @dataProvider provideCurrencyAmount
     * @param $input
     * @param $expected
     * @param $msg
     * @return void
     */
    public function testCurrencyAmount($input, $expected, $msg) {
        $this->assertSame(
            $expected,
            $this->Receipt->currencyAmount($input),
            $msg
        );
    }

    public function provideCurrencyAmount() {
        return [
            [1, 1.00, '1 should be transformed to 1.00'],
            [1.1, 1.10, '1.1 should be transformed to 1.10'],
            [1.11, 1.11, '1.11 should stay as 1.11'],
            [1.111, 1.11, '1.111 should become 1.11']
        ];
    }
}

