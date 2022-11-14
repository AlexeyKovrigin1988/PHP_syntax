<?php

$first_number = rand(1,9);
$second_number = 10 * rand(1,3);
$composition = $first_number * $second_number;
$composition += rand(0,100);

var_dump($first_number);
var_dump($second_number);
var_dump($composition);

// почему если произведение чисел $composition будет = 0, то хоть
// и срабатывает первое условие case, так как оба значения оператора истина
// но текст выводится из второго условия?

switch (true) {
    case ($composition >= 0 && $composition < 100):
        echo 'число в диапазоне от 0 до 100';
        break;
    case ($composition >= 100 && $composition < 200);
        echo 'число в диапазоне от 100 до 200';
        break;
    case ($composition >= 200 && $composition < 300);
        echo 'число в диапазоне от 200 до 300';
        break;
    default:
        echo 'число больше 300 или меньше 0';

}
