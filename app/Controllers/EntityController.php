<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2/23/2018
 * Time: 9:54 PM
 */

namespace App\Controllers;

use App\Domain\Entity;
use App\Exceptions\ServerException;


class EntityController extends Controller
{

    public function getEntity($request, $response)
    {
        try {
            $entities = $this->db->table('entity')->get()->toArray();
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($entities), JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
           throw new ServerException(":getEntity:".$e->getMessage());
        }
    }

    public function getEntityById($request, $response)
    {
        try {
            $entity = $this->db->table('entity')->where('id', $request->getAttribute('id'))->first();
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($entity), JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            throw new ServerException(":getEntityById:".$e->getMessage());
        }
    }

    public function postEntity($request, $response)
    {
        try {
            Entity::create([
                'name' => $request->getParam('name'),
                'text' => $request->getParam('text'),
            ]);
            return $response->withStatus(201)
                ->withHeader("Content-Type", "application/json");
        } catch (\Exception $e) {
            throw new Exception(":postEntity:".$e->getMessage());
        }
    }


    public function putEntity($request, $response)
    {
        try {
            $entity = Entity::find($request->getAttribute('id'));
            $entity->name = $request->getParam('name');
            $entity->text = $request->getParam('text');
            $entity->save();
            return $response->withStatus(204)
                ->withHeader("Content-Type", "application/json");
        } catch (\Exception $e) {
            throw new ServerException(":putEntity:".$e->getMessage());
        }
    }

    public function deleteEntity($request, $response)
    {
        try {
            $entity = Entity::find($request->getAttribute('id'));
            $entity->delete();
            return $response->withStatus(204)
                ->withHeader("Content-Type", "application/json");
        } catch (\Exception $e) {
            throw new ServerException(":deleteEntity:".$e->getMessage());
        }
    }
}