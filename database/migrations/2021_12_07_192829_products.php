<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->bigInteger('user_id');
            $table->String('itemId');
            $table->String('UPC');
            $table->String('SKU');
            $table->String('Title');
            $table->json('unpublishedReasons');
            $table->String('lifeStatus');
            $table->string('publishedStatus');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
