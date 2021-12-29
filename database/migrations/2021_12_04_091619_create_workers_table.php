<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('nationality');
            $table->string('religion');
            $table->string('DOB');
            $table->string('place_of_birth');
            $table->string('living');
            $table->enum('social_status',[0,1,2,3]);
            $table->string('number_of_child')->nullable();
            $table->string('weight');
            $table->string('height');
            $table->string('skin_colour');
            $table->string('degree');
            $table->float('salary', 8, 2);
            $table->float('retainer', 8, 2);
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
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
        Schema::dropIfExists('workers');
    }
}
