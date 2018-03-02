<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 9:51 AM
 */
namespace Decorator;
require_once 'IEmailDecorator.php';


class BasicEmail extends IEmailComponent
{
    public function getSalutation()
    {
        return 'Kia Ora!';
    }

    public function getBody()
    {
        return '<br /><br />KindredCode is NZ\'s leading Coding Academy';
    }

    public function getClose()
    {
        return '<br /><br />Best Regards,';
    }

    public function getSignature()
    {
        return '<br /><br />The Team at Kindred Code';
    }
}