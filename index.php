<?php

//1. Напишіть скрипт PHP, який видаляє останнє слово з рядка.
//   Зразок рядка: "The quick brown fox"
//   Очікуваний результат: швидкий коричневий

function removeLastWord(string $str): string
{
    $re = '/[\w]+$/m';
    $subst = '';
    return preg_replace($re, $subst, $str);
}

//2. Напишіть сценарій PHP, який видаляє пробіли з рядка.
//   Зразок рядка: "The quick brown fox"
//   Очікуваний результат: Thequick""brownfox

function removeSpaces(string $str): string
{
    $re = '/\s/m';
    $subst = '';
    return preg_replace($re, $subst, $str);
}

//3. Напишіть сценарій PHP для видалення нечислових символів, крім коми та крапки.
//   Зразок рядка: "$123,34.00A"
//   Очікуваний результат: 12 334,00

function removeLetters(string $str): string
{
    $re = '/[^\d|,|.]/m';
    $subst = '';
    return preg_replace($re, $subst, $str);
}

//4. Напишіть сценарій PHP для вилучення тексту (в дужках) із рядка.
//   Зразки рядків: "The quick brown [fox]"
//   Очікуваний результат: "fox"
function takeTextFromHooks(string $str): string
{
    $re = '/\[(.*?)\]/m';
    preg_match($re, $str, $match);
    return $match[1];
}

//5. Напишіть сценарій PHP, щоб видалити всі символи з рядка, крім a-z A-Z 0-9 або " ".
//   Зразок рядка: abcde$ddfd @abcd )der]
//    Очікуваний результат: abcdeddfd abcd der

function removeSymbols(string $str): string
{
    $re = '/[^a-z|\d|\s]/mi';
    $subst = '';
    return preg_replace($re, $subst, $str);
}


