<?php
namespace Adapter\NZ;

require_once 'INzd.php';

class NzdCalc implements INzd
{
    private $dollar;
    private $product;
    private $service;
    public $rate=1.39;

    public function calculate($productNow,$serviceNow)
    {
        $this->product=$productNow;
        $this->service=$serviceNow;
        $this->dollar=$this->product + $this->service;
        return $this->requestTotal();
    }

    public function requestTotal()
    {
        $this->dollar*=$this->rate;
        return $this->dollar;
    }
}
