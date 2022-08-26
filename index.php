<?php
require_once __DIR__ . '/vendor/autoload.php';

interface AppTaxi
{
    public function getTaxi();

    public function getPrice();
}

abstract class Taxi
{
    abstract protected function callTaxi(): AppTaxi;

    public function getTaxi(): void
    {
        $taxiType = $this->callTaxi();
        $taxiType->getTaxi();
    }

    public function getPrice()
    {
        $taxiPrice = $this->callTaxi();
        $taxiPrice->getPrice();
    }
}

class DispatcherEconomy extends Taxi
{

    protected function callTaxi(): AppTaxi
    {
        return new Economy();
    }
}

class DispatcherStandard extends Taxi
{

    protected function callTaxi(): AppTaxi
    {
        return new Standard();
    }
}

class DispatcherLux extends Taxi
{

    protected function callTaxi(): AppTaxi
    {
        return new Lux();
    }
}

class Economy implements AppTaxi
{
    public function getTaxi()
    {
        echo 'Class - Economy ';
    }

    public function getPrice()
    {
        echo 'price - 10$';
    }
}

class Standard implements AppTaxi
{
    public function getTaxi()
    {
        echo 'Class - Standard ';
    }

    public function getPrice()
    {
        echo 'price - 15$';
    }
}

class Lux implements AppTaxi
{
    public function getTaxi()
    {
        echo 'Class - Lux ';
    }

    public function getPrice()
    {
        echo 'price - 20$';
    }
}

function taxi(Taxi $taxi): void
{
    $taxi->getTaxi();
    $taxi->getPrice();
    echo '<br>';
    echo '<hr>';
}

taxi(new DispatcherEconomy());
taxi(new DispatcherStandard());
taxi(new DispatcherLux());