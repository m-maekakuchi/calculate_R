<?php
require_once("rMath.php");

$xDataset = array(50, 60, 70, 80, 90);
$yDataset = array(40, 70, 90, 60, 100);

$rmath = new rMath(count($xDataset));

echo $rmath->calc_r($xDataset, $yDataset);

?>
