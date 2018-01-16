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
    public function boubleSort(array $nums)
    {
        $c    = count($nums);
        $data = new Data();

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

    public function quickSort(array &$nums, $b, $a = 0)
    {
        if ($b <= $a) { return $nums; }
        $pivot = $nums[$a];
        $left  = [];
        $right = [];

        for ($low = $a, $top = $b; $low < $top;) {
            while ($low <= $top && $nums[$low] <= $pivot) { $low++; }
            while ($low <= $top && $nums[$top] > $pivot) { $top--; }

            if ($low < $top) {
                $temp = $nums[$low];
                $nums[$low] = $nums[$top];
                $nums[$top] = $temp;
            }
        }

        $temp = $nums[$a];
        $nums[$a] = $nums[$top];
        $nums[$top] = $temp;

        $this->quickSort($nums, $top - 1, $a);
        $this->quickSort($nums, $b, $top + 1);
    }
}
?>
