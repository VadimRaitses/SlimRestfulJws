<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 5:44 AM
 */

namespace App\Filters;

use Ramsey\Uuid\Uuid;
use Firebase\JWT\JWT;
use Tuupola\Base62;
use \Datetime;

class TokenAuthenticationService
{


    public static function addAuthentication($request)
    {

        $now = new DateTime();
        $future = new DateTime("now +2 hours");
        $server = $request->getServerParams();

        $jti = (new Base62)->encode(random_bytes(16));

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => $jti,
            "sub" => $request->getParam('email'),//$server["PHP_AUTH_USER"],
            "scope" => $request->getParam('email')
        ];

        $secret = \App\Filters\SecurityConstants::$SECRET;
        $token = JWT::encode($payload, $secret, "HS256");

        $data["token"] = $token;

        return SecurityConstants::$TOKEN_PREFIX . implode($data);

    }

}