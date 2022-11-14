<?php

$arr_associative = [
    "a" => "Hello",
    "b" => "world",
    "c" => "Hello",
    "d" => "car",
    "e" => "patty",
];

$arr_count = count($arr_associative);
var_dump($arr_count);

$arr_flip = array_flip($arr_associative);

$arr_count_ = count($arr_flip);
var_dump($arr_count_);

// не совсем понял использования знака сравнения не равно (!=). Если значения не равны
// так же через if их сравнивать?
if ($arr_count > $arr_count_) {
    echo "Размер массива до переворота больше";
} elseif ($arr_count < $arr_count_) {
    echo "Размер массива после переворота больше";
} else {
    echo "Размер массивов одинаковый";
}
