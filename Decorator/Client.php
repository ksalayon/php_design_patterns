<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 10:16 AM
 */
namespace Decorator;
require_once 'BasicEmail.php';
require_once 'XmasEmail.php';
require_once 'PromoEmail.php';

class Client
{
    function __construct()
    {
        $this->email = new BasicEmail();
        $this->email = new XmasEmail($this->email);
        $this->email = new PromoEmail($this->email);

    }

    public function show()
    {
        echo $this->email->getSalutation();
        echo $this->email->getBody();
        echo $this->email->getClose();
        echo $this->email->getSignature();
    }
}