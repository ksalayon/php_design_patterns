<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 28/02/2018
 * Time: 1:42 PM
 */
namespace Adapter;

include_once('IMobileFormat.php');


class Mobile implements IMobileFormat
{
    private $head="<!doctype html><html><head>";
    private $headClose="<meta charset='UTF-8'>
    <title>Mobile</title></head><body>";

    private $cap="</body></html>";
    private $sampleText;
    public function formatCSS()
    {
        echo $this->head;
        echo "<link rel='stylesheet' href='mobile.css'>";
        echo $this->headClose;
        echo "<h1>Hello, Everyone!</h1>";
    }
    public function formatGraphics()
    {
        echo "<img src='/pix/river_mobile.jpeg' width=device-width 
           height=device-height alt='river'>";
    }

    public function verticalLayout()
    {
        $textFile = __DIR__ . "/text/lorem.txt";
        $openText = fopen($textFile, 'r');
        $textInfo = fread($openText, filesize($textFile));
        fclose($openText);
        $this->sampleText=$textInfo;
        echo "<p/><div>" . $this->sampleText . "</div>";
        echo "<p/><div>" . $this->sampleText . "</div>";
    }

    public function closeHTML()
    {
        echo $this->cap;
    }
}