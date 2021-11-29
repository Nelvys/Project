<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedioBasicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medio_basico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_inventory');
            $table->string('name_object');
            $table->string('local_name');
            $table->string('responsable');
            $table->integer('medio_basico_category_id')->unsigned();
            $table->foreign('medio_basico_category_id')->references('id')->on('medio_basico_category');
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
        Schema::dropIfExists('medio_basico');
    }
}
