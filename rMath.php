<?php

class rMath {

  public $dataNum;

  function __construct($dataNum) {
    $this->dataNum = $dataNum;
  }

  //データの合計値を求める
  function sum_data($array) {
    $sumData = 0;
    foreach ($array as $value) {
        $sumData += $value;
    }
    return $sumData;
  }

  // データの平均値を求める
  function ave_data($array) {
    $average = $this->sum_data($array) / $this->dataNum;
    return $average;
  }

  // 偏差
  //個々の数値 - データの平均値
  function calc_deviation($value, $array) {
    $diviation = $value - $this->ave_data($array);
    return $diviation;
  }

  //分散
  //偏差の2乗を全て足した値を、データ数で割る
  function calc_variance($array) {
    $sum_deviation = 0;
    foreach ($array as $value) {
        $sum_deviation += pow($this->calc_deviation($value, $array), 2);
    }
    $variance = $sum_deviation / $this->dataNum;
    return $variance;
  }

  // 共分散
  //2つの変数の偏差の積の平均値
  function calc_covariance($xArray, $yArray) {
    $mul_deviation = 0;
    for ($i = 0; $i < $this->dataNum; $i++) {
      $mul_deviation += $this->calc_deviation($xArray[$i], $xArray) * $this->calc_deviation($yArray[$i], $yArray);
    }
    $covariance = $mul_deviation / $this->dataNum;
    return $covariance;
  }

  //標準偏差(SD)
  //分散の正の平方根
  function calc_standardDeviation($array) {
    $standard_deviation = $this->calc_variance($array);
    return sqrt($standard_deviation);
  }

  //相関係数ｒ
  function calc_r($xArray, $yArray) {
    $x_SD = $this->calc_standardDeviation($xArray);
    $y_SD = $this->calc_standardDeviation($yArray);
    $r = $this->calc_covariance($xArray, $yArray) / ($x_SD * $y_SD);
    return $r;
  }
}

?>

