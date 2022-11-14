<?php
// Цифры означают пункт в задание 6.7
// 1.
$textStorage = [];

// 2.
function add(string $title, string $text, &$textStorage): array
{
    $textStorage[] = ['title' => $title, 'text' => $text];

    return $textStorage;
}

// 4.
function remove(int $number, array &$textStorage): bool
{
    if (isset($textStorage[$number])) {
        unset($textStorage[$number]);

        return true;
    }

    return false;
}

// 7.
function edit(int $number, array &$textStorage, string $title = null, string $text = null): bool
{
    if (isset($textStorage[$number])) {
        if ($title != null) {
            $textStorage[$number]['title'] = $title;
        }
        if ($text != null) {
            $textStorage[$number]['text'] = $text;
        }

        return true;
    }

    return false;
}

// 3.
add('Статья о php', 'История php начинается ...', $textStorage);
add('Пришла осень', 'Осенью особенно хочется ...', $textStorage);

var_dump('Исходный массив:', $textStorage);

// 5.
$deletion = remove(0, $textStorage);
var_dump('Значение если текст был в массиве:', $deletion);

$deletion = remove(5, $textStorage);
var_dump('Значение если текст отсутствует в массиве:', $deletion);

// 6.
var_dump('Вывод массива:', $textStorage);

// 8.
$test_edit = edit(1, $textStorage, 'новое название', null);

// 9.
var_dump('Редактирование массива',$textStorage);
var_dump('Значение если индекс существует:', $test_edit);

// 10.
$test_edit = edit(2, $textStorage, 'новое название 2', 'текст новый');

var_dump('Значение функции если индекс отсутствует:', $test_edit);
