<?php

//Во время войны с галлами император Римской империи Юлий Цезарь использовал в своих письмах шифр, чтобы враги не смогли их прочитать. Шифр был достаточно простым и заключался в замене каждой буквы латинского алфавита на другую, стоящую на несколько позиций левее или правее в алфавите. Количество позиций в алфавите, на которое нужно отступить для замены буквы, — это сдвиг шифра.

// Базовое слово
$str = "wizard";
// смещение символов
$shift = 3;
// узнаём кол-во символов в базовом слове
$number_sign = strlen($str);

$encrypted_word = "";
for ($i=0; $i < $number_sign; $i++) {
    // получаем 1 символ
    $sign = substr($str,$i,1);
    // переводим символ в код
    $numeric_code = ord($sign);
    // к коду символа прибавляем смещение
    $encrypted = $numeric_code + $shift;
    // возврат в начало алфавита
    if ($encrypted > 122) {
        $encrypted -= 26;
    }
    // переводим код в символ
    $output = chr($encrypted);
    // добавляем символ в переменную
    $encrypted_word .= $output;
}

var_dump($encrypted_word);

$deciphered_word = "";
for ($i=0; $i < $number_sign; $i++) {
    $sign = substr($encrypted_word,$i,1);
    $numeric_code = ord($sign);
    $encrypted = $numeric_code - $shift;
    // возврат в начало алфавита
    if ($encrypted < 97) {
        $encrypted += 26;
    }
    $output = chr($encrypted);
    $deciphered_word .= $output;
}

var_dump($deciphered_word);
