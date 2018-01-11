<?php
function equal($x, $y) {
    if ($x == $y) {
        return true;
    } else {
        return false;
    }
}

function theBigger($x, $y) {
    if ($y < $x) {
        return $x;
    } elseif ($x < $y) {
        return $y;
    } else {
        return false;
    }
}

function theSmaller($x, $y) {
    if ($x < $y) {
        return $x;
    } elseif ($y < $x) {
        return $y;
    } else {
        return false;
    }
}
?>
