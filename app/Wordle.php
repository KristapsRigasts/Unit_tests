<?php

namespace App;

class Wordle
{
    private string $word;
    private string $inputWord;
    private array $wrongLetters;
    private array $inputWords;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function readInput(string $inputWord):void
    {
        $this->inputWord = $inputWord;
    }

    public function inputWordLength()
    {
        if(strlen($this->inputWord) > 5)
        {
            $this->inputWord = substr($this->inputWord,0,5);
        }
        if(strlen($this->inputWord) < 5)
        {
            $this->inputWord = str_pad($this->inputWord,5,"_");
        }
    }

    public function matchingLetters(): string
    {
        $match = "";

        for($i=0; $i < 5; $i++)
        {
            if($this->word[$i] === $this->inputWord[$i])
            {
                $match .= $this->word[$i];
            }
            else if (strpos($this->word,$this->inputWord[$i]))
            {
                $match .= strtolower($this->inputWord[$i]);
            }
            else {
                $this->wrongLetters[] = $this->inputWord[$i];
                $match .= "_";
            }
        }
        $this->inputWords[] = $match;
        return $match;
    }

    public function checkForVictory(): string
    {
        $endgame="";

        if($this->word === $this->inputWord)
        {
            $endgame= "Victory";

        }
        else if(count($this->inputWords) === 6)
        {
            $endgame = "Sorry, better luck next time";
        }
        return $endgame;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getInputWord(): string
    {
        return $this->inputWord;
    }

    public function getWrongLetters(): string
    {
        return implode(",",$this->wrongLetters);
    }

    public function getInputWords(): string
    {
        return implode("\n",$this->inputWords);
    }
}