<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/2/2019
 * Time: 10:41 PM
 *
 * Practicing magic method __call()
 *
 */

class CleverString
{
    private $_theString = '';
    private static $_allowedFunctions = ['strlen', 'strtoupper', 'strpos'];

    public function setString(string $stringVal): void {
        $this->_theString = $stringVal;
    }

    public function getString() {
        return $this->_theString;
    }

    public function __call($methodName, $arguments) {
        if(in_array($methodName, CleverString::$_allowedFunctions)) {
            array_unshift($arguments, $this->_theString);
            return call_user_func_array($methodName, $arguments);
        }
        else {
            exit("\nMethod CleverString::$methodName does not exist\n");
        }
    }
}

echo "\n-------------------\n";

echo 14 | 3;

echo "\n-------------------\n";

$myString = new CleverString();
$myString->setString('ello ^_^');
echo $myString->getString() . "\n";
echo $myString->strlen() . "\n";
echo $myString->strtoupper() . "\n";
echo $myString->strpos('l') . "\n";



//