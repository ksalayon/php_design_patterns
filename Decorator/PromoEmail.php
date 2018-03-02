<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 10:10 AM
 */

namespace Decorator;
require_once 'IEmailDecorator.php';

class PromoEmail extends IEmailDecorator
{
    private $emailComponent;

    public function __construct(IEmailComponent $emailComponent)
    {
        $this->emailComponent = $emailComponent;
    }

    public function getSalutation()
    {
        return $this->emailComponent->getSalutation();
    }

    public function getBody()
    {
        $body = $this->emailComponent->getBody();
        $body .= '<br /><br /> We\'ve got a new promo that you might be insterested in: 50% off in all items';
        $body .= '<br /> Please click <a href="http://www.google.com" target="__blank">HERE</a> to view all the stuff we\'ve got in store for you.';
        return $body;
    }

    public function getClose()
    {
        return $this->emailComponent->getClose();
    }

    public function getSignature()
    {
        return $this->emailComponent->getSignature();
    }
}