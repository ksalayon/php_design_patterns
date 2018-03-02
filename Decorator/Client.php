<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 2/03/2018
 * Time: 10:16 AM
 */

/**
* Decorator pattern allows you to systematically plug-in new behavior
* an already existing implementation without changing
* the original component class.
*
* Parts:
* Component Interface e.g. abstract IComponent
*   implemented by the Component class or the class that needs to be decorated
*   contains all abstract methods that will be implemented
*
* Component Class e.g. class Component extends IComponent
*   The component class represents the base class that will be decorated
*   It implements all the abstract methods from the IComponent interface
*
* Decorator Interface e.g abstract IDecorator extends IComponent
*   Extends component interface so that the decorators inhereting this will
*   retain reference to the IComponent type
*   note: There is no need to create actual implmentations of IComponent into this class
*
* Decorator Class e.g. class Decorator extends IDecorator
*   Initializes with IComponent object in constructor
*   calls component methods inside of its own implementations of the IDecorator methods
*   then returns a version of its own implementation that adds on to the original implementation
* of the component class
*
* Client - Creates an instance of the component class then creates instances of the decorator classes
* that mutates the original component class - see below
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
