<?php
//ini_set('xdebug.max_nesting_level', 100);
ini_set('xdebug.max_nesting_level', -1);
// ini_set('memory_limit', '256M');
ini_set('memory_limit', '4096M');


if ($argc < 3) {
    die("Usage: php perm.php  <R|I> <n>\nR=Recursive, I=Iterative\nn=size of input array)");
}

$mode = strtoupper($argv[1]);
if ($mode !== "I"&& $mode !== "R") {
    die("invalid value, must be <R> or <I>");
}

$n = $argv[2];
if ($n < 0) {
    $n = 0;
}

$array = array();
for ($i = 0; $i < $n; $i++) {
    $array[] = $i;
}

// echo "Input: [" . implode(", ", $array) . "]\n";

if ($mode === "I") {
    $perm = 'permRec';
} elseif ($mode === 'R') {
    $perm = 'permIt';
} else {
    die();
}

try {
    $start = hrtime(true);
    $result = $perm($array);
    $end = hrtime(true);
    $elapsedTime = ($end - $start) / 1e9;
    echo "$mode: " . count($result) . " permutations in $elapsedTime seconds\n";
} catch (Exception $e) {
    echo $e->getMessage();
}


function permRec($array)
{
    if (count($array) <= 1) {
        return [$array];
    }
    $result = [];
    foreach ($array as $key => $element) {
        foreach (permRec(array_diff_key($array, [$key => $element])) as $perm) {
            $result[] = array_merge([$element], $perm);
        }
    }
    return $result;
}

function permIt($array)
{
    $result = [];
    $count = count($array);
    $c = array_fill(0, $count, 0);
    $result[] = $array;

    $i = 0;
    while ($i < $count) {
        if ($c[$i] < $i) {
            if ($i % 2 == 0) {
                $temp = $array[0];
                $array[0] = $array[$i];
                $array[$i] = $temp;
            } else {
                $temp = $array[$c[$i]];
                $array[$c[$i]] = $array[$i];
                $array[$i] = $temp;
            }

            $result[] = $array;
            $c[$i]++;
            $i = 0;
        } else {
            $c[$i] = 0;
            $i++;
        }
    }
    return $result;
}
