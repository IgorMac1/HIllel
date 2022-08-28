<?php

use Classes\LgApp;
use Classes\SonyApp;
use Classes\TvType;

require_once __DIR__ . '/vendor/autoload.php';


TvType::configTv(new LgApp());
TvType::configTv(new SonyApp());


