<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 9:57 PM
 */


namespace App\Domain;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    protected $table = 'entity';

    protected $fillable = [
        'name',
        'text',
    ];
}