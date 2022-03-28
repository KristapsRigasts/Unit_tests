<?php

namespace App;

class MarsRover
{


    private Coordinates $coordinates;
    private Direction $direction;

    public function __construct(Coordinates $coordinates, Direction $direction)
{
    $this->coordinates = $coordinates;
    $this->direction = $direction;
}

    public function moveRight()
    {

        $this->coordinates->setX(+1);
//        return $this->coordinates = [$this->coordinates[0] +1, $this->coordinates[1]];
    }
    public function moveLeft()
    {

        $this->coordinates->setX(-1);

    }
    public function moveUp()
    {

        $this->coordinates->setY(-1);
    }
    public function moveDown()
    {

        $this->coordinates->setY(+1);

    }

    public function getCoordinates()
    {
        return [$this->coordinates->getX(), $this->coordinates->getY(), $this->direction->getDirection()];
    }
}