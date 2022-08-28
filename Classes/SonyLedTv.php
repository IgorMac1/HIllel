<?php

namespace Classes;

use Interfaces\LedTv;

class SonyLedTv implements LedTv
{

    public function getLedTv()
    {
        echo 'SONY LED TV';
    }
}