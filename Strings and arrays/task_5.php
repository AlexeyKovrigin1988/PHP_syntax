<?php

$arr_associative = [
    "a" => "Hello",
    "b" => "world",
    "c" => "Hello",
    "d" => "car",
    "e" => "patty",
];

// перевернутый массив
$arr_flip = array_flip($arr_associative);

// берутся значения массива
$arr_base = array_values($arr_flip);

// добавления простого массива
$arr_addend = ["f"];
$arr_new = array_merge($arr_base, $arr_addend);

// берутся значения массива
$arr_value = array_values($arr_associative);

// ключи массива объединяются со значениями массива
$arr_combine = array_combine($arr_new, $arr_value);

var_dump($arr_combine);
