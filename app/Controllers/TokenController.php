<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 6:31 AM
 */

namespace App\Controllers;

use App\Filters\SecurityConstants;
use App\Domain\User;
use App\Filters\TokenAuthenticationService;

class TokenController extends Controller
{
    public function getToken($request, $response)
    {
        User::create([
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 5]),
        ]);

        $data = TokenAuthenticationService::addAuthentication($request);
        return $response->withStatus(201)
            ->withHeader("Content-Type", "application/json")
            ->withHeader(SecurityConstants::$HEADER_STRING, $data);//->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT))
    }
}