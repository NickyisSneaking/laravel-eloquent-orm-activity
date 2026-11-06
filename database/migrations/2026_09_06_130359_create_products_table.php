<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the products table fill the migration
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //product name eg hammer
            $table->string('slug')->unique(); //unique URL-friendly identifier
            $table->string('category'); //product category
            $table->decimal('price', 10, 2); //product price
            $table->integer('quantity'); //product quantity
            $table->string('status')->default('Available'); //product status
            $table->timestamps();//Adds created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
