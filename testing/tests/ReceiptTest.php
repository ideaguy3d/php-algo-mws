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

    public function testTax() {
        $inputAmount = 10.00;
        $inputTax = 0.10;
        $output = $this->Receipt->tax($inputAmount, $inputTax);
        $this->assertEquals(1.00, $output, 'The tax calculation should equal 1.00');
    }

    public function testTotal() {
        $inputItems = [0, 2, 5, 8];
        $coupon = null;
        $output = $this->Receipt->total($inputItems, $coupon);
        $this->assertEquals(15, $output, 'total should be 15 given inupt');
    }
}
