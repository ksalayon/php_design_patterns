<?php
/**
 * Created by PhpStorm.
 * User: Kin.Salayon
 * Date: 28/02/2018
 * Time: 1:40 PM
 */
namespace Adapter;

interface IMobileFormat
{
    public function formatCSS();
    public function formatGraphics();
    public function verticalLayout();
}