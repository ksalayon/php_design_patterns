<?php
namespace Adapter\NZ;

interface INzd
{
    public function calculate($productNow,$serviceNow);

    public function requestTotal();
}

?>
