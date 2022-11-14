<?php

$searchRoot = 'C:/xampp/htdocs/Module-7/test_search';
$searchName = 'test.txt';
$searchResult = [];

function searchFile($searchRoot, $searchName, &$searchResult)
{
    $arr_files = scandir($searchRoot);

    foreach ($arr_files as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }

        $file_path = $searchRoot . "/" . $file;
        $checking_directory = is_dir($file_path);

        if ($checking_directory == null && $file == $searchName) {
            $searchResult[$file_path] = $file;
        } else {
            searchFile($file_path, $searchName, $searchResult);
        }
    }
}

searchFile($searchRoot, $searchName, $searchResult);

$searchResult_filter = array_filter($searchResult, function ($key)
{
    $size = filesize($key);
    if ($size != 0) {
        return $key;
    }
}, ARRAY_FILTER_USE_KEY);

if (!$searchResult) {
    echo 'Массив пустой' . PHP_EOL;
} else {
    var_dump('Найденные совпадения:', $searchResult);
}

var_dump('Отфильтрованный массив:', $searchResult_filter);
