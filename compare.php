<?php

class Compare
{
    public function equal($x, $y)
    {
        if ($x == $y) {
            return true;
        } else {
            return false;
        }
    }

    public function theBigger($x, $y)
    {
        if ($y < $x) {
            return $x;
        } elseif ($x < $y) {
            return $y;
        } else {
            return false;
        }
    }

    public function theSmaller($x, $y)
    {
        if ($x < $y) {
            return $x;
        } elseif ($y < $x) {
            return $y;
        } else {
            return false;
        }
    }

    /**
     * bouble sort
     * @param array
     */
    public function sortArray(array $nums)
    {
        $results = [];
        $c       = count($nums);
        $data    = new Data();

        for ($i = 0; $i < $c; $i++) {
            for ($j = $c - 1; $j > $i; $j--) {
                if ($this->theBigger($nums[$j], $nums[$j - 1]) === $nums[$j - 1]) {
                    $t = $nums[$j];
                    $nums[$j] = $nums[$j - 1];
                    $nums[$j - 1] = $t;
                }
            }
        }

        return $nums;
    }
}
?>
