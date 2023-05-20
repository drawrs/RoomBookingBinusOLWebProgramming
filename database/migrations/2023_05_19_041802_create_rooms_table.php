<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('room_type_id');
            $table->string('room_name');
            $table->integer('area');
            $table->decimal('price', 10, 2);
            $table->text('facility');
            $table->timestamps();

            // $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
