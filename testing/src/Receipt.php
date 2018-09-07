<?php

namespace TDD;

use \BadMethodCallException;

class Receipt
{
    /**
     * @param array $items
     * @param float $coupon
     * @return float|int
     */
    public function total(array $items, $coupon) {
        if($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be < 1.00');
        }
        $sum = array_sum($items);
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }

    /**
     * @param float $amount
     * @param float $tax
     * @return float|int
     */
    public function tax($amount, $tax) {
        return ($amount * $tax);
    }

    public function currencyAmount($input) {
        // do additional processing then round
        return round($input, 2);
    }

    /**
     * @param array $items
     * @param float $tax
     * @param float $coupon
     * @return float|int
     */
    public function postTaxTotal($items, $tax, $coupon) {
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}

//$r = new Receipt();
//echo "\r\npostTaxTotal =\n\r";
//echo $r->postTaxTotal([1, 2, 5, 8], 0.20, null);
//echo "\n\rarray_sum() = " . array_sum([1, 2, 5, 8]);