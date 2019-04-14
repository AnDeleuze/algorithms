<?php

// 点集合Pに対して、凸包を計算する
//

class Vector {
    public $x;
    public $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function positionCss() {
        return "bottom:{$this->y}px; left: {$this->x}px;";
    }
}

class Field {

    public $dots;
    private $side_length = 600;

    public function __construct(int $n = 3) {
        for ($i = 0; $i < $n; $i++) {
            $p[$i] = new Vector(rand(0, $this->side_length), rand(0, $this->side_length));
        }
    
        $this->dots = $p;
    }


    public function show_hull()
    {
        $p = $this->dots;
        $inside_points = [];
        foreach ($p as $i => $p_i) {
            $q = $p;
            unset($q[$i]);
    
            foreach ($q as $j => $q_j) {
                $r = $p;
                unset($r[$i]);
                unset($r[$j]);
    
                foreach ($r as $k => $r_k) {
                    $s = $p;
                    unset($s[$i]);
                    unset($s[$j]);
                    unset($s[$k]);
    
                    foreach ($s as $l => $s_l) {
                        /* $l が (i, j, k) に含まれる */
                        if (Operator::is_inside_triangle($s_l, $p_i, $q_j, $r_k)) {
                            // この点lは、 内部点                   
                            $inside_points[] = $l;
                        }
                    }
                } 
            }
        }

        foreach ($inside_points as $x) {
            unset($p[$x]);
        }

        return $p;
    }
}

class Operator {
    static public function cross_product(Vector $v0, Vector $v1, Vector $v2) {
        return ($v0->y - $v1->y) * ($v0->x - $v2->x) - ($v0->x - $v1->x) * ($v0->y - $v2->y);
    }

    static public function is_inside_triangle($x, $a, $b, $c): bool
    {
        $cross1 = self::cross_product($x, $a, $b) < 0;
        $cross2 = self::cross_product($x, $b, $c) < 0;
        $cross3 = self::cross_product($x, $c, $a) < 0;
        if ($cross1 === $cross2 && $cross2 === $cross3) {
            return true;
        }
        return false;
    }
}


$p = new Field(10);
$insides = $p->show_hull();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<style>
.box {
    height: 600px;
    width: 600px;
    position: relative;
    margin: 20px auto;
    border: 1px solid #000;
}
.dot {
    content: '.';
    display: inline-block;
    height: 5px;
    width: 5px;
    position: absolute;
    border-radius: 50%;
    background-color: #000;
}
.red {
    background-color: red;
}
</style>
</head>
<body>
<div class="box" style="">
    <?php foreach ($p->dots as $i => $v): ?> 
    <?php if (!in_array($v, $insides)): ?>
        <span class="dot" style="<?= $v->positionCss() ?>"></span>
    <?php else: ?>
        <span class="dot red" style="<?= $v->positionCss() ?>"></span>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
</body>
</html>
