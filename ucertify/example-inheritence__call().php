<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/14/2019
 * Time: 12:52 PM
 */

class Calculator1
{
    protected $_val1, $_val2;

    public function __construct($val1, $val2) {
        $this->_val1 = $val1;
        $this->_val2 = $val2;
    }

    public function add() {
        return $this->_val1 + $this->_val2;
    }

    public function subtract() {
        return $this->_val1 - $this->_val2;
    }

    public function multiply() {
        return $this->_val1 * $this->_val2;
    }

    public function divide() {
        return $this->_val1 / $this->_val2;
    }
}

class CalcAdvanced extends Calculator1
{
    // the int value is how many params the function needs
    private static $_allowedFunctions = array("pow" => 2, "sqrt" => 1, "exp" => 1);

    public function __construct($val1, $val2 = null) {
        parent::__construct($val1, $val2);
    }

    public function __call($methodName, $arguments) {
        if (in_array($methodName, array_keys(CalcAdvanced::$_allowedFunctions))) {
            $functionArguments = array($this->_val1);

            if (CalcAdvanced::$_allowedFunctions[$methodName] == 2) {
                array_push($functionArguments, $this->_val2);
            }

            return call_user_func_array($methodName, $functionArguments);
        }
        else {
            exit ("<p>Method 'CalcAdvanced::$methodName' doesn't exist</p>");
        }
    }
}

$ca = new CalcAdvanced(3, 4);

echo "<p>3 + 4 = " . $ca->add() . "</p>";
echo "<p>3 - 4 = " . $ca->subtract() . "</p>";
echo "<p>3 * 4 = " . $ca->multiply() . "</p>";
echo "<p>3 / 4 = " . $ca->divide() . "</p>";
echo "<p>pow( 3, 4 ) = " . $ca->pow() . "</p>";
echo "<p>sqrt( 3 ) = " . $ca->sqrt() . "</p>";
echo "<p>exp( 3 ) = " . $ca->exp() . "</p>";










//