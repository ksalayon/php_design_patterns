# My Learnings and Practices on some PHP design patterns

## Factory Pattern
```
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
```

## Adapter Pattern
```
Adapter Pattern is used to allow implementations from separate incompatible interfaces
to work together
Parts:
    * interface IReference - interface used by the reference classes
    * class Reference - concrete class that will be referred to by the adapter
    * interface IAdaptee - interface used by the adaptee
    * class Adaptee - class that would inherit implements adaptee interface
    * class Adapter implements IReference - adapter class implements reference interface
        but initializes with an IAdaptee object. It then wraps the Adaptee methods inside the IReference methods implementations
    * class Client
        creates an instance of the adaptee class
        then creates an isntance of the adapter with the adaptee instance passed to its constructor

        adapter can make  the method calls like in the reference class but with implementation based on the adaptee

        e.g.


        $this->adaptee = new Adaptee();
        $this->adapter = new Adapter($this->adaptee);
        $this->adapter->referenceMethod;
```
# Decorator Pattern
```
Decorator pattern allows you to systematically plug-in new behavior
 an already existing implementation without changing
 the original component class.

 Parts:
 * Component Interface e.g. abstract IComponent
   implemented by the Component class or the class that needs to be decorated
   contains all abstract methods that will be implemented

 * Component Class e.g. class Component extends IComponent
   The component class represents the base class that will be decorated
   It implements all the abstract methods from the IComponent interface

 * Decorator Interface e.g abstract IDecorator extends IComponent
   Extends component interface so that the decorators inhereting this will
   retain reference to the IComponent type
   note: There is no need to create actual implmentations of IComponent into this class

 * Decorator Class e.g. class Decorator extends IDecorator
   Initializes with IComponent object in constructor
   calls component methods inside of its own implementations of the IDecorator methods
   then returns a version of its own implementation that adds on to the original implementation of the component class

   * Client - Creates an instance of the component class then creates instances of the decorator classes that mutates the original component class
```
