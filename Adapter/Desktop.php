<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 28/02/2018
 * Time: 10:14 AM
 */
namespace Adapter;
require_once 'IFormat.php';

class Desktop implements IFormat
{
    private $head="<!doctype html><html><head>";
    private $headClose="<meta charset='UTF-8'>
    <title>Desktop</title></head><body>";

    private $cap="</body></html>";
    private $sampleText;

    //Interface method
    public function formatCSS()
    {
        echo $this->head;
        echo "<link rel='stylesheet' href='desktop.css'>";
        echo $this->headClose;
        echo "<h1>Hello, Everyone!</h1>";
    }

    //Interface method
    public function formatGraphics()
    {
        echo "<img class='pixRight' src='/pix/fallRiver720.jpg' width='720' 
           height='480' alt='river'>";
    }

    //Interface method
    public function horizontalLayout()
    {
        $textFile = __DIR__ . "/text/lorem.txt";
        $openText = fopen($textFile, 'r');
        $textInfo = fread($openText, filesize($textFile));
        fclose($openText);
        $this->sampleText=$textInfo;
        echo "<div>" . $this->sampleText . "</div>";
        echo "<p/><div>" . $this->sampleText . "</div>";
    }

    public function closeHTML()
    {
        echo $this->cap;
    }
}