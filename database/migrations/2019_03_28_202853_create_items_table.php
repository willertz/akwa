<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category')->nullable();
            $table->integer('priority')->nullable();
            $table->string('art')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('price_usd')->nullable();
            $table->string('price_eur')->nullable();
            $table->longText('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('country')->nullable();
            $table->integer('main_item')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('preview')->nullable();
            $table->text('meta_title');
            $table->text('meta_description');
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
        Schema::dropIfExists('items');
    }
}
