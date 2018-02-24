<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 2:14 AM
 */


namespace App\Filters;


class ValidationErrorsMiddlewear extends Middlewear
{

    public function __invoke($request, $response, $next)
    {
        $response = $next($request, $response);
        return $response;
    }

}