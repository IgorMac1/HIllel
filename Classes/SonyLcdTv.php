<?php

namespace Classes;

use Interfaces\LcdTv;

class SonyLcdTv implements LcdTv
{

    public function getLcdTv()
    {
        echo 'SONY LCD TV';
    }
}