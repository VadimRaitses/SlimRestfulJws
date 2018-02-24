<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 8:38 PM
 */

session_start();

use Tuupola\Middleware\HttpBasicAuthentication;
use Tuupola\Middleware\JwtAuthentication;
use Tuupola\Middleware\CorsMiddleware;
use Gofabian\Negotiation\NegotiationMiddleware;


require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'entities',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collatiion' => 'uf8_unicode_ci',
            'prefix' => '',
        ],

    ],
]);

$container = $app->getContainer();
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['validator'] = function ($container) {
    return new App\Validation\Validator;
};

$app->add(new \App\Filters\ValidationErrorsMiddlewear($container));


$container['TokenController'] = function ($container) {
    return new \App\Controllers\TokenController($container);
};

$container['UserController'] = function ($container) {
    return new \App\Controllers\UserController($container);
};

$container['EntityController'] = function ($container) {
    return new \App\Controllers\EntityController($container);
};

$container["token"] = function ($container) {
    return new \App\Domain\Token;
};


$container["HttpBasicAuthentication"] = function ($container) {
    return new HttpBasicAuthentication([
        "path" => "/token",
        "ignore" => ["/token"],
        "relaxed" => ["127.0.0.1", "localhost"],
        "error" => function ($response, $arguments) {
            return new \App\Responses\ UnauthorizedResponse($arguments["message"], 401);
        },
        "users" => [
            "test" => "test"
        ]
    ]);
};

$container["JwtAuthentication"] = function ($container) {
    return new \Tuupola\Middleware\JwtAuthentication([
        "path" => "/",
        "ignore" => ["/token"],
        "secret" => \App\Filters\SecurityConstants::$SECRET,
       //"logger" => $container["logger"],
        "attribute" => false,
        "relaxed" => ["127.0.0.1", "localhost"],
        "error" => function ($response, $arguments) {
            return new \App\Responses\UnauthorizedResponse($arguments["message"], 401);
        },
        "before" => function ($request, $arguments) use ($container) {
            $container["token"]->populate($arguments["decoded"]);
        },
    ]);
};

$container["CorsMiddleware"] = function ($container) {
    return new \Tuupola\Middleware\CorsMiddleware([
        //"logger" => $container["logger"],
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "DELETE"],
        "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since"],
        "headers.expose" => ["Authorization", "Etag"],
        "credentials" => true,
        "cache" => 60,
        "error" => function ($request, $response, $arguments) {
            return new UnauthorizedResponse($arguments["message"], 401);
        }
    ]);
};

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        if ($exception instanceof \App\Exceptions\ServerException) {
            return new \App\Responses\ BadRequestResponse($exception->getMessage(), 500);
        }else{
            return new \App\Responses\ BadRequestResponse($exception->getMessage(), 500);
        }
    };
};

$container["NegotiationMiddleware"] = function ($container) {
    return new NegotiationMiddleware([
        "accept" => ["application/json"]
    ]);
};


$app->add("HttpBasicAuthentication");
$app->add("JwtAuthentication");

require __DIR__ . '/../app/Routes/token.php';
require __DIR__ . '/../app/Routes/entity.php';
require __DIR__ . '/../app/Routes/user.php';
