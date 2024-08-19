<?php

namespace App\Http\Controllers;

use App\Http\Services\RecipeService;

class RecipesController extends Controller
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function fetchRecipes()
    {

        $this->recipeService->fetchRecipes();

        return response()->json(['message' => 'Recipe data fetched and stored successfully.'], 200);
    }


}
