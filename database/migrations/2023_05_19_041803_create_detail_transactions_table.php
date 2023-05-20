<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('trans_id');
            $table->unsignedBigInteger('room_id');
            $table->integer('days');
            $table->decimal('sub_total_room', 10, 2);
            $table->decimal('extra_charge', 10, 2);
            $table->timestamps();

            // $table->foreign('trans_id')->references('id')->on('transactions');
            // $table->foreign('room_id')->references('id')->on('rooms');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
}
