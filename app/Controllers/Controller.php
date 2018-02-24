<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 11:27 PM
 */

namespace App\Controllers;

class Controller
{


    protected $container;


    public function __construct($container)
    {

        $this->container = $container;

    }

    public function __get($property)
    {
        if($this->container->{$property}){
            return $this->container->{$property};
        }

    }

}