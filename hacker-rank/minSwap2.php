<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/14/2018
 * Time: 11:18 PM
 */

// output number of swaps to sort arr

$input1 = [1, 3, 5, 2, 4, 6, 8];

minimumSwap($input1);

function minimumSwap (array $a): int {
    // get reference to how the sorted array should look
    $aCopy = $a;
    sort($aCopy);

    for ($i = 0, $sortedIdx = 0; $i < count($a); $i++) {
        $rec = $a[$i];
        $sortedRefRec = $aCopy[$sortedIdx];
        // check if cur $rec is already smallest int in arr
        if($rec === $sortedRefRec) {
            $sortedIdx++;
            continue;
        }
        // INNER LOOP :(
        for($i2 = $i + 1; $i2 < (count($a) - $i); $i2++) {
            $rec2 = $a[$i2];
            if($rec2 < $rec) {
                break;
            }
        }
    }

    return 1;
}







//