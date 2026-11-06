<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    //this tells laravel which attributes are mass assignable
    //example products = Product::create(['name' => 'Hammer', 'slug' => 'hammer', 'category' => 'Tools', 'price' => 19.99, 'quantity' => 100, 'status' => 'Available']);
    protected $fillable = [
        'category_id',
        'name', 
        'slug',
        'category',
        'price',
        'quantity',
        'status',
        'description',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity')
        ->withTimestamps();
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
