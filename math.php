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
                $rs[] = $i;;
            }
        }

        return $rs;
    }
}
