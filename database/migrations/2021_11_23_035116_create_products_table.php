<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table  ->foreignId('category_id') //foreign key
                    ->references('id')  //nama field nya
                    ->on('categories'); //nama table nya
            $table->string('name');
            $table->text('description')->nullable(); //fungsi nullable agar field deskripsi optional untuk diisi
            $table->bigInteger('price');
            $table->string('sku');
            $table->text('image')->nullable();
            $table->enum('status',['active','inactive']);
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
}
