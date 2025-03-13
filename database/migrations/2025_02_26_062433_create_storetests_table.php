<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoretestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storetests', function (Blueprint $table) {
            $table->id();
            $table->integer('regNum');
            $table->integer('testId');
            $table->integer('testprice');
            $table->integer('categoryId');
            $table->integer('subcategoryId');
            $table->integer('specimenId');
            $table->integer('groupId');
            $table->integer('room');
            $table->integer('status');
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
        Schema::dropIfExists('storetests');
    }
}
