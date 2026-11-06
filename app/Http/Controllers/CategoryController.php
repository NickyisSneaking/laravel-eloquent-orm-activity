<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::paginate($request->query('per_page', 10))
    ->withQueryString();

return response()->json([
    'status' => true,
    'message' => 'Categories retrieved successfully',
    'data' => $categories->map(function ($category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'body' => $category->body,
            'parent_id' => $category->parent_id,
        ];
    }),
    'meta' => [
        'current_page' => $categories->currentPage(),
        'last_page'    => $categories->lastPage(),
        'per_page'     => $categories->perPage(),
        'total'        => $categories->total(),
    ],
], 200); //get all categories from the database
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
