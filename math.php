<?php

Class Math
{
    public function divisor($n)
    {
        $rs = [];
        $c = floor($n / 2);

        for ($i = 1; $i <= $c; $i++) {
            if ($n % $i === 0) {
                $rs[] = $i;
            }
        }

        $rs[] = $n;

        return $rs;
    }

    public function isCompleteNumber($n)
    {
        if (array_sum($this->divisor($n)) / 2 === $n) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isPrimeNumber($n)
    {
        if (count($this->divisor($n)) === 2) {
            return true;
        } else {
            return false;
        }
    }

    public function getPNSmallerThan($n)
    {
        $rs = [];
        for ($i = 1; $i < $n; $i++) {
            if ($this->isPrimeNumber($i)) {
                $rs[] = $i;
            }
        }

        return $rs;
    }

    public function beki(array $nums)
    {
        $results = [];
        $bits    = [];
        $count   = count($nums);

        for ($j = 0; $j < pow(2, $count); $j++) {
            $_rs = [];
            $f = $j;
            for ($i = 0; $i < $count; $i++) {
                if ($f % 2 === 1) {
                    $_rs[] = $nums[$i];
                }
                $f = $f / 2;
            }
            $results[] = $_rs;
        }

        return $results;
    }
}
