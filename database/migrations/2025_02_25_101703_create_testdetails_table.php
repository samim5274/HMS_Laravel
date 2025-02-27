<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testdetails', function (Blueprint $table) {
            $table->id();
            $table->string('testName');
            $table->integer('categoryId');
            $table->integer('subcategoryId');
            $table->integer('specimenId');
            $table->integer('groupId');
            $table->float('testPrice');
            $table->float('rprice');
            $table->string('room');
            $table->text('testDescription');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('testdetails');
    }
}
