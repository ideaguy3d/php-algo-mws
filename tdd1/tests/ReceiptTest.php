<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/25/2018
 * Time: 2:49 AM
 */

use PHPUnit\Framework\TestCase;


class ReceiptTest extends TestCase
{
    private $Formatter;
    private $Receipt;

    function setUp() {
        $this->Formatter = $this->getMockBuilder('TDD\Receipt')
            ->setMethods('currencyAmount')
    }

    function testSubTotalSumsGivenDataSetCorrectly() {

    }
}