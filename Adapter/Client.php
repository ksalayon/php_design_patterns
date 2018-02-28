<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 28/02/2018
 * Time: 3:18 PM
 */

/**
 * Summary of Adapter Pattern Structure
 * IT's basically a way to merge incompatible interfaces
 *
 * - Reference class that implements reference interface
 *      e.g. class Desktop implements IFormat
 *
 * - Separate class with its own specific implementations and interface that you would like to adapt to the reference interface
 *      e.g class Mobile implements IMobileFormat
 *
 * - Enable Adaptee use of reference interface by creating and Adapter class
 *      e.g MobileAdapter implements IFormat
 *      - initiated with the adaptee's interface
 *          e.g. public function __construct(IMobileFormat $mobileNow)
 *      - the methods in the adapter class only acts as a wrapper for specific implementations of the adaptee class
 *          e.g
 *              public function formatCSS()
                {
                    $this->mobile->formatCSS();
                }
 *
 * - Client class that creates new adaptee object and passes it as an argument for the constructor of the adapter
 *      e.g
 *          $this->adaptee = new Adaptee();
 *          $this->adapter = njew Adapter($this->adaptee);
 *          $this->adapter->adaptedMethodThatImplementsAdapteeMethod();
 *
 * - Nothing in the reference class's code changes
 */

namespace Adapter;

include_once('Desktop.php');
include_once('Mobile.php');
include_once('MobileAdapter.php');



class Client
{
    private $mobile;
    private $mobileAdapter;

    private $desktop;

    public function __construct()
    {

        $this->desktop = new Desktop();
        $this->desktop->formatCSS();
        $this->desktop->formatGraphics();
        $this->desktop->horizontalLayout();
        $this->desktop->closeHTML();

        $this->mobile = new Mobile();
        $this->mobileAdapter = new MobileAdapter($this->mobile);
        $this->mobileAdapter->formatCSS();
        $this->mobileAdapter->formatGraphics();
        $this->mobileAdapter->horizontalLayout();
        $this->mobile->closeHTML();
    }
}
