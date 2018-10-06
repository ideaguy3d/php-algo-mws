<?php
/**
 * Created by PhpStorm.
 * User: julius
 * Date: 9/13/2018
 * Time: 11:17 AM
 */

use Ninja\LoanOfficerDelegateTdd;
use PHPUnit\Framework\TestCase;

class LoanOfficerDelegateTddTest extends TestCase
{
    private $absPathForTestLoanOfficerInfo = 'C:\xampp\htdocs\php-sql\tdd-richard\loanOfficersInfo';
    private $absPathForTestRawData = 'C:\xampp\htdocs\php-sql\tdd-richard\loanOfficersRawData';
    private $absPathForExportFolder = 'C:\xampp\htdocs\php-sql\tdd-richard\loanOfficerComplete';
    private $LoanOfficerDelegate;
    
    public function setUp() {
        $this->LoanOfficerDelegate = new LoanOfficerDelegateTdd(
            $this->absPathForTestLoanOfficerInfo,
            $this->absPathForTestRawData,
            $this->absPathForExportFolder,
            false
        );
    }
    
    public function tearDown() {
        unset($this->LoanOfficerDelegate);
    }
    
    /**
     * Don't really know how I should test this because loan officers' titles
     * are variables determined during the apps' runtime
     *
     * @depends
     */
    public function testLoanOfficerTitlesAreCorrect() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testExportFolderExists() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testProgramHasStartedWithNoErrors() {
        // $this->markTestIncomplete('incomplete');
        
        $this->assertTrue($this->LoanOfficerDelegate->runLoanOfficerDelegate(),
            "\n\n__>> The main container function for 'class LoanOfficerDelegate{}' failed.\n\n"
        );
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
    
    
    
} // END OF: class LoanOfficerDelegateTddTest{}