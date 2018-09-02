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

    public function testTotal() {
        $input = [0, 2, 5, 8];
        $coupon = null;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            15,
            $output,
            "When summing the total with out coupon, should equal 15"
        );
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
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax', 'total'])
            ->getMock();

        $Receipt->method('total')
            ->will($this->returnValue(10.00));

       $Receipt->method('tax')
           ->will($this->returnValue(1.00));

       $result = $Receipt->postTaxTotal([1,2,5,8], 0.20, null);

       $this->assertEquals(11.00, $result);
    }

    public function testTax() {
        $amount = 10;
        $tax = 0.2;
        $output = $this->Receipt->tax($amount, $tax);
        $this->assertEquals(2, $output, 'should equal 12 when testing tax');
    }
}

