<?php

$str = "Лето пришло";
$index = strpos($str, ' ');

var_dump($index);

$str_cropped = substr($str, -12);

var_dump($str_cropped);
