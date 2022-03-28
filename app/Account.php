<?php

namespace App;

require_once('vendor/autoload.php');


class Account
{
    private int $balance =0 ;
    private array $transactions;
    private string $currentTime;

    public function deposit(int $amount):void
    {

//        (new \DateTime())->format('d-m-Y');
         $this->balance +=$amount;
         $this->transactions[] = new Transaction($this->currentTime,  $amount,$this->balance);

    }

    public function withdraw(int $amount)
    {
//        (new \DateTime())->format('d-m-Y');
        $this->balance -=$amount;
        $this->transactions[] = new Transaction($this->currentTime, $amount * -1,$this->balance);
    }

    public function printStatement()
    {
        $statement= "";
        foreach($this->transactions as $data)
        {
            $statement.= "{$data->getDate()} {$data->getAmount()} {$data->getBalance()} \n";
        }
return $statement;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setCurrentTime($date)
    {
        $this->currentTime = $date;
    }

}



