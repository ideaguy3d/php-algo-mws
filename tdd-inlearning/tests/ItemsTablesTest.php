<?php
/**
 * Created by PhpStorm.
 * User: julius
 * Date: 9/7/2018
 * Time: 5:47 PM
 */

namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\ItemsTable;
use PDO;

class ItemsTableTest extends TestCase
{
    private $PDO;
    private $ItemsTable;
    private $testStatus;
    
    public function setUp() {
        $this->testStatus = "Test Status was initialized in the fixture.";
    }
    
    public function testDatabaseConnectionCanBeMade(): bool {
        try {
            $this->PDO = $this->getConnection();
            $this->assertEquals(true, isset($this->PDO),
                'A connection to the db should have been made');
            $this->createTable();
            $this->populateTable();
            echo "\ntest status: {$this->testStatus}\n";
            return true;
        }
        catch(\Exception $e) {
            return false;
        }
    }
    
    public function testAnInstanceOfItemsTableWasCreated() {
        $this->ItemsTable = new ItemsTable($this->PDO);
        $this->assertEquals(true, isset($this->ItemsTable),
            'an ItemsTable instance should have been created');
    }
    
    public function tearDown() {
        unset($this->ItemsTable);
        unset($this->PDO);
    }
    
    public function testFindForId() {
        $id = 1;
        
        $result = $this->ItemsTable->findForId($id);
        $this->assertInternalType(
            'array',
            $result,
            'The result should always be an array.'
        );
        $this->assertEquals(
            $id,
            $result['id'],
            'The id key/value of the result for id should be equal to the id.'
        );
        $this->assertEquals(
            'Candy',
            $result['name'],
            'The id key/value of the result for name should be equal to `Candy`.'
        );
    }
    
    /**
     * @param bool $connectionSucceeded - simple boolean to make sure db connection was made from this functions dependency
     *
     * @depends testDatabaseConnectionCanBeMade
     */
    public function testFindForIdMock(bool $connectionSucceeded) {
        $id = 1;
        
        if($connectionSucceeded) {
            $PDOStatement = $this->getMockBuilder('\PDOStatement')
                                 ->setMethods(['execute', 'fetch'])
                                 ->getMock();
            
            $PDOStatement->expects($this->once())
                         ->method('execute')
                         ->with([$id])
                         ->will($this->returnSelf());
            $PDOStatement->expects($this->once())
                         ->method('fetch')
                         ->with($this->anything())
                         ->will($this->returnValue('canary'));
            
            $PDO = $this->getMockBuilder('\PDO')
                        ->setMethods(['prepare'])
                        ->disableOriginalConstructor()
                        ->getMock();
            
            $PDO->expects($this->once())
                ->method('prepare')
                ->with($this->stringContains('SELECT * FROM'))
                ->willReturn($PDOStatement);
            
            $ItemsTable = new ItemsTable($PDO);
            
            $output = $ItemsTable->findForId($id);
            
            $this->assertEquals(
                'canary',
                $output,
                'The output for the mocked instance of the PDO and PDOStatment should produce the string `canary`.'
            );
        }
    }
    
    protected function getConnection() {
        return new PDO('sqlsrv:Database=NINJA;server=192.168.6.26\MHDATA',
            'mhetaV1', 'mhetaV!'
        );
    }
    
    protected function createTable() {
        $query = /** @lang MySQL */
            "
            CREATE TABLE `items` (
                `id`	INTEGER,
                `name`	TEXT,
                `price`	REAL,
                PRIMARY KEY(`id`)
            );
		";
        $this->PDO->query($query);
    }
    
    protected function populateTable() {
        $query = /** @lang MySQL */
            "
            INSERT INTO `items` VALUES (1,'Candy',1.00);
            INSERT INTO `items` VALUES (2,'TShirt',5.34);
		";
        $this->PDO->query($query);
    }
}