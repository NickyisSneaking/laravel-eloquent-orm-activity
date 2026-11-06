<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; //i mistakenly reverese / instead of \ in the use statement, i will fix it now
use App\Models\Category;

class ProductController extends Controller
{
    public function queries(Request $request)
    {
    $query = Product::query();
    
    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    return response()->json($query->get());
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //add functuonality to get all products from the database and return them as a json response
        $products = Product::with('category')->paginate($request->query('per_page', 20))->withQueryString(); //get all products from the database
        $result = [];


        //loop through the products and add them to the result array
        foreach ($products as $product) {
            $result[] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'category' => $product->category,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'status' => $product->status,
            ];
    }
    //return the result as a json response
    return response()->json([
        'status' => true,
        'message' => 'Products retrieved successfully',
        'data' => $result,
        'meta' =>[
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total(),
            ],
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */

    //same case as update method
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = is_numeric($slug)
            ? Product::find($slug)
            : Product::where('slug', $slug)->first();
        //to show a specific product by id slug from the database and return it as a json response
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        //return the product as a json response
        return response()->json([
            'status' => true,
            'message' => 'Product retrieved successfully',
            'data' => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'category' => $product->category,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'status' => $product->status,
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */

    //i dont know what to do with this update method, should i just leave it empty or should i add some code to it? you can leave it empty for now, but you might want to implement it later if you need to update products in your application.
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    //same case as update method
    public function destroy(string $id)
    {
        //
    }
}
