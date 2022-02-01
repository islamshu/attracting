<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_replays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id');
            $table->text('body');
            $table->string('user_type');
            $table->foreign('message_id')->references('id')->on('send_fronts')->onDelete('cascade');

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
        Schema::dropIfExists('front_replays');
    }
}
