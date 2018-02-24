<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 9:31 PM
 */

namespace App\Domain;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
    ];


}