<?php
require_once __DIR__ . '/vendor/autoload.php';

use Classes\Currency;
use Classes\Money;


try {
    $money = new Money(35, new Currency('uah'));
    $money1 = new Money(30, new Currency('usd'));
    $money2 = new Money(25, new Currency('UAH'));

    dd($money->add($money2));


} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}





