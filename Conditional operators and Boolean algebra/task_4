<?php

$boolean_random = rand(0,1);

$number_random = !$boolean_random ? $boolean_random = null : $boolean_random = rand(1,3);

var_dump($number_random);

switch ($number_random) {
    case null:
        echo "Значение переменной NULL \n";
        break;
    case 1:
        echo "Значение переменной 1 \n";
        break;
    default:
        echo "Значение переменной не null и не 1 \n";
}

var_dump(isset($number_random));

$check_number = $number_random ?? rand(20,30);

var_dump($check_number);
