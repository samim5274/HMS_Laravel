<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsaledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testsaledetails', function (Blueprint $table) {
            $table->id();
            $table->integer('reg');
            $table->date('date');
            $table->string('name');
            $table->string('dob');
            $table->string('gender');
            $table->integer('phone');
            $table->string('address');
            $table->integer('doctorId');
            $table->integer('referId');
            $table->integer('total');
            $table->integer('discount');
            $table->integer('payable');
            $table->integer('pay');
            $table->integer('duestatus');
            $table->integer('due');
            $table->integer('return');
            $table->integer('status');
            $table->integer('userId');
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
        Schema::dropIfExists('testsaledetails');
    }
}
