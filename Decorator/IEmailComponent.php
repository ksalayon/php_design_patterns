<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 9:32 AM
 */
namespace Decorator;

abstract class IEmailComponent
{
    abstract public function getSalutation();

    abstract public function getBody();

    abstract public function getClose();

    abstract public function getSignature();
}