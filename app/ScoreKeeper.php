<?php

namespace App;

class ScoreKeeper
{
    private int $teamA;
    private int $teamB;

    public function __construct(int $teamA = 0, int $teamB = 0)
    {
        $this->teamA = $teamA;
        $this->teamB = $teamB;
    }

    public function scoreTeamA1(int $amount): void
    {
        $this->teamA +=$amount;
    }

    public function scoreTeamA2(int $amount): void
    {
        $this->teamA +=$amount*2;
    }

    public function scoreTeamA3(int $amount): void
    {
        $this->teamA +=$amount*3;
    }

    public function scoreTeamB1(int $amount): void
    {
        $this->teamB +=$amount;
    }

    public function scoreTeamB2(int $amount): void
    {
        $this->teamB +=$amount*2;
    }

    public function scoreTeamB3(int $amount): void
    {
        $this->teamB +=$amount*3;
    }

    public function getScore(): string
    {
        $teamA = str_pad($this->teamA,3,"0",STR_PAD_LEFT);
        $teamB = str_pad($this->teamB,3,"0",STR_PAD_LEFT);
        return "{$teamA}:{$teamB}";
    }

}