<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 9:17 PM
 */



$app->get('/entity', 'EntityController:getEntity');
$app->get('/entity/{id}', 'EntityController:getEntityById');
$app->post('/entity', 'EntityController:postEntity');
$app->put('/entity/{id}', 'EntityController:putEntity');
$app->delete('/entity/{id}', 'EntityController:deleteEntity');