<?php
/**
 * Created by PhpStorm.
 * User: kin.salayon
 * Date: 25/01/2018
 * Time: 2:06 PM
 */

/** My Example */
Class Car
{
  private $_make;
  private $_model;

  function __construct()
  {

  }

  public function getMake()
  {
    return $this->_make;
  }

  public function getModel()
  {
    return $this->_model;
  }

  public function setMake($make)
  {
    $this->_make = $make;
  }

  public function setModel($model)
  {
    $this->_model = $model;
  }

}


class ClassFactory
{
  public static function create($make, $model){
    $newCar = new Car();
    $newCar->setMake($make);
    $newCar->setModel($model);
    return $newCar;
  }
}

$toyota = ClassFactory::create('toyota', 'RAV 4');


echo '<pre>';
print_r($toyota->getMake() . ' ' . $toyota->getModel());
echo '</pre>';

/** End My Example */

/** Safari Example */
abstract class Creator
{
  protected abstract function factoryMethod();

  public function startFactory()
  {
    $mfg= $this->factoryMethod();
    return $mfg;
  }
}

interface Product
{
  public function getProperties();
}

class TextProduct implements Product
{
  private $mfgProduct;

  public function getProperties()
  {
//    $this->mfgProduct="This is text.";
    //Begin heredoc formating
    $this->mfgProduct =<<<MALI
      <!doctype html>
      <html><head>
      <style type="text/css">
      header {
          color: #900;
          font-weight: bold;
          font-size: 24px;
          font-family: Verdana, Geneva, sans-serif;
      }
      p {
          font-family: Verdana, Geneva, sans-serif;
          font-size: 12px;
      }
      </style>
      <meta charset="UTF-8"><title>Mali</title></head>
      <body>
      <header>Mali</header>
      <p>The Sudanese Republic and Senegal became independent of France in
      1960 as the Mali Federation. When Senegal withdrew after only a
      few months, what formerly made up the Sudanese Republic was
      renamed Mali. Rule by dictatorship was brought to a close in 1991
      by a military coup that ushered in a period of democratic rule.
      President Alpha KONARE won Mali's first two democratic presidential
      elections in 1992 and 1997. In keeping with Mali's two-term
      constitutional limit, he stepped down in 2002 and was succeeded by
      Amadou TOURE, who was elected to a second term in 2007 elections
      that were widely judged to be free and fair.
      A military coup overthrew the government in March 2012, claiming
      that the government had not adequately supported the Malian army's
      fight against an advancing Tuareg-led rebellion in the north.
      Heavy international pressure forced coup leaders to accelerate
      the transition back to democratic rule and, to that end,
      Dioncounda TRAORE was installed as interim president on 12 April 2012
      </p>
      </body></html>
MALI;
    return $this->mfgProduct;
  }
}

class GraphicProduct implements Product
{
  private $mfgProduct;

  public function getProperties()
  {
    $this->mfgProduct="This is a graphic.<3";
    return $this->mfgProduct;
  }
}

class TextFactory extends Creator
{
  protected function factoryMethod()
  {
    $product=new TextProduct();
    return($product->getProperties());
  }
}

class GraphicFactory extends Creator
{
  protected function factoryMethod()
  {
    $product=new GraphicProduct();
    return($product->getProperties());
  }
}

class Client
{
  private $someGraphicObject;
  private $someTextObject;

  public function __construct()
  {
    $this->someGraphicObject=new GraphicFactory();
    echo $this->someGraphicObject->startFactory() . "<br />";
    $this->someTextObject=new TextFactory();
    echo $this->someTextObject->startFactory() . "<br />";
  }
}

$worker=new Client();
/** End Safari Example */
