<?php

namespace Classes;

use Interfaces\LcdTv;
use Interfaces\LedTv;
use Interfaces\TvApp;

class LgApp implements TvApp
{

    public function lcd(): LcdTv
    {
        return new LgLcdTv();
    }

    public function Led(): LedTv
    {
        return new LgLedTv();
    }
}