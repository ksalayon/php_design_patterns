<?php
namespace Adapter;
require_once 'INzd.php';
require_once 'IDollar.php';

use Adapter\NZ\INzd;

class NZAdapter implements IDollar
{
    private $nzd;

    public function __construct(INzd $nzd)
    {
        $this->nzd = $nzd;
    }

    public function requestCalc($productNow,$serviceNow)
    {
        return $this->nzd->calculate($productNow,$serviceNow);
    }

    public function requestTotal()
    {
        return $this->nzd->requestTotal();
    }
}
