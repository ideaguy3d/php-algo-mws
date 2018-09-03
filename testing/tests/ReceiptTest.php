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
     * @dataProvider provideTotal
     */
    public function testTotal($items, $expected) {
        $coupon = null;
        $output = $this->Receipt->total($items, $coupon);
        $this->assertEquals(
            $expected,
            $output,
            "When summing the total with out coupon, should equal {$expected}"
        );
    }

    public function provideTotal() {
        return [
            [[1,2,5,8], 16],
            [[-1,2,5,8], 14],
            [[1,2,8], 11],
        ];
    }

    public function testTotalAndCoupon() {
        $input = [0, 2, 5, 8];
        $coupon = 0.20;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            "When summing the total with coupon, should equal 12"
        );
    }

    public function testPostTaxTotal() {
        $items = [1, 2, 5, 8];
        $tax = 0.20;
        $coupon = null;
        // setup the mock
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax', 'total'])
            ->getMock();
        // invoke the total method
        $Receipt->expects($this->once())
            ->method('total')
            ->with($items, $coupon)
            ->will($this->returnValue(16.00));
        // invoke the tax method
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(16.00, $tax)
            ->will($this->returnValue(3.20));
        // this method invokes the prior 2 methods
        $result = $Receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
        $this->assertEquals(19.20, $result);
    }

    public function testTax() {
        $amount = 10;
        $tax = 0.2;
        $output = $this->Receipt->tax($amount, $tax);
        $this->assertEquals(2, $output, 'should equal 12 when testing tax');
    }
}

