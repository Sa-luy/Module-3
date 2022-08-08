<?php
include('./Maytinh.php');
//Test case1
$objMayTinh = new MayTinh();
$yourOutPut = $objMayTinh->sum(2, 3);
$exectedOutPut = 5;
if ($yourOutPut == $exectedOutPut) {
    echo 'Passed<hr>';
} else {
    echo 'Failed<br>';
    
}
//testcase 2
$objMayTinh = new MayTinh();
$yourOutPut = $objMayTinh->sum(7, 3);
$exectedOutPut = 10;
if ($yourOutPut == $exectedOutPut) {
    echo 'Passed<hr>';
} else {
    echo 'Failed<br>';
}
//TC3
$objMayTinh = new MayTinh();
$yourOutPut = $objMayTinh->sum('', '');
$exectedOutPut = 0;
if ($yourOutPut == $exectedOutPut) {
    echo 'Passed<hr>';
} else {
    echo 'Failed<br>';
}
//TC4
$objMayTinh = new MayTinh();
$yourOutPut = $objMayTinh->sum('gfgv', 5);
$exectedOutPut = 5;
if ($yourOutPut == $exectedOutPut) {
    echo 'Passed<hr>';
} else {
    echo 'Failed<br>';
}
