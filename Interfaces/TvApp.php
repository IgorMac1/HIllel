<?php

namespace Interfaces;

interface TvApp
{
    public function lcd(): LcdTv;
    public function Led(): LedTv;
}