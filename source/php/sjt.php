<?php

if ($argc < 2) {
    die("Usage: php sjt.php <n>\n\n(n=size of input array)\n");
}

$n = $argv[1];
if ($n < 0) {
    $n = 0;
}

function perms($callback, ...$elements) {
    $perm = array_map(function($e) { return [$e, -1]; }, $elements);
    $perm[0][1] = 0;

    $sign = 1;
    while (true) {
        $callback($sign, array_map(function($e) { return $e[0]; }, $perm));
        $sign *= -1;

        $chosen = -1;
        $index = -1;
        foreach ($perm as $i => $p) {
            if ($p[1] && $p[0] > $chosen) {
                $chosen = $p[0];
                $index = $i;
            }
        }
        if ($index == -1) {
            return;
        }

        $direction = $perm[$index][1];
        $next = $index + $direction;

        $temp = $perm[$index];
        $perm[$index] = $perm[$next];
        $perm[$next] = $temp;

        if ($next <= 0 || $next >= count($perm) - 1) {
            $perm[$next][1] = 0;
        } elseif ($perm[$next + $direction][0] > $chosen) {
            $perm[$next][1] = 0;
        }

        for ($i = 0; $i < $next; $i++) {
            if ($perm[$i][0] > $chosen) {
                $perm[$i][1] = 1;
            }
        }
        for ($i = $next + 1; $i < count($perm); $i++) {
            if ($perm[$i][0] > $chosen) {
                $perm[$i][1] = -1;
            }
        }
    }
}

$count = 0;

try {
    $start = hrtime(true);
   
    perms(function($sign, ...$perm) use (&$count) {
        // echo "[" . implode(", ", $perm[0]) . "]" . PHP_EOL;
        // echo $sign < 0 ? " => -1\n" : " => +1\n";
        $count++;
    }, ...range(1, $n));
    $end = hrtime(true);
    $elapsedTime = ($end - $start) / 1e9;
    echo "SJT: " . $count . " permutations in $elapsedTime seconds\n";
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
