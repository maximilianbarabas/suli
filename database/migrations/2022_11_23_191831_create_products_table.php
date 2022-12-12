<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string( column: 'name'); 
            $table->string( column: 'category'); 
            $table->string( column: 'brand'); 
            $table->string( column: 'description'); 
            $table->string( column: 'price'); 
            $table->string( column: 'image')->default(value: '0'); 
            $table->string( column: 'imgpath')->default(value: '0'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
