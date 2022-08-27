<?php

namespace Classes;


use InvalidArgumentException;

class Currency
{
    private string $isoCode;
    private array $currences = ['USD', 'EUR', 'UAH'];

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function setIsoCode($isoCode)
    {
        if (in_array(strtoupper($isoCode), $this->currences)) {
            $this->isoCode = strtoupper($isoCode);
        } else throw new InvalidArgumentException('Error');
    }

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    public function equals(Currency $currency): bool
    {
        return $this->getIsoCode() === $currency->getIsoCode();
    }
}