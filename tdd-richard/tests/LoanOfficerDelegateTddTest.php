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
     * Call protected/private method of a class.
     * Got this function from:
     * https://jtreminio.com/blog/unit-testing-tutorial-part-iii-testing-protected-private-methods-coverage-reports-and-crap/
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = []) {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
    
    /**
     *
     */
    public function testCsvFileExistsInFolder() {
        $this->assertStringMatchesFormat('%s', $this->LoanOfficerDelegate->loanOfficerFile,
            "There is not a CSV file in {$this->absPathForTestLoanOfficerInfo}");
        
        return true;
    }
    
    /**
     * @param bool $csvFile - bool value indicating there was a CSV file
     * @covers \Ninja\LoanOfficerDelegateTdd->loanOfficerInfoCsvTransform
     * @depends testCsvFileExistsInFolder - should return true if there was a file in the required directory
     */
    public function testLoanOfficerCsvGetsTransformedToAnArray(bool $csvFile) {
        if($csvFile) {
            $this->assertTrue($this->LoanOfficerDelegate->loanOfficerInfoCsvTransform(),
                "The loan officer info CSV was not transformed to an array");
        }
    }
    
    /**
     * Don't really know how I should test this because loan officers' titles
     * are variables determined during the apps' runtime
     *
     *
     */
    public function testLoanOfficerTitlesAreCorrect() {
        $this->markTestIncomplete('incomplete');
    }
    
    /**
     *
     */
    public function testExceptionIsRaisedIfExportFolderDoesNotExists() {
        $this->markTestIncomplete('incomplete');
    }
    
    public function testProgramHasStartedWithNoErrors() {
        $this->markTestIncomplete('incomplete');
        
//        $this->assertTrue($this->LoanOfficerDelegate->runLoanOfficerDelegate(),
//            "\n\n__>> The main container function for 'class LoanOfficerDelegate{}' failed.\n\n"
//        );
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