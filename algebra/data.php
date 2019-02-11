<?php

class Data
{
    public function pop(array &$nums)
    {
        $n = null;
        //TODO 連想配列が入ってきたときの処理
        $nums = array_values($nums);

        if (!empty($nums)) {
            $max_index = count($nums) - 1;
            $n         = $nums[$max_index]; 
            unset($nums[$max_index]);
        }
        return $n;
    }

    public function shift(array &$nums)
    {
        $n = null;
        $nums = array_values($nums);

        if (!empty($nums)) {
            $n = $nums[0];
            unset($nums[0]);
            $nums = array_values($nums);
        }

        return $n;
    }

    public function push(array &$nums, $n)
    {
        $nums = array_values($nums);

        $nums[] = $n;
        return $nums;
    }

    public function unshift(array &$nums, $n)
    {
        $results   = [];
        $results[] = $n;

        foreach ($nums as $num) {
            $results[] = $num;
        }

        $nums = $results;
        return $nums;
    }

    public function reverse(array $nums)
    {
        $results = [];
        $c = count($nums);
        for ($i = 0; $i < $c; $i++) {
            $results[] = $this->pop($nums);
        }
        return $results;
    }
}
