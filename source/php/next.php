<?php

//ini_set('xdebug.max_nesting_level', 100);
ini_set('xdebug.max_nesting_level', -1);
// ini_set('memory_limit', '256M');
ini_set('memory_limit', '4096M');

if ($argc < 2) {
    die("Usage: php sjt.php <n>\n\n(n=size of input array)\n");
}

$n = $argv[1];
if ($n < 0) {
    $n = 0;
}

function pc_next_permutation($p, $size)
{
    // slide down the array looking for where we're smaller than the next guy
    for ($i = $size - 1; $p[$i] >= $p[$i + 1]; --$i) {
    }

    // if this doesn't occur, we've finished our permutations
    // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1)
    if ($i == -1) {
        return false;
    }

    // slide down the array looking for a bigger number than what we found before
    for ($j = $size; $p[$j] <= $p[$i]; --$j) {
    }

    // swap them
    $tmp = $p[$i];
    $p[$i] = $p[$j];
    $p[$j] = $tmp;

    // now reverse the elements in between by swapping the ends
    for (++$i, $j = $size; $i < $j; ++$i, --$j) {
        $tmp = $p[$i];
        $p[$i] = $p[$j];
        $p[$j] = $tmp;
    }

    return $p;
}

$size = $n - 1;
$perm = range(0, $size);
$j = 0;
$count = 0;

try {
    $start = hrtime(true);
    do {
        $count++;
        // echo "[" . implode(", ", $perm) . "]" . PHP_EOL;
    } while ($perm = @pc_next_permutation($perm, $size) and ++$j);
    $end = hrtime(true);
    $elapsedTime = ($end - $start) / 1e9;
    echo "NEXT: " . $count . " permutations in $elapsedTime seconds\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
