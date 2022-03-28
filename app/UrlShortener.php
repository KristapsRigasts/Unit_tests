<?php

namespace App;

class UrlShortener
{
    public string $longUrl;
    public string $shortUrl;
    public array $urlEntry =[];
    public int $counter = 0;
    public int $visits;

    public function shorten(string $longUrl): string
    {
        $shortUrl ="https://short.url/" . $this->counter++;
        $this->urlEntry[]=[$longUrl,$shortUrl, 0];

        return $shortUrl;

    }

    public function translate(string $shortUrl)
    {
        $entry = "";
        $entryIndex= 0;
        foreach($this->urlEntry as $i=>$data)
        {
            if($data[1] == $shortUrl)
            {
                $entryIndex=$i;
                $entry = $data[0] ;

            }
        }
        $this->urlEntry[$entryIndex][2] ++;


        if($entry == "")
        {
            return;
        }

        return $entry;

    }

    public function visits(string $shortUrl): int
    {
        $visits = 0;
        foreach($this->urlEntry as $data)
        {

            if($data[1] == $shortUrl)
            {

                $visits = $data[2] ;

            }
        }

        return  $visits;

    }


}