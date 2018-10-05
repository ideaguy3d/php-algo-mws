<?php
/**
 * Created by PhpStorm.
 * User: julius
 * Date: 9/13/2018
 * Time: 11:17 AM
 */

use PHPUnit\Framework\TestCase;

class LoanOneTest extends TestCase
{
    /**
     * @depends
     */
    public function testLoanOfficerTitlesAreCorrect() {
        $this->markTestIncomplete('incomplete');
    }
    
    /**
     * @depends testLoanOfficerTitlesAreCorrect
     */
    public function testProgramHasStartedWithNoErrors() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testFilesHaveBeenDeletedAfterProgramCompletion() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testArrayHasBeenConvertedToCsv() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testCsvHasBeenConvertedToAnArray() {
        $this->markTestIncomplete('incomplete');
    }
}