<?php

namespace Classes;

use Interfaces\LcdTv;
use Interfaces\LedTv;
use Interfaces\TvApp;

class SonyApp implements TvApp
{

    public function lcd(): LcdTv
    {
        return new SonyLcdTv();
    }

    public function Led(): LedTv
    {
        return new SonyLedTv();
    }
}