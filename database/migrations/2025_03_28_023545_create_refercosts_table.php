<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefercostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refercosts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('regNum');
            $table->integer('patientId');
            $table->integer('userId');
            $table->integer('referId');
            $table->integer('amount');
            $table->integer('paid');
            $table->string('remarks')->nullable();
            $table->string('status')->default('unpaid');
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
        Schema::dropIfExists('refercosts');
    }
}
