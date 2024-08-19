<?php

namespace App\Http\Services;
use App\Models\Furniture;
use Illuminate\Support\Facades\Http;

Class FurnitureService{

    public function fetchFurniture()
    {
        $url = 'https://dummyjson.com/products';
        $response = Http::get($url);

        if ($response->successful()) {
            $products = $response->json('products');

            // Filter products with furniture in the category
            $furnitureProducts = array_filter($products, function ($product) {
                return isset($product['category']) && strtolower($product['category']) === 'furniture';
            });

            // Store each furniture product to the database
            foreach ($furnitureProducts as $product) {
                Furniture::updateOrCreate(
                    ['id' => $product['id']],
                    [
                        'title' => $product['title'],
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'stock' => $product['stock'],
                        'category' => $product['category'],
                        'brand' => $product['brand'] ?? null,
                        'thumbnail' => $product['thumbnail'] ?? null,
                    ]
                );
            }
        }
    }
}
?>
