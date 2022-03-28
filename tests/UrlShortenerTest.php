<?php

class UrlShortenerTest extends \PHPUnit\Framework\TestCase
{
    public function testUrlShortener(){

        $urlShortener = new \App\UrlShortener();

        $longUrl ='https://www.codelex.io/kontakti';

        $shortUrl = $urlShortener->shorten($longUrl);

        $this->assertStringStartsWith("https://short.url/",$shortUrl,);


    }

    public function testUrlTranslateToLong()
    {
            $urlShortener = new \App\UrlShortener();

            $longUrl = "https://www.codelex.io/kontakti";

            $shortUrl = $urlShortener->shorten($longUrl);

            $translatedLongUrl = $urlShortener->translate($shortUrl);

            $this->assertEquals($longUrl,$translatedLongUrl);
    }

    public function testMultipleUrls()
    {
        $urlShortener = new \App\UrlShortener();

        $longUrl1 = "https://www.codelex.io/kontakti";
        $shortUrl1 = $urlShortener->shorten($longUrl1);

        $longUrl2 = "https://www.codelex.io/ievadnodarbibas";
        $shortUrl2 = $urlShortener->shorten($longUrl2);

        $this->assertEquals($urlShortener->translate($shortUrl1),$longUrl1);
        $this->assertEquals($urlShortener->translate($shortUrl2),$longUrl2);

    }

    public function testTrackNumberOfTimesVisited()
    {
        $urlShortener = new \App\UrlShortener();

        $longUrl = "https://www.codelex.io/kontakti";
        $shortUrl = $urlShortener->shorten($longUrl);

        $this->assertEquals($urlShortener->visits($shortUrl),0);

        $urlShortener->translate($shortUrl);
        $this->assertEquals($urlShortener->visits($shortUrl),1);

        $urlShortener->translate($shortUrl);
        $urlShortener->translate($shortUrl);
        $urlShortener->translate($shortUrl);
        $this->assertEquals($urlShortener->visits($shortUrl),4);

    }
}