<?php

function findPoint($strArr)
{
    $arr1   = array_map('intval', array_map('trim', explode(',', $strArr[0])));
    $arr2   = array_map('intval', array_map('trim', explode(',', $strArr[1])));
    $common = array_intersect($arr1, $arr2);

    if (empty($common)) {
        $strArr = 'false';
    } else {
        sort($common, SORT_NUMERIC);
        $strArr = implode(',', $common);
    }

    return $strArr;
}

echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
