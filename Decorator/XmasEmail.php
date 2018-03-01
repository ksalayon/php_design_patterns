<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 9:54 AM
 */

namespace Decorator;
require_once 'IEmailDecorator.php';

class XmasEmail extends IEmailDecorator
{
    private $emailComponent;

    public function __construct(IEmailComponent $emailComponent)
    {
        $this->emailComponent = $emailComponent;
    }

    public function getSalutation()
    {
        return $this->emailComponent->getSalutation() . ' and Season\'s Greetings!';
    }

    public function getBody()
    {
        $body = $this->emailComponent->getBody();
        $body .= '<br /> and we would like to wish you a Merry Christmas and a happy New Year.';
        return $body;
    }

    public function getClose()
    {
        return '<br /><br />Ho Ho Ho!!!,';
    }

    public function getSignature()
    {
        return $this->emailComponent->getSignature();
    }
}