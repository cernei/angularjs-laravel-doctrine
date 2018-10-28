<?php

namespace App\Http\Controllers;

use App\Traits\ProcessFields;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    use ProcessFields;

    public function __construct(Request $request)
    {
        $this->modelName = 'App\\Entities\\' . ucfirst(str_singular($request->segment(2)));
    }

    public function index(Request $request)
    {
        $fields = $this->modelName::$allowedForRead;

        $items = EntityManager::getRepository($this->modelName)->findAll();
        $items = $this->_getAllItems($items, $fields);

        return response()->json($items);
    }

    public function show($id)
    {
        $item = EntityManager::find($this->modelName, $id);
        $item = $this->_getItem($item, $this->modelName::$allowedForRead);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $fields = $request->only($this->modelName::$allowedForWrite);

        $item = new $this->modelName(...array_values($fields));

        EntityManager::persist($item);
        EntityManager::flush();
    }

    public function update($id, Request $request)
    {
        $fields = $request->only($this->modelName::$allowedForWrite);

        $item = EntityManager::find($this->modelName, $id);
        $item = $this->_getFilledItem($item, $fields);

        EntityManager::persist($item);
        EntityManager::flush();

    }

    public function destroy($id)
    {
        $item = EntityManager::find($this->modelName, $id);
        EntityManager::remove($item);
        EntityManager::flush();
    }

}
