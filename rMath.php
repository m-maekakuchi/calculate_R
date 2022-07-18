<?php

class rMath {

  public $dataNum;

  function __construct($dataNum) {
    $this->dataNum = $dataNum;
  }

  //データの合計値を求める
  function sum_data($list) {
    $sumData = 0;
    foreach ($list as $value) {
        $sumData += $value;
    }
    return $sumData;
  }

  // データの平均値を求める
  function ave_data($list) {
    $average = $this->sum_data($list) / $this->dataNum;
    return $average;
  }

  // 偏差
  //個々の数値 - データの平均値
  function calc_deviation($value, $list) {
    $diviation = $value - $this->ave_data($list);
    return $diviation;
  }

  //分散
  //偏差の2乗を全て足した値を、データ数で割る
  function calc_variance($list) {
    $sum_deviation = 0;
    foreach ($list as $value) {
        $sum_deviation += pow($this->calc_deviation($value, $list), 2);
    }
    $variance = $sum_deviation / $this->dataNum;
    return $variance;
  }

  // 共分散
  //2つの変数の偏差の積の平均値
  function calc_covariance($xlist, $ylist) {
    $mul_deviation = 0;
    for ($i = 0; $i < $this->dataNum; $i++) {
      $mul_deviation += $this->calc_deviation($xlist[$i], $xlist) * $this->calc_deviation($ylist[$i], $ylist);
    }
    $covariance = $mul_deviation / $this->dataNum;
    return $covariance;
  }

  //標準偏差(SD)
  //分散の正の平方根
  function calc_standardDeviation($list) {
    $standard_deviation = $this->calc_variance($list);
    return sqrt($standard_deviation);
  }

  //相関係数ｒ
  function calc_r($xlist, $ylist) {
    $x_SD = $this->calc_standardDeviation($xlist);
    $y_SD = $this->calc_standardDeviation($ylist);
    $r = $this->calc_covariance($xlist, $ylist) / ($x_SD * $y_SD);
    return $r;
  }
}

?>

