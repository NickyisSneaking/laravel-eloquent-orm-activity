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
        Schema::table('categories', function (Blueprint $table) {
            //add status column to categories table
            $table->string('status')->after('name'); //category status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //drop status column from categories table
            $table->dropColumn('status');
            //&table->dropColumn(['status, 'date']);
            $table->dropColumn(['status', 'date']); //drop multiple columns
        });
    }
};
