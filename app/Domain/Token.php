<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 7:00 AM
 */
declare(strict_types=1);


namespace App\Domain;


class Token
{
    public $decoded;

    public function populate($decoded)
    {
        $this->decoded = $decoded;
    }

    public function hasScope(array $scope)
    {
        return !!count(array_intersect($scope, $this->decoded["scope"]));
    }
}