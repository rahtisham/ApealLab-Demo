<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Integrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->String('platform');
            $table->String('name');
            $table->longText('client_id');
            $table->longText('client_secret');
            $table->boolean('is_active')->nullable;
            $table->longText('token')->nullable;
            $table->string('status')->nullable;
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
