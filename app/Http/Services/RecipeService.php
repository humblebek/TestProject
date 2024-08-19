<?php

namespace App\Http\Services;

use App\Models\Recipe;
use Illuminate\Support\Facades\Http;

Class RecipeService{

    public function fetchRecipes()
    {
        $url = 'https://dummyjson.com/recipes';
        $response = Http::get($url);

        if ($response->successful()) {
            $recipes = $response->json('recipes');

            foreach ($recipes as $recipe) {
                if (isset($recipe['id'])) {
                    Recipe::updateOrCreate(
                        ['id' => $recipe['id']], 
                        [
                            'name' => $recipe['name'] ?? '',
                            'ingredients' => $recipe['ingredients'] ?? [],
                            'instructions' => $recipe['instructions'] ?? [],
                            'prepTimeMinutes' => $recipe['prepTimeMinutes'] ?? 0,
                            'cookTimeMinutes' => $recipe['cookTimeMinutes'] ?? 0,
                            'servings' => $recipe['servings'] ?? 0,
                            'difficulty' => $recipe['difficulty'] ?? '',
                            'cuisine' => $recipe['cuisine'] ?? '',
                            'caloriesPerServing' => $recipe['caloriesPerServing'] ?? 0,
                            'tags' => $recipe['tags'] ?? [],
                            'userId' => $recipe['userId'] ?? 0,
                            'image' => $recipe['image'] ?? '',
                            'rating' => $recipe['rating'] ?? 0.0,
                            'reviewCount' => $recipe['reviewCount'] ?? 0,
                            'mealType' => $recipe['mealType'] ?? [],
                        ]
                    );
                }

            }

            return response()->json(['error' => 'Error fetching recipes: ' . $response->status()], $response->status());
        }
    }
}
?>
