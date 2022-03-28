<?php

class MarsRoverTest extends \PHPUnit\Framework\TestCase
{
    public function testMoveRight()
    {
        $rover = new \App\MarsRover(new \App\Coordinates(0,0), new \App\Direction("E"));
        $rover->moveRight();
        $result = $rover->getCoordinates();

        $this->assertEquals([1,0,"E"],$result);
    }

    public function testMoveLeft()
    {
        $rover = new \App\MarsRover(new \App\Coordinates(0,0), new \App\Direction("E"));
        $rover->moveLeft();
        $result = $rover->getCoordinates();

        $this->assertEquals([-1,0,"E"],$result);
    }

    public function testMoveUp()
    {
        $rover = new \App\MarsRover(new \App\Coordinates(0,0), new \App\Direction("E"));
        $rover->moveUp();
        $result = $rover->getCoordinates();

        $this->assertEquals([0,-1,"E"],$result);
    }

    public function testMoveDown()
    {
        $rover = new \App\MarsRover(new \App\Coordinates(0,0), new \App\Direction("E"));
        $rover->moveDown();
        $result = $rover->getCoordinates();

        $this->assertEquals([0,1,"E"],$result);
    }
}