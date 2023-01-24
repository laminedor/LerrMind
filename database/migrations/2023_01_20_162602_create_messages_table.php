<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{

    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->dateTime('dateSend');
            $table->dateTime('dateReceive');
            $table->unsignedBigInteger('session_id');
            $table->enum('envoyeur', ['patient', 'psycologue']);
            $table->timestamps();
            $table->foreign('session_id')->references('id')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
