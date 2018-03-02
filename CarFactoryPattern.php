<?php
/**
 * Created by PhpStorm.
 * User: kin.salayon
 * Date: 25/01/2018
 * Time: 4:34 PM
 */

/*
Summary of Factory Pattern Structure
abstract class Creator
    contains the actual implementation of the object creation (e.g create method)
    contains interface method to impose create method (e.g. factoryMethod)

class Factory extends Creator
	contains methods creature method to be used by Creator's create method
    e.g. protected function factoryMethod(ICar $car)
            $car->show();


interface ICreature - Interface to group types of creations and enforces create method
    e.g. function show();

class CreatureOne implements ICreature
class CreatureTwo implements ICreature
	- Object to be created

class Client
	- Uses abstract Creator to create creatures objects
	$creator = new Factory();
	$creator->create(new CreatureOne);
	$creator->create(new CreatureTwo);
*/

abstract class CarCreator
{
    protected abstract function factoryMethod(ICar $car);

    public function create(ICar $car)
    {
        return $this->factoryMethod($car);
    }

}


class CarFactory extends CarCreator
{
    protected function factoryMethod(ICar $car)
    {
        $car->show();
    }

}



interface ICar
{
    function show();
}

class Toyota implements ICar
{
  public function show(){
    echo 'Im a Toyota!';
  }
}

class Honda implements ICar
{
  public function show(){
    echo 'Im a Honda!';
  }
}

class Client
{
  function __construct()
  {
    $factory = new CarFactory();
    $factory->create(new Toyota());
    $factory->create(new Honda());
  }
}

$worker = new Client();