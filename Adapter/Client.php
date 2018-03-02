<?php
namespace Adapter;
require_once 'NzdCalc.php';
require_once 'NZAdapter.php';
require_once 'DollarCalc.php';

use Adapter\NZ\INzd;
use Adapter\NZ\NzdCalc;

class Client
{
    private $dollarCalc;
    private $nzCalc;
    private $nzAdapter;

    function __construct()
    {
        $this->nzCalc = new NzdCalc();
        $this->nzAdapter = new NZAdapter($this->nzCalc);
        $nz = $this->nzAdapter->requestCalc(50, 50);

        $dCalc = new DollarCalc();
        $usd = $dCalc->requestCalc(50, 50);

        echo "nzd: " . $nz . ' vs usd: ' . $usd;
    }
}
$client = new Client();
