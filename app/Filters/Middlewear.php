<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 2:12 AM
 */

namespace App\Filters;

class Middlewear{


    protected $container;

    public function __construct($container)
    {
        $this->container=$container;
    }

}