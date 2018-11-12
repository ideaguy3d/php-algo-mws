<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Fibonacci sequence using recursion</title>

    <style type="text/css">
        th {
            text-align: left;
            background-color: #999;
        }

        th, td {
            padding: 0.4em;
        }

        tr.alt td {
            background: #ddd;
        }
    </style>
</head>


<body>
<h2>Fibonacci Recursion practice</h2>

<table style="width: 20em; border: 1px solid #80848c;">
    <tr>
        <th>Sequence #</th>
        <th>Value</th>
    </tr>
<?php
    $recursions = 10;
    function Fibonacci (int $n): int {
        if($n === 0 || $n === 1) {
            return $n;
        }
        return Fibonacci($n - 2) + Fibonacci($n - 1);
    }

    for ($i = 0; $i < $recursions; $i++) {
?>
    <tr <?php if($i % 2 != 0) echo 'class="alt"' ?>>
        <td> Sequence = <?php echo $i ?> </td>
        <td> <?php echo Fibonacci($i) ?> </td>
    </tr>
<?php } ?>
</table>


</body>
</html>

