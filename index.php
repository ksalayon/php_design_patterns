<?php
/**
 * Created by PhpStorm.
 * User: kin.salayon
 * Date: 25/01/2018
 * Time: 1:58 PM
 */
//require_once 'FactoryPattern.php';
//require_once 'FactoryOptimized.php';
//require_once 'CarFactoryPattern.php';


// require_once 'Adapter/Client.php';
// use Adapter\Client as AdapterClient;
// $adapterClient = new AdapterClient();


require_once 'Decorator/Client.php';
use Decorator\Client as DecoratorClient;
$decoratorClient = new DecoratorClient();
$decoratorClient->show();
