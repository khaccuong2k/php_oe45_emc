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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('thumbnail');
            $table->text('content');
            $table->string('short_description');
            $table->integer('quantity');
            $table->integer('views')->nullable()->default(0);
            $table->float('price');
            $table->float('number_of_vote_submissions')->nullable()->default(0);
            $table->integer('total_vote')->nullable()->default(0);
            $table->integer('sold')->nullable()->default(0);
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
