<?php
/**
 * Created by PhpStorm.
 * User: kin.salayon
 * Date: 25/01/2018
 * Time: 3:48 PM
 */
abstract class Creator
{
  protected abstract function factoryMethod(Product $product);

  public function doFactory($productNow)
  {
    $countryProduct=$productNow;
    $mfg= $this->factoryMethod($countryProduct);
    return $mfg;
  }
}

class CountryFactory extends Creator
{
  private $country;

  protected function factoryMethod(Product $product)
  {
    $this->country=$product;
    return($this->country->getProperties());
  }
}

interface Product
{
  public function getProperties();
}

class FormatHelper
{
  private $topper;
  private $bottom;

  public function addTop()
  {
    $this->topper="<!doctype html><html><head>
        <link rel='stylesheet' type='text/css' href='products.css'/>
        <meta charset='UTF-8'>
        <title>Map Factory</title>
        </head>
        <body>";
    return $this->topper;
  }

  public function closeUp()
  {
    $this->bottom="</body></html>";
    return $this->bottom;
  }
}

class KyrgyzstanProduct implements Product
{
  private $mfgProduct;
  private $formatHelper;

  public function getProperties()
  {
    $this->formatHelper=new FormatHelper();
    $this->mfgProduct=$this->formatHelper->addTop();
    $this->mfgProduct.=<<<KYRGYZSTAN
        <img src='Countries/Kyrgyzstan.png' class='pixRight' width='600' 
           height='304'>
        <header>Kyrgyzstan</header>
        <p>A Central Asian country of incredible natural beauty and proud
           nomadic traditions, most of Kyrgyzstan was formally annexed to
           Russia in 1876. The Kyrgyz staged a major revolt against the 
           Tsarist Empire in 1916 in which almost one-sixth of the Kyrgyz 
           population was killed. Kyrgyzstan became a Soviet republic in 1936
           and achieved independence in 1991 when the USSR dissolved. Nationwide
           demonstrations in the spring of 2005 resulted in the ouster of
           President Askar AKAEV, who had run the country since 1990.
           Subsequent presidential elections in July 2005 were won overwhelmingly
           by former prime minister Kurmanbek BAKIEV. Over the next few years,
           the new president manipulated the parliament to accrue new powers
           for himself. In July 2009, after months of harassment against
           his opponents and media critics, BAKIEV won re-election in a
           presidential campaign that the international community deemed
           flawed. In April 2010, nationwide protests led to the resignation
           and expulsion of BAKIEV. His successor, Roza OTUNBAEVA, served as
           transitional president until Almazbek ATAMBAEV was inaugurated in
           December 2011. Continuing concerns include: the trajectory of
           democratization, endemic corruption, poor interethnic relations,
           and terrorism.
        </p>
KYRGYZSTAN;
    $this->mfgProduct .=$this->formatHelper->closeUp();
    return $this->mfgProduct;
  }
}


class MaliProduct implements Product
{
  private $mfgProduct;

  public function getProperties()
  {
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

class Client
{
  private $kFactory;
  private $mFactory;

  public function __construct()
  {
    $this->kFactory=new CountryFactory();
    echo $this->kFactory->doFactory(new KyrgyzstanProduct());
    echo $this->kFactory->doFactory(new MaliProduct());

  }
}

$worker = new Client();
