<?php

namespace Classes;

use Interfaces\LedTv;

class LgLedTv implements LedTv
{

    public function getLedTv()
    {
        echo 'LG LED TV';
    }
}