<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 9:39 PM
 */

namespace App\Controllers;


use App\Domain\User;

class UserController extends Controller
{
    public function getUser($request, $response)
    {
        $email = $this->container["token"]->decoded['sub'];
        $user = $this->db->table('users')->where('email', $email)->first();
        return $response->withStatus(200)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($user), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

}