<?php

class AccountTest extends \PHPUnit\Framework\TestCase
{
    public function testDeposit()
    {
        $account = new \App\Account();
        $account->setCurrentTime("16-03-2022");
        $account->deposit(500);
        $result = $account->getBalance();

        $this->assertEquals(500,$result);
    }

    public function testWithdraw()
    {
        $account = new \App\Account();
        $account->setCurrentTime("16-03-2022");
        $account->deposit(500);
        $account->withdraw(300);
        $result = $account->getBalance();

        $this->assertEquals(200,$result);
    }

    public function testStatement()
    {
        $account = new \App\Account();
        $account->setCurrentTime("16-03-2022");
        $account->deposit(500);
        $account->setCurrentTime("17-03-2022");
        $account->withdraw(300);
        $result = $account->printStatement();

        $this->assertEquals("16-03-2022 500 500 \n"."17-03-2022 -300 200 \n",$result);

    }
}