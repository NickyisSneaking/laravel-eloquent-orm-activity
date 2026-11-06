<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
     /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    use ApiResponses;

    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return $this->ok(
            'Products retrieved successfully',
            ProductResource::collection($products)
        );
    }

    public function show(Product $product)
    {
        $product->load('category');

        return $this->ok(
            'Product retrieved successfully',
            new ProductResource($product)
        );
    }

    public function queries()
    {
        $results = [
            'name_and_price' => Product::select('name', 'price')->limit(5)->get(),
            'ordered_by_price' => Product::select('id', 'name')->orderBy('price', 'asc')->limit(5)->get(),
            'first_five' => Product::limit(5)->get(),
            'total_price' => Product::sum('price'),
            'average_price' => Product::avg('price'),
        ];

        return $this->success('Query results retrieved successfully', $results);
    }
}