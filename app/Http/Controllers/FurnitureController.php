<?php

namespace App\Http\Controllers;

use App\Http\Services\FurnitureService;


class FurnitureController extends Controller
{
    protected $furnitureService;

    public function __construct(FurnitureService $furnitureService)
    {
        $this->furnitureService = $furnitureService;
    }

    public function fetchFurniture()
    {
        $this->furnitureService->fetchFurniture();

        return response()->json(['message' => 'Furniture data fetched and stored successfully.'], 200);
    }
}


