<?php

namespace Classes;

use InvalidArgumentException;

class Money
{
    private int|float $amount;
    private Currency $currency;

    public function __construct(int|float $amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    public function getAmount(): int|float
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): Currency
    {
        return $this->currency = $currency;
    }

    public function setAmount($amount): int|float
    {
        return $this->amount = $amount;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount && $this->getCurrency()->equals($money->getCurrency());
    }

    public function add(Money $money)
    {
        if (!$this->getCurrency()->equals($money->getCurrency())) {
            throw new InvalidArgumentException('Error');
        }
        return $this->getAmount() + $money->getAmount();
    }

}