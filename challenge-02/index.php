<?php
function noIterate($strArr)
{
    $N = $strArr[0];
    $K = $strArr[1];
    $need = [];
    for ($i = 0, $lenK = strlen($K); $i < $lenK; $i++) {
        $char = $K[$i];
        $need[$char] = ($need[$char] ?? 0) + 1;
    }
    $missing = array_sum($need);
    $left = 0;
    $minLen = PHP_INT_MAX;
    $minSubstr = '';
    $windowCounts = [];
    for ($right = 0, $lenN = strlen($N); $right < $lenN; $right++) {
        $c = $N[$right];
        if (isset($need[$c])) {
            $windowCounts[$c] = ($windowCounts[$c] ?? 0) + 1;
            if ($windowCounts[$c] <= $need[$c]) {
                $missing--;
            }
        }
        while ($missing === 0) {
            $windowLen = $right - $left + 1;
            if ($windowLen < $minLen) {
                $minLen = $windowLen;
                $minSubstr = substr($N, $left, $windowLen);
            }
            $leftChar = $N[$left];
            if (isset($need[$leftChar])) {
                $windowCounts[$leftChar]--;
                if ($windowCounts[$leftChar] < $need[$leftChar]) {
                    $missing++;
                }
            }
            $left++;
        }
    }
    $strArr = $minSubstr;
    return $strArr;
}
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);