<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 8:36 PM
 */

namespace App\Responses;

use Crell\ApiProblem\ApiProblem;
use Slim\Http\Headers;
use Slim\Http\Response;
use Slim\Http\Stream;

class BadRequestResponse extends Response
{
    public function __construct($message, $status = 500)
    {
        $problem = new ApiProblem($message, "about:blank");
        $problem->setStatus($status);

        $handle = fopen("php://temp", "wb+");
        $body = new Stream($handle);
        $body->write($problem->asJson(true));
        $headers = new Headers;
        $headers->set("Content-type", "application/problem+json");
        parent::__construct($status, $headers, $body);
    }
}
