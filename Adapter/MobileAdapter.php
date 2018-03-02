<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 28/02/2018
 * Time: 2:32 PM
 */
namespace Adapter;
include_once("IFormat.php");
include_once("Mobile.php");

class MobileAdapter implements IFormat
{
    private $mobile;

    public function __construct(IMobileFormat $mobileNow)
    {
        $this->mobile = $mobileNow;
    }

    public function formatCSS()
    {
        $this->mobile->formatCSS();
    }

    public function formatGraphics()
    {
        $this->mobile->formatGraphics();
    }

    public function horizontalLayout()
    {
        $this->mobile->verticalLayout();
    }

}