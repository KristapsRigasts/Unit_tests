<?php

use App\ScoreKeeper;

class ScoreKeeperTest extends \PHPUnit\Framework\TestCase
{
    public function testAddScoreToTeamA()
    {
        $team = new ScoreKeeper();
        $team->scoreTeamA1(4);
        $team->scoreTeamA2(5);
        $team->scoreTeamA3(2);

        $this->assertEquals("020:000",$team->getScore());
    }

    public function testAddScoreToTeamB()
    {
        $team = new ScoreKeeper();
        $team->scoreTeamB1(4);
        $team->scoreTeamB2(5);
        $team->scoreTeamB3(10);

        $this->assertEquals('000:044',$team->getScore());
    }

    public function testGetBothTeamScores()
    {
        $team = new ScoreKeeper();
        $team->scoreTeamA1(5);
        $team->scoreTeamA2(5);
        $team->scoreTeamA3(5);

        $team->scoreTeamB1(4);
        $team->scoreTeamB2(3);
        $team->scoreTeamB3(10);

        $this->assertEquals('030:040',$team->getScore());
    }
}