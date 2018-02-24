<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/24/2018
 * Time: 5:42 AM
 */

namespace App\Filters;


class SecurityConstants
{


    public static $SECRET = "SecretKeyToGenJWTs";
    public static $EXPIRATION_TIME = "864_000_000"; // 10 days
    public static $TOKEN_PREFIX = "Bearer ";
    public static $HEADER_STRING = "Authorization";
    public static $SIGN_UP_URL = "/token/";

}