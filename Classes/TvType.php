<?php

namespace Classes;

use Interfaces\TvApp;

class TvType
{
    public static function configTv(TvApp $app): void
    {
        echo '<hr>';
        $app->lcd()->getLcdTv();
        echo '<br> <hr>';
        $app->Led()->getLedTv();
        echo '<hr>';
    }
}