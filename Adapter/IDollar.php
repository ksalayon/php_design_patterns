<?php
namespace Adapter;

interface IDollar
{
    public function requestCalc($productNow,$serviceNow);

    public function requestTotal();
}

?>
