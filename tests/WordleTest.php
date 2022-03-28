<?php

use App\Wordle;
use PHPUnit\Framework\TestCase;

class WordleTest extends TestCase
{
    public function testGenerateWord()
    {
        $word = new Wordle("WORLD");
        $result = $word->getWord();

        $this->assertEquals("WORLD",$result);
    }

    public function testGetWordFromInput()
    {
        $word = new Wordle("WORLD");
        $word->readInput("PLACE");
        $result=$word->getInputWord();

        $this->assertEquals("PLACE",$result);
    }

    public function testInputWordLength()
    {
        $word = new Wordle("WORLD");
        $word->readInput("PLACES");
        $word->inputWordLength();

        $this->assertEquals("PLACE",$word->getInputWord());

        $word = new Wordle("WORLD");
        $word->readInput("EYE");
        $word->inputWordLength();

        $this->assertEquals("EYE__",$word->getInputWord());
    }

    public function testIfWordLetterMatches()
    {
        $word = new Wordle("WORLD");
        $word->readInput("HELLO");
        $result = $word->matchingLetters();

        $this->assertEquals("__lLo",$result);
    }

    public function testLettersThatDidNotMatch()
    {
        $word = new Wordle("WORLD");
        $word->readInput("HELLO");
        $word->matchingLetters();
        $result = $word->getWrongLetters();

        $this->assertEquals("H,E",$result);
    }

    public function testGetAllWrongInputWords()
    {
        $word = new Wordle("WORLD");
        $word->readInput("HELLO");
        $word->matchingLetters();

        $word->readInput("FLOOR");
        $word->matchingLetters();

        $result = $word->getInputWords();

        $this->assertEquals("__lLo\n_loor",$result);
    }

    public function testGameWithResultVictory()
    {
        $word = new Wordle("WORLD");
        $word->readInput("HELLO");
        $word->matchingLetters();

        $word->readInput("WORLD");
        $word->matchingLetters();
        $result = $word->checkForVictory();

        $this->assertEquals("Victory",$result);
    }

    public function testGameWithResultLost()
    {
        $word = new Wordle("WORLD");

        $word->readInput("CLOUD");
        $word->matchingLetters();

        $word->readInput("HELLO");
        $word->matchingLetters();

        $word->readInput("TIRES");
        $word->matchingLetters();

        $word->readInput("WHEEL");
        $word->matchingLetters();

        $word->readInput("LIGHT");
        $word->matchingLetters();

        $word->readInput("FLOOR");
        $word->matchingLetters();
        $result = $word->checkForVictory();

        $this->assertEquals("Sorry, better luck next time",$result);
    }

    public function testPlayAGameWithVictory()
    {
        $word = new Wordle("WORLD");

        $word->readInput("CLOUD");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D",$word->getInputWords());
        $this->assertEquals("C,U",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("TIRES");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("WORLD");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__\nWORLD",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S",$word->getWrongLetters());
        $this->assertEquals("Victory",$word->checkForVictory());
    }

    public function testPlayAGameWithDefeat()
    {
        $word = new Wordle("WORLD");

        $word->readInput("CLOUD");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D",$word->getInputWords());
        $this->assertEquals("C,U",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("TIRES");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("HELLO");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__\n__lLo",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S,H,E",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("WHEEL");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__\n__lLo\nW___l",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S,H,E,H,E,E",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("LIGHT");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__\n__lLo\nW___l\nl____",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S,H,E,H,E,E,I,G,H,T",$word->getWrongLetters());
        $this->assertEquals("",$word->checkForVictory());

        $word->readInput("FLOOR");
        $word->inputWordLength();
        $word->matchingLetters();
        $this->assertEquals("_lo_D\n__R__\n__lLo\nW___l\nl____\n_loor",$word->getInputWords());
        $this->assertEquals("C,U,T,I,E,S,H,E,H,E,E,I,G,H,T,F",$word->getWrongLetters());
        $this->assertEquals("Sorry, better luck next time",$word->checkForVictory());
    }
}