<?php

namespace App;

class Transaction
{

    private string $date;
    private int $amount;
    private int $balance;

    public function __construct(string $date, int $amount , int $balance)
    {
        $this->date = $date;
        $this->amount = $amount;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }
}